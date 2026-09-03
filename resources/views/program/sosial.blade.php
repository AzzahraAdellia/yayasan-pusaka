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
                            src="{{ asset('images/program-sosial.jpg') }}"
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

<section class="social-programs section-padding">

    <div class="container">

        <div class="social-programs-heading">

            <div>

                <span class="section-label">
                    PROGRAM SOSIAL
                </span>

                <h2 class="section-title">
                    Bentuk Dukungan
                    <span>yang Kami Hadirkan.</span>
                </h2>

            </div>

            <p>
                Program dijalankan sesuai dengan kebutuhan penerima manfaat
                dan ruang lingkup pelayanan sosial Yayasan Pusaka.
            </p>

        </div>


        <div class="row g-4">

            {{-- YATIM / PIATU --}}
            <div class="col-lg-4">

                <article class="social-program-card">

                    <div class="social-card-icon orange">
                        <i class="bi bi-person-heart"></i>
                    </div>

                    <span class="social-card-number">
                        01
                    </span>

                    <span class="social-card-label">
                        SOSIAL
                    </span>

                    <h3>
                        Anak Yatim/Piatu
                    </h3>

                    <p>
                        Memberikan dukungan dan perhatian kepada anak
                        yatim/piatu melalui program sosial dan pendidikan
                        yang berkelanjutan.
                    </p>

                </article>

            </div>


            {{-- ABK --}}
            <div class="col-lg-4">

                <article class="social-program-card">

                    <div class="social-card-icon blue">
                        <i class="bi bi-universal-access"></i>
                    </div>

                    <span class="social-card-number">
                        02
                    </span>

                    <span class="social-card-label">
                        PENDAMPINGAN
                    </span>

                    <h3>
                        Dukungan ABK
                    </h3>

                    <p>
                        Mendukung kebutuhan dan pengembangan anak
                        berkebutuhan khusus melalui pendampingan dan
                        program yang relevan.
                    </p>

                </article>

            </div>


            {{-- BANTUAN SOSIAL --}}
            <div class="col-lg-4">

                <article class="social-program-card">

                    <div class="social-card-icon orange">
                        <i class="bi bi-box2-heart-fill"></i>
                    </div>

                    <span class="social-card-number">
                        03
                    </span>

                    <span class="social-card-label">
                        BANTUAN
                    </span>

                    <h3>
                        Bantuan Sosial
                    </h3>

                    <p>
                        Memberikan bantuan kepada penerima manfaat
                        sesuai dengan kebutuhan dan kondisi sosial yang
                        membutuhkan dukungan.
                    </p>

                </article>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     SOCIAL APPROACH
========================= --}}

<section class="social-approach section-padding">

    <div class="container">

        <div class="social-approach-wrapper">

            <div class="social-approach-title">

                <span>
                    PENDEKATAN KAMI
                </span>

                <h2>
                    Kepedulian yang
                    <strong>Tepat Sasaran.</strong>
                </h2>

            </div>


            <div class="social-approach-steps">

                <div class="social-approach-step">

                    <span>
                        01
                    </span>

                    <div>

                        <strong>
                            Identifikasi
                        </strong>

                        <p>
                            Memahami kebutuhan penerima manfaat.
                        </p>

                    </div>

                </div>


                <div class="social-approach-step">

                    <span>
                        02
                    </span>

                    <div>

                        <strong>
                            Verifikasi
                        </strong>

                        <p>
                            Memastikan bantuan sesuai kondisi dan kebutuhan.
                        </p>

                    </div>

                </div>


                <div class="social-approach-step">

                    <span>
                        03
                    </span>

                    <div>

                        <strong>
                            Pelaksanaan
                        </strong>

                        <p>
                            Memberikan dukungan melalui program yang tepat.
                        </p>

                    </div>

                </div>


                <div class="social-approach-step">

                    <span>
                        04
                    </span>

                    <div>

                        <strong>
                            Pendampingan
                        </strong>

                        <p>
                            Melihat perkembangan dan keberlanjutan manfaat.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     IMPACT CTA
========================= --}}

<section class="social-impact">

    <div class="container">

        <div class="social-impact-wrapper">

            <div>

                <span>
                    DAMPAK SOSIAL
                </span>

                <h2>
                    Setiap Kepedulian Bisa Menjadi
                    <strong>Harapan yang Baru.</strong>
                </h2>

                <p>
                    Statistik penerima manfaat dan capaian program sosial
                    nantinya dapat terhubung dengan data aplikasi internal
                    Yayasan Pusaka melalui API.
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