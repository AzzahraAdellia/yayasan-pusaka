@extends('admin.layouts.app')

@section('title', 'Kelola Cerita Dampak')
@section('page-title', 'Cerita Dampak')

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
            Kelola <span>Cerita Dampak</span>
        </h2>

        <p>
            Kelola cerita penerima manfaat dan dampak program
            Yayasan Pusaka yang akan ditampilkan pada website publik.
        </p>
    </div>

    <a href="{{ route('admin.impact-stories.create') }}"
       class="admin-primary-button">

        <i class="bi bi-plus-lg"></i>
        Tambah Cerita

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
                Semua Cerita Dampak
            </h3>
        </div>

        <div class="admin-panel-count">
            {{ $stories->total() }} cerita
        </div>

    </div>


    @if ($stories->count())

        <div class="admin-table-wrapper">

            <table class="admin-table">

                <thead>
                    <tr>
                        <th>Cerita</th>
                        <th>Kategori</th>
                        <th>Penerima Manfaat</th>
                        <th>Beranda</th>
                        <th>Status</th>
                        <th>Urutan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($stories as $story)

                        <tr>

                            {{-- CERITA --}}
                            <td>

                                <div class="admin-content-cell">

                                    <div class="admin-content-thumbnail">

                                        @if ($story->image)

                                            <img
                                                src="{{ asset('storage/' . $story->image) }}"
                                                alt="{{ $story->title }}"
                                            >

                                        @else

                                            <i class="bi bi-image"></i>

                                        @endif

                                    </div>

                                    <div class="admin-content-info">

                                        <strong>
                                            {{ $story->title }}
                                        </strong>

                                        <span>
                                            {{ \Illuminate\Support\Str::limit(
                                                $story->excerpt ?: 'Tidak ada ringkasan.',
                                                55
                                            ) }}
                                        </span>

                                    </div>

                                </div>

                            </td>


                            {{-- KATEGORI --}}
                            <td>

                                <span class="admin-category">
                                    {{ $story->category }}
                                </span>

                            </td>


                            {{-- PENERIMA MANFAAT --}}
                            <td>

                                @if ($story->beneficiary_name)

                                    {{ $story->beneficiary_name }}

                                @else

                                    <span class="admin-muted">
                                        -
                                    </span>

                                @endif

                            </td>


                            {{-- TAMPIL DI BERANDA --}}
                            <td>

                                @if ($story->show_on_home)

                                    <span class="admin-status featured">
                                        <i class="bi bi-house-heart-fill"></i>
                                        Tampil
                                    </span>

                                @else

                                    <span class="admin-muted">
                                        -
                                    </span>

                                @endif

                            </td>


                            {{-- STATUS --}}
                            <td>

                                @if ($story->is_active)

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

                            </td>


                            {{-- URUTAN --}}
                            <td>

                                {{ $story->sort_order }}

                            </td>


                            {{-- ACTION --}}
                            <td>

                                <div class="admin-table-actions">

                                    <a
                                        href="{{ route('admin.impact-stories.edit', $story) }}"
                                        class="admin-action-button edit"
                                        title="Edit"
                                    >
                                        <i class="bi bi-pencil-square"></i>
                                    </a>


                                    <form
                                        action="{{ route('admin.impact-stories.destroy', $story) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus cerita dampak ini?')"
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
        @if ($stories->hasPages())

            <div class="admin-pagination">
                {{ $stories->links() }}
            </div>

        @endif


    @else

        {{-- EMPTY STATE --}}
        <div class="admin-empty-state">

            <div class="admin-empty-icon">
                <i class="bi bi-chat-heart"></i>
            </div>

            <h4>
                Belum Ada Cerita Dampak
            </h4>

            <p>
                Tambahkan cerita penerima manfaat pertama
                melalui Content Management System.
            </p>

            <a
                href="{{ route('admin.impact-stories.create') }}"
                class="admin-primary-button"
            >
                <i class="bi bi-plus-lg"></i>
                Tambah Cerita
            </a>

        </div>

    @endif

</div>

@endsection