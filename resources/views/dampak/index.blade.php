@extends('layouts.app')

@section('title', 'Dampak | Yayasan Pusaka')

@section('content')

<section class="impact-page-hero">
    <div class="container">
        <div class="impact-page-hero-content">

            <span class="section-label">
                DAMPAK KAMI
            </span>

            <h1>
                Mengukur Manfaat,
                <span>Melihat Perubahan.</span>
            </h1>

            <p>
                Dampak Yayasan Pusaka tidak hanya dilihat dari jumlah program
                yang dijalankan, tetapi juga dari manfaat yang dirasakan
                penerima manfaat dan perkembangan yang tercipta.
            </p>

            <div class="profile-breadcrumb">
                <a href="{{ route('home') }}">Beranda</a>
                <i class="bi bi-chevron-right"></i>
                <span>Dampak</span>
            </div>

        </div>
    </div>
</section>


{{-- STATISTIK UTAMA --}}
<section class="impact-page-stats section-padding">
    <div class="container">

        <div class="impact-page-heading text-center">

            <span class="section-label">
                DALAM ANGKA
            </span>

            <h2 class="section-title">
                Dampak yang Dapat
                <span>Diukur.</span>
            </h2>

            <p>
                Data berikut nantinya akan diambil dari aplikasi internal
                Yayasan Pusaka melalui API.
            </p>

        </div>

        <div class="row g-4">

            <div class="col-6 col-lg-3">
                <div class="impact-page-stat-card">

                    <div class="impact-page-stat-icon blue">
                        <i class="bi bi-people-fill"></i>
                    </div>

                    <h3>-</h3>

                    <strong>
                        Penerima Manfaat
                    </strong>

                    <span>
                        Seluruh program
                    </span>

                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="impact-page-stat-card">

                    <div class="impact-page-stat-icon orange">
                        <i class="bi bi-grid-fill"></i>
                    </div>

                    <h3>-</h3>

                    <strong>
                        Program
                    </strong>

                    <span>
                        Program aktif
                    </span>

                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="impact-page-stat-card">

                    <div class="impact-page-stat-icon blue">
                        <i class="bi bi-calendar2-check-fill"></i>
                    </div>

                    <h3>-</h3>

                    <strong>
                        Kegiatan
                    </strong>

                    <span>
                        Telah dilaksanakan
                    </span>

                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="impact-page-stat-card">

                    <div class="impact-page-stat-icon orange">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>

                    <h3>-</h3>

                    <strong>
                        Wilayah
                    </strong>

                    <span>
                        Jangkauan manfaat
                    </span>

                </div>
            </div>

        </div>

    </div>
</section>


{{-- DAMPAK PER BIDANG --}}
<section class="impact-program-breakdown section-padding">
    <div class="container">

        <div class="impact-breakdown-heading">

            <div>
                <span class="section-label">
                    BERDASARKAN PROGRAM
                </span>

                <h2 class="section-title">
                    Dampak di Berbagai
                    <span>Bidang Program.</span>
                </h2>
            </div>

            <p>
                Nantinya angka pada setiap bidang dapat mengikuti data
                agregat dari sistem internal.
            </p>

        </div>

        <div class="row g-4">

            <div class="col-md-6 col-lg-3">
                <div class="impact-breakdown-card">

                    <div class="impact-breakdown-icon blue">
                        <i class="bi bi-mortarboard-fill"></i>
                    </div>

                    <span>PENDIDIKAN</span>

                    <h3>-</h3>

                    <p>
                        Penerima manfaat program pendidikan.
                    </p>

                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="impact-breakdown-card">

                    <div class="impact-breakdown-icon orange">
                        <i class="bi bi-heart-fill"></i>
                    </div>

                    <span>SOSIAL</span>

                    <h3>-</h3>

                    <p>
                        Penerima manfaat program sosial dan kemanusiaan.
                    </p>

                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="impact-breakdown-card">

                    <div class="impact-breakdown-icon blue">
                        <i class="bi bi-shop"></i>
                    </div>

                    <span>PEMBERDAYAAN</span>

                    <h3>-</h3>

                    <p>
                        Peserta program pemberdayaan dan UMKM.
                    </p>

                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="impact-breakdown-card">

                    <div class="impact-breakdown-icon orange">
                        <i class="bi bi-lightbulb-fill"></i>
                    </div>

                    <span>PELATIHAN</span>

                    <h3>-</h3>

                    <p>
                        Peserta pelatihan dan pengembangan.
                    </p>

                </div>
            </div>

        </div>

    </div>
</section>


