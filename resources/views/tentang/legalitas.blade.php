@extends('layouts.app')

@section('title', 'Legalitas | Yayasan Pusaka')

@section('content')

{{-- =========================
     PAGE HERO
========================= --}}

<section class="legal-hero">

    <div class="container">

        <div class="legal-hero-content">

            <span class="section-label">
                TENTANG KAMI
            </span>

            <h1>
                Legalitas &
                <span>Dokumen Yayasan.</span>
            </h1>

            <p>
                Informasi legalitas dan dokumen resmi Yayasan Pusaka
                menjadi bagian dari komitmen kami dalam menjalankan
                organisasi secara tertib, transparan, dan akuntabel.
            </p>

            <div class="profile-breadcrumb">

                <a href="{{ route('home') }}">
                    Beranda
                </a>

                <i class="bi bi-chevron-right"></i>

                <span>
                    Legalitas
                </span>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     INTRO LEGAL
========================= --}}

<section class="legal-intro section-padding">

    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-5">

                <span class="section-label">
                    LEGALITAS YAYASAN
                </span>

                <h2 class="section-title">
                    Landasan yang Mendukung
                    <span>Tata Kelola Yayasan.</span>
                </h2>

            </div>


            <div class="col-lg-7">

                <p class="section-description">
                    Yayasan Pusaka menjalankan kegiatan organisasi
                    berdasarkan ketentuan dan dokumen legal yang berlaku.
                    Legalitas menjadi bagian penting dalam menjaga
                    kepercayaan, akuntabilitas, serta keberlanjutan
                    pelaksanaan program.
                </p>

                <p class="section-description">
                    Dokumen yang ditampilkan pada halaman ini hanya
                    merupakan informasi yang memang dapat dipublikasikan
                    kepada masyarakat.
                </p>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     LEGAL INFO
========================= --}}

<section class="legal-info-section section-padding">

    <div class="container">

        <div class="legal-info-heading text-center">

            <span class="section-label">
                INFORMASI LEGAL
            </span>

            <h2 class="section-title">
                Informasi Resmi
                <span>Yayasan Pusaka.</span>
            </h2>

            <p>
                Informasi berikut merupakan bagian dari identitas
                dan landasan legal Yayasan Pusaka.
            </p>

        </div>


        <div class="row g-4">

            {{-- NAMA YAYASAN --}}
            <div class="col-md-6 col-lg-4">

                <div class="legal-info-card">

                    <div class="legal-info-icon blue">
                        <i class="bi bi-building"></i>
                    </div>

                    <span>
                        NAMA BADAN HUKUM
                    </span>

                    <h3>
                        Yayasan Pusaka
                    </h3>

                    <p>
                        Nama resmi yayasan sesuai dengan dokumen pendirian.
                    </p>

                </div>

            </div>


            {{-- AKTA --}}
            <div class="col-md-6 col-lg-4">

                <div class="legal-info-card">

                    <div class="legal-info-icon orange">
                        <i class="bi bi-file-earmark-text-fill"></i>
                    </div>

                    <span>
                        AKTA PENDIRIAN
                    </span>

                    <h3>
                        Nomor Akta
                    </h3>

                    <p>
                        Nomor dan tanggal akta pendirian akan ditampilkan
                        sesuai dokumen resmi yayasan.
                    </p>

                </div>

            </div>


            {{-- SK --}}
            <div class="col-md-6 col-lg-4">

                <div class="legal-info-card">

                    <div class="legal-info-icon blue">
                        <i class="bi bi-patch-check-fill"></i>
                    </div>

                    <span>
                        PENGESAHAN
                    </span>

                    <h3>
                        SK Kementerian
                    </h3>

                    <p>
                        Informasi pengesahan badan hukum sesuai dengan
                        dokumen yang berlaku.
                    </p>

                </div>

            </div>


            {{-- NPWP --}}
            <div class="col-md-6 col-lg-4">

                <div class="legal-info-card">

                    <div class="legal-info-icon orange">
                        <i class="bi bi-card-text"></i>
                    </div>

                    <span>
                        PERPAJAKAN
                    </span>

                    <h3>
                        NPWP Yayasan
                    </h3>

                    <p>
                        Informasi perpajakan yayasan yang dapat
                        dipublikasikan.
                    </p>

                </div>

            </div>


            {{-- DOMISILI --}}
            <div class="col-md-6 col-lg-4">

                <div class="legal-info-card">

                    <div class="legal-info-icon blue">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>

                    <span>
                        DOMISILI
                    </span>

                    <h3>
                        Bandung
                    </h3>

                    <p>
                        Informasi alamat dan domisili resmi Yayasan Pusaka.
                    </p>

                </div>

            </div>


            {{-- STATUS --}}
            <div class="col-md-6 col-lg-4">

                <div class="legal-info-card">

                    <div class="legal-info-icon orange">
                        <i class="bi bi-shield-check"></i>
                    </div>

                    <span>
                        STATUS
                    </span>

                    <h3>
                        Badan Hukum Yayasan
                    </h3>

                    <p>
                        Status organisasi sesuai dengan peraturan
                        dan dokumen resmi yang berlaku.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     DOCUMENTS
