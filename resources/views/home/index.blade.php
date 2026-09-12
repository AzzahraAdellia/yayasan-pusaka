@extends('layouts.app')


@section('title', 'Yayasan Pusaka | Berkembang, Berbagi, dan Bermakna')


@section('content')


{{-- =========================
     HERO
========================= --}}

<section class="hero-section">

    <div class="container">

        <div class="row align-items-center min-vh-100 g-5">

            <div class="col-lg-6">

                <span class="hero-label">
                    YAYASAN PUSAKA
                </span>

                <h1>
                    Berkembang,
                    <span>Berbagi dan Bermakna.</span>
                </h1>

                <p class="hero-description">
                    Sejak 1967, Yayasan Pusaka hadir membawa semangat kepedulian bagi
                    keluarga besar PT Kereta Api Indonesia (Persero), 
                    khususnya anak yatim/piatu, pensiunan, 
                    serta keluarga yang membutuhkan dukungan.
                <br>             
                <br>
                    Melalui program pendidikan, sosial, pemberdayaan, 
                    dan pengembangan keterampilan, kami berupaya membuka 
                    lebih banyak kesempatan agar setiap penerima manfaat dapat tumbuh, 
                    berdaya, dan memiliki masa depan yang lebih baik.
                </p>

                <div class="hero-buttons">

                    <a href="{{ route('programs.index') }}"
                       class="btn btn-primary-custom">

                        Lihat Program Kami
                        <i class="bi bi-arrow-right"></i>

                    </a>

                    <a href="{{ route('donation') }}"
                       class="btn btn-outline-custom">

                        <i class="bi bi-heart-fill"></i>
                        Donasi Sekarang

                    </a>

                </div>


                <div class="hero-trust">

                    <div class="hero-trust-item">
                        <i class="bi bi-shield-check"></i>

                        <div>
                            <strong>Terpercaya</strong>
                            <span>Berkomitmen memberikan manfaat nyata</span>
                        </div>
                    </div>

                    <div class="hero-trust-item">
                        <i class="bi bi-people"></i>

                        <div>
                            <strong>Kolaboratif</strong>
                            <span>Tumbuh bersama penerima manfaat dan mitra</span>
                        </div>
                    </div>

                </div>

            </div>


            <div class="col-lg-6">

                <div class="hero-visual">

                    <div class="hero-image-wrapper">

                        <img
                            src="{{ asset('images/hero.jpg') }}"
                            alt="Kegiatan Yayasan Pusaka"
                            class="hero-main-image"
                        >

                        <div class="hero-image-overlay"></div>

                    </div>


                    <div class="hero-floating-card hero-card-top">

                        <div class="floating-icon orange">

                            <i class="bi bi-heart-fill"></i>

                        </div>

                        <div>
                            <span>Kepedulian</span>
                            <strong>Untuk Sesama</strong>
                        </div>

                    </div>


                    <div class="hero-floating-card hero-card-bottom">

                        <div class="floating-icon blue">

                            <i class="bi bi-stars"></i>

                        </div>

                        <div>
                            <span>Menciptakan</span>
                            <strong>Dampak Nyata</strong>
                        </div>

                    </div>


                    <div class="hero-decoration-circle"></div>

                </div>

            </div>

        </div>

    </div>

</section>



{{-- =========================
     ABOUT HOME
========================= --}}

