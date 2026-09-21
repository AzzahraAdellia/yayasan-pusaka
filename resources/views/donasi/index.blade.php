
@extends('layouts.app')

@section('title', 'Donasi | Yayasan Pusaka')

@section('content')

{{-- =====================================
     PAGE HERO
===================================== --}}

<section class="donation-page-hero">

    <div class="container">

        <div class="donation-page-hero-content">

            <span class="section-label">
                DONASI
            </span>

            <h1>
                Berbagi Kebaikan,
                <span>Menghadirkan Manfaat.</span>
            </h1>

            <p>
                Dukungan Anda membantu Yayasan Pusaka menjalankan
                berbagai program sosial, pendidikan, pemberdayaan,
                dan pengembangan bagi penerima manfaat.
            </p>

            <div class="profile-breadcrumb">

                <a href="{{ route('home') }}">
                    Beranda
                </a>

                <i class="bi bi-chevron-right"></i>

                <span>Donasi</span>

            </div>

        </div>

    </div>

</section>


{{-- =====================================
     PENGANTAR DONASI
===================================== --}}

<section class="donation-page-intro section-padding">

    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-5">

                <span class="section-label">
                    BERBAGI MANFAAT
                </span>

                <h2 class="section-title">
                    Setiap Dukungan
                    <span>Memiliki Arti.</span>
                </h2>

            </div>

            <div class="col-lg-7">

                <p class="section-description">
                    Donasi menjadi salah satu bentuk partisipasi
                    masyarakat dalam mendukung keberlanjutan
                    program Yayasan Pusaka.
                </p>

                <p class="section-description">
                    Anda dapat menyalurkan donasi dengan memindai
                    QRIS resmi Yayasan Pusaka menggunakan aplikasi
                    pembayaran yang mendukung QRIS.
                </p>

            </div>

        </div>

    </div>

</section>


{{-- =====================================
     DONASI MELALUI QRIS
===================================== --}}

<section class="donation-form-section section-padding">

    <div class="container">

        <div class="donation-qris-card">

            <span class="section-label">
                DONASI MELALUI QRIS
            </span>

            <h2>
                Scan QRIS untuk
                <span>Berdonasi.</span>
            </h2>

            <p class="donation-qris-description">
                Buka aplikasi pembayaran yang mendukung QRIS,
                lalu pindai kode berikut untuk menyalurkan
                donasi kepada Yayasan Pusaka.
            </p>

            <div class="donation-qris-image">

                <img
                    src="{{ asset('images/qris-yp.png') }}"
                    alt="QRIS Donasi Yayasan Pusaka"
                    loading="lazy"
                >

            </div>

            <div class="donation-qris-steps">

                <div class="donation-qris-step">

                    <span class="donation-qris-step-number">
                        1
                    </span>

                    <p>
                        Buka aplikasi bank atau dompet digital
                        yang mendukung QRIS.
                    </p>

                </div>

                <div class="donation-qris-step">

                    <span class="donation-qris-step-number">
                        2
                    </span>

                    <p>
                        Pindai QRIS Yayasan Pusaka dan
                        masukkan nominal donasi.
                    </p>

                </div>

                <div class="donation-qris-step">

                    <span class="donation-qris-step-number">
                        3
                    </span>

                    <p>
                        Periksa identitas penerima,
                        lalu selesaikan pembayaran.
                    </p>

                </div>

            </div>

            <p class="donation-qris-note">
                Pastikan nama penerima pembayaran sesuai
                dengan identitas resmi Yayasan Pusaka
                sebelum menyelesaikan donasi.
            </p>

        </div>


        {{-- =====================================
             KOMITMEN KAMI
        ===================================== --}}

        <div class="donation-commitment-wrapper">

            <div class="donation-side-card">

                <div class="donation-side-icon">
                    <i class="bi bi-shield-check"></i>
                </div>

                <span>
                    KOMITMEN KAMI
                </span>

                <h3>
                    Dukungan Anda Kami Jaga
                    dengan Tanggung Jawab.
                </h3>

                <p>
                    Yayasan Pusaka berkomitmen mengelola
                    setiap dukungan secara tertib dan
                    sesuai tujuan program.
                </p>

                <div class="donation-side-points">

                    <div>

                        <i class="bi bi-check-circle-fill"></i>

                        <span>
                            Digunakan untuk mendukung
                            program yayasan
                        </span>

                    </div>

                    <div>

                        <i class="bi bi-check-circle-fill"></i>

                        <span>
                            Dikelola secara bertanggung jawab
                        </span>

                    </div>

                    <div>

                        <i class="bi bi-check-circle-fill"></i>

                        <span>
                            Informasi program tersedia
                            secara terbuka
                        </span>

                    </div>

                </div>

                <div class="donation-side-help">

                    <span>
                        Butuh bantuan mengenai donasi?
                    </span>

                    <a href="{{ route('contact') }}">

                        Hubungi Kami

                        <i class="bi bi-arrow-right"></i>

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =====================================
     PROGRAM YANG DIDUKUNG
===================================== --}}

<section class="donation-impact-section section-padding">

    <div class="container">

        <div class="donation-impact-heading text-center">

            <span class="section-label">
                DUKUNGAN ANDA
            </span>

            <h2 class="section-title">
                Berkontribusi pada
                <span>Berbagai Program.</span>
            </h2>

            <p>
                Donasi dapat membantu berbagai bidang
                program Yayasan Pusaka.
            </p>

        </div>


        <div class="row g-4">

            {{-- PENDIDIKAN --}}

            <div class="col-md-6 col-lg-3">

                <div class="donation-impact-card">

                    <div class="donation-impact-icon blue">
                        <i class="bi bi-mortarboard-fill"></i>
                    </div>

                    <h3>Pendidikan</h3>

                    <p>
                        Membantu keberlanjutan pendidikan
                        penerima manfaat.
                    </p>

                </div>

            </div>


            {{-- SOSIAL --}}

            <div class="col-md-6 col-lg-3">

                <div class="donation-impact-card">

                    <div class="donation-impact-icon orange">
                        <i class="bi bi-heart-fill"></i>
                    </div>

                    <h3>Sosial</h3>

                    <p>
                        Mendukung program sosial
                        dan kemanusiaan.
                    </p>

                </div>

            </div>


            {{-- PEMBERDAYAAN --}}

            <div class="col-md-6 col-lg-3">

                <div class="donation-impact-card">

                    <div class="donation-impact-icon blue">
                        <i class="bi bi-shop"></i>
                    </div>

                    <h3>Pemberdayaan</h3>

                    <p>
                        Mendukung pengembangan potensi
                        dan kemandirian.
                    </p>

                </div>

            </div>


            {{-- PELATIHAN --}}

            <div class="col-md-6 col-lg-3">

                <div class="donation-impact-card">

                    <div class="donation-impact-icon orange">
                        <i class="bi bi-lightbulb-fill"></i>
                    </div>

                    <h3>Pelatihan</h3>

                    <p>
                        Membantu meningkatkan keterampilan
                        penerima manfaat.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection