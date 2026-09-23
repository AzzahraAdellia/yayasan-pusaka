
@extends('admin.layouts.app')

@section('title', 'Kelola Pelatihan')
@section('page-title', 'Pelatihan')

@section('content')

<div class="admin-page-header">
    <div>
        <span class="admin-page-label">KONTEN</span>

        <h2>Kelola <span>Pelatihan</span></h2>

        <p>
            Kelola jenis pelatihan yang ditampilkan pada
            halaman Pelatihan & Pengembangan.
        </p>
    </div>

    <a href="{{ route('admin.trainings.create') }}"
       class="admin-primary-button">
        <i class="bi bi-plus-lg"></i>
        Tambah Pelatihan
    </a>
</div>

@if (session('success'))
    <div class="admin-alert success">
        <i class="bi bi-check-circle-fill"></i>
        <span>{{ session('success') }}</span>
    </div>
@endif

@if (session('error'))
    <div class="admin-alert">
        <i class="bi bi-exclamation-circle-fill"></i>
        <span>{{ session('error') }}</span>
    </div>
@endif

<div class="admin-panel admin-programs-page">

    <div class="admin-panel-header">
        <div>
            <span>PELATIHAN & PENGEMBANGAN</span>
            <h3>Daftar Pelatihan</h3>
        </div>

        <div class="admin-panel-count">
            {{ $trainings->count() }} pelatihan
        </div>
    </div>

    @if ($trainings->count())

        <div class="admin-program-grid">

            @foreach ($trainings as $training)

                <div class="admin-program-card">

                    <div class="admin-program-card-top">

                        <div class="admin-program-icon">
                            <i class="bi bi-mortarboard"></i>
                        </div>

                        @if ($training->is_active)
                            <span class="admin-status published">
                                <i class="bi bi-check-circle-fill"></i>
                                Aktif
                            </span>
                        @else
                            <span class="admin-status draft">
                                <i class="bi bi-eye-slash-fill"></i>
                                Nonaktif
                            </span>
                        @endif

                    </div>

                    <span class="admin-program-order">
                        URUTAN {{ $training->sort_order }}
                    </span>

                    <h3>{{ $training->name }}</h3>

                    <p>
                        {{ $training->short_description
                            ?: 'Belum ada deskripsi singkat.' }}
                    </p>

                    <div class="admin-program-footer">

                        <span>
                            {{ $training->batches_count }} batch
                        </span>

                        <a href="{{ route('admin.trainings.edit', $training) }}"
                           class="admin-primary-button">
                            <i class="bi bi-pencil-square"></i>
                            Edit Pelatihan
                        </a>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="admin-empty-state">

            <div class="admin-empty-icon">
                <i class="bi bi-mortarboard"></i>
            </div>

            <h4>Belum Ada Data Pelatihan</h4>

            <p>
                Tambahkan Pelatihan Barista, Make Up Artist,
                Fotografi, Talent Mapping, dan Program
                Magang Kerja ke Jepang melalui CMS.
            </p>

            <a href="{{ route('admin.trainings.create') }}"
               class="admin-primary-button">
                <i class="bi bi-plus-lg"></i>
                Tambah Pelatihan
            </a>

        </div>

    @endif

</div>

@endsection