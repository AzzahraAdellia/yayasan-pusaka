@extends('layouts.app')

@section('title', $impactStory->title . ' | Yayasan Pusaka')

@section('content')

{{-- =========================
     HERO DETAIL CERITA
========================= --}}

<section class="impact-detail-hero">

    <div class="container">

        <div class="impact-detail-hero-content">

            <div class="profile-breadcrumb">

                <a href="{{ route('home') }}">
                    Beranda
                </a>

                <i class="bi bi-chevron-right"></i>

                <a href="{{ route('impact') }}">
                    Dampak
                </a>

                <i class="bi bi-chevron-right"></i>

                <span>
                    Cerita Dampak
                </span>

            </div>


            <span class="section-label">
                {{ strtoupper($impactStory->category) }}
            </span>


            <h1>
                {{ $impactStory->title }}
            </h1>


            @if ($impactStory->subtitle)

                <p class="impact-detail-subtitle">
                    {{ $impactStory->subtitle }}
                </p>

            @endif


            @if ($impactStory->beneficiary_name)

                <div class="impact-detail-beneficiary">

                    <i class="bi bi-person-heart"></i>

                    <div>
                        <span>
                            Penerima Manfaat
                        </span>

                        <strong>
                            {{ $impactStory->beneficiary_name }}
                        </strong>
                    </div>

                </div>

            @endif

        </div>

    </div>

</section>


{{-- =========================
     CERITA
========================= --}}

<section class="impact-detail-content section-padding">

    <div class="container">

        <div class="impact-detail-wrapper">


            {{-- FOTO UTAMA --}}
            @if ($impactStory->image)

                <div class="impact-detail-image">

                    <img
                        src="{{ asset('storage/' . $impactStory->image) }}"
                        alt="{{ $impactStory->title }}"
                    >

                </div>

            @endif


            {{-- ISI CERITA --}}
            <article class="impact-detail-article">


                @if ($impactStory->excerpt)

                    <div class="impact-detail-lead">

                        <i class="bi bi-quote"></i>

                        <p>
                            {{ $impactStory->excerpt }}
                        </p>

                    </div>

                @endif


                <div class="impact-detail-body">

                    {!! nl2br(e($impactStory->content)) !!}

                </div>


                <div class="impact-detail-footer">

                    <div>

                        <span>
                            Program
                        </span>

                        <strong>
                            {{ $impactStory->category }}
                        </strong>

                    </div>


                    <a href="{{ route('impact') }}">

                        <i class="bi bi-arrow-left"></i>

                        Kembali ke Halaman Dampak

                    </a>

                </div>

            </article>

        </div>

    </div>

</section>


{{-- =========================
     CERITA LAINNYA
========================= --}}

@if ($relatedStories->isNotEmpty())

<section class="impact-detail-related section-padding">

    <div class="container">

        <div class="impact-detail-related-heading">

            <div>

                <span class="section-label">
                    CERITA LAINNYA
                </span>

                <h2 class="section-title">
                    Cerita yang Memberikan
                    <span>Makna.</span>
                </h2>

            </div>


            <a href="{{ route('impact') }}"
               class="text-link">

                Lihat Semua Cerita

                <i class="bi bi-arrow-right"></i>

            </a>

        </div>


        <div class="row g-4">

            @foreach ($relatedStories as $story)

                <div class="col-md-6 col-lg-4">

                    <article class="impact-page-story-card">


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

                            <span>
                                {{ strtoupper($story->category) }}
                            </span>


                            <h3>
                                {{ $story->title }}
                            </h3>


                            @if ($story->excerpt)

                                <p>
                                    {{ \Illuminate\Support\Str::limit(
                                        $story->excerpt,
                                        120
                                    ) }}
                                </p>

                            @elseif ($story->subtitle)

                                <p>
                                    {{ \Illuminate\Support\Str::limit(
                                        $story->subtitle,
                                        120
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

    </div>

</section>

@endif

@endsection