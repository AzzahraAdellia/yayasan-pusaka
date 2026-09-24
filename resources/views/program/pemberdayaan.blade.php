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
                            src="{{ asset('images/bantuan-umkm.jpg') }}"
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
                        Program Pemberdayaan UMKM Yayasan Pusaka
                        merupakan upaya untuk mendukung kemandirian
                        ekonomi keluarga asuh melalui pengembangan
                        usaha mikro, kecil, dan menengah (UMKM).
                    </p>

                    <p class="section-description">
                        Program ini ditujukan bagi keluarga asuh
                        Yayasan Pusaka yang memiliki usaha, baik
                        yang dijalankan oleh orang tua, wali,
                        maupun anak asuh.
                    </p>

                    <p class="section-description">
                        Melalui bantuan pengembangan usaha dan
                        pelatihan UMKM, Yayasan Pusaka berupaya
                        meningkatkan kemampuan keluarga asuh
                        dalam mengelola dan mengembangkan usaha
                        secara berkelanjutan.
                    </p>

                @endif


                
                <div class="empowerment-points">

                    <div>
                        <i class="bi bi-check-circle-fill"></i>
                        Pemberdayaan ekonomi keluarga asuh
                    </div>

                    <div>
                        <i class="bi bi-check-circle-fill"></i>
                        Bantuan pengembangan usaha
                    </div>

                    <div>
                        <i class="bi bi-check-circle-fill"></i>
                        Pelatihan dan peningkatan keterampilan UMKM
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     SUBKEGIATAN PEMBERDAYAAN
========================= --}}

@if ($trainings->isNotEmpty())

<section class="empowerment-programs section-padding">

    <div class="container">

        <div class="empowerment-programs-heading">

            <div>
                <span class="section-label">
                    KEGIATAN PROGRAM
                </span>

                <h2 class="section-title">
                    Subkegiatan
                    <span>Pemberdayaan.</span>
                </h2>
            </div>

            <p>
                Berbagai kegiatan yang dilaksanakan
                dalam Program Pemberdayaan Yayasan Pusaka.
            </p>

        </div>


        <div class="row g-4">

            @foreach ($trainings as $subactivity)

                <div class="col-lg-6">

                    <article class="empowerment-program-card h-100">

                        @if ($subactivity->image)

                            <img
                                src="{{ asset('storage/' . $subactivity->image) }}"
                                alt="{{ $subactivity->name }}"
                                style="width: 100%; height: 200px; object-fit: cover; border-radius: 12px; margin-bottom: 20px;"
                            >

                        @endif

                        <h3>
                            {{ $subactivity->name }}
                        </h3>

                        @if ($subactivity->short_description)

                            <p>
                                {{ $subactivity->short_description }}
                            </p>

                        @endif

                        <a
                            href="{{ route('programs.empowerment.show', $subactivity) }}"
                            class="training-detail-button"
                        >
                            Selengkapnya
                            <i class="bi bi-arrow-right"></i>
                        </a>

                        </article>

                </div>

            @endforeach

        </div>

    </div>

</section>

@endif


{{-- =========================
     BENTUK PEMBERDAYAAN UMKM
========================= --}}

