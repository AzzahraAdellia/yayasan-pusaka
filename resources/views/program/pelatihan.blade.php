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


        @php

            $trainingPrograms = [

                [
                    'title' => 'Pelatihan Barista',

                    'label' => 'KETERAMPILAN',

                    'icon' => 'bi-cup-hot-fill',

                    'color' => 'blue',

                    'description' =>
                        'Pelatihan keterampilan meracik dan
                        menyajikan minuman kopi untuk
                        membekali anak asuh dengan kemampuan
                        praktis di bidang barista.',

                    'participants' => 'Anak Asuh',

                    'tags' => [
                        'Barista',
                        'Keterampilan',
                        'Kesiapan Kerja'
                    ]
                ],


                [
                    'title' => 'Pelatihan Make Up Artist',

                    'label' => 'KECANTIKAN',

                    'icon' => 'bi-brush-fill',

                    'color' => 'orange',

                    'description' =>
                        'Pelatihan keterampilan tata rias
                        untuk mengembangkan kemampuan
                        peserta di bidang kecantikan
                        serta membuka peluang usaha
                        maupun pekerjaan.',

                    'participants' => 'Orang Tua / Wali dan Anak Asuh',

                    'tags' => [
                        'Make Up Artist',
                        'Keterampilan',
                        'Kewirausahaan'
                    ]
                ],


                [
                    'title' => 'Pelatihan Fotografi',

                    'label' => 'KREATIVITAS',

                    'icon' => 'bi-camera-fill',

                    'color' => 'blue',

                    'description' =>
                        'Pelatihan teknik dasar fotografi
                        untuk mengembangkan kreativitas,
                        kemampuan pengambilan gambar,
                        serta keterampilan anak asuh
                        di bidang fotografi.',

                    'participants' => 'Anak Asuh',

                    'tags' => [
                        'Fotografi',
                        'Kreativitas',
                        'Keterampilan'
                    ]
                ],


                [
                    'title' => 'Talent Mapping',

                    'label' => 'PENGEMBANGAN POTENSI',

                    'icon' => 'bi-person-bounding-box',

                    'color' => 'orange',

                    'description' =>
                        'Program pemetaan bakat dan potensi
                        untuk membantu anak asuh mengenali
                        minat, kemampuan, serta kekuatan
                        diri sebagai dasar pengembangan
                        masa depan.',

                    'participants' => 'Anak Asuh',

                    'tags' => [
                        'Bakat',
                        'Minat',
                        'Pengembangan Diri'
                    ]
                ],


                [
                    'title' => 'Program Magang Kerja ke Jepang',

                    'label' => 'PENGEMBANGAN KARIER',

                    'icon' => 'bi-airplane-fill',

                    'color' => 'blue',

                    'description' =>
                        'Program persiapan dan pendampingan
                        bagi anak asuh untuk memperoleh
                        kesempatan magang kerja di Jepang
                        melalui pembekalan bahasa,
                        budaya, keterampilan, dan
                        kesiapan kerja.',

                    'participants' => 'Anak Asuh',

                    'tags' => [
                        'Magang Jepang',
                        'Bahasa Jepang',
                        'Kesiapan Kerja'
                    ]
                ]

            ];

        @endphp


        <div class="row g-4 justify-content-center">

            @foreach ($trainingPrograms as $index => $training)

                <div class="col-lg-4 col-md-6">

                    <article class="training-program-card h-100">

                        <div class="training-card-icon {{ $training['color'] }}">

                            <i class="bi {{ $training['icon'] }}"></i>

                        </div>


                        <span class="training-card-number">

                            {{ sprintf('%02d', $index + 1) }}

                        </span>


                        <span class="training-card-label">

                            {{ $training['label'] }}

                        </span>


                        <h3>
                            {{ $training['title'] }}
                        </h3>


                        <p>
                            {{ $training['description'] }}
                        </p>


                        <div class="training-participants">

                            <i class="bi bi-people-fill"></i>

                            <span>
                                Peserta:
                                <strong>
                                    {{ $training['participants'] }}
                                </strong>
                            </span>

                        </div>


                        <div class="training-tags">

                            @foreach ($training['tags'] as $tag)

                                <span>
                                    {{ $tag }}
                                </span>

                            @endforeach

                        </div>

                    </article>

                </div>

            @endforeach

        </div>

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