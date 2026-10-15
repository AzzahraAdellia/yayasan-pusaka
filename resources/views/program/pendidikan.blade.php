@extends('layouts.app')

@section('title', $program->name . ' | Yayasan Pusaka')

@section('content')

{{-- =========================
     PAGE HERO
========================= --}}

<section class="education-hero">

    <div class="container">

        <div class="education-hero-content">

            <span class="section-label">
                PROGRAM {{ strtoupper($program->name) }}
            </span>

            <h1>
                {{ $program->title }}
            </h1>

            <p>
                {{ $program->short_description }}
            </p>

            <div class="profile-breadcrumb">

                <a href="{{ route('home') }}">
                    Beranda
                </a>

                <i class="bi bi-chevron-right"></i>

                <a href="{{ route('programs.index') }}">
                    Program
                </a>

                <i class="bi bi-chevron-right"></i>

                <span>
                    {{ $program->name }}
                </span>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     INTRO
========================= --}}

<section class="education-intro section-padding">

    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-6">

                <div class="education-image-wrapper">

                    @if ($program->image)

                        <img
                            src="{{ asset('storage/' . $program->image) }}"
                            alt="{{ $program->name }}"
                        >

                    @else

                        <img
                            src="{{ asset('images/bantuan-pendidikan.jpg') }}"
                            alt="{{ $program->name }}"
                        >

                    @endif


                    <div class="education-floating-card">

                        <div class="education-floating-icon">

                            <i class="bi {{ $program->icon ?: 'bi-mortarboard-fill' }}"></i>

                        </div>

                        <div>

                            <strong>
                                {{ $program->name }}
                            </strong>

                            <span>
                                untuk masa depan yang lebih baik
                            </span>

                        </div>

                    </div>

                </div>

            </div>


            <div class="col-lg-6">

                <span class="section-label">
                    TENTANG PROGRAM
                </span>

                <h2 class="section-title">
                    Pendidikan sebagai Jalan untuk
                    <span>Tumbuh dan Berkembang.</span>
                </h2>


                @if ($program->description)

                    <div class="section-description">
                        {!! nl2br(e($program->description)) !!}
                    </div>

                @else

                    <p class="section-description">
                        Pendidikan menjadi salah satu fokus Yayasan Pusaka
                        dalam mendukung penerima manfaat agar memiliki
                        kesempatan belajar dan berkembang secara berkelanjutan.
                    </p>

                    <p class="section-description">
                        Dukungan diberikan melalui berbagai bentuk program
                        yang disesuaikan dengan kebutuhan, jenjang pendidikan,
                        serta kondisi penerima manfaat.
                    </p>

                @endif


                <div class="education-points">

                    <div>
                        <i class="bi bi-check-circle-fill"></i>
                        Dukungan pendidikan berkelanjutan
                    </div>

                    <div>
                        <i class="bi bi-check-circle-fill"></i>
                        Pendampingan penerima manfaat
                    </div>

                    <div>
                        <i class="bi bi-check-circle-fill"></i>
                        Pengembangan potensi
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     STATISTIK JENJANG PENDIDIKAN
========================= --}}

@php
    $jenjangAktif = $publicStats['educationLevels'] ?? [];

    $daftarJenjang = [
        'Pra Sekolah - TK' => 'Pra Sekolah – TK',
        'SD' => 'SD',
        'SMP' => 'SMP',
        'SMA' => 'SMA / SMK',
        'D1' => 'D1',
        'D2' => 'D2',
        'D3' => 'D3',
        'D4 - S1' => 'D4 – S1',
        'S2' => 'S2',
        'Kursus' => 'Kursus',
    ];

    $jumlahTerbesar = max(1, ...array_values(
        array_map(
            fn ($key) => (int) ($jenjangAktif[$key] ?? 0),
            array_keys($daftarJenjang)
        )
    ));
@endphp

