@extends('layouts.app')

@section('title', $program->name . ' | Yayasan Pusaka')

@section('content')

{{-- =========================
     PAGE HERO
========================= --}}

<section class="education-hero">

    <div class="container">

        <div class="education-hero-content">

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

<section class="education-intro section-padding">

    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-6">

                <div class="education-image-wrapper">

                    @if ($program->image)

                        <img
                            src="{{ asset('storage/' . $program->image) }}"
                            alt="{{ $program->name }}"
                        >

                    @else

                        <img
                            src="{{ asset('images/program-pendidikan.jpg') }}"
                            alt="{{ $program->name }}"
                        >

                    @endif


                    <div class="education-floating-card">

                        <div class="education-floating-icon">

                            <i class="bi {{ $program->icon ?: 'bi-mortarboard-fill' }}"></i>

                        </div>

                        <div>

                            <strong>
                                {{ $program->name }}
                            </strong>

                            <span>
                                untuk masa depan yang lebih baik
                            </span>

                        </div>

                    </div>

                </div>

            </div>


            <div class="col-lg-6">

                <span class="section-label">
                    TENTANG PROGRAM
                </span>

                <h2 class="section-title">
                    Pendidikan sebagai Jalan untuk
                    <span>Tumbuh dan Berkembang.</span>
                </h2>


                @if ($program->description)

                    <div class="section-description">
                        {!! nl2br(e($program->description)) !!}
                    </div>

                @else

                    <p class="section-description">
                        Pendidikan menjadi salah satu fokus Yayasan Pusaka
                        dalam mendukung penerima manfaat agar memiliki
                        kesempatan belajar dan berkembang secara berkelanjutan.
                    </p>

                    <p class="section-description">
                        Dukungan diberikan melalui berbagai bentuk program
                        yang disesuaikan dengan kebutuhan, jenjang pendidikan,
                        serta kondisi penerima manfaat.
                    </p>

                @endif


                <div class="education-points">

                    <div>
                        <i class="bi bi-check-circle-fill"></i>
                        Dukungan pendidikan berkelanjutan
                    </div>

                    <div>
                        <i class="bi bi-check-circle-fill"></i>
                        Pendampingan penerima manfaat
                    </div>

                    <div>
                        <i class="bi bi-check-circle-fill"></i>
                        Pengembangan potensi
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     PROGRAM LIST
========================= --}}

<section class="education-programs section-padding">

    <div class="container">

        <div class="education-programs-heading">

            <div>

                <span class="section-label">
                    PROGRAM PENDIDIKAN
                </span>

                <h2 class="section-title">
                    Bentuk Dukungan
                    <span>yang Kami Jalankan.</span>
                </h2>

            </div>

            <p>
                Setiap program dirancang untuk membantu penerima manfaat
                memperoleh kesempatan pendidikan yang lebih baik.
            </p>

        </div>


        <div class="row g-4">

            {{-- BANTUAN PENDIDIKAN --}}
            <div class="col-lg-6">

                <article class="education-program-card">

                    <div class="education-card-top">

                        <div class="education-card-icon blue">
                            <i class="bi bi-book-fill"></i>
                        </div>

                        <span>
                            01
                        </span>

                    </div>

                    <h3>
                        Bantuan Pendidikan
                    </h3>

                    <p>
                        Dukungan bagi penerima manfaat untuk membantu
                        keberlanjutan pendidikan sesuai jenjang dan kebutuhan.
                    </p>

                    <div class="education-card-meta">

                        <span>
                            <i class="bi bi-mortarboard"></i>
                            Pendidikan
                        </span>

                        <span>
                            <i class="bi bi-people"></i>
                            Penerima Manfaat
                        </span>

                    </div>

                </article>

            </div>


            {{-- ANAK ASUH --}}
            <div class="col-lg-6">

                <article class="education-program-card">

                    <div class="education-card-top">

                        <div class="education-card-icon orange">
                            <i class="bi bi-person-heart"></i>
                        </div>

                        <span>
                            02
                        </span>

                    </div>

                    <h3>
                        Anak Asuh
                    </h3>

                    <p>
                        Program pendampingan untuk mendukung pendidikan,
                        pengembangan, dan kebutuhan penerima manfaat secara
                        berkelanjutan.
                    </p>

                    <div class="education-card-meta">

                        <span>
                            <i class="bi bi-heart"></i>
                            Pendampingan
                        </span>

                        <span>
                            <i class="bi bi-stars"></i>
                            Pengembangan
                        </span>

                    </div>

                </article>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     IMPACT
========================= --}}

<section class="education-impact">

    <div class="container">

        <div class="education-impact-wrapper">

            <div>

                <span>
                    DAMPAK PROGRAM
                </span>

                <h2>
                    Setiap Dukungan Pendidikan adalah
                    <strong>Investasi untuk Masa Depan.</strong>
                </h2>

                <p>
                    Data penerima manfaat dan capaian program pendidikan
                    nantinya dapat diambil langsung dari aplikasi internal
                    Yayasan Pusaka melalui API.
                </p>

            </div>


            <a href="{{ route('impact') }}"
               class="profile-commitment-btn">

                Lihat Dampak

                <i class="bi bi-arrow-right"></i>

            </a>

        </div>

    </div>

</section>

@endsection