<section class="about-home section-padding">

    <div class="container">

        <div class="row align-items-center g-5">

            {{-- IMAGE --}}
            <div class="col-lg-6">

                <div class="about-visual">

                    <div class="about-image-main">

                        <img
                            src="{{ asset('images/about.jpg') }}"
                            alt="Kegiatan Yayasan Pusaka"
                        >

                    </div>

                    <div class="about-accent-box"></div>


                    <div class="about-floating">

                        <div class="about-floating-icon">
                            <i class="bi bi-heart-fill"></i>
                        </div>

                        <div>
                            <strong>Peduli & Berdampak</strong>

                            <span>
                                Hadir memberikan manfaat
                            </span>
                        </div>

                    </div>

                </div>

            </div>


            {{-- CONTENT --}}
            <div class="col-lg-6">

                <div class="about-content">

                    <span class="section-label">
                        TENTANG KAMI
                    </span>

                    <h2 class="section-title">

                        Kepedulian yang Tumbuh
                        <span>Sejak 1967.</span>

                    </h2>

                    <p class="section-description">

                        Yayasan Pusaka didirikan pada 31 Maret 1967 di Kota Bandung 
                        oleh para pejabat Perusahaan Kereta Api Milik Negara Republik Indonesia.
                        Berawal dari semangat kepedulian terhadap kesejahteraan pegawai, pensiunan, 
                        dan keluarga besar perkeretaapian, Yayasan Pusaka terus berkembang menjadi 
                        lembaga sosial yang menghadirkan berbagai program pendidikan, sosial, pemberdayaan, 
                        dan pengembangan.
                        <br>
                        <br>
                        Bagi kami, kepedulian bukan hanya tentang memberikan bantuan. 
                        Kepedulian adalah tentang mendampingi, membuka kesempatan, dan 
                        membantu penerima manfaat membangun masa depan yang lebih baik.

                    </p>


                    <div class="about-values">

                        <div class="about-value">

                            <div class="about-value-icon">
                                <i class="bi bi-heart"></i>
                            </div>

                            <div>
                                <strong>Kepedulian</strong>

                                <span>
                                    Hadir dan tumbuh bersama
                                    penerima manfaat.
                                </span>
                            </div>

                        </div>


                        <div class="about-value">

                            <div class="about-value-icon orange">
                                <i class="bi bi-people"></i>
                            </div>

                            <div>
                                <strong>Kolaborasi</strong>

                                <span>
                                    Membangun manfaat melalui
                                    kebersamaan.
                                </span>
                            </div>

                        </div>


                        <div class="about-value">

                            <div class="about-value-icon">
                                <i class="bi bi-stars"></i>
                            </div>

                            <div>
                                <strong>Pemberdayaan</strong>

                                <span>
                                    Mendorong kemandirian dan
                                    kesempatan berkembang.
                                </span>
                            </div>

                        </div>


                        <div class="about-value">

                            <div class="about-value-icon orange">
                                <i class="bi bi-graph-up-arrow"></i>
                            </div>

                            <div>
                                <strong>Dampak</strong>

                                <span>
                                    Menciptakan manfaat yang
                                    berkelanjutan.
                                </span>
                            </div>

                        </div>

                    </div>


                    <a href="{{ route('about.profile') }}"
                       class="btn btn-primary-custom mt-4">

                        Mengenal Yayasan Pusaka

                        <i class="bi bi-arrow-right ms-1"></i>

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>



{{-- =========================
     IMPACT STATS
========================= --}}

<section class="impact-stats">

    <div class="container">

        <div class="impact-stats-wrapper">

            <div class="impact-stats-heading">

                <div>
                    <span class="impact-eyebrow">
                        DAMPAK KAMI
                    </span>

                    <h2>
                        Dari Kepedulian Menjadi 
                        <span>Manfaat Nyata.</span>
                    </h2>
                </div>

                <p>
                    Setiap program Yayasan Pusaka berangkat dari kebutuhan nyata para penerima manfaat. 
                    Dukungan diberikan tidak hanya dalam bentuk bantuan, tetapi juga melalui pendampingan, 
                    pelatihan, serta kesempatan untuk tumbuh dan menjadi lebih mandiri.
                </p>

            </div>


            <div class="row g-4 impact-numbers">

                <div class="col-6 col-lg-3">

                    <div class="impact-stat-card">

                        <div class="impact-stat-icon blue">
                            <i class="bi bi-people-fill"></i>
                        </div>

                        <div class="impact-number">
                            <span class="impact-value">
                                -
                            </span>

                            <span class="impact-unit">
                                +
                            </span>
                        </div>

                        <p>
                            Penerima Manfaat
                        </p>

                        <span class="impact-note">
                            Seluruh program
                        </span>

                    </div>

                </div>


                <div class="col-6 col-lg-3">

                    <div class="impact-stat-card">

                        <div class="impact-stat-icon orange">
                            <i class="bi bi-grid-fill"></i>
                        </div>

                        <div class="impact-number">
                            <span class="impact-value">
                                -
                            </span>

                            <span class="impact-unit">
                                +
                            </span>
                        </div>

                        <p>
                            Program
                        </p>

                        <span class="impact-note">
                            Sosial & pemberdayaan
                        </span>

                    </div>

                </div>


                <div class="col-6 col-lg-3">

                    <div class="impact-stat-card">

                        <div class="impact-stat-icon blue">
                            <i class="bi bi-calendar2-check-fill"></i>
                        </div>

                        <div class="impact-number">
                            <span class="impact-value">
                                -
                            </span>

                            <span class="impact-unit">
                                +
                            </span>
                        </div>

                        <p>
                            Kegiatan
                        </p>

                        <span class="impact-note">
                            Telah dilaksanakan
                        </span>

                    </div>

                </div>


                <div class="col-6 col-lg-3">

                    <div class="impact-stat-card">

                        <div class="impact-stat-icon orange">
                            <i class="bi bi-geo-alt-fill"></i>
                        </div>

                        <div class="impact-number">
                            <span class="impact-value">
                                -
                            </span>

                            <span class="impact-unit">
                                +
                            </span>
                        </div>

                        <p>
                            Wilayah
                        </p>

                        <span class="impact-note">
                            Jangkauan program
                        </span>

                    </div>

                </div>

            </div>


            <div class="impact-footer">

                <div class="impact-footer-info">

                    <i class="bi bi-info-circle"></i>

                    <span>
                        Statistik akan diperbarui berdasarkan data
                        pada sistem internal Yayasan Pusaka.
                    </span>

                </div>

                <a href="{{ route('impact') }}"
                   class="impact-link">

                    Lihat Dampak Selengkapnya

                    <i class="bi bi-arrow-right"></i>

                </a>

            </div>

        </div>

    </div>

