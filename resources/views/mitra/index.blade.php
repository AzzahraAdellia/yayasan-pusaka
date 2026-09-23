@extends('layouts.app')

@section('title', 'Mitra & Kolaborasi | Yayasan Pusaka')

@section('content')

{{-- =========================
     PAGE HERO
========================= --}}

<section class="partners-page-hero">

    <div class="container">

        <div class="partners-page-hero-content">

            <span class="section-label">
                MITRA & KOLABORASI
            </span>

            <h1>
                Bertumbuh Lebih Jauh
                melalui <span>Kolaborasi.</span>
            </h1>

            <p>
                Yayasan Pusaka percaya bahwa kolaborasi dapat memperluas
                manfaat dan menghadirkan lebih banyak peluang bagi
                penerima manfaat serta masyarakat.
            </p>

            <div class="profile-breadcrumb">

                <a href="{{ route('home') }}">
                    Beranda
                </a>

                <i class="bi bi-chevron-right"></i>

                <span>
                    Mitra & Kolaborasi
                </span>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     INTRO
========================= --}}

<section class="partners-page-intro section-padding">

    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-5">

                <span class="section-label">
                    KOLABORASI
                </span>

                <h2 class="section-title">
                    Bersama Menciptakan
                    <span>Dampak yang Lebih Luas.</span>
                </h2>

            </div>


            <div class="col-lg-7">

                <p class="section-description">
                    Yayasan Pusaka terbuka untuk membangun kolaborasi
                    bersama perusahaan, institusi pendidikan, komunitas,
                    organisasi sosial, dan berbagai pihak yang memiliki
                    semangat untuk memberikan manfaat.
                </p>

                <p class="section-description">
                    Kolaborasi dapat dilakukan melalui pelaksanaan program,
                    dukungan kegiatan, pengembangan penerima manfaat,
                    pelatihan, maupun berbagai bentuk kemitraan lainnya.
                </p>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     PARTNER LOGOS
========================= --}}

<section class="partners-page-list section-padding">

    <div class="container">

        <div class="partners-page-heading text-center">

            <span class="section-label">
                MITRA KAMI
            </span>

            <h2 class="section-title">
                Bersama Mitra,
                <span>Menghadirkan Manfaat.</span>
            </h2>

            <p>
                Bersama berbagai mitra, Yayasan Pusaka membangun
                kolaborasi untuk memperluas manfaat dan dampak program.
            </p>

        </div>


        
        @if ($partners->count())

            <div class="row g-4 justify-content-center">

                @foreach ($partners as $partner)

                    <div class="col-12 col-md-6 col-lg-4">

                        <article class="partners-page-detail-card">

                            <div class="partners-page-detail-logo">

                                @if ($partner->logo)

                                    <img
                                        src="{{ asset('storage/' . $partner->logo) }}"
                                        alt="Logo {{ $partner->name }}"
                                        loading="lazy"
                                    >

                                @else

                                    <i class="bi bi-building"></i>

                                @endif

                            </div>

                            <div class="partners-page-detail-content">

                                <h3>{{ $partner->name }}</h3>

                                @if ($partner->description)

                                    <p class="partners-page-detail-description">
                                        {{ $partner->description }}
                                    </p>

                                @else

                                    <p class="partners-page-detail-description partners-page-detail-description-empty">
                                        Informasi kerja sama sedang diperbarui.
                                    </p>

                                @endif

                                @if ($partner->website)

                                    <a
                                        href="{{ $partner->website }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="partners-page-detail-link"
                                    >
                                        Kunjungi Website
                                        <i class="bi bi-arrow-up-right"></i>
                                    </a>

                                @endif

                            </div>

                        </article>

                    </div>

                @endforeach

            </div>

        @else

            <div class="partners-page-empty">

                <i class="bi bi-people"></i>

                <h3>Mitra Segera Hadir</h3>

                <p>
                    Informasi mitra Yayasan Pusaka sedang diperbarui.
                </p>

            </div>

        @endif

    </div>

</section>


{{-- =========================
     COLLABORATION TYPES
========================= --}}

