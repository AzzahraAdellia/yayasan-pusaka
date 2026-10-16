
@extends('admin.layouts.app')

@section('title', 'Kelola UMKM Unggulan')
@section('page-title', 'UMKM Unggulan')

@section('content')

<div class="admin-page-header">

    <div>
        <span class="admin-page-label">
            PEMBERDAYAAN UMKM
        </span>

        <h2>
            Kelola <span>UMKM Unggulan</span>
        </h2>

        <p>
            Kelola produk dan informasi UMKM unggulan
            Yayasan Pusaka untuk membantu pemasaran
            usaha keluarga penerima manfaat Yayasan Pusaka.
        </p>
    </div>

    <a href="{{ route('admin.featured-umkm.create') }}"
       class="admin-primary-button">

        <i class="bi bi-plus-lg"></i>
        Tambah UMKM

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
            <span>UMKM UNGGULAN</span>

            <h3>Daftar UMKM Unggulan</h3>
        </div>

        <div class="admin-panel-count">
            {{ $umkms->total() }} UMKM
        </div>

    </div>


    @if ($umkms->count())

        <div class="admin-table-wrapper">

            <table class="admin-table">

                <thead>
                    <tr>
                        <th>Foto Produk</th>
                        <th>Nama UMKM</th>
                        <th>Produk</th>
                        <th>Kontak</th>
                        <th>Urutan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($umkms as $umkm)

                        <tr>

                            {{-- FOTO PRODUK --}}
                            <td>
                                <div class="admin-partner-logo">

                                    @if ($umkm->image)

                                        <img
                                            src="{{ asset('storage/' . $umkm->image) }}"
                                            alt="{{ $umkm->product_name }}"
                                            style="object-fit: cover;"
                                        >

                                    @else

                                        <div class="admin-partner-logo-placeholder">
                                            <i class="bi bi-image"></i>
                                        </div>

                                    @endif

                                </div>
                            </td>


                            {{-- NAMA UMKM --}}
                            <td>

                                <div class="admin-table-title">

                                    <strong>
                                        {{ $umkm->business_name }}
                                    </strong>

                                    @if ($umkm->address)

                                        <span>
                                            {{ \Illuminate\Support\Str::limit(
                                                $umkm->address,
                                                70
                                            ) }}
                                        </span>

                                    @endif

                                </div>

                            </td>


                            {{-- PRODUK --}}
                            <td>

                                <div class="admin-table-title">

                                    <strong>
                                        {{ $umkm->product_name }}
                                    </strong>

                                    @if ($umkm->description)

                                        <span>
                                            {{ \Illuminate\Support\Str::limit(
                                                $umkm->description,
                                                60
                                            ) }}
                                        </span>

                                    @endif

                                </div>

                            </td>


                            {{-- KONTAK --}}
                            <td>

                                @if ($umkm->whatsapp)

                                    @php
                                        $nomor = preg_replace(
                                            '/\D+/',
                                            '',
                                            $umkm->whatsapp
                                        );

                                        if (str_starts_with($nomor, '0')) {
                                            $nomor = '62' . substr($nomor, 1);
                                        }
                                    @endphp

                                    <a
                                        href="https://wa.me/{{ $nomor }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="admin-table-link"
                                    >
                                        <i class="bi bi-whatsapp"></i>
                                        WhatsApp
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
                                    {{ $umkm->sort_order }}
                                </span>
                            </td>


                            {{-- STATUS --}}
                            <td>

                                @if ($umkm->is_active)

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
                                            'admin.featured-umkm.edit',
                                            $umkm
                                        ) }}"
                                        class="admin-action-button"
                                        title="Edit UMKM"
                                    >
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <form
                                        action="{{ route(
                                            'admin.featured-umkm.destroy',
                                            $umkm
                                        ) }}"
                                        method="POST"
                                        onsubmit="return confirm(
                                            'Yakin ingin menghapus UMKM unggulan ini?'
                                        )"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="admin-action-button danger"
                                            title="Hapus UMKM"
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
        @if ($umkms->hasPages())

            <div class="mt-4">
                {{ $umkms->links() }}
            </div>

        @endif

    @else

        {{-- EMPTY STATE --}}
        <div class="admin-empty-state">

            <div class="admin-empty-icon">
                <i class="bi bi-shop"></i>
            </div>

            <h4>Belum Ada UMKM Unggulan</h4>

            <p>
                Tambahkan UMKM unggulan beserta foto produk,
                alamat, dan kontak pemesanan untuk membantu
                pemasaran produk keluarga penerima manfaat Yayasan Pusaka.
            </p>

            <a
                href="{{ route('admin.featured-umkm.create') }}"
                class="admin-primary-button"
            >
                <i class="bi bi-plus-lg"></i>
                Tambah UMKM
            </a>

        </div>

    @endif

</div>

@endsection