</section>



{{-- =========================
     PROGRAM HOME
========================= --}}

<section class="program-home section-padding">

    <div class="container">

        <div class="program-home-heading">

            <div>

                <span class="section-label">
                    PROGRAM KAMI
                </span>

                <h2 class="section-title">
                            Hadir untuk Membuka
                    <span>Lebih Banyak Kesempatan.</span>
                </h2>

            </div>


            <div class="program-home-description">

                <p>
                    Yayasan Pusaka mengembangkan berbagai program yang dirancang sesuai kebutuhan penerima manfaat. 
                    Mulai dari dukungan pendidikan hingga pengembangan keterampilan, setiap program diarahkan untuk 
                    memberikan manfaat yang nyata dan berkelanjutan.
                </p>

                <a href="{{ route('programs.index') }}"
                   class="text-link">

                    Lihat Semua Program

                    <i class="bi bi-arrow-right"></i>

                </a>

            </div>

        </div>


        <div class="row g-4 mt-2">

            @foreach ($programs as $program)

                @php

                    $iconColor = in_array(
                        $program->slug,
                        [
                            'pendidikan',
                            'pemberdayaan'
                        ]
                    ) ? 'blue' : 'orange';


                    $programRoute = match ($program->slug) {

                        'pendidikan'
                            => route('programs.education'),

                        'sosial-kemanusiaan'
                            => route('programs.social'),

                        'pemberdayaan'
                            => route('programs.empowerment'),

                        'pelatihan-pengembangan'
                            => route('programs.training'),

                        default
                            => route('programs.index'),
                    };


                    $programTags = match ($program->slug) {

                        'pendidikan' => [
                            'Bantuan Pendidikan',
                            'Anak Asuh',
                        ],

                        'sosial-kemanusiaan' => [
                            'Anak Yatim/Piatu',
                            'Program ABK',
                        ],

                        'pemberdayaan' => [
                            'UMKM',
                            'Kewirausahaan',
                        ],

                        'pelatihan-pengembangan' => [
                            'Pelatihan',
                            'Talent Mapping',
                        ],

                        default => [],
                    };

                @endphp


                <div class="col-md-6 col-lg-3">

                    <div class="program-feature-card">

                        <div class="program-card-number">

                            {{ str_pad(
                                $loop->iteration,
                                2,
                                '0',
                                STR_PAD_LEFT
                            ) }}

                        </div>


                        <div class="program-feature-icon {{ $iconColor }}">

                            <i class="bi {{ $program->icon ?: 'bi-grid' }}"></i>

                        </div>


                        <h3>
                            {{ $program->name }}
                        </h3>


                        <p>
                            {{ $program->short_description
                                ?: 'Informasi program Yayasan Pusaka.'
                            }}
                        </p>


                        @if (count($programTags))

                            <div class="program-tags">

                                @foreach ($programTags as $tag)

                                    <span>
                                        {{ $tag }}
                                    </span>

                                @endforeach

                            </div>

                        @endif


                        <a href="{{ $programRoute }}"
                           class="program-card-link">

                            Selengkapnya

                            <i class="bi bi-arrow-up-right"></i>

                        </a>

                    </div>

                </div>

            @endforeach

        </div>


        <div class="program-home-bottom">

            <div class="program-home-bottom-icon">

                <i class="bi bi-stars"></i>

            </div>

            <div>

                <strong>
                    Program terus berkembang.
                </strong>

                <span>
                    Program Yayasan Pusaka disesuaikan dengan kebutuhan
                    dan perkembangan penerima manfaat.
                </span>

            </div>

        </div>

    </div>

