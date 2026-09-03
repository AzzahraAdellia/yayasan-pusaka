@extends('admin.layouts.app')

@section('title', 'Kelola Legalitas')
@section('page-title', 'Legalitas')

@section('content')

<div class="admin-page-header">

    <div>
        <span class="admin-page-label">
            INFORMASI
        </span>

        <h2>
            Kelola <span>Legalitas</span>
        </h2>

        <p>
            Kelola dokumen legalitas Yayasan Pusaka yang akan
            ditampilkan pada website publik.
        </p>
    </div>

    <a href="{{ route('admin.legalities.create') }}"
       class="admin-primary-button">

        <i class="bi bi-plus-lg"></i>
        Tambah Legalitas

    </a>

</div>


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
                DOKUMEN
            </span>

            <h3>
                Daftar Legalitas
            </h3>

        </div>

        <div class="admin-panel-count">
            {{ $legalities->count() }} dokumen
        </div>

    </div>


    @if ($legalities->count())

        <div class="admin-table-wrapper">

            <table class="admin-table">

                <thead>

                    <tr>
                        <th>Dokumen</th>
                        <th>Nomor</th>
                        <th>Tanggal</th>
                        <th>Urutan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>

                </thead>


                <tbody>

                    @foreach ($legalities as $legality)

                        <tr>

                            {{-- DOKUMEN --}}
                            <td>

                                <div class="admin-table-title">

                                    <strong>
                                        {{ $legality->title }}
                                    </strong>

                                    @if ($legality->description)

                                        <span>
                                            {{ \Illuminate\Support\Str::limit(
                                                $legality->description,
                                                70
                                            ) }}
                                        </span>

                                    @endif

                                </div>

                            </td>


                            {{-- NOMOR --}}
                            <td>

                                @if ($legality->document_number)

                                    {{ $legality->document_number }}

                                @else

                                    <span class="admin-table-muted">
                                        -
                                    </span>

                                @endif

                            </td>


                            {{-- TANGGAL --}}
                            <td>

                                @if ($legality->document_date)

                                    {{ $legality->document_date->format('d/m/Y') }}

                                @else

                                    <span class="admin-table-muted">
                                        -
                                    </span>

                                @endif

                            </td>


                            {{-- URUTAN --}}
                            <td>

                                <span class="admin-order-badge">
                                    {{ $legality->sort_order }}
                                </span>

                            </td>


                            {{-- STATUS --}}
                            <td>

                                @if ($legality->is_active)

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


                                    @if ($legality->file)

                                        <a
                                            href="{{ asset('storage/' . $legality->file) }}"
                                            target="_blank"
                                            class="admin-action-button"
                                            title="Lihat Dokumen"
                                        >
                                            <i class="bi bi-eye"></i>
                                        </a>

                                    @endif


                                    <a
                                        href="{{ route(
                                            'admin.legalities.edit',
                                            $legality
                                        ) }}"
                                        class="admin-action-button"
                                        title="Edit"
                                    >
                                        <i class="bi bi-pencil-square"></i>
                                    </a>


                                    <form
                                        action="{{ route(
                                            'admin.legalities.destroy',
                                            $legality
                                        ) }}"
                                        method="POST"
                                        onsubmit="return confirm(
                                            'Yakin ingin menghapus data legalitas ini?'
                                        )"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="admin-action-button danger"
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


    @else

        <div class="admin-empty-state">

            <div class="admin-empty-icon">
                <i class="bi bi-file-earmark-check"></i>
            </div>

            <h4>
                Belum Ada Data Legalitas
            </h4>

            <p>
                Tambahkan dokumen legalitas pertama Yayasan Pusaka
                melalui Content Management System.
            </p>

            <a
                href="{{ route('admin.legalities.create') }}"
                class="admin-primary-button"
            >
                <i class="bi bi-plus-lg"></i>
                Tambah Legalitas
            </a>

        </div>

    @endif

</div>

@endsection