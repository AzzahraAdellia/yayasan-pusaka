<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

use App\Models\WebsiteVisit;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class TrackWebsiteVisit
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        Log::info('TRACK WEBSITE VISIT', [
            'path' => $request->path(),
            'status' => $response->getStatusCode(),
            'method' => $request->method(),
            'logged_in' => (bool) $request->user(),
            'ajax' => $request->ajax(),
            'expects_json' => $request->expectsJson(),
        ]);

        // Catat hanya halaman yang berhasil dibuka melalui GET.
        if (
            !$request->isMethod('GET') ||
            $response->getStatusCode() !== 200
        ) {
            return $response;
        }

        // Jangan hitung kunjungan dari akun CMS yang sedang login.
        if ($request->user()) {
            return $response;
        }

        // Jangan hitung permintaan otomatis untuk mengambil data di belakang layar.
        if (
            $request->ajax() ||
            $request->expectsJson()
        ) {
            return $response;
        }

        // Identitas acak untuk membedakan pengunjung pada browser yang sama.
        $visitorId = $request->cookie('yp_visitor_id');

        if (
            !is_string($visitorId) ||
            !Str::isUuid($visitorId)
        ) {
            $visitorId = (string) Str::uuid();
        }

        $userAgent = strtolower($request->userAgent() ?? '');

        // Perkiraan jenis perangkat berdasarkan informasi browser.
        $deviceType = 'desktop';

        if (
            str_contains($userAgent, 'ipad') ||
            str_contains($userAgent, 'tablet') ||
            str_contains($userAgent, 'kindle') ||
            str_contains($userAgent, 'silk/')
        ) {
            $deviceType = 'tablet';
        } elseif (
            str_contains($userAgent, 'mobile') ||
            str_contains($userAgent, 'iphone') ||
            str_contains($userAgent, 'ipod') ||
            str_contains($userAgent, 'android')
        ) {
            $deviceType = 'mobile';
        } elseif ($userAgent === '') {
            $deviceType = 'unknown';
        }

        // Deteksi negara pengunjung berdasarkan IP.
        // IP hanya digunakan untuk lookup dan tidak disimpan ke database.
        $countryCode = null;
        $countryName = null;

        try {
            $ipAddress = $request->ip();

            // IP lokal tidak dapat dideteksi negaranya.
            $isLocalIp =
                $ipAddress === '127.0.0.1' ||
                $ipAddress === '::1' ||
                filter_var(
                    $ipAddress,
                    FILTER_VALIDATE_IP,
                    FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE
                ) === false;

            if (!$isLocalIp && config('services.ipinfo.token')) {
                $geoResponse = Http::timeout(3)
                    ->acceptJson()
                    ->get(
                        'https://api.ipinfo.io/lite/' . urlencode($ipAddress),
                        [
                            'token' => config('services.ipinfo.token'),
                        ]
                    );

                if ($geoResponse->successful()) {
                    $geoData = $geoResponse->json();

                    $countryCode = $geoData['country_code'] ?? null;
                    $countryName = $geoData['country'] ?? null;
                }
            }
        } catch (\Throwable $e) {
            Log::warning('IPinfo lookup gagal', [
                'message' => $e->getMessage(),
            ]);
        }

        WebsiteVisit::create([
            'visitor_id' => $visitorId,
            'path' => $request->path() === '/'
                ? '/'
                : '/' . $request->path(),
            'country_code' => $countryCode,
            'country_name' => $countryName,
            'device_type' => $deviceType,
        ]);

        // Simpan identitas pengunjung selama 30 hari.
        $response->headers->setCookie(
            cookie(
                'yp_visitor_id',
                $visitorId,
                60 * 24 * 30,
                '/',
                null,
                $request->isSecure(),
                true,
                false,
                'lax'
            )
        );

        return $response;
    }
}