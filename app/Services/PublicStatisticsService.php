<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PublicStatisticsService
{
    private const API_URL =
        'https://api.yayasanpusakakai.org/api/public/stats';

    private const CACHE_KEY = 'yp_public_statistics';

    private const LAST_SUCCESS_KEY = 'yp_public_statistics_last_success';

    public function get(): ?array
    {
        return Cache::remember(
            self::CACHE_KEY,
            now()->addHour(),
            function () {
                try {
                    $response = Http::acceptJson()
                        ->connectTimeout(3)
                        ->timeout(8)
                        ->get(self::API_URL);

                    if ($response->successful()) {
                        $payload = $response->json();

                        $data = $payload['data'] ?? null;

                        if (
                            is_array($data) &&
                            isset(
                                $data['family'],
                                $data['children'],
                                $data['umkm'],
                                $data['educationLevels']
                            ) &&
                            is_array($data['family']) &&
                            is_array($data['children']) &&
                            is_array($data['umkm']) &&
                            is_array($data['educationLevels'])
                        ) {
                            Cache::forever(
                                self::LAST_SUCCESS_KEY,
                                $data
                            );

                            return $data;
                        }
                    }

                    Log::warning(
                        'API statistik Yayasan Pusaka tidak berhasil',
                        ['status' => $response->status()]
                    );
                } catch (\Throwable $e) {
                    Log::warning(
                        'Gagal mengambil API statistik Yayasan Pusaka',
                        ['message' => $e->getMessage()]
                    );
                }

                // Jika API gagal, gunakan data terakhir yang berhasil.
                return Cache::get(self::LAST_SUCCESS_KEY);
            }
        );
    }
}