<section class="empowerment-programs section-padding">

    <div class="container">

        <div class="empowerment-programs-heading">

            <div>

                <span class="section-label">
                    PEMBERDAYAAN UMKM
                </span>

                <h2 class="section-title">
                    Dukungan untuk
                    <span>Usaha Keluarga Asuh.</span>
                </h2>

            </div>

            <p>
                Yayasan Pusaka memberikan dukungan
                bagi keluarga asuh untuk membantu
                mengembangkan usaha, meningkatkan
                keterampilan, dan mendorong
                kemandirian ekonomi keluarga.
            </p>

        </div>


        <div class="row g-4">

            {{-- BANTUAN PENGEMBANGAN USAHA --}}

            <div class="col-lg-6">

                <article class="empowerment-program-card h-100">

                    <div class="empowerment-card-header">

                        <div class="empowerment-card-icon blue">
                            <i class="bi bi-shop"></i>
                        </div>

                        <span>
                            01
                        </span>

                    </div>

                    <span class="empowerment-card-label">
                        DUKUNGAN USAHA
                    </span>

                    <h3>
                        Bantuan Pengembangan Usaha
                    </h3>

                    <p>
                        Yayasan Pusaka memberikan bantuan
                        pengembangan usaha kepada keluarga
                        asuh yang memiliki dan menjalankan
                        usaha mikro, kecil, dan menengah
                        (UMKM).
                    </p>

                    <p>
                        Bantuan ini bertujuan untuk mendukung
                        pengembangan usaha yang dijalankan
                        oleh orang tua, wali, maupun anak asuh
                        agar dapat terus berkembang dan
                        memberikan manfaat ekonomi bagi
                        keluarga.
                    </p>

                    <div class="empowerment-card-features">

                        <span>
                            <i class="bi bi-check2"></i>
                            Pengembangan usaha keluarga asuh
                        </span>

                        <span>
                            <i class="bi bi-check2"></i>
                            Dukungan bagi UMKM binaan
                        </span>

                        <span>
                            <i class="bi bi-check2"></i>
                            Mendorong kemandirian ekonomi
                        </span>

                    </div>

                </article>

            </div>


            {{-- PELATIHAN UMKM --}}

            <div class="col-lg-6">

                <article class="empowerment-program-card h-100">

                    <div class="empowerment-card-header">

                        <div class="empowerment-card-icon orange">
                            <i class="bi bi-mortarboard-fill"></i>
                        </div>

                        <span>
                            02
                        </span>

                    </div>

                    <span class="empowerment-card-label">
                        PENGEMBANGAN KETERAMPILAN
                    </span>

                    <h3>
                        Pelatihan UMKM
                    </h3>

                    <p>
                        Yayasan Pusaka menyelenggarakan
                        pelatihan UMKM bagi keluarga asuh
                        untuk meningkatkan pengetahuan,
                        keterampilan, dan kemampuan
                        dalam mengelola usaha.
                    </p>

                    <p>
                        Melalui kegiatan pelatihan,
                        peserta mendapatkan kesempatan
                        untuk mengembangkan wawasan
                        kewirausahaan dan meningkatkan
                        kemampuan dalam menjalankan
                        serta mengembangkan usaha.
                    </p>

                    <div class="empowerment-card-features">

                        <span>
                            <i class="bi bi-check2"></i>
                            Peningkatan keterampilan usaha
                        </span>

                        <span>
                            <i class="bi bi-check2"></i>
                            Pengembangan wawasan kewirausahaan
                        </span>

                        <span>
                            <i class="bi bi-check2"></i>
                            Penguatan kemampuan pengelolaan usaha
                        </span>

                    </div>

                </article>

            </div>

        </div>

    </div>

</section>



{{-- =========================
     SASARAN PROGRAM
========================= --}}

<section class="empowerment-target section-padding">

    <div class="container">

        <div class="empowerment-target-heading text-center">

            <span class="section-label">
                SASARAN PROGRAM
            </span>

            <h2 class="section-title">
                Siapa yang Dapat Mengikuti
                <span>Program Pemberdayaan UMKM?</span>
            </h2>

            <p>
                Program ini ditujukan bagi keluarga
                asuh Yayasan Pusaka yang memiliki
                dan menjalankan usaha.
            </p>

        </div>


        <div class="row g-4 justify-content-center">

            {{-- ORANG TUA --}}

            <div class="col-lg-4 col-md-6">

                <div class="empowerment-target-card">

                    <div class="empowerment-target-icon blue">
                        <i class="bi bi-people-fill"></i>
                    </div>

                    <h3>
                        Orang Tua
                    </h3>

                    <p>
                        Orang tua dari anak asuh Yayasan
                        Pusaka yang memiliki dan menjalankan
                        usaha untuk mendukung perekonomian
                        keluarga.
                    </p>

                </div>

            </div>


            {{-- WALI --}}

            <div class="col-lg-4 col-md-6">

                <div class="empowerment-target-card">

                    <div class="empowerment-target-icon orange">
                        <i class="bi bi-person-heart"></i>
                    </div>

                    <h3>
                        Wali
                    </h3>

                    <p>
                        Wali dari anak asuh Yayasan Pusaka
                        yang memiliki usaha dan ingin
                        mengembangkan kegiatan usahanya.
                    </p>

                </div>

            </div>


            {{-- ANAK ASUH --}}

            <div class="col-lg-4 col-md-6">

                <div class="empowerment-target-card">

                    <div class="empowerment-target-icon blue">
                        <i class="bi bi-person-workspace"></i>
                    </div>

                    <h3>
                        Anak Asuh
                    </h3>

                    <p>
                        Anak asuh Yayasan Pusaka yang
                        memiliki dan menjalankan usaha
                        serta ingin mengembangkan
                        kemampuan kewirausahaannya.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection