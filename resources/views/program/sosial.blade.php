@extends('layouts.app')

@section('title', $program->name . ' | Yayasan Pusaka')

@section('content')

{{-- =========================
     PAGE HERO
========================= --}}

<section class="social-hero">

    <div class="container">

        <div class="social-hero-content">

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

<section class="social-intro section-padding">

    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-6">

                <span class="section-label">
                    TENTANG PROGRAM
                </span>

                <h2 class="section-title">
                    Kepedulian yang Hadir
                    <span>di Saat Dibutuhkan.</span>
                </h2>


                @if ($program->description)

                    <div class="section-description">
                        {!! nl2br(e($program->description)) !!}
                    </div>

                @else

                    <p class="section-description">
                        Program sosial dan kemanusiaan dirancang untuk
                        memberikan dukungan kepada penerima manfaat berdasarkan
                        kebutuhan dan kondisi yang dihadapi.
                    </p>

                    <p class="section-description">
                        Selain bantuan langsung, Yayasan Pusaka juga berupaya
                        menghadirkan pendampingan dan dukungan yang lebih
                        berkelanjutan agar manfaat yang diberikan memiliki
                        dampak yang lebih berarti.
                    </p>

                @endif


                <div class="social-principles">

                    <div>

                        <i class="bi bi-heart-fill"></i>

                        <span>
                            Berbasis kepedulian
                        </span>

                    </div>


                    <div>

                        <i class="bi bi-people-fill"></i>

                        <span>
                            Berorientasi pada penerima manfaat
                        </span>

                    </div>


                    <div>

                        <i class="bi bi-shield-check"></i>

                        <span>
                            Dijalankan secara bertanggung jawab
                        </span>

                    </div>

                </div>

            </div>


            <div class="col-lg-6">

                <div class="social-image-wrapper">

                    @if ($program->image)

                        <img
                            src="{{ asset('storage/' . $program->image) }}"
                            alt="{{ $program->name }}"
                        >

                    @else

                        <img
                            src="{{ asset('images/bantuan-sosial.jpg') }}"
                            alt="{{ $program->name }}"
                        >

                    @endif


                    <div class="social-image-badge">

                        <div class="social-image-badge-icon">

                            <i class="bi {{ $program->icon ?: 'bi-heart-pulse-fill' }}"></i>

                        </div>

                        <div>

                            <strong>
                                {{ $program->name }}
                            </strong>

                            <span>
                                Hadir untuk mereka yang membutuhkan
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     PROGRAM LIST
========================= --}}


{{-- =========================
     BENTUK BANTUAN SOSIAL
========================= --}}

<section class="social-programs section-padding">

    <div class="container">

        <div class="social-programs-heading">

            <div>

                <span class="section-label">
                    PROGRAM SOSIAL
                </span>

                <h2 class="section-title">
                    Bentuk Bantuan
                    <span>yang Kami Berikan.</span>
                </h2>

            </div>

            <p>
                Yayasan Pusaka memberikan berbagai bentuk
                bantuan kepada para pensiunan PT Kereta Api
                Indonesia (Persero), khususnya Penerima
                Manfaat Senior (PMS), sebagai wujud
                kepedulian dan dukungan terhadap
                kesejahteraan mereka.
            </p>

        </div>


        <div class="row g-4">

            {{-- KUNJUNGAN RUMAH --}}

            <div class="col-lg-6">

                <article class="social-program-card h-100">

                    <div class="social-card-icon blue">
                        <i class="bi bi-house-heart-fill"></i>
                    </div>

                    <span class="social-card-number">
                        01
                    </span>

                    <span class="social-card-label">
                        KUNJUNGAN
                    </span>

                    <h3>
                        Kunjungan ke Rumah PMS
                    </h3>

                    <p>
                        Yayasan Pusaka melakukan kunjungan
                        langsung ke rumah Penerima Manfaat
                        Senior (PMS) sebagai bentuk perhatian,
                        kepedulian, dan upaya menjaga hubungan
                        kekeluargaan dengan para pensiunan
                        PT KAI.
                    </p>

                </article>

            </div>


            {{-- BANTUAN UANG TUNAI --}}

            <div class="col-lg-6">

                <article class="social-program-card h-100">

                    <div class="social-card-icon orange">
                        <i class="bi bi-cash-coin"></i>
                    </div>

                    <span class="social-card-number">
                        02
                    </span>

                    <span class="social-card-label">
                        BANTUAN FINANSIAL
                    </span>

                    <h3>
                        Bantuan Uang Tunai
                    </h3>

                    <div class="social-cash-amount">
                        Rp500.000
                    </div>

                    <p>
                        Pemberian bantuan uang tunai sebesar
                        Rp500.000 kepada penerima manfaat
                        untuk membantu memenuhi kebutuhan
                        sehari-hari.
                    </p>

                </article>

            </div>


            {{-- KEGIATAN SOSIALISASI --}}

            <div class="col-lg-6">

                <article class="social-program-card h-100">

                    <div class="social-card-icon blue">
                        <i class="bi bi-people-fill"></i>
                    </div>

                    <span class="social-card-number">
                        03
                    </span>

                    <span class="social-card-label">
                        KEGIATAN BERKALA
                    </span>

                    <h3>
                        Kegiatan Sosialisasi PMS
                    </h3>

                    <p>
                        Yayasan Pusaka menyelenggarakan
                        kegiatan sosialisasi secara berkala
                        bagi Penerima Manfaat Senior (PMS)
                        sebagai sarana silaturahmi,
                        pendampingan, dan pemberian
                        informasi yang bermanfaat.
                    </p>

                    <div class="social-benefit-list">

                        <div>
                            <i class="bi bi-check-circle-fill"></i>
                            Sesi motivasi
                        </div>

                        <div>
                            <i class="bi bi-check-circle-fill"></i>
                            Layanan pemeriksaan kesehatan gratis
                        </div>

                        <div>
                            <i class="bi bi-check-circle-fill"></i>
                            Kegiatan sosial dan silaturahmi
                        </div>

                    </div>

                </article>

            </div>


            {{-- BANTUAN ALAT KESEHATAN --}}

            <div class="col-lg-6">

                <article class="social-program-card h-100">

                    <div class="social-card-icon orange">
                        <i class="bi bi-heart-pulse-fill"></i>
                    </div>

                    <span class="social-card-number">
                        04
                    </span>

                    <span class="social-card-label">
                        BANTUAN KESEHATAN
                    </span>

                    <h3>
                        Bantuan Alat Kesehatan
                    </h3>

                    <p>
                        Yayasan Pusaka menyediakan bantuan
                        alat kesehatan dan perlengkapan
                        penunjang aktivitas bagi penerima
                        manfaat sesuai dengan kebutuhan
                        masing-masing.
                    </p>

                    <div class="social-benefit-list">

                        <div>
                            <i class="bi bi-check-circle-fill"></i>
                            Tabung oksigen
                        </div>

                        <div>
                            <i class="bi bi-check-circle-fill"></i>
                            Kursi roda
                        </div>

                        <div>
                            <i class="bi bi-check-circle-fill"></i>
                            Popok dewasa (pampers)
                        </div>

                        <div>
                            <i class="bi bi-check-circle-fill"></i>
                            Kursi salat
                        </div>

                        <div>
                            <i class="bi bi-check-circle-fill"></i>
                            Tongkat jalan
                        </div>

                    </div>

                </article>

            </div>

        </div>

    </div>

