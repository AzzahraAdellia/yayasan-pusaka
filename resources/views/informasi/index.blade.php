@extends('layouts.app')

@section('title', 'Informasi | Yayasan Pusaka')

@section('content')

{{-- =========================
     HERO
========================= --}}

<section class="information-hero">

    <div class="container">

        <div class="information-hero-content">

            <span class="section-label">
                INFORMASI
            </span>

            <h1>
                Informasi, Kegiatan &
                <span>Perjalanan Kami.</span>
            </h1>

            <p>
                Temukan berbagai berita, kegiatan, dokumentasi,
                dan informasi terbaru dari Yayasan Pusaka.
            </p>

            <div class="profile-breadcrumb">

                <a href="{{ route('home') }}">
                    Beranda
                </a>

                <i class="bi bi-chevron-right"></i>

                <span>
                    Informasi
                </span>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     CATEGORY
========================= --}}

<section class="information-category section-padding">

    <div class="container">

        <div class="information-category-heading text-center">

            <span class="section-label">
                JELAJAHI INFORMASI
            </span>

            <h2 class="section-title">
                Temukan Informasi
                <span>yang Anda Butuhkan.</span>
            </h2>

            <p>
                Ikuti kabar terbaru, kegiatan, dan dokumentasi
                Yayasan Pusaka.
            </p>

        </div>


        <div class="row g-4 justify-content-center">

            {{-- BERITA --}}
            <div class="col-md-6 col-lg-4">

                <a href="{{ route('information.news') }}"
                   class="information-category-card">

                    <div class="information-category-icon blue">
                        <i class="bi bi-newspaper"></i>
                    </div>

                    <h3>
                        Berita
                    </h3>

                    <p>
                        Informasi dan kabar terbaru Yayasan Pusaka.
                    </p>

                    <span>
                        Lihat Berita
                        <i class="bi bi-arrow-right"></i>
                    </span>

                </a>

            </div>


            {{-- KEGIATAN --}}
            <div class="col-md-6 col-lg-4">

                <a href="{{ route('information.activities') }}"
                   class="information-category-card">

                    <div class="information-category-icon orange">
                        <i class="bi bi-calendar2-check-fill"></i>
                    </div>

                    <h3>
                        Kegiatan
                    </h3>

                    <p>
                        Dokumentasi berbagai aktivitas dan program.
                    </p>

                    <span>
                        Lihat Kegiatan
                        <i class="bi bi-arrow-right"></i>
                    </span>

                </a>

            </div>


            {{-- GALERI EKSTERNAL --}}
            @if (!empty($settings['gallery_url']))

                <div class="col-md-6 col-lg-4">

                    <a
                        href="{{ $settings['gallery_url'] }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="information-category-card"
                    >

                        <div class="information-category-icon blue">
                            <i class="bi bi-images"></i>
                        </div>

                        <h3>
                            Galeri
                        </h3>

                        <p>
                            Jelajahi dokumentasi foto kegiatan Yayasan Pusaka.
                        </p>

                        <span>
                            Buka Galeri
                            <i class="bi bi-box-arrow-up-right"></i>
                        </span>

                    </a>

                </div>

            @endif

        </div>

    </div>

</section>


{{-- =========================
     BERITA TERBARU
========================= --}}

