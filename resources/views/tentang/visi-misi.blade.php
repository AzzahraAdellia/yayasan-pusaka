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
                VISI & MISI
            </span>

            <h1>
                Arah dan Komitmen,
                <span>Yayasan Pusaka.</span>
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
     TUJUAN
========================= --}}

<section class="vision-principle">

    <div class="container">

        <div class="vision-principle-wrapper">

            <div class="vision-principle-icon">
                <i class="bi bi-compass-fill"></i>
            </div>

            <div>

                {{-- <span>
                    ARAH KAMI
                </span> --}}

                <h2>
                    TUJUAN
                    <strong>KAMI.</strong>
                </h2>

                <p>
                    Fokus pada peningkatan kesejahteraan karyawan, dan pensiunan, keluarga mereka, 
                    dan juga produktivitas yayasan sebagai institusi sosial.
                </p>

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
                    Menjadi yayasan yang
                    <strong>amanah, peduli, dan profesional</strong>
                    dalam penyelenggaraan kegiatan sosial dan kemanusiaan di lingkungan PT. KAI.
                </h2>

                {{-- <p>
                    Visi ini menjadi arah dalam membangun program yang
                    tidak hanya memberikan bantuan, tetapi juga membuka
                    kesempatan untuk berkembang dan mandiri.
                </p> --}}

            </div>

        </div>

    </div>

</section>

{{-- =========================
     MISSION
========================= --}}

<section class="vision-main section-padding">

    <div class="container">

        <div class="vision-main-wrapper">

            <div class="vision-icon">

                <i class="bi bi-eye-fill"></i>

            </div>


            <div class="vision-main-content">

                <span>
                    MISI
                </span>

                <h2>
                    Memberikan
                    <strong>pelayanan sosial & kemanusiaan</strong>
                    kepada pegawai dan pensiunan PT. KAI beserta keluarganya.
                </h2>

                {{-- <p>
                    Visi ini menjadi arah dalam membangun program yang
                    tidak hanya memberikan bantuan, tetapi juga membuka
                    kesempatan untuk berkembang dan mandiri.
                </p> --}}

            </div>

        </div>

    </div>

</section>

@endsection