{{-- SEBARAN WILAYAH --}}
<section class="impact-regions section-padding">
    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-6">

                <span class="section-label">
                    SEBARAN MANFAAT
                </span>

                <h2 class="section-title">
                    Menjangkau Penerima Manfaat
                    di <span>Berbagai Wilayah.</span>
                </h2>

                <p class="section-description">
                    Sebaran program dan penerima manfaat nantinya dapat
                    ditampilkan berdasarkan wilayah yang tersedia dalam
                    aplikasi internal Yayasan Pusaka.
                </p>

                <div class="impact-region-list">

                    <div>
                        <span>Bandung</span>
                        <strong>-</strong>
                    </div>

                    <div>
                        <span>Jakarta</span>
                        <strong>-</strong>
                    </div>

                    <div>
                        <span>Semarang</span>
                        <strong>-</strong>
                    </div>

                    <div>
                        <span>Yogyakarta</span>
                        <strong>-</strong>
                    </div>

                    <div>
                        <span>Surabaya</span>
                        <strong>-</strong>
                    </div>

                </div>

            </div>

            <div class="col-lg-6">

                <div class="impact-map-placeholder">

                    <div class="impact-map-icon">
                        <i class="bi bi-map-fill"></i>
                    </div>

                    <h3>
                        Peta Sebaran Penerima Manfaat
                    </h3>

                    <p>
                        Area ini nantinya dapat dikembangkan menjadi
                        peta interaktif berdasarkan data wilayah.
                    </p>

                </div>

            </div>

        </div>

    </div>
</section>


{{-- CERITA DAMPAK --}}
<section class="impact-page-stories section-padding">
    <div class="container">

        <div class="impact-page-stories-heading text-center">

            <span class="section-label">
                CERITA DAMPAK
            </span>

            <h2 class="section-title">
                Angka Memberikan Gambaran,
                <span>Cerita Memberikan Makna.</span>
            </h2>

            <p>
                Cerita penerima manfaat membantu menunjukkan bagaimana
                program memberikan perubahan dalam kehidupan nyata.
            </p>

        </div>

        <div class="row g-4">

            <div class="col-lg-4">
                <article class="impact-page-story-card">

                    <img
                        src="{{ asset('images/impact-story-1.jpg') }}"
                        alt="Cerita dampak pendidikan"
                    >

                    <div class="impact-page-story-content">

                        <span>PENDIDIKAN</span>

                        <h3>
                            Kesempatan Belajar untuk Masa Depan
                        </h3>

                        <p>
                            Cerita penerima manfaat program pendidikan
                            Yayasan Pusaka.
                        </p>

                        <a href="#">
                            Baca Cerita
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>

                </article>
            </div>


            <div class="col-lg-4">
                <article class="impact-page-story-card">

                    <img
                        src="{{ asset('images/impact-story-2.jpg') }}"
                        alt="Cerita dampak pemberdayaan"
                    >

                    <div class="impact-page-story-content">

                        <span>PEMBERDAYAAN</span>

                        <h3>
                            Dari Pelatihan Menuju Kemandirian
                        </h3>

                        <p>
                            Cerita perjalanan penerima manfaat dalam
                            mengembangkan kemampuan dan usaha.
                        </p>

                        <a href="#">
                            Baca Cerita
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>

                </article>
            </div>


            <div class="col-lg-4">
                <article class="impact-page-story-card">

                    <img
                        src="{{ asset('images/impact-story-3.jpg') }}"
                        alt="Cerita dampak sosial"
                    >

                    <div class="impact-page-story-content">

                        <span>SOSIAL</span>

                        <h3>
                            Kepedulian yang Hadir di Saat Dibutuhkan
                        </h3>

                        <p>
                            Cerita dukungan sosial yang memberikan
                            manfaat bagi penerima program.
                        </p>

                        <a href="#">
                            Baca Cerita
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>

                </article>
            </div>

        </div>

    </div>
</section>


{{-- TRANSPARENCY CTA --}}
<section class="impact-transparency">
    <div class="container">

        <div class="impact-transparency-wrapper">

            <div>

                <span>
                    TRANSPARANSI DAMPAK
                </span>

                <h2>
                    Data Membantu Kami
                    <strong>Belajar dan Berkembang.</strong>
                </h2>

                <p>
                    Pengukuran dampak membantu Yayasan Pusaka
                    mengevaluasi program dan menentukan langkah
                    pengembangan berikutnya.
                </p>

            </div>

            <a href="{{ route('information.index') }}"
               class="profile-commitment-btn">

                Lihat Laporan & Informasi

                <i class="bi bi-arrow-right"></i>

            </a>

        </div>

    </div>
</section>

@endsection