<section class="information-category section-padding">

    <div class="container">

        <div class="information-category-heading">

            <span class="section-label">
                BERITA TERBARU
            </span>

            <h2 class="section-title">
                Kabar Terbaru dari
                <span>Yayasan Pusaka.</span>
            </h2>

        </div>


        @if ($latestNews->count())

            <div class="row g-4">

                @foreach ($latestNews as $item)

                    <div class="col-md-6 col-lg-4">

                        <article class="news-page-card">

                            <div class="news-page-card-image">

                                @if ($item->thumbnail)

                                    <img
                                        src="{{ asset(
                                            'storage/' . $item->thumbnail
                                        ) }}"
                                        alt="{{ $item->title }}"
                                    >

                                @else

                                    <div class="news-image-placeholder">
                                        <i class="bi bi-image"></i>
                                    </div>

                                @endif


                                <span>
                                    {{ strtoupper(
                                        $item->category ?: 'BERITA'
                                    ) }}
                                </span>

                            </div>


                            <div class="news-page-card-content">

                                <div class="news-page-card-date">

                                    <i class="bi bi-calendar3"></i>

                                    {{ $item->published_at
                                        ? $item->published_at
                                            ->translatedFormat('d M Y')
                                        : $item->created_at
                                            ->translatedFormat('d M Y')
                                    }}

                                </div>


                                <h3>
                                    {{ $item->title }}
                                </h3>


                                <p>
                                    {{ $item->excerpt
                                        ?: \Illuminate\Support\Str::limit(
                                            strip_tags($item->content),
                                            120
                                        )
                                    }}
                                </p>


                                <a
                                    href="{{ route(
                                        'information.news.show',
                                        $item->slug
                                    ) }}"
                                >

                                    Baca Berita

                                    <i class="bi bi-arrow-right"></i>

                                </a>

                            </div>

                        </article>

                    </div>

                @endforeach

            </div>


            <div class="text-center mt-5">

                <a
                    href="{{ route('information.news') }}"
                    class="news-page-read-btn"
                >
                    Lihat Semua Berita
                    <i class="bi bi-arrow-right"></i>
                </a>

            </div>

        @else

            <div class="admin-empty-state">

                <div class="admin-empty-icon">
                    <i class="bi bi-newspaper"></i>
                </div>

                <h4>
                    Belum Ada Berita
                </h4>

                <p>
                    Berita terbaru akan tampil di bagian ini.
                </p>

            </div>

        @endif

    </div>

</section>


{{-- =========================
     KEGIATAN TERBARU
========================= --}}

<section class="information-category section-padding">

    <div class="container">

        <div class="information-category-heading">

            <span class="section-label">
                KEGIATAN TERBARU
            </span>

            <h2 class="section-title">
                Aktivitas
                <span>Yayasan Pusaka.</span>
            </h2>

        </div>


        @if ($latestActivities->count())

            <div class="row g-4">

                @foreach ($latestActivities as $activity)

                    <div class="col-md-6 col-lg-4">

                        <article class="activity-card">

                            <div class="activity-card-image">

                                @if ($activity->thumbnail)

                                    <img
                                        src="{{ asset(
                                            'storage/' . $activity->thumbnail
                                        ) }}"
                                        alt="{{ $activity->title }}"
                                    >

                                @else

                                    <div class="activity-image-placeholder">
                                        <i class="bi bi-image"></i>
                                    </div>

                                @endif


                                <span>
                                    {{ strtoupper(
                                        $activity->category ?: 'KEGIATAN'
                                    ) }}
                                </span>

                            </div>


                            <div class="activity-card-content">

                                <div class="activity-card-meta">

                                    <span>

                                        <i class="bi bi-calendar3"></i>

                                        {{ $activity->activity_date
                                            ? $activity->activity_date
                                                ->translatedFormat('d M Y')
                                            : '-'
                                        }}

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


                                <a
                                    href="{{ route(
                                        'information.activities.show',
                                        $activity->slug
                                    ) }}"
                                >

                                    Lihat Kegiatan

                                    <i class="bi bi-arrow-right"></i>

                                </a>

                            </div>

                        </article>

                    </div>

                @endforeach

            </div>


            <div class="text-center mt-5">

                <a
                    href="{{ route('information.activities') }}"
                    class="news-page-read-btn"
                >

                    Lihat Semua Kegiatan

                    <i class="bi bi-arrow-right"></i>

                </a>

            </div>

        @else

            <div class="admin-empty-state">

                <div class="admin-empty-icon">
                    <i class="bi bi-calendar2-event"></i>
                </div>

                <h4>
                    Belum Ada Kegiatan
                </h4>

                <p>
                    Kegiatan terbaru akan tampil di bagian ini.
                </p>

            </div>

        @endif

    </div>

</section>

@endsection