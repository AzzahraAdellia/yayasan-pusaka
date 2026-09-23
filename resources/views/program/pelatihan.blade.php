@extends('layouts.app')

@section('title', $program->name . ' | Yayasan Pusaka')

@section('content')

{{-- =========================
     PAGE HERO
========================= --}}

<section class="training-hero">

    <div class="container">

        <div class="training-hero-content">

            <span class="section-label">
                PROGRAM {{ strtoupper($program->name) }}
            </span>

            <h1>
                {{ $program->title }}
            </h1>

            <p>
                {{ $program->short_description }}
            </p>

            <div class="profile-breadcrumb">

                <a href="{{ route('home') }}">
                    Beranda
                </a>

                <i class="bi bi-chevron-right"></i>

                <a href="{{ route('programs.index') }}">
                    Program
                </a>

                <i class="bi bi-chevron-right"></i>

                <span>
                    {{ $program->name }}
                </span>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     INTRO
========================= --}}

<section class="training-intro section-padding">

    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-6">

                <span class="section-label">
                    TENTANG PROGRAM
                </span>

                <h2 class="section-title">
                    Belajar, Berkembang,
                    dan <span>Menemukan Potensi.</span>
                </h2>


                @if ($program->description)

                    <div class="section-description">
                        {!! nl2br(e($program->description)) !!}
                    </div>

                @else

                    <p class="section-description">
                        Pelatihan dan pengembangan menjadi sarana bagi penerima
                        manfaat untuk meningkatkan keterampilan, menambah wawasan,
                        serta mengenali potensi yang dapat dikembangkan.
                    </p>

                    <p class="section-description">
                        Program disesuaikan dengan kebutuhan peserta dan peluang
                        yang tersedia, mulai dari keterampilan praktis,
                        pengembangan diri, kesiapan kerja, hingga pengenalan
                        potensi individu.
                    </p>

                @endif


                <div class="training-points">

                    <div>
                        <i class="bi bi-check-circle-fill"></i>
                        Keterampilan praktis
                    </div>

                    <div>
                        <i class="bi bi-check-circle-fill"></i>
                        Pengembangan potensi
                    </div>

                    <div>
                        <i class="bi bi-check-circle-fill"></i>
                        Kesiapan kerja dan karier
                    </div>

                </div>

            </div>


            <div class="col-lg-6">

                <div class="training-image-wrapper">

                    @if ($program->image)

                        <img
                            src="{{ asset('storage/' . $program->image) }}"
                            alt="{{ $program->name }}"
                        >

                    @else

                        <img
                            src="{{ asset('images/program-pelatihan.jpg') }}"
                            alt="{{ $program->name }}"
                        >

                    @endif


                    <div class="training-floating-card">

                        <div class="training-floating-icon">

                            <i class="bi {{ $program->icon ?: 'bi-lightbulb-fill' }}"></i>

                        </div>

                        <div>

                            <strong>
                                Tumbuh melalui Pengembangan
                            </strong>

                            <span>
                                Membuka lebih banyak kesempatan
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



{{-- =========================
     PROGRAM PELATIHAN DAN PENGEMBANGAN
========================= --}}

