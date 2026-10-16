@extends('layouts.app')

@section('title', 'Dampak | Yayasan Pusaka')

@section('content')

<section class="impact-page-hero">
    <div class="container">
        <div class="impact-page-hero-content">

            <span class="section-label">
                DAMPAK KAMI
            </span>

            <h1>
                Mengukur Manfaat,
                <span>Melihat Perubahan.</span>
            </h1>

            <p>
                Dampak Yayasan Pusaka tidak hanya dilihat dari jumlah program
                yang dijalankan, tetapi juga dari manfaat yang dirasakan
                penerima manfaat dan perkembangan yang tercipta.
            </p>

            <div class="profile-breadcrumb">
                <a href="{{ route('home') }}">Beranda</a>
                <i class="bi bi-chevron-right"></i>
                <span>Dampak</span>
            </div>

        </div>
    </div>
</section>



{{-- =========================
     STATISTIK UTAMA
========================= --}}

<section class="impact-page-stats section-padding">
    <div class="container">

        <div class="impact-page-heading text-center">
            <span class="section-label">
                DALAM ANGKA
            </span>

            <h2 class="section-title">
                Dampak yang Dapat
                <span>Diukur.</span>
            </h2>

            <p>
                Data penerima manfaat aktif Yayasan Pusaka
                berdasarkan Sistem Informasi Internal
                yang diperbarui secara berkala.
            </p>
        </div>

        <div class="row g-4 justify-content-center">

            {{-- KELUARGA AKTIF --}}
            <div class="col-12 col-md-6 col-lg-4">
                <div class="impact-page-stat-card h-100">

                    <div class="impact-page-stat-icon blue">
                        <i class="bi bi-people-fill"></i>
                    </div>

                    <h3>
                        {{ isset($publicStats['family']['active'])
                            ? number_format($publicStats['family']['active'], 0, ',', '.')
                            : '-' }}
                    </h3>

                    <strong>Keluarga Penerima Manfaat Aktif</strong>

                    <span>
                        Keluarga penerima manfaat yang
                        tercatat aktif di Yayasan Pusaka.
                    </span>

                </div>
            </div>

            {{-- ANAK ANAK PENERIMA MANFAAT AKTIF --}}
            <div class="col-12 col-md-6 col-lg-4">
                <div class="impact-page-stat-card h-100">

                    <div class="impact-page-stat-icon orange">
                        <i class="bi bi-mortarboard-fill"></i>
                    </div>

                    <h3>
                        {{ isset($publicStats['children']['active'])
                            ? number_format($publicStats['children']['active'], 0, ',', '.')
                            : '-' }}
                    </h3>

                    <strong>Anak-Anak Penerima Manfaat Aktif</strong>

                    <span>
                        Anak-anak yang tercatat aktif
                        sebagai penerima manfaat Yayasan Pusaka.
                    </span>

                    @if (isset($publicStats['children']))
                        <div class="w-100 mt-4 pt-3"
                             style="border-top: 1px solid rgba(100,116,139,0.25);">

                            <div class="mb-3"
                                 style="font-size: 14px; font-weight: 600;">
                                Rincian Kategori Anak-Anak Penerima Manfaat Aktif
                            </div>

                            <div class="row g-2">

                                @foreach ([
                                    'Yatim' => $publicStats['children']['yatim'] ?? null,
                                    'Piatu' => $publicStats['children']['piatu'] ?? null,
                                    'Yatim Piatu' => $publicStats['children']['yatimPiatu'] ?? null,
                                    'ABK' => $publicStats['children']['abk'] ?? null,
                                ] as $label => $jumlah)

                                    <div class="col-6">
                                        <div class="d-flex justify-content-between align-items-center gap-2 px-2 py-2"
                                             style="background: rgba(100,116,139,0.08);
                                                    border-radius: 8px;
                                                    min-height: 42px;">

                                            <span style="font-size: 12px;">
                                                {{ $label }}
                                            </span>

                                            <b style="font-size: 14px;">
                                                {{ $jumlah !== null
                                                    ? number_format($jumlah, 0, ',', '.')
                                                    : '-' }}
                                            </b>

                                        </div>
                                    </div>

                                @endforeach

                            </div>
                        </div>
                    @endif

                </div>
            </div>

            {{-- UMKM AKTIF --}}
            <div class="col-12 col-md-6 col-lg-4">
                <div class="impact-page-stat-card h-100">

                    <div class="impact-page-stat-icon blue">
                        <i class="bi bi-shop"></i>
                    </div>

                    <h3>
                        {{ isset($publicStats['umkm']['active'])
                            ? number_format($publicStats['umkm']['active'], 0, ',', '.')
                            : '-' }}
                    </h3>

                    <strong>UMKM Aktif</strong>

                    <span>
                        UMKM yang tercatat aktif dalam
                        Sistem Informasi Internal Yayasan Pusaka.
                    </span>

                </div>
            </div>

        </div>

        <div class="text-center mt-4">
            <small class="text-muted">
                <i class="bi bi-info-circle me-1"></i>
                Statistik bersumber dari Sistem Informasi Internal
                Yayasan Pusaka.

                @if (!empty($publicStats['updatedAt']))
                    Diperbarui:
                    {{ \Carbon\Carbon::parse($publicStats['updatedAt'])
                        ->timezone('Asia/Jakarta')
                        ->format('d/m/Y H:i') }} WIB.
                @endif
            </small>
        </div>

    </div>
