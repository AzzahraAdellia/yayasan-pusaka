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
                SEJARAH
            </span>

            <h1>
                Perjalanan Kepedulian<span>Sejak 1967.</span>
            </h1>

            <p>
                Lebih dari lima dekade perjalanan Yayasan Pusaka berawal dari satu semangat yang sama: 
                menghadirkan kepedulian dan meningkatkan kesejahteraan keluarga besar perkeretaapian.
                Dari masa ke masa, Yayasan Pusaka terus berkembang mengikuti kebutuhan penerima manfaat 
                serta menghadirkan berbagai bentuk pelayanan yang semakin luas dan berkelanjutan.
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
                    <br>
                    Yayasan Pusaka didirikan pada 31 Maret 1967 di Kota Bandung oleh para pejabat 
                    Perusahaan Kereta Api Milik Negara Republik Indonesia.
                    Kehadiran Yayasan Pusaka dilandasi oleh semangat kepedulian untuk meningkatkan 
                    kesejahteraan karyawan kereta api, pensiunan, serta keluarganya.
                </p>

                <p class="section-description">
                    Sejak saat itu, Yayasan Pusaka menjadi wadah untuk menghimpun kepedulian dan 
                    menghadirkan berbagai bentuk pelayanan bagi keluarga besar perkeretaapian yang membutuhkan.
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
                Dari Kepedulian,
                <span>Menuju Manfaat yang Berkelanjutan.</span>
            </h2>

            {{-- <p>
                Timeline ini nantinya bisa disesuaikan dengan tahun dan
                peristiwa resmi Yayasan Pusaka.
            </p> --}}

        </div>


        <div class="history-timeline">

            {{-- ITEM 1 --}}
            <div class="history-item">

                <div class="history-year">
                    1967
                </div>

                <div class="history-dot"></div>

                <div class="history-card">

                    {{-- <span>
                        YAYASAN PUSAKA DIDIRIKAN
                    </span> --}}

                    <h3>
                        Yayasan Pusaka didirikan
                    </h3>

                    <p>
                        Yayasan Pusaka resmi didirikan pada 31 Maret 1967 di Kota Bandung oleh para 
                        pejabat Perusahaan Kereta Api Milik Negara Republik Indonesia.
                        Pendirian Yayasan Pusaka menjadi awal dari perjalanan panjang pelayanan sosial bagi 
                        karyawan kereta api, pensiunan, serta keluarganya.
                    </p>

                </div>

            </div>


            {{-- ITEM 2 --}}
            <div class="history-item">

                <div class="history-year">
                    PERJALANAN BERIKUTNYA
                </div>

                <div class="history-dot orange"></div>

                <div class="history-card">

                    {{-- <span>
                        MEMPERLUAS KEPEDULIAN DAN PELAYANAN
                    </span> --}}

                    <h3>
                        Memperluas Kepedulian dan Pelayanan
                    </h3>

                    <p>
                        Seiring berjalannya waktu, Yayasan Pusaka terus menjalankan perannya 
                        dalam memberikan perhatian kepada keluarga besar perkeretaapian.
                        Pelayanan berkembang dengan memberikan perhatian kepada anak yatim/piatu dari 
                        keluarga pegawai dan pensiunan, pensiunan yang membutuhkan dukungan, serta keluarga 
                        prasejahtera dalam lingkungan PT Kereta Api Indonesia (Persero).
                    </p>

                </div>

            </div>


            {{-- ITEM 3 --}}
            <div class="history-item">

                <div class="history-year">
                    PENGEMBANGAN PROGRAM
                </div>

                <div class="history-dot"></div>

                <div class="history-card">

                    {{-- <span>
                        Dari Bantuan Menuju Pemberdayaan
                    </span> --}}

                    <h3>
                        Dari Bantuan Menuju Pemberdayaan
                    </h3>

                    <p>
                        Perubahan kebutuhan penerima manfaat mendorong Yayasan Pusaka untuk terus mengembangkan bentuk pelayanannya.
                        Dukungan yang diberikan berkembang dari pelayanan sosial menjadi berbagai program yang mencakup pendidikan, 
                        pendampingan sosial, pemberdayaan ekonomi, serta pelatihan dan pengembangan keterampilan.
                        
                        Perkembangan tersebut menjadi bagian dari upaya Yayasan Pusaka agar penerima manfaat tidak hanya memperoleh bantuan, 
                        tetapi juga memiliki kesempatan untuk mengembangkan potensi dan meningkatkan kemandirian.
                    </p>

                </div>

            </div>


            {{-- ITEM 4 --}}
            <div class="history-item">

                <div class="history-year">
                    PENGUATAN KOLABORASI
                </div>

                <div class="history-dot orange"></div>

                <div class="history-card">

                    {{-- <span>
                        Tumbuh Bersama melalui Sinergi
                    </span> --}}

                    <h3>
                        Tumbuh Bersama melalui Sinergi
                    </h3>

                    <p>
                        Dalam memperluas manfaat, Yayasan Pusaka terus membangun sinergi dan kolaborasi dengan 
                        PT Kereta Api Indonesia (Persero), anak perusahaan, lembaga pendidikan, organisasi, 
                        komunitas, serta berbagai mitra lainnya.
                        
                        Kolaborasi menjadi bagian penting dalam pengembangan program, peningkatan kualitas pelayanan, 
                        serta perluasan kesempatan bagi penerima manfaat.
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
                    SEMANGAT YANG TERUS DIJAGA
                </span>

                <h2>
                    Lebih dari Lima Dekade 
                    <strong>Mengabdi dan Peduli.</strong>
                </h2>

                <p>
                    Perjalanan Yayasan Pusaka bukan hanya tentang berapa lama yayasan ini berdiri, 
                    tetapi tentang kepedulian yang terus diwariskan dari satu generasi ke generasi berikutnya.
                    Berawal dari kepedulian terhadap kesejahteraan keluarga besar perkeretaapian, Yayasan Pusaka terus bergerak untuk 
                    memberikan manfaat yang lebih luas melalui pelayanan, pendampingan, pemberdayaan, dan kolaborasi.
                    Semangat tersebut akan terus menjadi bagian dari perjalanan Yayasan Pusaka dalam menghadirkan manfaat bagi penerima manfaat hari ini dan di masa yang akan datang.
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