<section class="education-programs section-padding">
    <div class="container">

        <div class="education-programs-heading">
            <div>
                <span class="section-label">
                    STATISTIK PENDIDIKAN
                </span>

                <h2 class="section-title">
                    Sebaran Anak-Anak Penerima Aktif Manfaat Yayasan Pusaka 
                    <span>Berdasarkan Jenjang Pendidikan.</span>
                </h2>
            </div>

            <p>
                Gambaran jumlah anak-anak aktif penerima manfaat Yayasan Pusaka
                berdasarkan jenjang pendidikan yang sedang ditempuh.
            </p>
        </div>

        @if (!empty($publicStats['educationLevels']))

            <div class="row g-4 align-items-stretch">

                {{-- TOTAL ANAK-ANAK PENERIMA MANFAAT AKTIF --}}
                <div class="col-lg-4">
                    <div class="education-program-card h-100">

                        <div class="education-card-icon blue mb-4">
                            <i class="bi bi-people-fill"></i>
                        </div>

                        <span class="section-label">
                            ANAK-ANAK PENERIMA MANFAAT AKTIF YAYASAN PUSAKA
                        </span>

                        <h3 style="font-size: 48px; font-weight: 800; margin: 16px 0;">
                            {{ isset($publicStats['children']['active'])
                                ? number_format($publicStats['children']['active'], 0, ',', '.')
                                : '-' }}
                        </h3>

                        <p>
                            Anak-anak penerima manfaat aktif yang tercatat
                            dalam Sistem Informasi Internal Yayasan Pusaka.
                        </p>

                    </div>
                </div>

                



                {{-- GRID STATISTIK JENJANG PENDIDIKAN --}}
                <div class="col-lg-8">

                    <div class="education-program-card education-level-panel">

                        <h3 class="mb-4">
                            Sebaran Jenjang Pendidikan
                        </h3>

                        @php
                            $jenjangDitampilkan = [];

                            $ikonJenjang = [
                                'Pra Sekolah - TK' => 'bi-backpack2-fill',
                                'SD' => 'bi-book-fill',
                                'SMP' => 'bi-journal-bookmark-fill',
                                'SMA' => 'bi-mortarboard-fill',
                                'D1' => 'bi-book',
                                'D2' => 'bi-book',
                                'D3' => 'bi-buildings-fill',
                                'D4 - S1' => 'bi-mortarboard-fill',
                                'S2' => 'bi-mortarboard-fill',
                                'Kursus' => 'bi-journal-check',
                            ];

                            foreach ($daftarJenjang as $key => $label) {
                                $jumlah = (int) ($jenjangAktif[$key] ?? 0);

                                if ($jumlah > 0) {
                                    $jenjangDitampilkan[] = [
                                        'label' => $label,
                                        'jumlah' => $jumlah,
                                        'icon' => $ikonJenjang[$key] ?? 'bi-book-fill',
                                    ];
                                }
                            }
                        @endphp

                        @if (count($jenjangDitampilkan) > 0)

                            <div class="education-level-scroll">

                                <div class="row g-3">

                                    @foreach ($jenjangDitampilkan as $jenjang)

                                        <div class="col-6 col-md-4">

                                            <div class="education-level-item">

                                                <div class="education-level-icon">
                                                    <i class="bi {{ $jenjang['icon'] }}"></i>
                                                </div>

                                                <strong class="education-level-number">
                                                    {{ number_format($jenjang['jumlah'], 0, ',', '.') }}
                                                </strong>

                                                <span class="education-level-name">
                                                    {{ $jenjang['label'] }}
                                                </span>

                                            </div>

                                        </div>

                                    @endforeach

                                </div>

                            </div>

                        @else

                            <p class="text-muted mb-0">
                                Data jenjang pendidikan belum tersedia.
                            </p>

                        @endif

                    </div>

                </div>


            {{-- KATEGORI ABK --}}
            <div class="mt-4">
                <div class="education-program-card">

                    <div class="d-flex align-items-center gap-3">

                        <div class="education-card-icon orange">
                            <i class="bi bi-heart-fill"></i>
                        </div>

                        <div>
                            <h3 class="mb-1">
                                {{ number_format((int) ($jenjangAktif['ABK'] ?? 0), 0, ',', '.') }}
                                Anak-anak penerima manfaat aktif
                            </h3>

                            <p class="mb-0">
                                Kategori Anak Berkebutuhan Khusus (ABK)
                                dalam data pendidikan aktif.
                            </p>
                        </div>

                    </div>

                </div>
            </div>

            <p class="education-nominal-note mt-4">
                <i class="bi bi-info-circle"></i>
                Data bersumber dari Sistem Informasi Internal Yayasan Pusaka
                dan diperbarui secara berkala.

                @if (!empty($publicStats['updatedAt']))
                    Terakhir diperbarui:
                    {{ \Carbon\Carbon::parse($publicStats['updatedAt'])
                        ->timezone('Asia/Jakarta')
                        ->format('d/m/Y H:i') }} WIB.
                @endif
            </p>

        @else

            <div class="text-center py-5">
                <p class="text-muted">
                    Statistik jenjang pendidikan belum tersedia.
                </p>
            </div>

        @endif

    </div>
