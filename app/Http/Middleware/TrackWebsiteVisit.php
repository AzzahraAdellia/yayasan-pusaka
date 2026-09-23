<?php

namespace App\Http\Middleware;

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

        \Illuminate\Support\Facades\Log::info('TRACK WEBSITE VISIT', [
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

        WebsiteVisit::create([
            'visitor_id' => $visitorId,
            'path' => $request->path() === '/'
                ? '/'
                : '/' . $request->path(),
            'country_code' => null,
            'country_name' => null,
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