@extends('layouts.app')

@section('title', $program->name . ' | Yayasan Pusaka')

@section('content')

{{-- =========================
     PAGE HERO
========================= --}}

<section class="empowerment-hero">

    <div class="container">

        <div class="empowerment-hero-content">

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

<section class="empowerment-intro section-padding">

    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-6">

                <div class="empowerment-image-wrapper">

                    @if ($program->image)

                        <img
                            src="{{ asset('storage/' . $program->image) }}"
                            alt="{{ $program->name }}"
                        >

                    @else

                        <img
                            src="{{ asset('images/program-pemberdayaan.jpg') }}"
                            alt="{{ $program->name }}"
                        >

                    @endif


                    <div class="empowerment-floating-card">

                        <div class="empowerment-floating-icon">

                            <i class="bi {{ $program->icon ?: 'bi-graph-up-arrow' }}"></i>

                        </div>

                        <div>

                            <strong>
                                Bertumbuh & Mandiri
                            </strong>

                            <span>
                                Mengembangkan potensi penerima manfaat
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
                    Dari Potensi Menjadi
                    <span>Peluang yang Nyata.</span>
                </h2>


                @if ($program->description)

                    <div class="section-description">
                        {!! nl2br(e($program->description)) !!}
                    </div>

                @else

                    <p class="section-description">
                        Pemberdayaan menjadi salah satu pendekatan Yayasan Pusaka
                        untuk membantu penerima manfaat tidak hanya menerima
                        dukungan, tetapi juga memiliki kesempatan untuk
                        mengembangkan kemampuan dan kemandirian.
                    </p>

                    <p class="section-description">
                        Program dijalankan melalui pengembangan keterampilan,
                        kewirausahaan, penguatan UMKM, serta pendampingan
                        sesuai kebutuhan penerima manfaat.
                    </p>

                @endif


                <div class="empowerment-points">

                    <div>
                        <i class="bi bi-check-circle-fill"></i>
                        Pengembangan keterampilan
                    </div>

                    <div>
                        <i class="bi bi-check-circle-fill"></i>
                        Dukungan kewirausahaan
                    </div>

                    <div>
                        <i class="bi bi-check-circle-fill"></i>
                        Pendampingan menuju kemandirian
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     PROGRAM LIST
========================= --}}

<section class="empowerment-programs section-padding">

    <div class="container">

        <div class="empowerment-programs-heading">

            <div>

                <span class="section-label">
                    PROGRAM PEMBERDAYAAN
                </span>

                <h2 class="section-title">
                    Membuka Jalan Menuju
                    <span>Kemandirian.</span>
                </h2>

            </div>

            <p>
                Program dirancang untuk membantu penerima manfaat
                mengembangkan potensi ekonomi dan peluang usaha
                secara lebih berkelanjutan.
            </p>

        </div>


        <div class="row g-4">

            {{-- UMKM --}}
            <div class="col-lg-6">

                <article class="empowerment-program-card">

                    <div class="empowerment-card-header">

                        <div class="empowerment-card-icon blue">
                            <i class="bi bi-shop"></i>
                        </div>

                        <span>
                            01
                        </span>

                    </div>

                    <span class="empowerment-card-label">
                        PEMBERDAYAAN EKONOMI
                    </span>

                    <h3>
                        Pengembangan UMKM
                    </h3>

                    <p>
                        Mendukung penerima manfaat dalam mengembangkan usaha,
                        meningkatkan kemampuan pengelolaan, serta membuka
                        peluang untuk memperluas pasar.
                    </p>

                    <div class="empowerment-card-features">

                        <span>
                            <i class="bi bi-check2"></i>
                            Pengembangan produk
                        </span>

                        <span>
                            <i class="bi bi-check2"></i>
                            Pemasaran
                        </span>

                        <span>
                            <i class="bi bi-check2"></i>
                            Pengelolaan usaha
                        </span>

                    </div>

                </article>

            </div>


            {{-- KEWIRAUSAHAAN --}}
            <div class="col-lg-6">

                <article class="empowerment-program-card">

                    <div class="empowerment-card-header">

                        <div class="empowerment-card-icon orange">
                            <i class="bi bi-briefcase-fill"></i>
                        </div>

                        <span>
                            02
                        </span>

                    </div>

                    <span class="empowerment-card-label">
                        KEMANDIRIAN
                    </span>

                    <h3>
                        Kewirausahaan
                    </h3>

                    <p>
                        Mendorong penerima manfaat untuk mengembangkan
                        ide usaha, kemampuan kewirausahaan, serta kesiapan
                        untuk membangun sumber penghasilan yang mandiri.
                    </p>

                    <div class="empowerment-card-features">

                        <span>
                            <i class="bi bi-check2"></i>
                            Ide bisnis
                        </span>

                        <span>
                            <i class="bi bi-check2"></i>
                            Keterampilan usaha
                        </span>

                        <span>
                            <i class="bi bi-check2"></i>
                            Pendampingan
                        </span>

                    </div>

                </article>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     PROCESS
========================= --}}

<section class="empowerment-process section-padding">

    <div class="container">

        <div class="empowerment-process-heading text-center">

            <span class="section-label">
                PROSES PEMBERDAYAAN
            </span>

            <h2 class="section-title">
                Bertumbuh melalui
                <span>Proses yang Berkelanjutan.</span>
            </h2>

            <p>
                Pemberdayaan tidak berhenti pada pelatihan,
                tetapi perlu melalui proses pendampingan dan evaluasi.
            </p>

        </div>


        <div class="empowerment-process-grid">

            <div class="empowerment-process-item">

                <div class="empowerment-process-number">
                    01
                </div>

                <div class="empowerment-process-icon">
                    <i class="bi bi-search"></i>
                </div>

                <h3>
                    Identifikasi Potensi
                </h3>

                <p>
                    Memahami kebutuhan, kemampuan, dan potensi
                    penerima manfaat.
                </p>

            </div>


            <div class="empowerment-process-item">

                <div class="empowerment-process-number">
                    02
                </div>

                <div class="empowerment-process-icon orange">
                    <i class="bi bi-lightbulb-fill"></i>
                </div>

                <h3>
                    Pengembangan
                </h3>

                <p>
                    Memberikan pelatihan, pengetahuan, serta
                    penguatan kemampuan.
                </p>

            </div>


            <div class="empowerment-process-item">

                <div class="empowerment-process-number">
                    03
                </div>

                <div class="empowerment-process-icon">
                    <i class="bi bi-people-fill"></i>
                </div>

                <h3>
                    Pendampingan
                </h3>

                <p>
                    Mendampingi penerima manfaat dalam menerapkan
                    kemampuan yang telah dikembangkan.
                </p>

            </div>


            <div class="empowerment-process-item">

                <div class="empowerment-process-number">
                    04
                </div>

                <div class="empowerment-process-icon orange">
                    <i class="bi bi-graph-up-arrow"></i>
                </div>

                <h3>
                    Kemandirian
                </h3>

                <p>
                    Mendorong penerima manfaat agar mampu
                    berkembang secara lebih mandiri.
                </p>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     CLOSING CTA
========================= --}}

<section class="empowerment-impact">

    <div class="container">

        <div class="empowerment-impact-wrapper">

            <div>

                <span>
                    DAMPAK PEMBERDAYAAN
                </span>

                <h2>
                    Keberhasilan Bukan Hanya Tentang Bantuan,
                    Tetapi <strong>Kemampuan untuk Mandiri.</strong>
                </h2>

                <p>
                    Data capaian dan penerima manfaat program pemberdayaan
                    nantinya dapat ditampilkan dari aplikasi internal
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