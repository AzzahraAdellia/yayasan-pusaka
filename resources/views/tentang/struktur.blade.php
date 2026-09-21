@extends('layouts.app')

@section('title', 'Struktur Organisasi | Yayasan Pusaka')

@section('content')

{{-- =========================
     PAGE HERO
========================= --}}

<section class="organization-hero">

    <div class="container">

        <div class="organization-hero-content">

            <span class="section-label">
                TENTANG KAMI
            </span>

            <h1>
                Struktur Organisasi
                <span>Yayasan Pusaka.</span>
            </h1>

            <p>
                Struktur organisasi Yayasan Pusaka disusun untuk mendukung
                tata kelola yang terarah, akuntabel, dan mampu menjalankan
                program secara efektif serta berkelanjutan.
            </p>

            <div class="profile-breadcrumb">

                <a href="{{ route('home') }}">
                    Beranda
                </a>

                <i class="bi bi-chevron-right"></i>

                <span>
                    Struktur Organisasi
                </span>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     INTRO
========================= --}}

<section class="organization-intro section-padding">

    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-5">

                <span class="section-label">
                    TATA KELOLA
                </span>

                <h2 class="section-title">
                    Organisasi yang Terarah,
                    <span>Kolaboratif, dan Akuntabel.</span>
                </h2>

            </div>


            <div class="col-lg-7">

                <p class="section-description">
                    Yayasan Pusaka menjalankan fungsi organisasi melalui
                    pembagian peran yang jelas, mulai dari unsur pembina,
                    pengawas, pengurus, hingga tim pelaksana.
                </p>

                <p class="section-description">
                    Struktur ini mendukung pengambilan keputusan, pelaksanaan
                    program, pengawasan, serta koordinasi agar setiap kegiatan
                    dapat berjalan secara tertib dan bertanggung jawab.
                </p>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     ORGANIZATION LEVELS
========================= --}}

<section class="organization-levels section-padding">

    <div class="container">

        <div class="organization-heading text-center">

            <span class="section-label">
                STRUKTUR UTAMA
            </span>

            <h2 class="section-title">
                Peran yang Saling Mendukung
                dalam <span>Satu Tujuan.</span>
            </h2>

            <p>
                Setiap unsur memiliki fungsi yang saling melengkapi
                dalam menjaga keberlangsungan dan tata kelola yayasan.
            </p>

        </div>


        <div class="row g-4">

            <div class="col-md-6 col-lg-3">

                <div class="organization-level-card">

                    <div class="organization-level-icon blue">
                        <i class="bi bi-bank"></i>
                    </div>

                    <span class="organization-level-number">
                        01
                    </span>

                    <h3>
                        Pembina
                    </h3>

                    <p>
                        Memberikan arah strategis dan memastikan yayasan
                        berjalan sesuai tujuan serta nilai yang ditetapkan.
                    </p>

                </div>

            </div>


            <div class="col-md-6 col-lg-3">

                <div class="organization-level-card">

                    <div class="organization-level-icon orange">
                        <i class="bi bi-eye-fill"></i>
                    </div>

                    <span class="organization-level-number">
                        02
                    </span>

                    <h3>
                        Pengawas
                    </h3>

                    <p>
                        Melakukan pengawasan terhadap pengelolaan dan
                        pelaksanaan kegiatan yayasan.
                    </p>

                </div>

            </div>


            <div class="col-md-6 col-lg-3">

                <div class="organization-level-card">

                    <div class="organization-level-icon blue">
                        <i class="bi bi-diagram-3-fill"></i>
                    </div>

                    <span class="organization-level-number">
                        03
                    </span>

                    <h3>
                        Pengurus
                    </h3>

                    <p>
                        Menjalankan kebijakan, pengelolaan organisasi,
                        dan koordinasi program Yayasan Pusaka.
                    </p>

                </div>

            </div>


            <div class="col-md-6 col-lg-3">

                <div class="organization-level-card">

                    <div class="organization-level-icon orange">
                        <i class="bi bi-people-fill"></i>
                    </div>

                    <span class="organization-level-number">
                        04
                    </span>

                    <h3>
                        Tim Pelaksana
                    </h3>

                    <p>
                        Mendukung pelaksanaan program, administrasi,
                        komunikasi, dan kegiatan operasional.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     ORGANIZATION CHART
========================= --}}

<section class="organization-chart-section section-padding">

    <div class="container">

        <div class="organization-chart-heading">

            <div>

                <span class="section-label">
                    BAGAN ORGANISASI
                </span>

                <h2 class="section-title">
                    Struktur Organisasi
                    <span>Yayasan Pusaka.</span>
                </h2>

            </div>

            <p>
                Bagan berikut menampilkan susunan organisasi Yayasan Pusaka
                secara menyeluruh.
            </p>

        </div>


        <div class="organization-chart-wrapper">

            <div class="organization-chart-toolbar">

                <div>

                    <i class="bi bi-diagram-3"></i>

                    <span>
                        Bagan Struktur Organisasi
                    </span>

                </div>

                <a
                    href="{{ asset('images/struktur-organisasi.PNG') }}"
                    target="_blank"
                    class="organization-chart-button"
                >

                    <i class="bi bi-arrows-fullscreen"></i>

                    Lihat Penuh

                </a>

            </div>


            <div class="organization-chart-image">

                <img
                    src="{{ asset('images/struktur-organisasi.PNG') }}"
                    alt="Struktur Organisasi Yayasan Pusaka"
                >

            </div>

        </div>

    </div>

</section>


{{-- =========================
     GOVERNANCE
========================= --}}

<section class="organization-governance">

    <div class="container">

        <div class="organization-governance-wrapper">

            <div class="organization-governance-icon">
                <i class="bi bi-shield-check"></i>
            </div>

            <div>

                <span>
                    TATA KELOLA YAYASAN
                </span>

                <h2>
                    Struktur yang Jelas Mendukung
                    <strong>Tanggung Jawab yang Lebih Baik.</strong>
                </h2>

                <p>
                    Pembagian tugas dan kewenangan yang jelas membantu
                    Yayasan Pusaka menjaga koordinasi, akuntabilitas,
                    dan kualitas pelaksanaan program.
                </p>

            </div>

        </div>

    </div>

</section>

@endsection