</section>

{{-- =========================
     NEWS & ACTIVITIES
========================= --}}

<section class="news-home section-padding">

    <div class="container">

        <div class="news-home-heading">

            <div>

                <span class="section-label">
                    INFORMASI TERBARU
                </span>

                <h2 class="section-title">
                    Ikuti Langkah dan 
                    <span>Kegiatan Kami.</span>
                </h2>

            </div>


            <div class="news-home-description">

                <p>
                    Temukan berbagai informasi terbaru mengenai program, kegiatan sosial, pelatihan, 
                    pemberdayaan, kolaborasi, serta aktivitas Yayasan Pusaka di berbagai wilayah.
                    Setiap kegiatan menjadi bagian dari perjalanan kami untuk terus hadir dan memberikan manfaat bagi keluarga besar PT KAI.
                </p>

                <a href="{{ route('information.index') }}"
                   class="text-link">

                    Lihat Semua Informasi

                    <i class="bi bi-arrow-right"></i>

                </a>

            </div>

        </div>


        <div class="row g-4">

            {{-- =============================================
                 BERITA UTAMA
            ============================================== --}}
            <div class="col-lg-6">

                @if ($featuredNews)

                    <article class="news-featured-card">

                        <div class="news-featured-image">

                            @if ($featuredNews->thumbnail)

                                <img
                                    src="{{ asset(
                                        'storage/' . $featuredNews->thumbnail
                                    ) }}"
                                    alt="{{ $featuredNews->title }}"
                                >

                            @else

                                <div class="news-image-placeholder">
                                    <i class="bi bi-image"></i>
                                </div>

                            @endif


                            <div class="news-featured-overlay"></div>


                            <div class="news-category">

                                {{ strtoupper(
                                    $featuredNews->category ?: 'BERITA'
                                ) }}

                            </div>

                        </div>


                        <div class="news-featured-content">

                            <div class="news-meta">

                                <span>

                                    <i class="bi bi-calendar3"></i>

                                    {{ $featuredNews->published_at
                                        ? $featuredNews->published_at
                                            ->translatedFormat('d F Y')
                                        : $featuredNews->created_at
                                            ->translatedFormat('d F Y')
                                    }}

                                </span>


                                <span>

                                    <i class="bi bi-tag"></i>

                                    {{ $featuredNews->category ?: 'Umum' }}

                                </span>

                            </div>


                            <h3>
                                {{ $featuredNews->title }}
                            </h3>


                            <p>
                                {{ $featuredNews->excerpt
                                    ?: \Illuminate\Support\Str::limit(
                                        strip_tags($featuredNews->content),
                                        180
                                    )
                                }}
                            </p>


                            <a
                                href="{{ route(
                                    'information.news.show',
                                    $featuredNews->slug
                                ) }}"
                                class="news-read-link"
                            >

                                Baca Selengkapnya

                                <i class="bi bi-arrow-up-right"></i>

                            </a>

                        </div>

                    </article>


                @elseif ($latestActivities->count())

                    @php
                        $featuredActivity = $latestActivities->first();
                    @endphp

                    <article class="news-featured-card">

                        <div class="news-featured-image">

                            @if ($featuredActivity->thumbnail)

                                <img
                                    src="{{ asset(
                                        'storage/' . $featuredActivity->thumbnail
                                    ) }}"
                                    alt="{{ $featuredActivity->title }}"
                                >

                            @else

                                <div class="news-image-placeholder">
                                    <i class="bi bi-image"></i>
                                </div>

                            @endif


                            <div class="news-featured-overlay"></div>


                            <div class="news-category">
                                KEGIATAN
                            </div>

                        </div>


                        <div class="news-featured-content">

                            <div class="news-meta">

                                <span>

                                    <i class="bi bi-calendar3"></i>

                                    {{ $featuredActivity->activity_date
                                        ? $featuredActivity->activity_date
                                            ->translatedFormat('d F Y')
                                        : '-'
                                    }}

                                </span>


                                <span>

                                    <i class="bi bi-geo-alt"></i>

                                    {{ $featuredActivity->location ?: '-' }}

                                </span>

                            </div>


                            <h3>
                                {{ $featuredActivity->title }}
                            </h3>


                            <p>
                                {{ $featuredActivity->excerpt
                                    ?: \Illuminate\Support\Str::limit(
                                        strip_tags($featuredActivity->content),
                                        180
                                    )
                                }}
                            </p>


                            <a
                                href="{{ route(
                                    'information.activities.show',
                                    $featuredActivity->slug
                                ) }}"
                                class="news-read-link"
                            >

                                Lihat Kegiatan

                                <i class="bi bi-arrow-up-right"></i>

                            </a>

                        </div>

                    </article>


                @else

                    <div class="admin-empty-state">

                        <div class="admin-empty-icon">
                            <i class="bi bi-newspaper"></i>
                        </div>

                        <h4>
                            Belum Ada Informasi
                        </h4>

                        <p>
                            Berita dan kegiatan terbaru akan tampil di sini.
                        </p>

                    </div>

                @endif

            </div>


            {{-- =============================================
                 BERITA & KEGIATAN TERBARU
            ============================================== --}}
            <div class="col-lg-6">

                <div class="news-list">

                    {{-- BERITA TERBARU --}}
                    @foreach ($latestNews as $item)

                        <article class="news-list-card">

                            <div class="news-list-image">

                                @if ($item->thumbnail)

                                    <img
                                        src="{{ asset(
                                            'storage/' . $item->thumbnail
                                        ) }}"
                                        alt="{{ $item->title }}"
                                    >

                                @else

                                    <div class="news-image-placeholder">
                                        <i class="bi bi-image"></i>
                                    </div>

                                @endif

                            </div>


                            <div class="news-list-content">

                                <span class="news-list-category">

                                    {{ strtoupper(
                                        $item->category ?: 'BERITA'
                                    ) }}

                                </span>


                                <div class="news-list-date">

                                    <i class="bi bi-calendar3"></i>

                                    {{ $item->published_at
                                        ? $item->published_at
                                            ->translatedFormat('d M Y')
                                        : $item->created_at
                                            ->translatedFormat('d M Y')
                                    }}

                                </div>


                                <h4>
                                    {{ $item->title }}
                                </h4>


                                <a href="{{ route(
                                    'information.news.show',
                                    $item->slug
                                ) }}">

                                    Selengkapnya

                                    <i class="bi bi-arrow-right"></i>

                                </a>

                            </div>

                        </article>

                    @endforeach


                    {{-- KEGIATAN TERBARU --}}
                    @foreach ($latestActivities->take(2) as $activity)

                        <article class="news-list-card">

                            <div class="news-list-image">

                                @if ($activity->thumbnail)

                                    <img
                                        src="{{ asset(
                                            'storage/' . $activity->thumbnail
                                        ) }}"
                                        alt="{{ $activity->title }}"
                                    >

                                @else

                                    <div class="news-image-placeholder">
                                        <i class="bi bi-image"></i>
                                    </div>

                                @endif

                            </div>


                            <div class="news-list-content">

                                <span class="news-list-category">
                                    KEGIATAN
                                </span>


                                <div class="news-list-date">

                                    <i class="bi bi-calendar3"></i>

                                    {{ $activity->activity_date
                                        ? $activity->activity_date
                                            ->translatedFormat('d M Y')
                                        : '-'
                                    }}

                                </div>


                                <h4>
                                    {{ $activity->title }}
                                </h4>


                                <a href="{{ route(
                                    'information.activities.show',
                                    $activity->slug
                                ) }}">

                                    Selengkapnya

                                    <i class="bi bi-arrow-right"></i>

                                </a>

                            </div>

                        </article>

                    @endforeach

                </div>

            </div>

        </div>

    </div>

