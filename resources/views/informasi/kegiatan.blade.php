@extends('layouts.app')

@section('title', 'Kegiatan | Yayasan Pusaka')

@section('content')

{{-- =========================
     PAGE HERO
========================= --}}

<section class="activities-hero">

    <div class="container">

        <div class="activities-hero-content">

            <span class="section-label">
                KEGIATAN
            </span>

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

                <a href="{{ route('home') }}">
                    Beranda
                </a>

                <i class="bi bi-chevron-right"></i>

                <a href="{{ route('information.index') }}">
                    Informasi
                </a>

                <i class="bi bi-chevron-right"></i>

                <span>
                    Kegiatan
                </span>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     FEATURED ACTIVITY
========================= --}}

<section class="activities-featured section-padding">

    <div class="container">

        <div class="activities-heading">

            <div>

                <span class="section-label">
                    KEGIATAN TERBARU
                </span>

                <h2 class="section-title">
                    Melihat Lebih Dekat
                    <span>Aktivitas Kami.</span>
                </h2>

            </div>

            <p>
                Berbagai kegiatan Yayasan Pusaka dalam menjalankan
                program dan memberikan manfaat kepada para penerima manfaat.
            </p>

        </div>


        @if ($featuredActivity)

            <article class="activities-featured-card">

                <div class="activities-featured-image">

                    @if ($featuredActivity->thumbnail)

                        <img
                            src="{{ asset('storage/' . $featuredActivity->thumbnail) }}"
                            alt="{{ $featuredActivity->title }}"
                        >

                    @else

                        <div class="activity-image-placeholder">
                            <i class="bi bi-image"></i>
                        </div>

                    @endif


                    <span>
                        {{ strtoupper($featuredActivity->category ?: 'KEGIATAN') }}
                    </span>

                </div>


                <div class="activities-featured-content">

                    <div class="activities-meta">

                        <span>

                            <i class="bi bi-calendar3"></i>

                            @if ($featuredActivity->activity_date)

                                {{ $featuredActivity->activity_date
                                    ->translatedFormat('d F Y') }}

                            @else

                                Tanggal belum ditentukan

                            @endif

                        </span>


                        <span>

                            <i class="bi bi-geo-alt-fill"></i>

                            {{ $featuredActivity->location ?: 'Lokasi belum ditentukan' }}

                        </span>

                    </div>


                    <h2>
                        {{ $featuredActivity->title }}
                    </h2>


                    <p>
                    {{ $featuredActivity->excerpt
                        ?: \Illuminate\Support\Str::limit(
                            strip_tags($featuredActivity->content),
                            220
                        )
                    }}
                </p>

                <div class="activities-featured-footer">

                    <a
                        href="{{ route('information.activities.show', $featuredActivity->slug) }}"
                        class="activities-detail-btn"
                    >
                        Lihat Detail Kegiatan
                        <i class="bi bi-arrow-right"></i>
                    </a>

                    @if ($featuredActivity->is_featured)

                        <span>
                            <i class="bi bi-star-fill"></i>
                            Kegiatan Unggulan
                        </span>

                    @endif

                </div>

                </div>

            </article>


        @else

            <div class="activities-empty">

                <i class="bi bi-calendar2-event"></i>

                <h3>
                    Belum Ada Kegiatan
                </h3>

                <p>
                    Informasi kegiatan Yayasan Pusaka akan
                    ditampilkan pada bagian ini.
                </p>

            </div>

        @endif

    </div>

</section>



{{-- =========================
     ACTIVITY LIST
========================= --}}

<section class="activities-list-section section-padding">

    <div class="container">

        <div class="activities-list-heading">

            <div>

                <span class="section-label">
                    DOKUMENTASI KEGIATAN
                </span>

                <h2 class="section-title">
                    Kegiatan
                    <span>Yayasan Pusaka.</span>
                </h2>

            </div>

        </div>


        @if ($activities->count())

            <div class="row g-4">

                @foreach ($activities as $activity)

                    <div class="col-md-6 col-lg-4">

                        <article class="activity-card">

                            <div class="activity-card-image">

                                @if ($activity->thumbnail)

                                    <img
                                        src="{{ asset('storage/' . $activity->thumbnail) }}"
                                        alt="{{ $activity->title }}"
                                    >

                                @else

                                    <div class="activity-image-placeholder">
                                        <i class="bi bi-image"></i>
                                    </div>

                                @endif


                                <span>
                                    {{ strtoupper($activity->category ?: 'KEGIATAN') }}
                                </span>

                            </div>


                            <div class="activity-card-content">

                                <div class="activity-card-meta">

                                    <span>

                                        <i class="bi bi-calendar3"></i>

                                        @if ($activity->activity_date)

                                            {{ $activity->activity_date
                                                ->translatedFormat('d M Y') }}

                                        @else

                                            -

                                        @endif

                                    </span>


                                    <span>

                                        <i class="bi bi-geo-alt"></i>

                                        {{ $activity->location ?: '-' }}

                                    </span>

                                </div>


                                <h3>
                                    {{ $activity->title }}
                                </h3>


                                <p>
                                    {{ $activity->excerpt
                                        ?: \Illuminate\Support\Str::limit(
                                            strip_tags($activity->content),
                                            120
                                        )
                                    }}
                                </p>

                            </div>

                        </article>

                    </div>

                @endforeach

            </div>


            {{-- PAGINATION --}}

            @if ($activities->hasPages())

                <div class="activities-pagination">
                    {{ $activities->links() }}
                </div>

            @endif


        @elseif (!$featuredActivity)

            <div class="activities-empty">

                <i class="bi bi-calendar2-event"></i>

                <h3>
                    Belum Ada Dokumentasi Kegiatan
                </h3>

                <p>
                    Dokumentasi kegiatan akan tampil setelah
                    dipublikasikan melalui CMS.
                </p>

            </div>

        @endif

    </div>

</section>


{{-- =========================
     GALLERY CTA
========================= --}}

<section class="activities-gallery-cta">

    <div class="container">

        <div class="activities-gallery-wrapper">

            <div class="activities-gallery-icon">
                <i class="bi bi-images"></i>
            </div>

            <div>
                <span>
                    DOKUMENTASI
                </span>

                <h2>
                    Lihat Lebih Banyak Dokumentasi di
                    <strong>Galeri Yayasan Pusaka.</strong>
                </h2>

                <p>
                    Galeri menampilkan kumpulan foto dan dokumentasi
                    dari berbagai program dan kegiatan.
                </p>
            </div>

            <a href="{{ route('information.gallery') }}"
               class="profile-commitment-btn">

                Buka Galeri

                <i class="bi bi-arrow-right"></i>

            </a>

        </div>

    </div>

</section>

@endsection