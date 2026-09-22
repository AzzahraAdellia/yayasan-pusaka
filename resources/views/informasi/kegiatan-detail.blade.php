
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

                <span>Detail</span>

            </div>

        </div>

    </div>

</section>


{{-- =====================================================
     DETAIL KEGIATAN
===================================================== --}}

<section class="activity-detail-section section-padding">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-9">

                {{-- FOTO UTAMA --}}

                @if ($activity->thumbnail)

                    <div class="activity-detail-image">

                        <img
                            src="{{ asset('storage/' . $activity->thumbnail) }}"
                            alt="{{ $activity->title }}"
                        >

                    </div>

                @endif


                {{-- INFORMASI KEGIATAN --}}

                <div class="activities-meta">

                    @if ($activity->activity_date)

                        <span>
                            <i class="bi bi-calendar3"></i>

                            {{ $activity->activity_date->translatedFormat('d F Y') }}
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


                {{-- DESKRIPSI KEGIATAN --}}

                <article class="activity-detail-content">

                    @if ($activity->excerpt)

                        <p class="activity-detail-lead">
                            {{ $activity->excerpt }}
                        </p>

                    @endif

                    @if ($activity->content)

                        <div class="activity-detail-body">
                            {!! nl2br(e($activity->content)) !!}
                        </div>

                    @endif

                </article>


                {{-- =====================================================
                     GALERI DOKUMENTASI
                ===================================================== --}}

                @if ($activity->photos->isNotEmpty())

                    <div class="activity-documentation">

                        <div class="activity-documentation-heading">

                            <span class="section-label">
                                DOKUMENTASI
                            </span>

                            <h2 class="section-title">
                                Galeri
                                <span>Kegiatan.</span>
                            </h2>

                            <p>
                                Dokumentasi foto dari kegiatan
                                {{ $activity->title }}.
                            </p>

                        </div>

                        <div class="row g-4">

                            @foreach ($activity->photos as $photo)

                                <div class="col-md-6 col-lg-4">

                                    <figure class="activity-documentation-card">

                                        <a
                                            href="{{ asset('storage/' . $photo->image) }}"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            aria-label="Lihat foto dokumentasi {{ $activity->title }}"
                                        >

                                            <img
                                                src="{{ asset('storage/' . $photo->image) }}"
                                                alt="{{ $photo->caption ?: 'Dokumentasi ' . $activity->title }}"
                                                loading="lazy"
                                            >

                                        </a>

                                        @if (filled($photo->caption))

                                            <figcaption>
                                                {{ $photo->caption }}
                                            </figcaption>

                                        @endif

                                    </figure>

                                </div>

                            @endforeach

                        </div>

                    </div>

                @endif


                {{-- KEMBALI KE DAFTAR KEGIATAN --}}

                <div class="activity-detail-back">

                    <a
                        href="{{ route('information.activities', [
                            'tahun' => $activity->activity_date?->format('Y')
                        ]) }}"
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
     KEGIATAN TERKAIT
===================================================== --}}

@if ($relatedActivities->count())

    <section class="activities-list-section section-padding">

        <div class="container">

            <div class="activities-section-heading">

                <span class="section-label">
                    KEGIATAN LAINNYA
                </span>

                <h2 class="section-title">
                    Aktivitas
                    <span>Terkait.</span>
                </h2>

            </div>

            <div class="row g-4">

                @foreach ($relatedActivities as $related)

                    <div class="col-md-6 col-lg-4">

                        <article class="activity-card">

                            <a
                                href="{{ route('information.activities.show', $related->slug) }}"
                                class="activity-card-image"
                            >

                                @if ($related->thumbnail)

                                    <img
                                        src="{{ asset('storage/' . $related->thumbnail) }}"
                                        alt="{{ $related->title }}"
                                        loading="lazy"
                                    >

                                @else

                                    <div class="activity-image-placeholder">
                                        <i class="bi bi-image"></i>
                                    </div>

                                @endif

                                <span class="activity-category">
                                    {{ strtoupper($related->category ?: 'KEGIATAN') }}
                                </span>

                            </a>

                            <div class="activity-card-content">

                                <div class="activity-card-meta">

                                    @if ($related->activity_date)

                                        <span>
                                            <i class="bi bi-calendar3"></i>

                                            {{ $related->activity_date->translatedFormat('d M Y') }}
                                        </span>

                                    @endif

                                    @if ($related->location)

                                        <span>
                                            <i class="bi bi-geo-alt"></i>

                                            {{ $related->location }}
                                        </span>

                                    @endif

                                </div>

                                <h3>
                                    <a href="{{ route('information.activities.show', $related->slug) }}">
                                        {{ $related->title }}
                                    </a>
                                </h3>

                                <p>
                                    {{ \Illuminate\Support\Str::limit(
                                        $related->excerpt
                                            ?: strip_tags($related->content ?? ''),
                                        120
                                    ) }}
                                </p>

                                <a
                                    href="{{ route('information.activities.show', $related->slug) }}"
                                    class="activity-card-detail"
                                >
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