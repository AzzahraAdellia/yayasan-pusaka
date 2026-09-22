@extends('layouts.app')

@section('title', 'Kegiatan | Yayasan Pusaka')

@section('content')

{{-- =========================
     PAGE HERO
========================= --}}

<section class="activities-hero">
    <div class="container">
        <div class="activities-hero-content">

            <span class="section-label">KEGIATAN</span>

            <h1>
                Aktivitas Nyata,
                <span>Manfaat yang Terasa.</span>
            </h1>

            <p>
                Dokumentasi berbagai kegiatan Yayasan Pusaka dalam
                menjalankan program pendidikan, sosial, pemberdayaan,
                pelatihan, dan kolaborasi bersama para mitra.
            </p>

            <div class="profile-breadcrumb">
                <a href="{{ route('home') }}">Beranda</a>

                <i class="bi bi-chevron-right"></i>

                <a href="{{ route('information.index') }}">
                    Informasi
                </a>

                <i class="bi bi-chevron-right"></i>

                @if ($selectedYear)
                    <a href="{{ route('information.activities') }}">
                        Kegiatan
                    </a>

                    <i class="bi bi-chevron-right"></i>

                    <span>{{ $selectedYear }}</span>
                @else
                    <span>Kegiatan</span>
                @endif
            </div>

        </div>
    </div>
</section>


@if (!$selectedYear)

    {{-- =========================
         DAFTAR TAHUN KEGIATAN
    ========================= --}}

    <section class="activities-years-section section-padding">
        <div class="container">

            <div class="activities-section-heading">
                <span class="section-label">
                    DOKUMENTASI KEGIATAN
                </span>

                <h2 class="section-title">
                    Jelajahi Kegiatan
                    <span>Setiap Tahun.</span>
                </h2>

                <p>
                    Pilih tahun untuk melihat dokumentasi kegiatan
                    Yayasan Pusaka yang telah dilaksanakan.
                </p>
            </div>

            @if ($activityYears->count())

                <div class="row g-4">

                    @foreach ($activityYears as $year)

                        <div class="col-md-6 col-lg-4">

                            <a
                                href="{{ route('information.activities', ['tahun' => $year->year]) }}"
                                class="activity-year-card"
                            >

                                <div class="activity-year-icon">
                                    <i class="bi bi-calendar2-event"></i>
                                </div>

                                <span class="activity-year-label">
                                    DOKUMENTASI TAHUN
                                </span>

                                <h3>{{ $year->year }}</h3>

                                <p>
                                    {{ $year->total }}
                                    kegiatan terdokumentasi
                                </p>

                                <span class="activity-year-link">
                                    Lihat Kegiatan
                                    <i class="bi bi-arrow-right"></i>
                                </span>

                            </a>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="activities-empty">
                    <i class="bi bi-calendar2-event"></i>

                    <h3>Belum Ada Kegiatan</h3>

                    <p>
                        Dokumentasi kegiatan Yayasan Pusaka akan
                        ditampilkan setelah kegiatan dipublikasikan.
                    </p>
                </div>

            @endif

        </div>
    </section>

@else

    {{-- =========================
         DAFTAR KEGIATAN PER TAHUN
    ========================= --}}

    <section class="activities-list-section section-padding">
        <div class="container">

            <div class="activities-section-heading">

                <a
                    href="{{ route('information.activities') }}"
                    class="activities-back-link"
                >
                    <i class="bi bi-arrow-left"></i>
                    Kembali ke Pilihan Tahun
                </a>

                <span class="section-label">
                    DOKUMENTASI KEGIATAN
                </span>

                <h2 class="section-title">
                    Kegiatan Tahun
                    <span>{{ $selectedYear }}</span>
                </h2>

                <p>
                    Berikut dokumentasi kegiatan Yayasan Pusaka
                    pada tahun {{ $selectedYear }}.
                </p>

            </div>

            @if ($activities && $activities->count())

                <div class="row g-4">

                    @foreach ($activities as $activity)

                        <div class="col-md-6 col-lg-4">

                            <article class="activity-card">

                                <a
                                    href="{{ route('information.activities.show', $activity->slug) }}"
                                    class="activity-card-image"
                                    aria-label="Lihat detail {{ $activity->title }}"
                                >

                                    @if ($activity->thumbnail)

                                        <img
                                            src="{{ asset('storage/' . $activity->thumbnail) }}"
                                            alt="{{ $activity->title }}"
                                            loading="lazy"
                                        >

                                    @else

                                        <div class="activity-image-placeholder">
                                            <i class="bi bi-image"></i>
                                        </div>

                                    @endif

                                    <span class="activity-category">
                                        {{ strtoupper($activity->category ?: 'KEGIATAN') }}
                                    </span>

                                </a>

                                <div class="activity-card-content">

                                    <div class="activity-card-meta">

                                        <span>
                                            <i class="bi bi-calendar3"></i>

                                            {{ $activity->activity_date
                                                ? $activity->activity_date->translatedFormat('d F Y')
                                                : 'Tanggal belum ditentukan' }}
                                        </span>

                                        @if ($activity->location)
                                            <span>
                                                <i class="bi bi-geo-alt"></i>
                                                {{ $activity->location }}
                                            </span>
                                        @endif

                                    </div>

                                    <h3>
                                        <a href="{{ route('information.activities.show', $activity->slug) }}">
                                            {{ $activity->title }}
                                        </a>
                                    </h3>

                                    <p>
                                        {{ \Illuminate\Support\Str::limit(
                                            $activity->excerpt
                                                ?: strip_tags($activity->content ?? ''),
                                            130
                                        ) }}
                                    </p>

                                    <a
                                        href="{{ route('information.activities.show', $activity->slug) }}"
                                        class="activity-card-detail"
                                    >
                                        Lihat Detail
                                        <i class="bi bi-arrow-right"></i>
                                    </a>

                                </div>

                            </article>

                        </div>

                    @endforeach

                </div>

                @if ($activities->hasPages())
                    <div class="activities-pagination">
                        {{ $activities->links() }}
                    </div>
                @endif

            @else

                <div class="activities-empty">
                    <i class="bi bi-calendar2-event"></i>

                    <h3>Belum Ada Kegiatan pada Tahun Ini</h3>

                    <p>
                        Belum ada kegiatan yang dipublikasikan
                        untuk tahun {{ $selectedYear }}.
                    </p>

                    <a
                        href="{{ route('information.activities') }}"
                        class="activities-back-button"
                    >
                        Lihat Tahun Lain
                    </a>
                </div>

            @endif

        </div>
    </section>

@endif


{{-- =========================
     GALERI CTA
========================= --}}

<section class="activities-gallery-cta">
    <div class="container">

        <div class="activities-gallery-wrapper">

            <div class="activities-gallery-icon">
                <i class="bi bi-images"></i>
            </div>

            <div class="activities-gallery-text">

                <span>DOKUMENTASI</span>

                <h2>
                    Lihat Lebih Banyak Dokumentasi di
                    <strong>Galeri Yayasan Pusaka.</strong>
                </h2>

                <p>
                    Jelajahi kumpulan foto dari berbagai
                    program dan kegiatan Yayasan Pusaka.
                </p>

            </div>

            <a
                href="https://galeri.yayasanpusakakai.org"
                class="activities-gallery-button"
            >
                Buka Galeri
                <i class="bi bi-arrow-right"></i>
            </a>

        </div>

    </div>
</section>

@endsection