</section>



{{-- =========================
     CERITA DAMPAK
========================= --}}

<section class="impact-page-stories section-padding">

    <div class="container">

        <div class="impact-page-stories-heading text-center">

            <span class="section-label">
                CERITA DAMPAK
            </span>

            <h2 class="section-title">
                Angka Memberikan Gambaran,
                <span>Cerita Memberikan Makna.</span>
            </h2>

            <p>
                Cerita penerima manfaat membantu menunjukkan bagaimana
                program memberikan perubahan dalam kehidupan nyata.
            </p>

        </div>


        @if ($impactStories->isNotEmpty())

            <div class="row g-4">

                @foreach ($impactStories as $story)

                    <div class="col-md-6 col-lg-4">

                        <article class="impact-page-story-card">

                            {{-- FOTO --}}
                            @if ($story->image)

                                <img
                                    src="{{ asset('storage/' . $story->image) }}"
                                    alt="{{ $story->title }}"
                                >

                            @else

                                <div class="impact-story-image-placeholder">

                                    <i class="bi bi-image"></i>

                                </div>

                            @endif


                            <div class="impact-page-story-content">

                                {{-- KATEGORI --}}
                                <span>
                                    {{ strtoupper($story->category) }}
                                </span>


                                {{-- JUDUL --}}
                                <h3>
                                    {{ $story->title }}
                                </h3>


                                {{-- RINGKASAN --}}
                                @if ($story->excerpt)

                                    <p>
                                        {{ \Illuminate\Support\Str::limit(
                                            $story->excerpt,
                                            140
                                        ) }}
                                    </p>

                                @elseif ($story->subtitle)

                                    <p>
                                        {{ \Illuminate\Support\Str::limit(
                                            $story->subtitle,
                                            140
                                        ) }}
                                    </p>

                                @endif


                                <a href="{{ route('impact.show', $story) }}">
                                    Baca Cerita

                                    <i class="bi bi-arrow-right"></i>
                                </a>

                            </div>

                        </article>

                    </div>

                @endforeach

            </div>

        @else

            {{-- BELUM ADA CERITA --}}
            <div class="text-center py-5">

                <i
                    class="bi bi-chat-heart"
                    style="font-size: 42px;"
                ></i>

                <h3 class="mt-3">
                    Cerita Dampak Akan Hadir
                </h3>

                <p>
                    Cerita perjalanan penerima manfaat
                    Yayasan Pusaka akan ditampilkan di sini.
                </p>

            </div>

        @endif

    </div>

</section>


{{-- TRANSPARENCY CTA --}}
<section class="impact-transparency">
    <div class="container">

        <div class="impact-transparency-wrapper">

            <div>

                <span>
                    TRANSPARANSI DAMPAK
                </span>

                <h2>
                    Data Membantu Kami
                    <strong>Belajar dan Berkembang.</strong>
                </h2>

                <p>
                    Pengukuran dampak membantu Yayasan Pusaka
                    mengevaluasi program dan menentukan langkah
                    pengembangan berikutnya.
                </p>

            </div>

            <a href="{{ route('information.index') }}"
               class="profile-commitment-btn">

                Lihat Laporan & Informasi

                <i class="bi bi-arrow-right"></i>

            </a>

        </div>

    </div>
</section>

@endsection