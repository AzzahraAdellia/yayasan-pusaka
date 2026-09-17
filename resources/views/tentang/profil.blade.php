@extends('layouts.app')

@section('title', 'Profil Yayasan | Yayasan Pusaka')

@section('content')

{{-- =========================
     PAGE HERO
========================= --}}

<section class="profile-hero">

    <div class="container">

        <div class="profile-hero-content">

            <span class="section-label">
                PROFIL YAYASAN
            </span>

            <h1>
                Mengenal Lebih Dekat
                <span>Yayasan Pusaka.</span>
            </h1>

            <p>
                Sejak 1967, Yayasan Pusaka hadir membawa semangat kepedulian bagi 
                keluarga besar PT Kereta Api Indonesia (Persero), melalui pelayanan sosial, 
                pendidikan, pemberdayaan, serta pengembangan yang berkelanjutan.
            </p>

            <div class="profile-breadcrumb">

                <a href="{{ route('home') }}">
                    Beranda
                </a>

                <i class="bi bi-chevron-right"></i>

                <span>
                    Profil Yayasan
                </span>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     INTRO
========================= --}}

<section class="profile-intro section-padding">

    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-6">

                <div class="profile-intro-image">

                    <img
                        src="{{ asset('images/profile-yayasan.jpg') }}"
                        alt="Yayasan Pusaka"
                    >

                    <div class="profile-intro-badge">

                        <i class="bi bi-heart-fill"></i>

                        <div>
                            <strong>
                                Peduli
                            </strong>

                            <span>
                                untuk sesama
                            </span>
                        </div>

                    </div>

                </div>

            </div>


            <div class="col-lg-6">

                <span class="section-label">
                    SIAPA KAMI
                </span>

                <h2 class="section-title">
                    Tumbuh dari Kepedulian
                    <span>Keluarga Besar Perkeretaapian.</span>
                </h2>

                <p class="section-description">
                    Yayasan Pusaka merupakan lembaga sosial yang didirikan pada 31 Maret 1967 di Kota Bandung 
                    oleh para pejabat Perusahaan Kereta Api Milik Negara Republik Indonesia.
                    Sejak awal berdirinya, Yayasan Pusaka membawa semangat kepedulian terhadap kesejahteraan 
                    karyawan kereta api, pensiunan, serta keluarganya. Semangat tersebut terus dijaga dan 
                    dikembangkan melalui berbagai bentuk pelayanan dan program yang disesuaikan dengan kebutuhan penerima manfaat.
                </p>

                <p class="section-description">
                    Dalam perjalanannya, Yayasan Pusaka terus bertumbuh dan beradaptasi. 
                    Pelayanan yang diberikan tidak hanya berupa bantuan sosial, tetapi juga mencakup pendidikan, pendampingan, 
                    pemberdayaan, pelatihan keterampilan, serta berbagai program pengembangan yang mendorong penerima manfaat 
                    untuk tumbuh dan semakin mandiri.
                </p>

                <div class="profile-highlight">

                    <div>
                        <i class="bi bi-check-circle-fill"></i>
                        <span>
                            Tumbuh bersama keluarga besar perkeretaapian.
                        </span>
                    </div>

                    <div>
                        <i class="bi bi-check-circle-fill"></i>
                        <span>
                            Hadir untuk mendampingi mereka yang membutuhkan.
                        </span>
                    </div>

                    <div>
                        <i class="bi bi-check-circle-fill"></i>
                        <span>
                            Mengembangkan program yang memberikan manfaat jangka panjang.
                        </span>
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     FOCUS
========================= --}}

<section class="profile-focus section-padding">

    <div class="container">

        <div class="profile-focus-heading text-center">

            <span class="section-label">
                FOKUS KAMI
            </span>

            <h2 class="section-title">
                Empat Pilar untuk
                <span>Memberikan Manfaat.</span>
            </h2>

            <p>
                Setiap program Yayasan Pusaka diarahkan pada kebutuhan,
                pengembangan, dan keberlanjutan penerima manfaat.
            </p>

        </div>


        <div class="row g-4">

            <div class="col-md-6 col-lg-3">

                <div class="profile-focus-card">

                    <div class="profile-focus-icon blue">
                        <i class="bi bi-mortarboard-fill"></i>
                    </div>

                    <h3>
                        Pendidikan
                    </h3>

                    <p>
                        Mendukung akses dan keberlanjutan pendidikan
                        bagi penerima manfaat.
                    </p>

                </div>

            </div>


            <div class="col-md-6 col-lg-3">

                <div class="profile-focus-card">

                    <div class="profile-focus-icon orange">
                        <i class="bi bi-heart-fill"></i>
                    </div>

                    <h3>
                        Sosial
                    </h3>

                    <p>
                        Hadir melalui dukungan sosial dan kepedulian
                        bagi mereka yang membutuhkan.
                    </p>

                </div>

            </div>


            <div class="col-md-6 col-lg-3">

                <div class="profile-focus-card">

                    <div class="profile-focus-icon blue">
                        <i class="bi bi-people-fill"></i>
                    </div>

                    <h3>
                        Pemberdayaan
                    </h3>

                    <p>
                        Membantu penerima manfaat agar memiliki
                        peluang dan kemandirian yang lebih baik.
                    </p>

                </div>

            </div>


            <div class="col-md-6 col-lg-3">

                <div class="profile-focus-card">

                    <div class="profile-focus-icon orange">
                        <i class="bi bi-lightbulb-fill"></i>
                    </div>

                    <h3>
                        Pengembangan
                    </h3>

                    <p>
                        Mengembangkan keterampilan, potensi,
                        dan kesiapan melalui berbagai pelatihan.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     COMMITMENT
========================= --}}

<section class="profile-commitment">

    <div class="container">

        <div class="profile-commitment-wrapper">

            <div>

                <span>
                    KOMITMEN KAMI
                </span>

                <h2>
                    Tidak Sekadar Memberi,
                    Tetapi <strong>Mendampingi untuk Tumbuh.</strong>
                </h2>

                <p>
                    Yayasan Pusaka percaya bahwa dampak sosial yang baik
                    lahir dari kepedulian, kolaborasi, dan pendampingan
                    yang berkelanjutan.
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