</section>

{{-- =========================
     SUBKEGIATAN PENDIDIKAN
========================= --}}

@if ($trainings->isNotEmpty())

<section class="education-programs section-padding">

    <div class="container">

        <div class="education-programs-heading">

            <div>
                <span class="section-label">
                    KEGIATAN PROGRAM
                </span>

                <h2 class="section-title">
                    Subkegiatan
                    <span>Pendidikan.</span>
                </h2>
            </div>

            <p>
                Berbagai kegiatan yang dilaksanakan
                dalam Program Pendidikan Yayasan Pusaka.
            </p>

        </div>


        <div class="row g-4">

            @foreach ($trainings as $subactivity)

                <div class="col-lg-4 col-md-6">

                    <article class="education-program-card h-100">

                        @if ($subactivity->image)

                            <img
                                src="{{ asset('storage/' . $subactivity->image) }}"
                                alt="{{ $subactivity->name }}"
                                style="width: 100%; height: 200px; object-fit: cover; border-radius: 12px; margin-bottom: 20px;"
                            >

                        @endif

                        <h3>
                            {{ $subactivity->name }}
                        </h3>

                        @if ($subactivity->short_description)

                            <p>
                                {{ $subactivity->short_description }}
                            </p>

                        @endif

                        <a
                            href="{{ route('programs.education.show', $subactivity) }}"
                            class="training-detail-button"
                        >
                            Selengkapnya
                            <i class="bi bi-arrow-right"></i>
                        </a>

                        </article>

                </div>

            @endforeach

        </div>

    </div>

</section>

@endif

{{-- =========================
     NOMINAL BANTUAN PENDIDIKAN
========================= --}}

<section class="education-programs section-padding">

    <div class="container">

        <div class="education-programs-heading">

            <div>

                <span class="section-label">
                    BANTUAN PENDIDIKAN
                </span>

                <h2 class="section-title">
                    Nominal Bantuan
                    <span>Pendidikan.</span>
                </h2>

            </div>

            <p>
                Yayasan Pusaka memberikan bantuan pendidikan
                kepada penerima manfaat sesuai dengan jenjang
                pendidikan yang sedang ditempuh.
            </p>

        </div>


        <div class="row g-4">

            @php
                $educationLevels = [
                    [
                        'level' => 'Pra Sekolah / TK',
                        'icon' => 'bi-backpack2-fill',
                        'amount' => 'Rp 5.000.000',
                        'color' => 'blue',
                    ],
                    [
                        'level' => 'SD / Sederajat',
                        'icon' => 'bi-book-fill',
                        'amount' => 'Rp 7.000.000',
                        'color' => 'orange',
                    ],
                    [
                        'level' => 'SMP / Sederajat',
                        'icon' => 'bi-journal-bookmark-fill',
                        'amount' => 'Rp 8.000.000',
                        'color' => 'blue',
                    ],
                    [
                        'level' => 'SMA / SMK / Sederajat',
                        'icon' => 'bi-mortarboard-fill',
                        'amount' => 'Rp 9.000.000',
                        'color' => 'orange',
                    ],
                    [
                        'level' => 'D3 / Sederajat / ABK',
                        'icon' => 'bi-buildings-fill',
                        'amount' => 'Rp 10.000.000',
                        'color' => 'blue',
                    ],
                    [
                        'level' => 'D4 / S1 / Sederajat',
                        'icon' => 'bi-buildings-fill',
                        'amount' => 'Rp 12.000.000',
                        'color' => 'blue',
                    ],

                ];
            @endphp


            @foreach ($educationLevels as $index => $level)

                <div class="col-lg-4 col-md-6">

                    <article class="education-program-card h-100">

                        <div class="education-card-top">

                            <div class="education-card-icon {{ $level['color'] }}">

                                <i class="bi {{ $level['icon'] }}"></i>

                            </div>

                            <span>
                                {{ sprintf('%02d', $index + 1) }}
                            </span>

                        </div>

                        <h3>
                            {{ $level['level'] }}
                        </h3>

                        <p>
                            Nominal bantuan pendidikan
                        </p>

                        <h3 class="education-amount">
                            {{ $level['amount'] }}
                        </h3>

                        <div class="education-card-meta">

                            <span>
                                <i class="bi bi-check-circle"></i>
                                Bantuan Pendidikan
                            </span>

                        </div>

                    </article>

                </div>

            @endforeach

        </div>


        <p class="education-nominal-note">

            <i class="bi bi-info-circle"></i>

            Nominal bantuan diberikan sesuai dengan
            ketentuan program Yayasan Pusaka yang berlaku.

        </p>

    </div>

