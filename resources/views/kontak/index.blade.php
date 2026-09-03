@extends('layouts.app')

@section('title', 'Kontak | Yayasan Pusaka')

@section('content')

{{-- =========================
     PAGE HERO
========================= --}}

<section class="contact-page-hero">

    <div class="container">

        <div class="contact-page-hero-content">

            <span class="section-label">
                KONTAK
            </span>

            <h1>
                Mari Terhubung dengan
                <span>Yayasan Pusaka.</span>
            </h1>

            <p>
                Hubungi kami untuk informasi program, kegiatan,
                kerja sama, donasi, maupun kebutuhan lainnya.
            </p>

            <div class="profile-breadcrumb">

                <a href="{{ route('home') }}">
                    Beranda
                </a>

                <i class="bi bi-chevron-right"></i>

                <span>
                    Kontak
                </span>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     CONTACT INFO
========================= --}}

<section class="contact-info-section section-padding">

    <div class="container">

        <div class="contact-info-heading text-center">

            <span class="section-label">
                HUBUNGI KAMI
            </span>

            <h2 class="section-title">
                Kami Siap
                <span>Mendengar Anda.</span>
            </h2>

            <p>
                Gunakan saluran berikut untuk terhubung dengan
                Yayasan Pusaka.
            </p>

        </div>


        <div class="row g-4">

            <div class="col-md-6 col-lg-3">

                <div class="contact-info-card">

                    <div class="contact-info-icon blue">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>

                    <span>
                        ALAMAT
                    </span>

                    <h3>
                        Kantor Yayasan Pusaka
                    </h3>

                    <p>
                        {{ $settings['address'] ?? 'Bandung, Jawa Barat' }}
                    </p>

                </div>

            </div>


            <div class="col-md-6 col-lg-3">

                <div class="contact-info-card">

                    <div class="contact-info-icon orange">
                        <i class="bi bi-envelope-fill"></i>
                    </div>

                    <span>
                        EMAIL
                    </span>

                    <h3>
                        Email Resmi
                    </h3>

                    <p>
                        {{ $settings['email'] ?? 'info@yayasanpusakakai.org' }}
                    </p>

                </div>

            </div>


            <div class="col-md-6 col-lg-3">

                <div class="contact-info-card">

                    <div class="contact-info-icon blue">
                        <i class="bi bi-telephone-fill"></i>
                    </div>

                    <span>
                        TELEPON
                    </span>

                    <h3>
                        Hubungi Kami
                    </h3>

                    <p>
                        {{ $settings['phone'] ?? 'Nomor telepon yayasan' }}
                    </p>

                </div>

            </div>


            <div class="col-md-6 col-lg-3">

                <div class="contact-info-card">

                    <div class="contact-info-icon orange">
                        <i class="bi bi-clock-fill"></i>
                    </div>

                    <span>
                        JAM OPERASIONAL
                    </span>

                    <p>
                        {{ $settings['operational_hours'] ?? 'Senin - Jumat, 08.00 - 17.00 WIB' }}
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     CONTACT FORM
========================= --}}

