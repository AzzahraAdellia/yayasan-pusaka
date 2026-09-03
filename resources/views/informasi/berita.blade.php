@extends('layouts.app')

@section('title', 'Berita | Yayasan Pusaka')

@section('content')

{{-- =========================
     PAGE HERO
========================= --}}

<section class="news-page-hero">

    <div class="container">

        <div class="news-page-hero-content">

            <span class="section-label">
                BERITA
            </span>

            <h1>
                Kabar Terbaru dari
                <span>Yayasan Pusaka.</span>
            </h1>

            <p>
                Ikuti berbagai informasi terbaru mengenai program,
                kolaborasi, kegiatan sosial, serta perkembangan
                Yayasan Pusaka.
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
                    Berita
                </span>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     FEATURED NEWS
========================= --}}

<section class="news-page-featured section-padding">

    <div class="container">

        <div class="news-page-heading">

            <div>

                <span class="section-label">
                    BERITA UTAMA
                </span>

                <h2 class="section-title">
                    Informasi yang
                    <span>Perlu Anda Ketahui.</span>
                </h2>

            </div>

            <p>
                Berita utama dan informasi terbaru
                Yayasan Pusaka.
            </p>

        </div>


        @if ($featuredNews)

            <article class="news-page-featured-card">

                <div class="row g-0 align-items-stretch">

                    <div class="col-lg-7">

                        <div class="news-page-featured-image">

                            @if ($featuredNews->thumbnail)

                                <img
                                    src="{{ asset('storage/' . $featuredNews->thumbnail) }}"
                                    alt="{{ $featuredNews->title }}"
                                >

                            @else

                                <div class="news-image-placeholder">
                                    <i class="bi bi-image"></i>
                                </div>

                            @endif


                            <span>
                                {{ strtoupper($featuredNews->category ?: 'BERITA') }}
                            </span>

                        </div>

                    </div>


                    <div class="col-lg-5">

                        <div class="news-page-featured-content">

                            <div class="news-page-meta">

                                <span>
                                    <i class="bi bi-calendar3"></i>

                                    {{ $featuredNews->published_at
                                        ? $featuredNews->published_at->translatedFormat('d F Y')
                                        : $featuredNews->created_at->translatedFormat('d F Y')
                                    }}
                                </span>

                                <span>
                                    <i class="bi bi-tag-fill"></i>

                                    {{ $featuredNews->category ?: 'Umum' }}
                                </span>

                            </div>

                            <h2>
                                {{ $featuredNews->title }}
                            </h2>

                            <p>
                                {{ $featuredNews->excerpt
                                    ?: \Illuminate\Support\Str::limit(
                                        strip_tags($featuredNews->content),
                                        220
                                    )
                                }}
                            </p>

                            <a
                                href="{{ route(
                                    'information.news.show',
                                    $featuredNews->slug
                                ) }}"
                                class="news-page-read-btn"
                            >
                                Baca Selengkapnya

                                <i class="bi bi-arrow-right"></i>
                            </a>

                        </div>

                    </div>

                </div>

            </article>

        @else

            <div class="admin-empty-state">

                <div class="admin-empty-icon">
                    <i class="bi bi-newspaper"></i>
                </div>

                <h4>
                    Belum Ada Berita
                </h4>

                <p>
                    Berita Yayasan Pusaka akan tampil di bagian ini.
                </p>

            </div>

        @endif

    </div>

</section>


{{-- =========================
     NEWS LIST
========================= --}}

<section class="news-page-list section-padding">

    <div class="container">

        <div class="news-page-list-heading">

            <div>

                <span class="section-label">
                    BERITA TERBARU
                </span>

                <h2 class="section-title">
                    Kabar & Informasi
                    <span>Terbaru.</span>
                </h2>

            </div>

        </div>


        @if ($news->count())

            <div class="row g-4">

                @foreach ($news as $item)

                    <div class="col-md-6 col-lg-4">

                        <article class="news-page-card">

                            <div class="news-page-card-image">

                                @if ($item->thumbnail)

                                    <img
                                        src="{{ asset('storage/' . $item->thumbnail) }}"
                                        alt="{{ $item->title }}"
                                    >

                                @else

                                    <div class="news-image-placeholder">
                                        <i class="bi bi-image"></i>
                                    </div>

                                @endif


                                <span>
                                    {{ strtoupper($item->category ?: 'BERITA') }}
                                </span>

                            </div>


                            <div class="news-page-card-content">

                                <div class="news-page-card-date">

                                    <i class="bi bi-calendar3"></i>

                                    {{ $item->published_at
                                        ? $item->published_at->translatedFormat('d M Y')
                                        : $item->created_at->translatedFormat('d M Y')
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

                                <a href="{{ route(
                                    'information.news.show',
                                    $item->slug
                                ) }}">
                                    Baca Berita
                                    <i class="bi bi-arrow-right"></i>
                                </a>

                            </div>

                        </article>

                    </div>

                @endforeach

            </div>


            @if ($news->hasPages())

                <div class="news-page-pagination">
                    {{ $news->links() }}
                </div>

            @endif

        @elseif (!$featuredNews)

            <div class="admin-empty-state">

                <div class="admin-empty-icon">
                    <i class="bi bi-newspaper"></i>
                </div>

                <h4>
                    Belum Ada Berita
                </h4>

                <p>
                    Berita terbaru akan tampil setelah dipublikasikan melalui CMS.
                </p>

            </div>

        @endif

    </div>

</section>

@endsection