@extends('layouts.app')

@section('title', 'Visi & Misi | Yayasan Pusaka')

@section('content')

{{-- =========================
     PAGE HERO
========================= --}}

<section class="vision-hero">

    <div class="container">

        <div class="vision-hero-content">

            <span class="section-label">
                TENTANG KAMI
            </span>

            <h1>
                Visi yang Mengarahkan,
                <span>Misi yang Menggerakkan.</span>
            </h1>

            <p>
                Visi dan misi menjadi landasan Yayasan Pusaka dalam
                menjalankan setiap program, membangun kolaborasi,
                serta menghadirkan manfaat yang berkelanjutan.
            </p>

            <div class="profile-breadcrumb">

                <a href="{{ route('home') }}">
                    Beranda
                </a>

                <i class="bi bi-chevron-right"></i>

                <span>
                    Visi & Misi
                </span>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     VISION
========================= --}}

<section class="vision-main section-padding">

    <div class="container">

        <div class="vision-main-wrapper">

            <div class="vision-icon">

                <i class="bi bi-eye-fill"></i>

            </div>


            <div class="vision-main-content">

                <span>
                    VISI
                </span>

                <h2>
                    Menjadi yayasan sosial yang
                    <strong>peduli, berdaya, dan berdampak</strong>
                    bagi penerima manfaat serta masyarakat.
                </h2>

                <p>
                    Visi ini menjadi arah dalam membangun program yang
                    tidak hanya memberikan bantuan, tetapi juga membuka
                    kesempatan untuk berkembang dan mandiri.
                </p>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     MISSION
========================= --}}

<section class="mission-section section-padding">

    <div class="container">

        <div class="mission-heading text-center">

            <span class="section-label">
                MISI KAMI
            </span>

            <h2 class="section-title">
                Langkah Nyata untuk
                <span>Mewujudkan Visi.</span>
            </h2>

            <p>
                Misi Yayasan Pusaka diwujudkan melalui program,
                pendampingan, kolaborasi, dan pengembangan yang
                berorientasi pada kebutuhan penerima manfaat.
            </p>

        </div>


        <div class="row g-4">

            {{-- MISSION 1 --}}
            <div class="col-md-6 col-lg-4">

                <div class="mission-card">

                    <div class="mission-number">
                        01
                    </div>

                    <div class="mission-icon blue">
                        <i class="bi bi-mortarboard-fill"></i>
                    </div>

                    <h3>
                        Mendukung Pendidikan
                    </h3>

                    <p>
                        Memberikan dukungan pendidikan yang membantu
                        penerima manfaat memperoleh kesempatan belajar
                        dan berkembang secara berkelanjutan.
                    </p>

                </div>

            </div>


            {{-- MISSION 2 --}}
            <div class="col-md-6 col-lg-4">

                <div class="mission-card">

                    <div class="mission-number">
                        02
                    </div>

                    <div class="mission-icon orange">
                        <i class="bi bi-heart-fill"></i>
                    </div>

                    <h3>
                        Memperkuat Kepedulian Sosial
                    </h3>

                    <p>
                        Menghadirkan program sosial dan kemanusiaan
                        yang responsif terhadap kebutuhan penerima manfaat
                        dan lingkungan sekitar.
                    </p>

                </div>

            </div>


            {{-- MISSION 3 --}}
            <div class="col-md-6 col-lg-4">

                <div class="mission-card">

                    <div class="mission-number">
                        03
                    </div>

                    <div class="mission-icon blue">
                        <i class="bi bi-people-fill"></i>
                    </div>

                    <h3>
                        Mendorong Pemberdayaan
                    </h3>

                    <p>
                        Membantu penerima manfaat mengembangkan potensi,
                        keterampilan, dan kemandirian melalui berbagai
                        program pemberdayaan.
                    </p>

                </div>

            </div>


            {{-- MISSION 4 --}}
            <div class="col-md-6 col-lg-4">

                <div class="mission-card">

                    <div class="mission-number">
                        04
                    </div>

                    <div class="mission-icon orange">
                        <i class="bi bi-lightbulb-fill"></i>
                    </div>

                    <h3>
                        Mengembangkan Kompetensi
                    </h3>

                    <p>
                        Menyelenggarakan pelatihan dan pengembangan
                        yang meningkatkan keterampilan serta kesiapan
                        menghadapi berbagai peluang.
                    </p>

                </div>

            </div>


            {{-- MISSION 5 --}}
            <div class="col-md-6 col-lg-4">

                <div class="mission-card">

                    <div class="mission-number">
                        05
                    </div>

                    <div class="mission-icon blue">
                        <i class="bi bi-diagram-3-fill"></i>
                    </div>

                    <h3>
                        Membangun Kolaborasi
                    </h3>

                    <p>
                        Menjalin kerja sama dengan berbagai pihak untuk
                        memperluas jangkauan dan meningkatkan kualitas
                        program sosial Yayasan Pusaka.
                    </p>

                </div>

            </div>


            {{-- MISSION 6 --}}
            <div class="col-md-6 col-lg-4">

                <div class="mission-card">

                    <div class="mission-number">
                        06
                    </div>

                    <div class="mission-icon orange">
                        <i class="bi bi-graph-up-arrow"></i>
                    </div>

                    <h3>
                        Menciptakan Dampak Berkelanjutan
                    </h3>

                    <p>
                        Mengembangkan program yang terukur, relevan,
                        dan berkelanjutan sehingga manfaat dapat terus
                        dirasakan dalam jangka panjang.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     PRINCIPLE
========================= --}}

<section class="vision-principle">

    <div class="container">

        <div class="vision-principle-wrapper">

            <div class="vision-principle-icon">
                <i class="bi bi-compass-fill"></i>
            </div>

            <div>

                <span>
                    ARAH KAMI
                </span>

                <h2>
                    Setiap Program Berangkat dari
                    <strong>Kebutuhan dan Dampak.</strong>
                </h2>

                <p>
                    Visi dan misi Yayasan Pusaka menjadi dasar
                    dalam menentukan arah program, prioritas penerima
                    manfaat, serta bentuk kolaborasi yang dijalankan.
                </p>

            </div>

        </div>

    </div>

</section>

@endsection