<section class="contact-form-section section-padding">

    <div class="container">

        <div class="row g-5 align-items-stretch">

            <div class="col-lg-7">

                <div class="contact-form-wrapper">

                    <span class="section-label">
                        KIRIM PESAN
                    </span>

                    <h2 class="section-title">
                        Ada yang Ingin
                        <span>Disampaikan?</span>
                    </h2>

                    <p class="contact-form-description">
                        Isi formulir berikut dan tim Yayasan Pusaka
                        akan menindaklanjuti pesan Anda.
                    </p>

                    @if (session('success'))

                        <div class="alert alert-success mb-4">

                            <i class="bi bi-check-circle-fill me-2"></i>

                            {{ session('success') }}

                        </div>

                    @endif


                    @if ($errors->any())

                        <div class="alert alert-danger mb-4">

                            <strong>
                                Pesan belum dapat dikirim.
                            </strong>

                            <ul class="mb-0 mt-2">

                                @foreach ($errors->all() as $error)

                                    <li>
                                        {{ $error }}
                                    </li>

                                @endforeach

                            </ul>

                        </div>

                    @endif

                    <form
                        action="{{ route('contact.store') }}"
                        method="POST"
                    >

                        @csrf

                        <div class="row g-3">

                            <div class="col-md-6">

                                <label for="name"
                                       class="contact-form-label">
                                    Nama Lengkap
                                </label>

                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    class="contact-form-control"
                                    value="{{ old('name') }}"
                                    placeholder="Masukkan nama lengkap"
                                    required
                                >

                            </div>


                            <div class="col-md-6">

                                <label for="email"
                                       class="contact-form-label">
                                    Email
                                </label>

                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    class="contact-form-control"
                                    value="{{ old('email') }}"
                                    placeholder="nama@email.com"
                                    required
                                >

                            </div>


                            <div class="col-md-6">

                                <label for="phone"
                                       class="contact-form-label">
                                    Nomor Telepon
                                </label>

                                <input
                                    type="text"
                                    id="phone"
                                    name="phone"
                                    class="contact-form-control"
                                    value="{{ old('phone') }}"
                                    placeholder="08xxxxxxxxxx"
                                >

                            </div>


                            <div class="col-md-6">

                                <label for="subject"
                                       class="contact-form-label">
                                    Keperluan
                                </label>

                                <select
                                    id="subject"
                                    name="subject"
                                    class="contact-form-control"
                                    required
                                >

                                    <option value="">
                                        Pilih keperluan
                                    </option>

                                    <option
                                        value="program"
                                        {{ old('subject') === 'program' ? 'selected' : '' }}
                                    >
                                        Informasi Program
                                    </option>

                                    <option
                                        value="partnership"
                                        {{ old('subject') === 'partnership' ? 'selected' : '' }}
                                    >
                                        Kerja Sama
                                    </option>

                                    <option
                                        value="donation"
                                        {{ old('subject') === 'donation' ? 'selected' : '' }}
                                    >
                                        Donasi
                                    </option>

                                    <option
                                        value="other"
                                        {{ old('subject') === 'other' ? 'selected' : '' }}
                                    >
                                        Lainnya
                                    </option>

                                </select>

                            </div>


                            <div class="col-12">

                                <label for="message"
                                       class="contact-form-label">
                                    Pesan
                                </label>

                                <textarea
                                    id="message"
                                    name="message"
                                    class="contact-form-control contact-textarea"
                                    placeholder="Tuliskan pesan Anda..."
                                    required
                                >{{ old('message') }}</textarea>

                            </div>


                            <div class="col-12">

                                <button
                                    type="submit"
                                    class="contact-submit-btn"
                                >

                                    Kirim Pesan

                                    <i class="bi bi-send-fill"></i>

                                </button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>


            <div class="col-lg-5">

                <div class="contact-side">

                    <div class="contact-side-top">

                        <span>
                            BUTUH INFORMASI?
                        </span>

                        <h3>
                            Kami Terbuka untuk Berbagai Pertanyaan.
                        </h3>

                        <p>
                            Jangan ragu menghubungi Yayasan Pusaka
                            untuk kebutuhan informasi maupun peluang
                            kolaborasi.
                        </p>

                    </div>


                    <div class="contact-side-item">

                        <div>
                            <i class="bi bi-chat-dots-fill"></i>
                        </div>

                        <section>

                            <strong>
                                Informasi Program
                            </strong>

                            <span>
                                Tanyakan detail program dan kegiatan.
                            </span>

                        </section>

                    </div>


                    <div class="contact-side-item">

                        <div>
                            <i class="bi bi-people-fill"></i>
                        </div>

                        <section>

                            <strong>
                                Kerja Sama
                            </strong>

                            <span>
                                Diskusikan peluang kolaborasi bersama kami.
                            </span>

                        </section>

                    </div>


                    <div class="contact-side-item">

                        <div>
                            <i class="bi bi-heart-fill"></i>
                        </div>

                        <section>

                            <strong>
                                Donasi
                            </strong>

                            <span>
                                Informasi mengenai kontribusi dan donasi.
                            </span>

                        </section>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     MAP
========================= --}}

<section class="contact-map-section">

    <div class="container">

        <div class="contact-map-heading">

            <div>

                <span class="section-label">
                    LOKASI KAMI
                </span>

                <h2 class="section-title">
                    Temukan
                    <span>Yayasan Pusaka.</span>
                </h2>

            </div>

        </div>


        @if (!empty($settings['maps_embed']))

            <div class="contact-map-embed">

                <iframe
                    src="{{ $settings['maps_embed'] }}"
                    width="100%"
                    height="450"
                    style="border:0;"
                    allowfullscreen
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="Lokasi Yayasan Pusaka"
                ></iframe>

            </div>

        @else

            <div class="contact-map-placeholder">

                <div class="contact-map-placeholder-icon">
                    <i class="bi bi-geo-alt-fill"></i>
                </div>

                <h3>
                    Google Maps
                </h3>

                <p>
                    Lokasi Yayasan Pusaka akan ditampilkan di sini.
                </p>

            </div>

        @endif

</section>

@endsection