</section>

{{-- =========================
     PARTNERS
========================= --}}

<section class="partners-home section-padding">

    <div class="container">

        {{-- HEADING --}}
        <div class="partners-heading text-center">

            <span class="section-label">
                MITRA & KOLABORASI
            </span>

            <h2 class="section-title">
                Bersama, Manfaat Dapat 
                <span>Menjangkau Lebih Jauh.</span>
            </h2>

            <p>
                Kami percaya bahwa dampak yang besar tidak dibangun sendiri.
                Yayasan Pusaka terbuka untuk berkolaborasi dengan PT Kereta Api Indonesia (Persero), 
                anak perusahaan, instansi, perusahaan, lembaga pendidikan, komunitas, organisasi sosial, serta berbagai pihak yang memiliki semangat kepedulian yang sama.
                Melalui kolaborasi, kami ingin menghadirkan lebih banyak kesempatan dan manfaat bagi mereka yang membutuhkan.
            </p>

        </div>


        {{-- LOGO AREA --}}
        <div class="partners-logo-wrapper">

            @if ($partners->count())

                <div class="row g-3 justify-content-center">

                    @foreach ($partners as $partner)

                        <div class="col-6 col-md-4 col-lg-2">

                            @if ($partner->website)

                                <a
                                    href="{{ $partner->website }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    title="{{ $partner->name }}"
                                >

                            @endif


                            <div class="partner-logo-card">

                                @if ($partner->logo)

                                    <img
                                        src="{{ asset('storage/' . $partner->logo) }}"
                                        alt="{{ $partner->name }}"
                                    >

                                @else

                                    <div class="partner-logo-placeholder">

                                        <i class="bi bi-building"></i>

                                        <span>
                                            {{ $partner->name }}
                                        </span>

                                    </div>

                                @endif

                            </div>


                            @if ($partner->website)

                                </a>

                            @endif

                        </div>

                    @endforeach

                </div>

            @else

                <div class="text-center">

                    <p>
                        Informasi mitra Yayasan Pusaka sedang diperbarui.
                    </p>

                </div>

            @endif

        </div>


        {{-- COLLABORATION BOX --}}
        <div class="collaboration-box">

            <div class="collaboration-icon">

                <i class="bi bi-people-fill"></i>

            </div>


            <div class="collaboration-content">

                <span>
                    MARI BERKOLABORASI
                </span>

                <h3>
                    Mari Tumbuh dan 
                    Memberikan Dampak Bersama
                </h3>

                <p>
                    Kolaborasi dapat dimulai dari berbagai bentuk: dukungan program sosial, 
                    pendidikan, pelatihan keterampilan, pemberdayaan UMKM, hingga pengembangan 
                    program baru yang sesuai dengan kebutuhan penerima manfaat.
                    Mari bersama-sama mengubah kepedulian menjadi manfaat yang nyata.
                </p>

            </div>


            <div class="collaboration-action">

                <a href="{{ route('contact') }}"
                   class="btn-collaboration">

                    Ajukan Kerja Sama

                    <i class="bi bi-arrow-right"></i>

                </a>

                <a href="{{ route('partners') }}"
                   class="collaboration-secondary">

                    Lihat Mitra Kami

                </a>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     IMPACT STORIES
