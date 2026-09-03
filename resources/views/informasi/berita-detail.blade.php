@extends('layouts.app')

@section('title', $newsItem->title . ' | Yayasan Pusaka')

@section('content')

{{-- =========================
     HERO DETAIL BERITA
========================= --}}

<section class="news-page-hero">

    <div class="container">

        <div class="news-page-hero-content">

            <span class="section-label">
                {{ strtoupper($newsItem->category ?: 'BERITA') }}
            </span>

            <h1>
                {{ $newsItem->title }}
            </h1>

            <div class="news-page-meta">

                <span>
                    <i class="bi bi-calendar3"></i>

                    {{ $newsItem->published_at
                        ? $newsItem->published_at->translatedFormat('d F Y')
                        : $newsItem->created_at->translatedFormat('d F Y')
                    }}
                </span>

                <span>
                    <i class="bi bi-tag-fill"></i>

                    {{ $newsItem->category ?: 'Umum' }}
                </span>

            </div>


            <div class="profile-breadcrumb">

                <a href="{{ route('home') }}">
                    Beranda
                </a>

                <i class="bi bi-chevron-right"></i>

                <a href="{{ route('information.news') }}">
                    Berita
                </a>

                <i class="bi bi-chevron-right"></i>

                <span>
                    Detail Berita
                </span>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     ARTIKEL
========================= --}}

<section class="news-detail section-padding">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-9">


                {{-- GAMBAR UTAMA --}}
                @if ($newsItem->thumbnail)

                    <div class="news-detail-image">

                        <img
                            src="{{ asset('storage/' . $newsItem->thumbnail) }}"
                            alt="{{ $newsItem->title }}"
                        >

                    </div>

                @endif


                {{-- RINGKASAN --}}
                @if ($newsItem->excerpt)

                    <div class="news-detail-lead">

                        {{ $newsItem->excerpt }}

                    </div>

                @endif


                {{-- ISI BERITA --}}
                <article class="news-detail-content">

                    {!! nl2br(e($newsItem->content)) !!}

                </article>


                {{-- BACK --}}
                <div class="news-detail-back">

                    <a
                        href="{{ route('information.news') }}"
                        class="news-page-read-btn"
                    >

                        <i class="bi bi-arrow-left"></i>

                        Kembali ke Berita

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     BERITA TERKAIT
========================= --}}

@if ($relatedNews->count())

<section class="news-page-list section-padding">

    <div class="container">

        <div class="news-page-list-heading">

            <div>

                <span class="section-label">
                    BERITA TERKAIT
                </span>

                <h2 class="section-title">
                    Informasi
                    <span>Lainnya.</span>
                </h2>

            </div>

        </div>


        <div class="row g-4">

            @foreach ($relatedNews as $item)

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

    </div>

</section>

@endif

@endsection