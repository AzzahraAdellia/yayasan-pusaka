@extends('admin.layouts.app')

@section('title', 'Kelola Kegiatan')
@section('page-title', 'Kegiatan')

@section('content')

{{-- =========================================================
    PAGE HEADER
========================================================= --}}
<div class="admin-page-header">

    <div>
        <span class="admin-page-label">
            KONTEN
        </span>

        <h2>
            Kelola <span>Kegiatan</span>
        </h2>

        <p>
            Kelola informasi kegiatan Yayasan Pusaka yang akan
            ditampilkan pada website publik.
        </p>
    </div>

    <a href="{{ route('admin.activities.create') }}"
       class="admin-primary-button">

        <i class="bi bi-plus-lg"></i>
        Tambah Kegiatan

    </a>

</div>


{{-- =========================================================
    ALERT
========================================================= --}}

@if (session('success'))

    <div class="admin-alert success">
        <i class="bi bi-check-circle-fill"></i>

        <span>
            {{ session('success') }}
        </span>
    </div>

@endif


@if (session('error'))

    <div class="admin-alert error">
        <i class="bi bi-exclamation-circle-fill"></i>

        <span>
            {{ session('error') }}
        </span>
    </div>

@endif


{{-- =========================================================
    MAIN PANEL
========================================================= --}}
<div class="admin-panel">

    <div class="admin-panel-header">

        <div>
            <span>
                DAFTAR KONTEN
            </span>

            <h3>
                Semua Kegiatan
            </h3>
        </div>

        <div class="admin-panel-count">
            {{ $activities->total() }} kegiatan
        </div>

    </div>


    @if ($activities->count())

        <div class="admin-table-wrapper">

            <table class="admin-table">

                <thead>
                    <tr>
                        <th>Kegiatan</th>
                        <th>Kategori</th>
                        <th>Tanggal</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                        <th>Unggulan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($activities as $activity)

                        <tr>

                            {{-- KEGIATAN --}}
                            <td>

                                <div class="admin-content-cell">

                                    <div class="admin-content-thumbnail">

                                        @if ($activity->thumbnail)

                                            <img
                                                src="{{ asset('storage/' . $activity->thumbnail) }}"
                                                alt="{{ $activity->title }}"
                                            >

                                        @else

                                            <i class="bi bi-image"></i>

                                        @endif

                                    </div>

                                    <div class="admin-content-info">

                                        <strong>
                                            {{ $activity->title }}
                                        </strong>

                                        <span>
                                            {{ \Illuminate\Support\Str::limit(
                                                $activity->excerpt ?: 'Tidak ada ringkasan.',
                                                55
                                            ) }}
                                        </span>

                                    </div>

                                </div>

                            </td>


                            {{-- KATEGORI --}}
                            <td>

                                <span class="admin-category">
                                    {{ $activity->category ?: 'Umum' }}
                                </span>

                            </td>


                            {{-- TANGGAL --}}
                            <td>

                                @if ($activity->activity_date)

                                    {{ $activity->activity_date->format('d/m/Y') }}

                                @else

                                    <span class="admin-muted">
                                        -
                                    </span>

                                @endif

                            </td>


                            {{-- LOKASI --}}
                            <td>

                                @if ($activity->location)

                                    <span>
                                        <i class="bi bi-geo-alt"></i>
                                        {{ $activity->location }}
                                    </span>

                                @else

                                    <span class="admin-muted">
                                        -
                                    </span>

                                @endif

                            </td>


                            {{-- STATUS --}}
                            <td>

                                @if ($activity->status === 'published')

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

                            </td>


                            {{-- FEATURED --}}
                            <td>

                                @if ($activity->is_featured)

                                    <span class="admin-status featured">
                                        <i class="bi bi-star-fill"></i>
                                        Unggulan
                                    </span>

                                @else

                                    <span class="admin-muted">
                                        -
                                    </span>

                                @endif

                            </td>


                            {{-- ACTION --}}
                            <td>

                                <div class="admin-table-actions">

                                    <a
                                        href="{{ route('admin.activities.edit', $activity) }}"
                                        class="admin-action-button edit"
                                        title="Edit"
                                    >
                                        <i class="bi bi-pencil-square"></i>
                                    </a>


                                    <form
                                        action="{{ route('admin.activities.destroy', $activity) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus kegiatan ini?')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="admin-action-button delete"
                                            title="Hapus"
                                        >
                                            <i class="bi bi-trash3"></i>
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>


        {{-- PAGINATION --}}
        @if ($activities->hasPages())

            <div class="admin-pagination">
                {{ $activities->links() }}
            </div>

        @endif


    @else

        {{-- EMPTY STATE --}}
        <div class="admin-empty-state">

            <div class="admin-empty-icon">
                <i class="bi bi-calendar2-event"></i>
            </div>

            <h4>
                Belum Ada Kegiatan
            </h4>

            <p>
                Tambahkan kegiatan pertama Yayasan Pusaka
                melalui Content Management System.
            </p>

            <a
                href="{{ route('admin.activities.create') }}"
                class="admin-primary-button"
            >
                <i class="bi bi-plus-lg"></i>
                Tambah Kegiatan
            </a>

        </div>

    @endif

</div>

@endsection