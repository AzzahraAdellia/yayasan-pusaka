@extends('layouts.app')

@section('title', 'Nilai-Nilai Yayasan | Yayasan Pusaka')

@section('content')

{{-- =========================
     PAGE HERO
========================= --}}

<section class="values-hero">

    <div class="container">

        <div class="values-hero-content">

            <span class="section-label">
                TENTANG KAMI
            </span>

            <h1>
                Nilai yang Menjadi
                <span>Landasan Kami.</span>
            </h1>

            <p>
                Nilai-nilai Yayasan Pusaka menjadi pedoman dalam
                menjalankan program, membangun hubungan, serta
                memberikan pelayanan kepada penerima manfaat dan mitra.
            </p>

            <div class="profile-breadcrumb">

                <a href="{{ route('home') }}">
                    Beranda
                </a>

                <i class="bi bi-chevron-right"></i>

                <span>
                    Nilai-Nilai Yayasan
                </span>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     MAIN VALUE
========================= --}}

<section class="values-main section-padding">

    <div class="container">

        <div class="values-main-wrapper">

            <div class="values-main-number">
                01
            </div>

            <div class="values-main-icon">
                <i class="bi bi-heart-fill"></i>
            </div>

            <div class="values-main-content">

                <span>
                    NILAI UTAMA
                </span>

                <h2>
                    Kepedulian yang
                    <strong>diwujudkan dalam tindakan.</strong>
                </h2>

                <p>
                    Kepedulian menjadi dasar setiap langkah Yayasan Pusaka.
                    Kami berupaya hadir bukan hanya untuk melihat kebutuhan,
                    tetapi juga mengambil peran dalam menghadirkan solusi
                    dan manfaat yang nyata.
                </p>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     VALUES GRID
========================= --}}

<section class="values-grid-section section-padding">

    <div class="container">

        <div class="values-heading">

            <div>
                <span class="section-label">
                    NILAI-NILAI KAMI
                </span>

                <h2 class="section-title">
                    Prinsip yang Membentuk
                    <span>Cara Kami Bergerak.</span>
                </h2>
            </div>

            <p>
                Nilai ini menjadi pijakan dalam pengambilan keputusan,
                pelaksanaan program, serta hubungan Yayasan Pusaka
                dengan penerima manfaat dan mitra.
            </p>

        </div>


        <div class="row g-4">

            {{-- INTEGRITAS --}}
            <div class="col-lg-6">

                <div class="value-detail-card">

                    <div class="value-detail-top">

                        <div class="value-detail-icon blue">
                            <i class="bi bi-shield-check"></i>
                        </div>

                        <span>
                            02
                        </span>

                    </div>

                    <h3>
                        Integritas
                    </h3>

                    <p>
                        Menjalankan setiap amanah secara bertanggung jawab,
                        transparan, dan konsisten dengan prinsip yang telah
                        ditetapkan.
                    </p>

                    <div class="value-detail-line"></div>

                </div>

            </div>


            {{-- KOLABORASI --}}
            <div class="col-lg-6">

                <div class="value-detail-card">

                    <div class="value-detail-top">

                        <div class="value-detail-icon orange">
                            <i class="bi bi-people-fill"></i>
                        </div>

                        <span>
                            03
                        </span>

                    </div>

                    <h3>
                        Kolaborasi
                    </h3>

                    <p>
                        Membangun hubungan yang terbuka dan saling mendukung
                        untuk memperluas manfaat melalui kerja sama yang
                        sehat dan berkelanjutan.
                    </p>

                    <div class="value-detail-line"></div>

                </div>

            </div>


            {{-- PROFESIONALISME --}}
            <div class="col-lg-6">

                <div class="value-detail-card">

                    <div class="value-detail-top">

                        <div class="value-detail-icon orange">
                            <i class="bi bi-briefcase-fill"></i>
                        </div>

                        <span>
                            04
                        </span>

                    </div>

                    <h3>
                        Profesionalisme
                    </h3>

                    <p>
                        Mengelola program dengan perencanaan, pelaksanaan,
                        dan evaluasi yang tertib serta berorientasi pada
                        kualitas hasil.
                    </p>

                    <div class="value-detail-line"></div>

                </div>

            </div>


            {{-- PEMBERDAYAAN --}}
            <div class="col-lg-6">

                <div class="value-detail-card">

                    <div class="value-detail-top">

                        <div class="value-detail-icon blue">
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>

                        <span>
                            05
                        </span>

                    </div>

                    <h3>
                        Pemberdayaan
                    </h3>

                    <p>
                        Tidak berhenti pada bantuan, tetapi mendorong
                        kemampuan, kepercayaan diri, dan kemandirian
                        penerima manfaat.
                    </p>

                    <div class="value-detail-line"></div>

                </div>

            </div>


            {{-- INKLUSIVITAS --}}
            <div class="col-lg-6">

                <div class="value-detail-card">

                    <div class="value-detail-top">

                        <div class="value-detail-icon blue">
                            <i class="bi bi-universal-access"></i>
                        </div>

                        <span>
                            06
                        </span>

                    </div>

                    <h3>
                        Inklusivitas
                    </h3>

                    <p>
                        Menghargai keberagaman dan membuka ruang bagi setiap
                        penerima manfaat untuk memperoleh kesempatan yang
                        setara dalam berkembang.
                    </p>

                    <div class="value-detail-line"></div>

                </div>

            </div>


            {{-- KEBERLANJUTAN --}}
            <div class="col-lg-6">

                <div class="value-detail-card">

                    <div class="value-detail-top">

                        <div class="value-detail-icon orange">
                            <i class="bi bi-arrow-repeat"></i>
                        </div>

                        <span>
                            07
                        </span>

                    </div>

                    <h3>
                        Keberlanjutan
                    </h3>

                    <p>
                        Merancang program dengan melihat manfaat jangka
                        panjang, pengembangan kapasitas, dan kesinambungan
                        dampak sosial.
                    </p>

                    <div class="value-detail-line"></div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     CLOSING
========================= --}}

<section class="values-closing">

    <div class="container">

        <div class="values-closing-wrapper">

            <div class="values-closing-icon">
                <i class="bi bi-compass-fill"></i>
            </div>

            <div>

                <span>
                    MENJADI PEDOMAN
                </span>

                <h2>
                    Nilai yang Baik Harus
                    <strong>Terlihat dalam Setiap Tindakan.</strong>
                </h2>

                <p>
                    Nilai Yayasan Pusaka bukan sekadar pernyataan,
                    tetapi menjadi pedoman dalam merancang program,
                    melayani penerima manfaat, dan membangun kepercayaan.
                </p>

            </div>

        </div>

    </div>

</section>

@endsection