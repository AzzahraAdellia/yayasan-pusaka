@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')

{{-- =========================================================
    PAGE HEADER
========================================================= --}}
<div class="admin-page-header">

    <div>
        <span class="admin-page-label">
            OVERVIEW
        </span>

        <h2>
            Selamat Datang,
            <span>{{ auth()->user()->name }}</span>
        </h2>

        <p>
            Kelola konten dan informasi website Yayasan Pusaka
            melalui Content Management System.
        </p>
    </div>

</div>


{{-- =========================================================
    STATISTIC CARDS
========================================================= --}}
<div class="admin-stats-grid">

    {{-- TOTAL BERITA --}}
    <div class="admin-stat-card">

        <div class="admin-stat-icon blue">
            <i class="bi bi-newspaper"></i>
        </div>

        <div class="admin-stat-info">

            <span>
                Total Berita
            </span>

            <strong>
                {{ $newsCount }}
            </strong>

            <small>
                Seluruh berita
            </small>

        </div>

    </div>


    {{-- BERITA TERBIT --}}
    <div class="admin-stat-card">

        <div class="admin-stat-icon orange">
            <i class="bi bi-check-circle-fill"></i>
        </div>

        <div class="admin-stat-info">

            <span>
                Berita Terbit
            </span>

            <strong>
                {{ $publishedNewsCount }}
            </strong>

            <small>
                Sudah dipublikasikan
            </small>

        </div>

    </div>


    {{-- DRAFT --}}
    <div class="admin-stat-card">

        <div class="admin-stat-icon blue">
            <i class="bi bi-file-earmark-text"></i>
        </div>

        <div class="admin-stat-info">

            <span>
                Draft Berita
            </span>

            <strong>
                {{ $draftNewsCount }}
            </strong>

            <small>
                Belum dipublikasikan
            </small>

        </div>

    </div>


    {{-- USER / ROLE --}}
    <div class="admin-stat-card">

        <div class="admin-stat-icon orange">
            <i class="bi bi-people-fill"></i>
        </div>

        <div class="admin-stat-info">

            @if (auth()->user()->role === 'admin')

                <span>
                    Total User
                </span>

                <strong>
                    {{ $userCount }}
                </strong>

                <small>
                    {{ $staffCount }} akun staff
                </small>

            @else

                <span>
                    Role Akun
                </span>

                <strong class="admin-stat-role">
                    Staff
                </strong>

                <small>
                    Pengguna CMS
                </small>

            @endif

        </div>

    </div>

</div>


{{-- =========================================================
    MAIN DASHBOARD
========================================================= --}}
<div class="admin-dashboard-grid">


    {{-- =====================================================
        KONTEN TERBARU
    ====================================================== --}}
    <div class="admin-panel">

        <div class="admin-panel-header">

            <div>

                <span>
                    KONTEN TERBARU
                </span>

                <h3>
                    Berita Terbaru
                </h3>

            </div>

            <a href="{{ route('admin.news.index') }}">
                Lihat Semua
                <i class="bi bi-arrow-right"></i>
            </a>

        </div>


        @if ($latestNews->count())

            <div class="admin-dashboard-news-list">

                @foreach ($latestNews as $item)

                    <a
                        href="{{ route('admin.news.edit', $item) }}"
                        class="admin-dashboard-news-item"
                    >

                        {{-- THUMBNAIL --}}
                        <div class="admin-dashboard-news-thumbnail">

                            @if ($item->thumbnail)

                                <img
                                    src="{{ asset('storage/' . $item->thumbnail) }}"
                                    alt="{{ $item->title }}"
                                >

                            @else

                                <i class="bi bi-image"></i>

                            @endif

                        </div>


                        {{-- INFORMATION --}}
                        <div class="admin-dashboard-news-content">

                            <strong>
                                {{ $item->title }}
                            </strong>

                            <span>

                                {{ $item->category ?: 'Umum' }}

                                <b>•</b>

                                {{ $item->created_at->format('d/m/Y') }}

                            </span>

                        </div>


                        {{-- STATUS --}}
                        <div>

                            @if ($item->status === 'published')

                                <span class="admin-status published">
                                    <i class="bi bi-check-circle-fill"></i>
                                    Terbit
                                </span>

                            @else

                                <span class="admin-status draft">
                                    <i class="bi bi-clock-fill"></i>
                                    Draft
                                </span>

                            @endif

                        </div>

                    </a>

                @endforeach

            </div>

        @else

            <div class="admin-empty-state">

                <div class="admin-empty-icon">
                    <i class="bi bi-folder2-open"></i>
                </div>

                <h4>
                    Belum Ada Berita
                </h4>

                <p>
                    Berita yang dibuat melalui CMS
                    akan tampil di bagian ini.
                </p>

                <a
                    href="{{ route('admin.news.create') }}"
                    class="admin-primary-button"
                >
                    <i class="bi bi-plus-lg"></i>
                    Tambah Berita
                </a>

            </div>

        @endif

    </div>



    {{-- =====================================================
        QUICK ACTION
    ====================================================== --}}
    <div class="admin-panel">

        <div class="admin-panel-header">

            <div>

                <span>
                    AKSES CEPAT
                </span>

                <h3>
                    Quick Action
                </h3>

            </div>

        </div>


        <div class="admin-quick-actions">


            {{-- TAMBAH BERITA --}}
            <a href="{{ route('admin.news.create') }}">

                <div class="blue">
                    <i class="bi bi-plus-lg"></i>
                </div>

                <section>

                    <strong>
                        Tambah Berita
                    </strong>

                    <span>
                        Buat berita baru
                    </span>

                </section>

                <i class="bi bi-chevron-right"></i>

            </a>


            {{-- DAFTAR BERITA --}}
            <a href="{{ route('admin.news.index') }}">

                <div class="orange">
                    <i class="bi bi-newspaper"></i>
                </div>

                <section>

                    <strong>
                        Kelola Berita
                    </strong>

                    <span>
                        Lihat dan edit berita
                    </span>

                </section>

                <i class="bi bi-chevron-right"></i>

            </a>


            {{-- KELOLA USER - ADMIN ONLY --}}
            @if (auth()->user()->role === 'admin')

                <a href="{{ route('admin.users.index') }}">

                    <div class="blue">
                        <i class="bi bi-person-gear"></i>
                    </div>

                    <section>

                        <strong>
                            Kelola User
                        </strong>

                        <span>
                            Atur akun dan role pengguna
                        </span>

                    </section>

                    <i class="bi bi-chevron-right"></i>

                </a>

            @endif


            {{-- WEBSITE PUBLIK --}}
            <a
                href="{{ route('home') }}"
                target="_blank"
            >

                <div class="orange">
                    <i class="bi bi-globe2"></i>
                </div>

                <section>

                    <strong>
                        Lihat Website
                    </strong>

                    <span>
                        Buka website publik
                    </span>

                </section>

                <i class="bi bi-box-arrow-up-right"></i>

            </a>

        </div>

    </div>