========================= --}}

<section class="impact-stories section-padding">

    <div class="container">

        <div class="impact-stories-heading">

            <div>
                <span class="section-label">
                    CERITA DAMPAK
                </span>

                <h2 class="section-title">
                    Setiap Bantuan 
                    Memiliki <span>Cerita.</span>
                </h2>
            </div>

            <div class="impact-stories-description">
                <p>
                    Di balik setiap program terdapat perjalanan, perjuangan, dan harapan para penerima manfaat.
                    Kami percaya bahwa bantuan yang tepat tidak hanya membantu seseorang melewati hari ini, 
                    tetapi juga dapat membuka jalan menuju masa depan yang lebih baik.
                </p>

                <a href="{{ route('impact') }}"
                   class="text-link">

                    Lihat Semua Cerita

                    <i class="bi bi-arrow-right"></i>

                </a>
            </div>

        </div>


        <div class="row g-4 align-items-stretch">

            {{-- FEATURED STORY --}}
            <div class="col-lg-7">

                <article class="impact-story-featured">

                    <div class="impact-story-image">

                        <img
                            src="{{ asset('images/story-featured.jpg') }}"
                            alt="Cerita penerima manfaat Yayasan Pusaka"
                        >

                        <div class="impact-story-overlay"></div>

                        <div class="impact-story-category">
                            Pendidikan
                        </div>

                    </div>


                    <div class="impact-story-content">

                        <span class="impact-story-label">
                            CERITA PENERIMA MANFAAT
                        </span>

                        <h3>
                            Dukungan yang Membuka Jalan
                            Menuju Masa Depan Lebih Baik
                        </h3>

                        <p>
                            Program Yayasan Pusaka hadir bukan hanya melalui
                            bantuan, tetapi juga pendampingan dan kesempatan
                            bagi penerima manfaat untuk terus berkembang.
                        </p>

                        <a href="{{ route('impact') }}"
                           class="impact-story-link">

                            Baca Cerita

                            <i class="bi bi-arrow-up-right"></i>

                        </a>

                    </div>

                </article>

            </div>


            {{-- SIDE STORIES --}}
            <div class="col-lg-5">

                <div class="impact-story-list">

                    <article class="impact-story-small">

                        <div class="impact-story-small-image">

                            <img
                                src="{{ asset('images/story-2.jpg') }}"
                                alt="Program pemberdayaan Yayasan Pusaka"
                            >

                        </div>

                        <div class="impact-story-small-content">

                            <span>
                                PEMBERDAYAAN
                            </span>

                            <h4>
                                Dari Pelatihan Menjadi
                                Peluang untuk Mandiri
                            </h4>

                            <a href="{{ route('impact') }}">
                                Baca Selengkapnya
                                <i class="bi bi-arrow-right"></i>
                            </a>

                        </div>

                    </article>


                    <article class="impact-story-small">

                        <div class="impact-story-small-image">

                            <img
                                src="{{ asset('images/story-3.jpg') }}"
                                alt="Program sosial Yayasan Pusaka"
                            >

                        </div>

                        <div class="impact-story-small-content">

                            <span>
                                SOSIAL
                            </span>

                            <h4>
                                Kepedulian yang Hadir
                                di Saat Dibutuhkan
                            </h4>

                            <a href="{{ route('impact') }}">
                                Baca Selengkapnya
                                <i class="bi bi-arrow-right"></i>
                            </a>

                        </div>

                    </article>


                    <div class="impact-story-quote">

                        <div class="impact-story-quote-icon">
                            <i class="bi bi-quote"></i>
                        </div>

                        <p>
                            “Kami percaya bahwa setiap bentuk kepedulian
                            dapat menjadi awal dari perubahan yang lebih besar.”
                        </p>

                        <span>
                            Yayasan Pusaka
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