</section>



{{-- =========================
     PERSYARATAN BANTUAN
========================= --}}

<section class="education-requirements section-padding">

    <div class="container">

        <div class="education-requirements-heading">

            <span class="section-label">
                INFORMASI PENDAFTARAN
            </span>

            <h2 class="section-title">
                Persyaratan Penerima
                <span>Bantuan Pendidikan.</span>
            </h2>

            <p class="section-description">
                Berikut adalah informasi persyaratan
                yang perlu diperhatikan oleh calon
                penerima bantuan pendidikan Yayasan Pusaka.
            </p>

        </div>


        <div class="row g-4">

            {{-- PERSYARATAN UMUM --}}

            <div class="col-lg-6">

                <div class="education-requirement-card">

                    <div class="education-requirement-header">

                        <div class="education-card-icon blue">
                            <i class="bi bi-person-check-fill"></i>
                        </div>

                        <div>

                            <span>
                                01 / KETENTUAN
                            </span>

                            <h3>
                                Persyaratan Umum
                            </h3>

                        </div>

                    </div>


                    <ul class="education-requirement-list">

                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>
                                Anak yatim atau piatu dari keluarga
                                besar PT Kereta Api Indonesia (Persero).
                            </span>
                        </li>

                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>
                                Berusia maksimal 24 tahun.
                            </span>
                        </li>

                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>
                                Belum menikah.
                            </span>
                        </li>

                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>
                                Memenuhi ketentuan penerima manfaat
                                yang ditetapkan oleh Yayasan Pusaka.
                            </span>
                        </li>

                    </ul>

                </div>

            </div>



            {{-- PERSYARATAN ADMINISTRASI --}}

            <div class="col-lg-6">

                <div class="education-requirement-card">

                    <div class="education-requirement-header">

                        <div class="education-card-icon orange">
                            <i class="bi bi-file-earmark-text-fill"></i>
                        </div>

                        <div>

                            <span>
                                02 / DOKUMEN
                            </span>

                            <h3>
                                Persyaratan Administrasi
                            </h3>

                        </div>

                    </div>


                    <ul class="education-requirement-list">
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>
                                Surat Keterangan Pensiun Karyawan/Karyawati.
                            </span>
                        </li>

                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>
                                Surat Keterangan/Akta Kematian Karyawan/Karyawati.
                            </span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>
                                Fotokopi Kartu Keluarga (KK).
                            </span>
                        </li>

                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>
                                Fotokopi KTP orang tua atau wali.
                            </span>
                        </li>

                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>
                                Fotokopi akta kelahiran penerima manfaat.
                            </span>
                        </li>

                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>
                                Surat keterangan aktif sekolah atau
                                kuliah bagi penerima manfaat yang
                                sedang menempuh pendidikan.
                            </span>
                        </li>

                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>
                                Dokumen pendukung lainnya sesuai
                                ketentuan Yayasan Pusaka.
                            </span>
                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

</section>



{{-- =========================
     INFORMASI LEBIH LANJUT
========================= --}}

<section class="education-impact">

    <div class="container">

        <div class="education-impact-wrapper">

            <div>

                <span>
                    INFORMASI BANTUAN PENDIDIKAN
                </span>

                <h2>
                    Butuh Informasi Lebih Lanjut
                    <strong>Mengenai Bantuan Pendidikan?</strong>
                </h2>

                <p>
                    Hubungi Yayasan Pusaka untuk mendapatkan
                    informasi mengenai program bantuan pendidikan,
                    persyaratan, dan ketentuan penerima manfaat.
                </p>

            </div>


            <a href="{{ route('contact') }}"
               class="profile-commitment-btn">

                Hubungi Kami

                <i class="bi bi-arrow-right"></i>

            </a>

        </div>

    </div>

</section>

@endsection