<section class="training-programs section-padding">

    <div class="container">

        <div class="training-programs-heading">

            <div>

                <span class="section-label">
                    PROGRAM PELATIHAN
                </span>

                <h2 class="section-title">
                    Beragam Pelatihan untuk
                    <span>Mengembangkan Potensi.</span>
                </h2>

            </div>

            <p>
                Yayasan Pusaka menyelenggarakan berbagai
                program pelatihan dan pengembangan bagi
                anak asuh serta orang tua atau wali
                untuk meningkatkan keterampilan,
                mengenali potensi, dan membuka
                peluang masa depan.
            </p>

        </div>

        
        @if ($trainings->isNotEmpty())

            <div class="row g-4 justify-content-center">

                @foreach ($trainings as $index => $training)

                    @php
                        $icons = [
                            'pelatihan-barista' => 'bi-cup-hot-fill',
                            'pelatihan-make-up-artist' => 'bi-brush-fill',
                            'pelatihan-fotografi' => 'bi-camera-fill',
                            'talent-mapping' => 'bi-person-bounding-box',
                            'program-magang-kerja-ke-jepang' => 'bi-airplane-fill',
                        ];

                        $icon = $icons[$training->slug] ?? 'bi-mortarboard-fill';
                        $color = $index % 2 === 0 ? 'blue' : 'orange';
                    @endphp

                    <div class="col-lg-4 col-md-6">

                        <article class="training-program-card h-100">

                            <div class="training-card-icon {{ $color }}">
                                <i class="bi {{ $icon }}"></i>
                            </div>

                            <span class="training-card-number">
                                {{ sprintf('%02d', $index + 1) }}
                            </span>

                            <span class="training-card-label">
                                PROGRAM PELATIHAN
                            </span>

                            <h3>{{ $training->name }}</h3>

                            <p>
                                {{ $training->short_description
                                    ?: 'Informasi pelatihan akan segera tersedia.' }}
                            </p>

                            @if ($training->target_participants)
                                <div class="training-participants">
                                    <i class="bi bi-people"></i>

                                    <span class="training-participants-label">
                                        Peserta
                                    </span>

                                    <span class="training-participants-value">
                                        {{ $training->target_participants }}
                                    </span>
                                </div>
                            @endif

                            <a
                                href="{{ route('programs.training.show', $training) }}"
                                class="training-detail-button"
                            >
                                Selengkapnya
                                <i class="bi bi-arrow-right"></i>
                            </a>

                        </article>

                    </div>

                @endforeach

            </div>

        @else

            <div class="text-center py-5">
                <p class="mb-0">
                    Informasi pelatihan akan segera tersedia.
                </p>
            </div>

        @endif

    </div>

</section>


{{-- =========================
     LEARNING JOURNEY
========================= --}}

<section class="training-journey section-padding">

    <div class="container">

        <div class="training-journey-heading text-center">

            <span class="section-label">
                PROSES PENGEMBANGAN
            </span>

            <h2 class="section-title">
                Dari Belajar hingga
                <span>Menerapkan.</span>
            </h2>

            <p>
                Pelatihan dirancang sebagai proses yang tidak berhenti
                setelah sesi pembelajaran selesai.
            </p>

        </div>


        <div class="training-journey-grid">

            {{-- STEP 1 --}}
            <div class="training-journey-item">

                <span>
                    01
                </span>

                <div class="training-journey-icon">
                    <i class="bi bi-search"></i>
                </div>

                <h3>
                    Kenali Kebutuhan
                </h3>

                <p>
                    Mengidentifikasi kebutuhan dan potensi peserta.
                </p>

            </div>


            <div class="training-journey-line"></div>


            {{-- STEP 2 --}}
            <div class="training-journey-item">

                <span>
                    02
                </span>

                <div class="training-journey-icon orange">
                    <i class="bi bi-book-fill"></i>
                </div>

                <h3>
                    Belajar
                </h3>

                <p>
                    Mengikuti proses pelatihan dan pengembangan.
                </p>

            </div>


            <div class="training-journey-line"></div>


            {{-- STEP 3 --}}
            <div class="training-journey-item">

                <span>
                    03
                </span>

                <div class="training-journey-icon">
                    <i class="bi bi-person-check-fill"></i>
                </div>

                <h3>
                    Praktik
                </h3>

                <p>
                    Menerapkan keterampilan dan pengetahuan yang diperoleh.
                </p>

            </div>


            <div class="training-journey-line"></div>


            {{-- STEP 4 --}}
            <div class="training-journey-item">

                <span>
                    04
                </span>

                <div class="training-journey-icon orange">
                    <i class="bi bi-graph-up-arrow"></i>
                </div>

                <h3>
                    Berkembang
                </h3>

                <p>
                    Mengembangkan kemampuan menuju kesempatan berikutnya.
                </p>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     IMPACT CTA
========================= --}}

<section class="training-impact">

    <div class="container">

        <div class="training-impact-wrapper">

            <div>

                <span>
                    DAMPAK PENGEMBANGAN
                </span>

                <h2>
                    Keterampilan Baru Bisa Membuka
                    <strong>Peluang yang Baru.</strong>
                </h2>

                <p>
                    Data peserta, jumlah pelatihan, serta capaian program
                    nantinya dapat ditampilkan melalui integrasi API
                    dengan aplikasi internal Yayasan Pusaka.
                </p>

            </div>


            <a href="{{ route('impact') }}"
               class="profile-commitment-btn">

                Lihat Dampak Kami

                <i class="bi bi-arrow-right"></i>

            </a>

        </div>

    </div>

</section>

@endsection