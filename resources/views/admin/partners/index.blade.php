@extends('admin.layouts.app')

@section('title', 'Kelola Mitra')
@section('page-title', 'Mitra')

@section('content')

<div class="admin-page-header">

    <div>
        <span class="admin-page-label">
            INFORMASI
        </span>

        <h2>
            Kelola <span>Mitra</span>
        </h2>

        <p>
            Kelola daftar mitra Yayasan Pusaka yang ditampilkan
            pada website publik.
        </p>
    </div>


    <a href="{{ route('admin.partners.create') }}"
       class="admin-primary-button">

        <i class="bi bi-plus-lg"></i>
        Tambah Mitra

    </a>

</div>


{{-- SUCCESS MESSAGE --}}
@if (session('success'))

    <div class="admin-alert success">

        <i class="bi bi-check-circle-fill"></i>

        <span>
            {{ session('success') }}
        </span>

    </div>

@endif


<div class="admin-panel">

    <div class="admin-panel-header">

        <div>
            <span>
                MITRA
            </span>

            <h3>
                Daftar Mitra
            </h3>
        </div>

        <div class="admin-panel-count">
            {{ $partners->count() }} mitra
        </div>

    </div>


    @if ($partners->count())

        <div class="admin-table-wrapper">

            <table class="admin-table">

                <thead>

                    <tr>
                        <th>Logo</th>
                        <th>Nama Mitra</th>
                        <th>Website</th>
                        <th>Urutan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>

                </thead>


                <tbody>

                    @foreach ($partners as $partner)

                        <tr>

                            {{-- LOGO --}}
                            <td>

                                <div class="admin-partner-logo">

                                    @if ($partner->logo)

                                        <img
                                            src="{{ asset('storage/' . $partner->logo) }}"
                                            alt="{{ $partner->name }}"
                                        >

                                    @else

                                        <div class="admin-partner-logo-placeholder">

                                            <i class="bi bi-building"></i>

                                        </div>

                                    @endif

                                </div>

                            </td>


                            {{-- NAMA --}}
                            <td>

                                <div class="admin-table-title">

                                    <strong>
                                        {{ $partner->name }}
                                    </strong>

                                    @if ($partner->description)

                                        <span>
                                            {{ \Illuminate\Support\Str::limit(
                                                $partner->description,
                                                70
                                            ) }}
                                        </span>

                                    @endif

                                </div>

                            </td>


                            {{-- WEBSITE --}}
                            <td>

                                @if ($partner->website)

                                    <a
                                        href="{{ $partner->website }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="admin-table-link"
                                    >
                                        <i class="bi bi-box-arrow-up-right"></i>
                                        Buka Website
                                    </a>

                                @else

                                    <span class="admin-table-muted">
                                        -
                                    </span>

                                @endif

                            </td>


                            {{-- URUTAN --}}
                            <td>

                                <span class="admin-order-badge">
                                    {{ $partner->sort_order }}
                                </span>

                            </td>


                            {{-- STATUS --}}
                            <td>

                                @if ($partner->is_active)

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


                            {{-- AKSI --}}
                            <td>

                                <div class="admin-table-actions">

                                    <a
                                        href="{{ route(
                                            'admin.partners.edit',
                                            $partner
                                        ) }}"
                                        class="admin-action-button"
                                        title="Edit Mitra"
                                    >
                                        <i class="bi bi-pencil-square"></i>
                                    </a>


                                    <form
                                        action="{{ route(
                                            'admin.partners.destroy',
                                            $partner
                                        ) }}"
                                        method="POST"
                                        onsubmit="return confirm(
                                            'Yakin ingin menghapus mitra ini?'
                                        )"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="admin-action-button danger"
                                            title="Hapus Mitra"
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


    @else

        {{-- EMPTY STATE --}}
        <div class="admin-empty-state">

            <div class="admin-empty-icon">
                <i class="bi bi-people"></i>
            </div>

            <h4>
                Belum Ada Mitra
            </h4>

            <p>
                Tambahkan mitra Yayasan Pusaka untuk mulai
                menampilkannya pada website publik.
            </p>

            <a
                href="{{ route('admin.partners.create') }}"
                class="admin-primary-button"
            >
                <i class="bi bi-plus-lg"></i>
                Tambah Mitra
            </a>

        </div>

    @endif

</div>

@endsection