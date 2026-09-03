@extends('layouts.app')

@section('title', 'Sejarah | Yayasan Pusaka')

@section('content')

{{-- =========================
     PAGE HERO
========================= --}}

<section class="history-hero">

    <div class="container">

        <div class="history-hero-content">

            <span class="section-label">
                TENTANG KAMI
            </span>

            <h1>
                Perjalanan <span>Yayasan Pusaka.</span>
            </h1>

            <p>
                Dari sebuah kepedulian yang sederhana, Yayasan Pusaka terus
                berkembang melalui berbagai program sosial, pendidikan,
                pemberdayaan, dan pengembangan bagi para penerima manfaat.
            </p>

            <div class="profile-breadcrumb">

                <a href="{{ route('home') }}">
                    Beranda
                </a>

                <i class="bi bi-chevron-right"></i>

                <span>
                    Sejarah
                </span>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     HISTORY INTRO
========================= --}}

<section class="history-intro section-padding">

    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-5">

                <span class="section-label">
                    AWAL PERJALANAN
                </span>

                <h2 class="section-title">
                    Berawal dari Kepedulian,
                    Tumbuh Menjadi <span>Gerakan Sosial.</span>
                </h2>

            </div>


            <div class="col-lg-7">

                <p class="section-description">
                    Yayasan Pusaka lahir dari semangat kepedulian untuk membantu
                    dan memberikan dukungan kepada mereka yang membutuhkan.
                    Seiring waktu, bentuk kepedulian tersebut berkembang menjadi
                    program yang lebih terstruktur dan berkelanjutan.
                </p>

                <p class="section-description">
                    Perjalanan Yayasan Pusaka terus berkembang melalui kolaborasi,
                    penguatan program, serta keterlibatan berbagai pihak yang
                    memiliki semangat yang sama untuk menciptakan manfaat nyata.
                </p>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     TIMELINE
========================= --}}

<section class="history-timeline-section">

    <div class="container">

        <div class="history-timeline-heading text-center">

            <span class="section-label">
                JEJAK PERJALANAN
            </span>

            <h2 class="section-title">
                Langkah demi Langkah,
                <span>Membangun Manfaat.</span>
            </h2>

            <p>
                Timeline ini nantinya bisa disesuaikan dengan tahun dan
                peristiwa resmi Yayasan Pusaka.
            </p>

        </div>


        <div class="history-timeline">

            {{-- ITEM 1 --}}
            <div class="history-item">

                <div class="history-year">
                    AWAL
                </div>

                <div class="history-dot"></div>

                <div class="history-card">

                    <span>
                        FASE AWAL
                    </span>

                    <h3>
                        Lahir dari Semangat Kepedulian
                    </h3>

                    <p>
                        Yayasan Pusaka mulai tumbuh dari kepedulian terhadap
                        kebutuhan sosial dan dukungan bagi penerima manfaat.
                    </p>

                </div>

            </div>


            {{-- ITEM 2 --}}
            <div class="history-item">

                <div class="history-year">
                    TUMBUH
                </div>

                <div class="history-dot orange"></div>

                <div class="history-card">

                    <span>
                        PENGEMBANGAN PROGRAM
                    </span>

                    <h3>
                        Program Mulai Berkembang
                    </h3>

                    <p>
                        Kegiatan sosial berkembang menjadi berbagai program
                        yang lebih terarah di bidang pendidikan, sosial,
                        pemberdayaan, dan pengembangan.
                    </p>

                </div>

            </div>


            {{-- ITEM 3 --}}
            <div class="history-item">

                <div class="history-year">
                    KOLABORASI
                </div>

                <div class="history-dot"></div>

                <div class="history-card">

                    <span>
                        MEMPERLUAS DAMPAK
                    </span>

                    <h3>
                        Membangun Kolaborasi dan Kemitraan
                    </h3>

                    <p>
                        Yayasan Pusaka memperluas jejaring dan membangun
                        kolaborasi dengan berbagai institusi, perusahaan,
                        komunitas, dan organisasi.
                    </p>

                </div>

            </div>


            {{-- ITEM 4 --}}
            <div class="history-item">

                <div class="history-year">
                    KINI
                </div>

                <div class="history-dot orange"></div>

                <div class="history-card">

                    <span>
                        BERKELANJUTAN
                    </span>

                    <h3>
                        Terus Bergerak untuk Manfaat yang Lebih Luas
                    </h3>

                    <p>
                        Yayasan Pusaka terus mengembangkan program dan sistem
                        yang lebih baik agar manfaat yang diberikan semakin
                        luas, terukur, dan berkelanjutan.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     CLOSING
========================= --}}

<section class="history-closing">

    <div class="container">

        <div class="history-closing-box">

            <div>

                <span>
                    PERJALANAN BERLANJUT
                </span>

                <h2>
                    Setiap Langkah Adalah Bagian dari
                    <strong>Manfaat yang Lebih Besar.</strong>
                </h2>

                <p>
                    Perjalanan Yayasan Pusaka terus berkembang bersama
                    penerima manfaat, mitra, dan seluruh pihak yang ikut
                    berkontribusi.
                </p>

            </div>


            <a href="{{ route('programs.index') }}"
               class="profile-commitment-btn">

                Lihat Program Kami

                <i class="bi bi-arrow-right"></i>

            </a>

        </div>

    </div>

</section>

@endsection