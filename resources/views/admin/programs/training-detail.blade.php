
@extends('layouts.app')

@section('title', $training->name . ' | Yayasan Pusaka')

@section('content')

<section class="training-hero">
    <div class="container">
        <div class="training-hero-content">

            <span class="section-label">
                PROGRAM PELATIHAN & PENGEMBANGAN
            </span>

            <h1>{{ $training->title }}</h1>

            @if ($training->short_description)
                <p>{{ $training->short_description }}</p>
            @endif

            <div class="profile-breadcrumb">
                <a href="{{ route('home') }}">Beranda</a>
                <i class="bi bi-chevron-right"></i>

                <a href="{{ route('programs.training') }}">
                    Pelatihan & Pengembangan
                </a>
                <i class="bi bi-chevron-right"></i>

                <span>{{ $training->name }}</span>
            </div>

        </div>
    </div>
</section>

<section class="section-padding">
    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-6">

                <span class="section-label">
                    TENTANG PELATIHAN
                </span>

                <h2 class="section-title">
                    {{ $training->name }}
                </h2>

                @if ($training->description)
                    <div class="section-description">
                        {!! nl2br(e($training->description)) !!}
                    </div>
                @endif

                @if ($training->target_participants)
                    <div class="training-detail-target">
                        <i class="bi bi-people-fill"></i>
                        <div>
                            <strong>Sasaran Peserta</strong>
                            <span>{{ $training->target_participants }}</span>
                        </div>
                    </div>
                @endif

            </div>

            <div class="col-lg-6">

                @if ($training->image)
                    <img
                        src="{{ asset('storage/' . $training->image) }}"
                        alt="{{ $training->name }}"
                        class="training-detail-main-image"
                    >
                @else
                    <div class="training-detail-image-placeholder">
                        <i class="bi bi-mortarboard-fill"></i>
                        <span>{{ $training->name }}</span>
                    </div>
                @endif

            </div>

        </div>

    </div>
</section>

<section class="training-programs section-padding">
    <div class="container">

        <div class="training-programs-heading">
            <div>
                <span class="section-label">
                    PELAKSANAAN KEGIATAN
                </span>

                <h2 class="section-title">
                    Pelaksanaan <span>{{ $training->name }}</span>
                </h2>
            </div>

            <p>
                Informasi pelaksanaan, peserta, dan dokumentasi
                dari setiap batch kegiatan.
            </p>
        </div>

        @if ($training->batches->isNotEmpty())

            <div class="row g-4">

                @foreach ($training->batches as $batch)

                    <div class="col-lg-4 col-md-6">

                        <article class="training-batch-card h-100">

                            <span class="training-batch-label">
                                {{ $batch->name }}
                            </span>

                            <h3>{{ $training->name }}</h3>

                            <div class="training-batch-info">

                                @if ($batch->start_date)
                                    <div>
                                        <i class="bi bi-calendar-event"></i>
                                        <span>
                                            {{ $batch->start_date->translatedFormat('d F Y') }}

                                            @if ($batch->end_date && !$batch->end_date->isSameDay($batch->start_date))
                                                – {{ $batch->end_date->translatedFormat('d F Y') }}
                                            @endif
                                        </span>
                                    </div>
                                @endif

                                @if ($batch->location)
                                    <div>
                                        <i class="bi bi-geo-alt"></i>
                                        <span>{{ $batch->location }}</span>
                                    </div>
                                @endif

                                @if ($batch->participant_count !== null)
                                    <div>
                                        <i class="bi bi-people"></i>
                                        <span>
                                            {{ $batch->participant_count }} peserta

                                            @if ($batch->participants)
                                                — {{ $batch->participants }}
                                            @endif
                                        </span>
                                    </div>
                                @elseif ($batch->participants)
                                    <div>
                                        <i class="bi bi-people"></i>
                                        <span>{{ $batch->participants }}</span>
                                    </div>
                                @endif

                            </div>

                            @if ($batch->description)
                                <p class="training-batch-description">
                                    {{ $batch->description }}
                                </p>
                            @endif

                            @if ($batch->photos->isNotEmpty())
                                <div class="training-batch-gallery">

                                    @foreach ($batch->photos as $photo)
                                        <img
                                            src="{{ asset('storage/' . $photo->image) }}"
                                            alt="{{ $photo->caption ?: 'Dokumentasi ' . $batch->name }}"
                                            loading="lazy"
                                        >
                                    @endforeach

                                </div>
                            @endif

                        </article>

                    </div>

                @endforeach

            </div>

        @else

            <div class="training-detail-empty">
                <i class="bi bi-calendar2-event"></i>
                <p>
                    Informasi pelaksanaan pelatihan akan segera tersedia.
                </p>
            </div>

        @endif

    </div>
</section>

@endsection