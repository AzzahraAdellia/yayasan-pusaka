<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebsiteVisit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class VisitReportController extends Controller
{
    public function exportPdf(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | FILTER PERIODE
        |--------------------------------------------------------------------------
        */

        $period = (string) $request->query('period', '30');

        if (!in_array($period, ['7', '30', '90', 'all', 'custom'], true)) {
            $period = '30';
        }

        $today = Carbon::today();
        $startDate = null;
        $endDate = Carbon::today()->endOfDay();

        if (in_array($period, ['7', '30', '90'], true)) {
            $startDate = $today->copy()
                ->subDays(((int) $period) - 1)
                ->startOfDay();
        }

        if ($period === 'custom') {
            $validated = $request->validate([
                'start_date' => ['required', 'date_format:Y-m-d'],
                'end_date' => [
                    'required',
                    'date_format:Y-m-d',
                    'after_or_equal:start_date',
                ],
            ]);

            $startDate = Carbon::createFromFormat(
                'Y-m-d',
                $validated['start_date']
            )->startOfDay();

            $endDate = Carbon::createFromFormat(
                'Y-m-d',
                $validated['end_date']
            )->endOfDay();
        }

        /*
        |--------------------------------------------------------------------------
        | QUERY KUNJUNGAN
        |--------------------------------------------------------------------------
        */

        $visitsQuery = WebsiteVisit::query();

        if ($startDate !== null) {
            $visitsQuery->where('created_at', '>=', $startDate);
        }

        $visitsQuery->where('created_at', '<=', $endDate);

        /*
        |--------------------------------------------------------------------------
        | RINGKASAN KUNJUNGAN
        |--------------------------------------------------------------------------
        */

        $uniqueVisitors = (clone $visitsQuery)
            ->distinct()
            ->count('visitor_id');

        $totalPageViews = (clone $visitsQuery)->count();

        $countriesDetected = (clone $visitsQuery)
            ->whereNotNull('country_code')
            ->distinct()
            ->count('country_code');

        /*
        |--------------------------------------------------------------------------
        | KUNJUNGAN HARIAN
        |--------------------------------------------------------------------------
        */

        $dailyVisits = (clone $visitsQuery)
            ->select(
                DB::raw('DATE(created_at) as visit_date'),
                DB::raw('COUNT(*) as page_views')
            )
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy('visit_date')
            ->pluck('page_views', 'visit_date');

        $chartStartDate = $startDate
            ? $startDate->copy()->startOfDay()
            : Carbon::parse(
                WebsiteVisit::min('created_at') ?? $today
            )->startOfDay();

        $visitChart = collect();
        $cursor = $chartStartDate->copy();
        $chartEndDate = $endDate->copy()->startOfDay();

        while ($cursor->lessThanOrEqualTo($chartEndDate)) {
            $dateKey = $cursor->toDateString();

            $visitChart->push([
                'date' => $cursor->format('d M Y'),
                'total' => (int) ($dailyVisits[$dateKey] ?? 0),
            ]);

            $cursor->addDay();
        }

        /*
        |--------------------------------------------------------------------------
        | ASAL NEGARA
        |--------------------------------------------------------------------------
        */

        $countries = (clone $visitsQuery)
            ->select(
                'country_code',
                'country_name',
                DB::raw('COUNT(*) as total')
            )
            ->whereNotNull('country_code')
            ->groupBy('country_code', 'country_name')
            ->orderByDesc('total')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | JENIS PERANGKAT
        |--------------------------------------------------------------------------
        */

        $devices = (clone $visitsQuery)
            ->select(
                'device_type',
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('device_type')
            ->orderByDesc('total')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | HALAMAN TERPOPULER
        |--------------------------------------------------------------------------
        */

        $popularPages = (clone $visitsQuery)
            ->select(
                'path',
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('path')
            ->orderByDesc('total')
            ->limit(10)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | INFORMASI PERIODE LAPORAN
        |--------------------------------------------------------------------------
        */

        if ($period === 'all') {
            $periodLabel = 'Seluruh Periode';
        } elseif ($period === 'custom') {
            $periodLabel = $startDate->format('d/m/Y')
                . ' - '
                . $endDate->format('d/m/Y');
        } else {
            $periodLabel = $period . ' Hari Terakhir';
        }

        /*
        |--------------------------------------------------------------------------
        | GENERATE PDF
        |--------------------------------------------------------------------------
        */

        $pdf = Pdf::loadView(
            'admin.reports.website-visits',
            compact(
                'period',
                'periodLabel',
                'startDate',
                'endDate',
                'uniqueVisitors',
                'totalPageViews',
                'countriesDetected',
                'visitChart',
                'countries',
                'devices',
                'popularPages'
            )
        )->setPaper('a4', 'portrait');

        $filename = 'Laporan-Kunjungan-Yayasan-Pusaka-'
            . now()->format('Ymd-His')
            . '.pdf';

        return $pdf->download($filename);
    }
}