{{-- =========================
     DONATION CTA
========================= --}}

<section class="donation-cta">

    <div class="container">

        <div class="donation-cta-wrapper">

            <div class="donation-cta-content">

                <span class="donation-cta-label">
                    BERBAGI KEBAIKAN
                </span>

                <h2>
                    Dari Kepedulian Anda, 
                    Tumbuh <span>Harapan Mereka.</span>
                </h2>

                <p>
                    Setiap dukungan memiliki arti.
                    Donasi yang diberikan membantu Yayasan Pusaka menjalankan berbagai 
                    program pendidikan, sosial, pemberdayaan, dan pengembangan bagi penerima manfaat.
                    Bersama, kita dapat membuka lebih banyak kesempatan bagi anak-anak untuk melanjutkan pendidikan, 
                    membantu keluarga menjadi lebih mandiri, serta menghadirkan kepedulian bagi para pensiunan yang membutuhkan.
                </p>

                <div class="donation-cta-actions">

                    <a href="{{ route('donation') }}"
                       class="donation-primary-btn">

                        <i class="bi bi-heart-fill"></i>

                        Donasi Sekarang

                    </a>

                    <a href="{{ route('programs.index') }}"
                       class="donation-secondary-btn">

                        Lihat Program

                        <i class="bi bi-arrow-right"></i>

                    </a>

                </div>

            </div>


            <div class="donation-cta-visual">

                <div class="donation-circle donation-circle-one"></div>
                <div class="donation-circle donation-circle-two"></div>

                <div class="donation-heart">

                    <i class="bi bi-heart-fill"></i>

                </div>

                <div class="donation-floating-card">

                    <span>
                        Bersama
                    </span>

                    <strong>
                        Kita Hadirkan Manfaat
                    </strong>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection