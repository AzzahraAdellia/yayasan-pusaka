@extends('layouts.app')

@section('title', 'Donasi | Yayasan Pusaka')

@section('content')

{{-- =========================
     PAGE HERO
========================= --}}

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

                <span>
                    Donasi
                </span>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     INTRO
========================= --}}

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
                    Donasi menjadi salah satu bentuk partisipasi masyarakat
                    dalam mendukung keberlanjutan program Yayasan Pusaka.
                </p>

                <p class="section-description">
                    Dana yang diterima akan digunakan sesuai dengan
                    program dan kebutuhan penerima manfaat serta dikelola
                    secara bertanggung jawab.
                </p>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     DONATION FORM
========================= --}}

<section class="donation-form-section section-padding">

    <div class="container">

        <div class="row g-5 align-items-start">

            <div class="col-lg-7">

                <div class="donation-form-card">

                    <span class="section-label">
                        FORM DONASI
                    </span>

                    <h2>
                        Pilih Bentuk
                        <span>Dukungan Anda.</span>
                    </h2>

                    <p class="donation-form-description">
                        Untuk sekarang formulir ini masih berupa tampilan.
                        Nantinya dapat dihubungkan dengan metode pembayaran
                        yang digunakan Yayasan Pusaka.
                    </p>


                    <form action="#" method="POST">

                        {{-- PROGRAM --}}
                        <div class="donation-form-group">

                            <label>
                                Tujuan Donasi
                            </label>

                            <div class="donation-program-options">

                                <label class="donation-option-card">

                                    <input
                                        type="radio"
                                        name="program"
                                        value="umum"
                                        checked
                                    >

                                    <span class="donation-option-icon blue">
                                        <i class="bi bi-heart-fill"></i>
                                    </span>

                                    <strong>
                                        Donasi Umum
                                    </strong>

                                    <small>
                                        Digunakan sesuai prioritas kebutuhan.
                                    </small>

                                </label>


                                <label class="donation-option-card">

                                    <input
                                        type="radio"
                                        name="program"
                                        value="pendidikan"
                                    >

                                    <span class="donation-option-icon orange">
                                        <i class="bi bi-mortarboard-fill"></i>
                                    </span>

                                    <strong>
                                        Pendidikan
                                    </strong>

                                    <small>
                                        Mendukung program pendidikan.
                                    </small>

                                </label>


                                <label class="donation-option-card">

                                    <input
                                        type="radio"
                                        name="program"
                                        value="sosial"
                                    >

                                    <span class="donation-option-icon blue">
                                        <i class="bi bi-people-fill"></i>
                                    </span>

                                    <strong>
                                        Sosial
                                    </strong>

                                    <small>
                                        Mendukung kegiatan sosial.
                                    </small>

                                </label>

                            </div>

                        </div>


                        {{-- AMOUNT --}}
                        <div class="donation-form-group">

                            <label>
                                Nominal Donasi
                            </label>

                            <div class="donation-amount-options">

                                <button type="button">
                                    Rp50.000
                                </button>

                                <button type="button">
                                    Rp100.000
                                </button>

                                <button type="button">
                                    Rp250.000
                                </button>

                                <button type="button">
                                    Rp500.000
                                </button>

                            </div>


                            <div class="donation-custom-amount">

                                <span>
                                    Rp
                                </span>

                                <input
                                    type="number"
                                    name="amount"
                                    placeholder="Nominal lainnya"
                                >

                            </div>

                        </div>


                        {{-- DONOR --}}
                        <div class="donation-form-group">

                            <label>
                                Informasi Donatur
                            </label>

                            <div class="row g-3">

                                <div class="col-md-6">

                                    <input
                                        type="text"
                                        name="name"
                                        class="contact-form-control"
                                        placeholder="Nama lengkap"
                                    >

                                </div>

                                <div class="col-md-6">

                                    <input
                                        type="email"
                                        name="email"
                                        class="contact-form-control"
                                        placeholder="Email"
                                    >

                                </div>

                                <div class="col-md-12">

                                    <input
                                        type="text"
                                        name="phone"
                                        class="contact-form-control"
                                        placeholder="Nomor telepon"
                                    >

                                </div>

                            </div>

                        </div>


                        <button
                            type="submit"
                            class="donation-submit-btn"
                        >

                            <i class="bi bi-heart-fill"></i>

                            Lanjutkan Donasi

                        </button>

                    </form>

                </div>

            </div>


            <div class="col-lg-5">

                <div class="donation-side-card">

                    <div class="donation-side-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>

                    <span>
                        KOMITMEN KAMI
                    </span>

                    <h3>
                        Dukungan Anda Kami Jaga dengan Tanggung Jawab.
                    </h3>

                    <p>
                        Yayasan Pusaka berkomitmen mengelola setiap dukungan
                        secara tertib dan sesuai tujuan program.
                    </p>


                    <div class="donation-side-points">

                        <div>

                            <i class="bi bi-check-circle-fill"></i>

                            <span>
                                Digunakan untuk mendukung program yayasan
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
                                Informasi program tersedia secara terbuka
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

    </div>

</section>


{{-- =========================
     DONATION IMPACT
========================= --}}

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
                Donasi dapat membantu berbagai bidang program
                Yayasan Pusaka.
            </p>

        </div>


        <div class="row g-4">

            <div class="col-md-6 col-lg-3">

                <div class="donation-impact-card">

                    <div class="donation-impact-icon blue">
                        <i class="bi bi-mortarboard-fill"></i>
                    </div>

                    <h3>
                        Pendidikan
                    </h3>

                    <p>
                        Membantu keberlanjutan pendidikan
                        penerima manfaat.
                    </p>

                </div>

            </div>


            <div class="col-md-6 col-lg-3">

                <div class="donation-impact-card">

                    <div class="donation-impact-icon orange">
                        <i class="bi bi-heart-fill"></i>
                    </div>

                    <h3>
                        Sosial
                    </h3>

                    <p>
                        Mendukung program sosial dan
                        kemanusiaan.
                    </p>

                </div>

            </div>


            <div class="col-md-6 col-lg-3">

                <div class="donation-impact-card">

                    <div class="donation-impact-icon blue">
                        <i class="bi bi-shop"></i>
                    </div>

                    <h3>
                        Pemberdayaan
                    </h3>

                    <p>
                        Mendukung pengembangan potensi
                        dan kemandirian.
                    </p>

                </div>

            </div>


            <div class="col-md-6 col-lg-3">

                <div class="donation-impact-card">

                    <div class="donation-impact-icon orange">
                        <i class="bi bi-lightbulb-fill"></i>
                    </div>

                    <h3>
                        Pelatihan
                    </h3>

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