</div>



{{-- =========================================================
    CMS INFORMATION
========================================================= --}}

<div class="admin-panel admin-dashboard-info-panel">

    <div class="admin-panel-header">

        <div>

            <span>
                CMS YAYASAN PUSAKA
            </span>

            <h3>
                Pengelolaan Website
            </h3>

        </div>

    </div>


    <div class="admin-dashboard-modules">

        {{-- BERITA --}}
        <a
            href="{{ route('admin.news.index') }}"
            class="admin-dashboard-module"
        >

            <div class="admin-dashboard-module-icon blue">
                <i class="bi bi-newspaper"></i>
            </div>

            <div>

                <strong>
                    Berita
                </strong>

                <span>
                    Kelola berita dan informasi terbaru.
                </span>

            </div>

        </a>


        {{-- KEGIATAN --}}
        <a
            href="{{ route('admin.activities.index') }}"
            class="admin-dashboard-module"
        >

            <div class="admin-dashboard-module-icon orange">
                <i class="bi bi-calendar-event"></i>
            </div>

            <div>

                <strong>
                    Kegiatan
                </strong>

                <span>
                    Kelola kegiatan Yayasan Pusaka.
                </span>

            </div>

        </a>


        {{-- PROGRAM --}}
        <a
            href="{{ route('admin.programs.index') }}"
            class="admin-dashboard-module"
        >

            <div class="admin-dashboard-module-icon blue">
                <i class="bi bi-grid"></i>
            </div>

            <div>

                <strong>
                    Program
                </strong>

                <span>
                    Kelola informasi program Yayasan Pusaka.
                </span>

            </div>

        </a>


        {{-- MITRA --}}
        <a
            href="{{ route('admin.partners.index') }}"
            class="admin-dashboard-module"
        >

            <div class="admin-dashboard-module-icon orange">
                <i class="bi bi-people"></i>
            </div>

            <div>

                <strong>
                    Mitra
                </strong>

                <span>
                    Kelola mitra dan logo kolaborasi Yayasan Pusaka.
                </span>

            </div>

        </a>


        {{-- USER --}}
        @if (auth()->user()->role === 'admin')

            <a
                href="{{ route('admin.users.index') }}"
                class="admin-dashboard-module"
            >

                <div class="admin-dashboard-module-icon blue">
                    <i class="bi bi-person-gear"></i>
                </div>

                <div>

                    <strong>
                        User CMS
                    </strong>

                    <span>
                        Kelola akun Admin dan Staff.
                    </span>

                </div>

            </a>

        @endif

    </div>

</div>

@endsection