========================= --}}

<section class="legal-documents section-padding">

    <div class="container">

        <div class="legal-documents-heading">

            <div>

                <span class="section-label">
                    DOKUMEN
                </span>

                <h2 class="section-title">
                    Dokumen Legal
                    <span>Yayasan.</span>
                </h2>

            </div>

            <p>
                Dokumen yang tersedia untuk publik dapat
                dilihat melalui halaman ini.
            </p>

        </div>


        <div class="legal-document-list">

            @forelse ($legalities as $legality)

                <div class="legal-document-item">

                    <div class="legal-document-left">

                        <div class="legal-document-icon">

                            @if (
                                $legality->file &&
                                strtolower(pathinfo(
                                    $legality->file,
                                    PATHINFO_EXTENSION
                                )) === 'pdf'
                            )

                                <i class="bi bi-file-earmark-pdf-fill"></i>

                            @else

                                <i class="bi bi-file-earmark-check-fill"></i>

                            @endif

                        </div>


                        <div>

                            <span>
                                DOKUMEN LEGAL
                            </span>

                            <h3>
                                {{ $legality->title }}
                            </h3>


                            @if ($legality->document_number)

                                <p>
                                    <strong>Nomor:</strong>
                                    {{ $legality->document_number }}
                                </p>

                            @endif


                            @if ($legality->document_date)

                                <p>
                                    <strong>Tanggal:</strong>

                                    {{ $legality->document_date
                                        ->translatedFormat('d F Y') }}
                                </p>

                            @endif


                            @if ($legality->description)

                                <p>
                                    {{ $legality->description }}
                                </p>

                            @endif

                        </div>

                    </div>


                    <div class="legal-document-action">

                        @if ($legality->file)

                            <span class="legal-document-status">

                                <i class="bi bi-check-circle-fill"></i>

                                Tersedia

                            </span>


                            <a
                                href="{{ asset(
                                    'storage/' . $legality->file
                                ) }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="legal-document-button"
                            >

                                <i class="bi bi-eye"></i>

                                Lihat Dokumen

                            </a>

                        @else

                            <span class="legal-document-status">

                                <i class="bi bi-info-circle-fill"></i>

                                Informasi

                            </span>

                        @endif

                    </div>

                </div>


            @empty

                <div class="legal-document-item">

                    <div class="legal-document-left">

                        <div class="legal-document-icon">

                            <i class="bi bi-file-earmark-text"></i>

                        </div>

                        <div>

                            <span>
                                DOKUMEN LEGAL
                            </span>

                            <h3>
                                Dokumen Belum Tersedia
                            </h3>

                            <p>
                                Informasi dokumen legal Yayasan Pusaka
                                sedang diperbarui.
                            </p>

                        </div>

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</section>


{{-- =========================
     TRANSPARENCY
========================= --}}

<section class="legal-transparency">

    <div class="container">

        <div class="legal-transparency-wrapper">

            <div class="legal-transparency-icon">

                <i class="bi bi-shield-check"></i>

            </div>


            <div>

                <span>
                    TRANSPARANSI
                </span>

                <h2>
                    Menjaga Kepercayaan melalui
                    <strong>Tata Kelola yang Bertanggung Jawab.</strong>
                </h2>

                <p>
                    Keterbukaan informasi merupakan bagian dari
                    komitmen Yayasan Pusaka dalam menjaga kepercayaan
                    penerima manfaat, mitra, dan masyarakat.
                </p>

            </div>

        </div>

    </div>

</section>

@endsection