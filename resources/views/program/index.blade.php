@extends('layouts.app')

@section('title', 'Program | Yayasan Pusaka')

@section('content')

{{-- =========================
     PAGE HERO
========================= --}}

<section class="program-page-hero">

    <div class="container">

        <div class="program-page-hero-content">

            <span class="section-label">
                PROGRAM KAMI
            </span>

            <h1>
                Program untuk Tumbuh,
                <span>Berdaya, dan Mandiri.</span>
            </h1>

            <p>
                Yayasan Pusaka menjalankan berbagai program sosial,
                pendidikan, pemberdayaan, serta pengembangan yang
                dirancang berdasarkan kebutuhan penerima manfaat.
            </p>

            <div class="profile-breadcrumb">

                <a href="{{ route('home') }}">
                    Beranda
                </a>

                <i class="bi bi-chevron-right"></i>

                <span>
                    Program
                </span>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     PROGRAM INTRO
========================= --}}

<section class="program-page-intro section-padding">

    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-5">

                <span class="section-label">
                    PROGRAM YAYASAN
                </span>

                <h2 class="section-title">
                    Hadir Berdasarkan
                    <span>Kebutuhan Nyata.</span>
                </h2>

            </div>


            <div class="col-lg-7">

                <p class="section-description">
                    Setiap program Yayasan Pusaka disusun untuk membantu
                    penerima manfaat memperoleh dukungan yang relevan,
                    baik melalui pendidikan, sosial, pemberdayaan,
                    maupun pengembangan keterampilan.
                </p>

                <p class="section-description">
                    Pendekatan program tidak hanya berfokus pada bantuan,
                    tetapi juga pada proses pendampingan, pengembangan
                    potensi, serta keberlanjutan manfaat.
                </p>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     PROGRAM CATEGORIES
========================= --}}

<section class="program-category-section section-padding">

    <div class="container">

        <div class="program-category-heading text-center">

            <span class="section-label">
                BIDANG PROGRAM
            </span>

            <h2 class="section-title">
                Empat Bidang Utama
                <span>Program Kami.</span>
            </h2>

            <p>
                Program dikelompokkan agar masyarakat dapat lebih mudah
                memahami bidang kegiatan dan bentuk manfaat yang diberikan.
            </p>

        </div>


        <div class="row g-4">

            @foreach ($programs as $program)

                @php

                    /*
                    |--------------------------------------------------------------------------
                    | WARNA ICON
                    |--------------------------------------------------------------------------
                    */

                    $iconColor = in_array(
                        $program->slug,
                        [
                            'pendidikan',
                            'pelatihan-pengembangan'
                        ]
                    ) ? 'blue' : 'orange';


                    /*
                    |--------------------------------------------------------------------------
                    | ROUTE DETAIL
                    |--------------------------------------------------------------------------
                    */

                    $programRoute = match ($program->slug) {

                        'pendidikan'
                            => route('programs.education'),

                        'sosial-kemanusiaan'
                            => route('programs.social'),

                        'pemberdayaan'
                            => route('programs.empowerment'),

                        'pelatihan-pengembangan'
                            => route('programs.training'),

                        default
                            => route('programs.index'),
                    };


                    /*
                    |--------------------------------------------------------------------------
                    | ITEM PROGRAM
                    |--------------------------------------------------------------------------
                    */

                    $programItems = match ($program->slug) {

                        'pendidikan' => [
                            'Bantuan Pendidikan',
                            'Anak Asuh',
                        ],

                        'sosial-kemanusiaan' => [
                            'Anak Yatim/Piatu',
                            'Dukungan ABK',
                            'Bantuan Sosial',
                        ],

                        'pemberdayaan' => [
                            'UMKM',
                            'Kewirausahaan',
                        ],

                        'pelatihan-pengembangan' => [
                            'Pelatihan Keterampilan',
                            'Talent Mapping',
                            'Pengembangan Karier',
                        ],

                        default => [],
                    };

                @endphp


                <div class="col-md-6">

                    <article class="program-category-card">

                        <div class="program-category-top">

                            <div class="program-category-icon {{ $iconColor }}">

                                <i class="bi {{ $program->icon ?: 'bi-grid' }}"></i>

                            </div>


                            <span>
                                {{ str_pad(
                                    $loop->iteration,
                                    2,
                                    '0',
                                    STR_PAD_LEFT
                                ) }}
                            </span>

                        </div>


                        <h3>
                            {{ $program->name }}
                        </h3>


                        <p>
                            {{ $program->short_description
                                ?: 'Informasi program Yayasan Pusaka.'
                            }}
                        </p>


                        @if (count($programItems))

                            <div class="program-category-items">

                                @foreach ($programItems as $item)

                                    <span>

                                        <i class="bi bi-check-circle-fill"></i>

                                        {{ $item }}

                                    </span>

                                @endforeach

                            </div>

                        @endif


                        <a href="{{ $programRoute }}">

                            Lihat Program {{ $program->name }}

                            <i class="bi bi-arrow-right"></i>

                        </a>

                    </article>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- =========================
     PROGRAM APPROACH
========================= --}}

<section class="program-approach">

    <div class="container">

        <div class="program-approach-wrapper">

            <div>

                <span>
                    PENDEKATAN PROGRAM
                </span>

                <h2>
                    Dari Kepedulian Menuju
                    <strong>Kemandirian.</strong>
                </h2>

                <p>
                    Program Yayasan Pusaka dirancang dengan melihat
                    kebutuhan penerima manfaat, proses pendampingan,
                    pengembangan potensi, serta dampak jangka panjang.
                </p>

            </div>


            <a href="{{ route('impact') }}"
               class="profile-commitment-btn">

                Lihat Dampak Kami

                <i class="bi bi-arrow-right"></i>

            </a>

        </div>

    </div>

</section>

@endsection