</section>



{{-- =========================
     PERSYARATAN DAN PENGAJUAN
========================= --}}

<section class="social-requirements section-padding">

    <div class="container">

        <div class="social-requirements-heading">

            <span class="section-label">
                INFORMASI BANTUAN SOSIAL
            </span>

            <h2 class="section-title">
                Persyaratan dan
                <span>Cara Pengajuan.</span>
            </h2>

            <p class="section-description">
                Informasi mengenai persyaratan penerima
                manfaat dan prosedur pengajuan bantuan
                sosial Yayasan Pusaka.
            </p>

        </div>


        <div class="row g-4">

            {{-- PERSYARATAN --}}

            <div class="col-lg-6">

                <div class="social-requirement-card">

                    <div class="social-requirement-header">

                        <div class="social-requirement-icon blue">
                            <i class="bi bi-clipboard-check-fill"></i>
                        </div>

                        <div>

                            <span>
                                01 / KETENTUAN
                            </span>

                            <h3>
                                Persyaratan Penerima Bantuan
                            </h3>

                        </div>

                    </div>


                    <p>
                        Program bantuan sosial ditujukan
                        bagi pensiunan PT Kereta Api
                        Indonesia (Persero) dan keluarga nya yang memenuhi
                        kriteria berikut:
                    </p>


                    <div class="social-requirement-list">

                        <div>

                            <i class="bi bi-check-circle-fill"></i>

                            <span>
                                Mengalami sakit menahun.
                            </span>

                        </div>


                        <div>

                            <i class="bi bi-check-circle-fill"></i>

                            <span>
                                Memiliki kondisi ekonomi lemah.
                            </span>

                        </div>

                    </div>

                </div>

            </div>



            {{-- CARA PENGAJUAN --}}

            <div class="col-lg-6">

                <div class="social-requirement-card">

                    <div class="social-requirement-header">

                        <div class="social-requirement-icon orange">
                            <i class="bi bi-file-earmark-text-fill"></i>
                        </div>

                        <div>

                            <span>
                                02 / PROSEDUR
                            </span>

                            <h3>
                                Cara Pengajuan Bantuan
                            </h3>

                        </div>

                    </div>


                    <p>
                        Pengajuan bantuan sosial Yayasan
                        Pusaka dilakukan melalui:
                    </p>


                    <div class="social-requirement-list">

                        <div>

                            <i class="bi bi-check-circle-fill"></i>

                            <span>
                                DPD PERPENKA
                            </span>

                        </div>


                        <div>

                            <i class="bi bi-check-circle-fill"></i>

                            <span>
                                DPC PERPENKA
                            </span>

                        </div>

                    </div>


                    <div class="social-submission-note">

                        <i class="bi bi-info-circle-fill"></i>

                        <span>
                            Penerima manfaat dapat mengajukan
                            bantuan melalui DPD atau DPC
                            PERPENKA Wilayah masing-masing.
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection