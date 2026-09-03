@extends('layouts.app')

@section('title', $activity->title . ' | Yayasan Pusaka')

@section('content')


{{-- =====================================================
     HERO / HEADER
===================================================== --}}

<section class="activities-hero">

    <div class="container">

        <div class="activities-hero-content">

            <span class="section-label">
                {{ strtoupper($activity->category ?: 'KEGIATAN') }}
            </span>

            <h1>
                {{ $activity->title }}
            </h1>


            <div class="profile-breadcrumb">

                <a href="{{ route('home') }}">
                    Beranda
                </a>

                <i class="bi bi-chevron-right"></i>

                <a href="{{ route('information.index') }}">
                    Informasi
                </a>

                <i class="bi bi-chevron-right"></i>

                <a href="{{ route('information.activities') }}">
                    Kegiatan
                </a>

                <i class="bi bi-chevron-right"></i>

                <span>
                    Detail
                </span>

            </div>

        </div>

    </div>

</section>



{{-- =====================================================
     DETAIL
===================================================== --}}

<section class="section-padding">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-9">


                {{-- IMAGE --}}
                @if ($activity->thumbnail)

                    <div class="activity-detail-image">

                        <img
                            src="{{ asset('storage/' . $activity->thumbnail) }}"
                            alt="{{ $activity->title }}"
                        >

                    </div>

                @endif


                {{-- META --}}
                <div class="activities-meta">

                    @if ($activity->activity_date)

                        <span>
                            <i class="bi bi-calendar3"></i>

                            {{ $activity->activity_date
                                ->translatedFormat('d F Y') }}
                        </span>

                    @endif


                    @if ($activity->location)

                        <span>
                            <i class="bi bi-geo-alt-fill"></i>

                            {{ $activity->location }}
                        </span>

                    @endif


                    @if ($activity->category)

                        <span>
                            <i class="bi bi-tag-fill"></i>

                            {{ $activity->category }}
                        </span>

                    @endif

                </div>


                {{-- CONTENT --}}
                <article class="activity-detail-content">

                    @if ($activity->excerpt)

                        <p class="activity-detail-lead">
                            {{ $activity->excerpt }}
                        </p>

                    @endif


                    <div class="activity-detail-body">
                        {!! nl2br(e($activity->content)) !!}
                    </div>

                </article>


                {{-- BACK --}}
                <div class="activity-detail-back">

                    <a
                        href="{{ route('information.activities') }}"
                        class="activities-detail-btn"
                    >
                        <i class="bi bi-arrow-left"></i>
                        Kembali ke Kegiatan
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>



{{-- =====================================================
     RELATED ACTIVITIES
===================================================== --}}

@if ($relatedActivities->count())

<section class="activities-list-section section-padding">

    <div class="container">

        <div class="activities-list-heading">

            <div>

                <span class="section-label">
                    KEGIATAN LAINNYA
                </span>

                <h2 class="section-title">
                    Aktivitas
                    <span>Terkait.</span>
                </h2>

            </div>

        </div>


        <div class="row g-4">

            @foreach ($relatedActivities as $related)

                <div class="col-md-6 col-lg-4">

                    <article class="activity-card">

                        <div class="activity-card-image">

                            @if ($related->thumbnail)

                                <img
                                    src="{{ asset('storage/' . $related->thumbnail) }}"
                                    alt="{{ $related->title }}"
                                >

                            @else

                                <div class="activity-image-placeholder">
                                    <i class="bi bi-image"></i>
                                </div>

                            @endif


                            <span>
                                {{ strtoupper($related->category ?: 'KEGIATAN') }}
                            </span>

                        </div>


                        <div class="activity-card-content">

                            <div class="activity-card-meta">

                                <span>
                                    <i class="bi bi-calendar3"></i>

                                    {{ $related->activity_date
                                        ? $related->activity_date->translatedFormat('d M Y')
                                        : '-' }}
                                </span>

                                <span>
                                    <i class="bi bi-geo-alt"></i>

                                    {{ $related->location ?: '-' }}
                                </span>

                            </div>


                            <h3>
                                {{ $related->title }}
                            </h3>


                            <p>
                                {{ $related->excerpt
                                    ?: \Illuminate\Support\Str::limit(
                                        strip_tags($related->content),
                                        120
                                    )
                                }}
                            </p>


                            <a href="{{ route(
                                'information.activities.show',
                                $related->slug
                            ) }}">
                                Lihat Kegiatan
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