<section class="partnership-types section-padding">

    <div class="container">

        <div class="partnership-types-heading">

            <div>

                <span class="section-label">
                    BENTUK KOLABORASI
                </span>

                <h2 class="section-title">
                    Berbagai Cara untuk
                    <span>Bergerak Bersama.</span>
                </h2>

            </div>

            <p>
                Bentuk kerja sama dapat disesuaikan dengan kebutuhan,
                tujuan, dan bidang kontribusi masing-masing pihak.
            </p>

        </div>


        <div class="row g-4">

            <div class="col-md-6 col-lg-3">

                <div class="partnership-type-card">

                    <div class="partnership-type-icon blue">
                        <i class="bi bi-people-fill"></i>
                    </div>

                    <h3>
                        Kolaborasi Program
                    </h3>

                    <p>
                        Menyelenggarakan program sosial,
                        pendidikan, dan pemberdayaan bersama.
                    </p>

                </div>

            </div>


            <div class="col-md-6 col-lg-3">

                <div class="partnership-type-card">

                    <div class="partnership-type-icon orange">
                        <i class="bi bi-hand-thumbs-up-fill"></i>
                    </div>

                    <h3>
                        Dukungan Kegiatan
                    </h3>

                    <p>
                        Mendukung pelaksanaan kegiatan
                        melalui sumber daya maupun fasilitas.
                    </p>

                </div>

            </div>


            <div class="col-md-6 col-lg-3">

                <div class="partnership-type-card">

                    <div class="partnership-type-icon blue">
                        <i class="bi bi-lightbulb-fill"></i>
                    </div>

                    <h3>
                        Pelatihan & Keahlian
                    </h3>

                    <p>
                        Berbagi kompetensi, keahlian, dan
                        pengalaman bagi penerima manfaat.
                    </p>

                </div>

            </div>


            <div class="col-md-6 col-lg-3">

                <div class="partnership-type-card">

                    <div class="partnership-type-icon orange">
                        <i class="bi bi-diagram-3-fill"></i>
                    </div>

                    <h3>
                        Kemitraan Strategis
                    </h3>

                    <p>
                        Membangun kerja sama jangka panjang
                        untuk memperluas dampak program.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     HOW TO COLLABORATE
========================= --}}

<section class="partnership-process section-padding">

    <div class="container">

        <div class="partnership-process-heading text-center">

            <span class="section-label">
                PROSES KOLABORASI
            </span>

            <h2 class="section-title">
                Memulai Kolaborasi
                <span>dengan Mudah.</span>
            </h2>

        </div>


        <div class="partnership-process-grid">

            <div class="partnership-process-item">

                <span>01</span>

                <div class="partnership-process-icon">
                    <i class="bi bi-chat-dots-fill"></i>
                </div>

                <h3>
                    Hubungi Kami
                </h3>

                <p>
                    Sampaikan rencana atau ide kolaborasi
                    yang ingin dikembangkan.
                </p>

            </div>


            <div class="partnership-process-line"></div>


            <div class="partnership-process-item">

                <span>02</span>

                <div class="partnership-process-icon orange">
                    <i class="bi bi-clipboard-check-fill"></i>
                </div>

                <h3>
                    Diskusi
                </h3>

                <p>
                    Menyelaraskan tujuan, kebutuhan,
                    dan bentuk kerja sama.
                </p>

            </div>


            <div class="partnership-process-line"></div>


            <div class="partnership-process-item">

                <span>03</span>

                <div class="partnership-process-icon">
                    <i class="bi bi-people-fill"></i>
                </div>

                <h3>
                    Pelaksanaan
                </h3>

                <p>
                    Menjalankan program atau kegiatan
                    kolaboratif sesuai kesepakatan.
                </p>

            </div>


            <div class="partnership-process-line"></div>


            <div class="partnership-process-item">

                <span>04</span>

                <div class="partnership-process-icon orange">
                    <i class="bi bi-graph-up-arrow"></i>
                </div>

                <h3>
                    Evaluasi Dampak
                </h3>

                <p>
                    Melihat hasil dan peluang pengembangan
                    kolaborasi berikutnya.
                </p>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     CTA
========================= --}}

<section class="partnership-cta">

    <div class="container">

        <div class="partnership-cta-wrapper">

            <div>

                <span>
                    MARI BERKOLABORASI
                </span>

                <h2>
                    Punya Ide Kolaborasi?
                    <strong>Mari Kita Bicarakan.</strong>
                </h2>

                <p>
                    Hubungi Yayasan Pusaka untuk mendiskusikan
                    peluang program, kegiatan, maupun kemitraan.
                </p>

            </div>


            <a href="{{ route('contact') }}"
               class="profile-commitment-btn">

                Hubungi Kami

                <i class="bi bi-arrow-right"></i>

            </a>

        </div>

    </div>

</section>

@endsection