
@extends('admin.layouts.app')

@section('title', 'Tambah UMKM Unggulan')
@section('page-title', 'Tambah UMKM Unggulan')

@section('content')

<div class="admin-page-header">
    <div>
        <span class="admin-page-label">
            PEMBERDAYAAN UMKM
        </span>

        <h2>
            Tambah <span>UMKM Unggulan</span>
        </h2>

        <p>
            Lengkapi informasi usaha dan produk yang akan
            dipromosikan melalui website Yayasan Pusaka.
        </p>
    </div>

    <a href="{{ route('admin.featured-umkm.index') }}"
       class="admin-primary-button">
        <i class="bi bi-arrow-left"></i>
        Kembali
    </a>
</div>

@if ($errors->any())
    <div class="admin-alert" style="background:#fff1f2;color:#be123c;margin-bottom:24px;">
        <i class="bi bi-exclamation-circle-fill"></i>
        <div>
            <strong>Periksa kembali data yang dimasukkan.</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

<div class="admin-panel">

    <div class="admin-panel-header">
        <div>
            <span>FORMULIR UMKM</span>
            <h3>Informasi UMKM Unggulan</h3>
        </div>
    </div>

    <form action="{{ route('admin.featured-umkm.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="row g-4 p-4">

            {{-- NAMA UMKM --}}
            <div class="col-md-6">
                <label for="business_name" class="form-label fw-semibold">
                    Nama UMKM <span class="text-danger">*</span>
                </label>

                <input type="text"
                       id="business_name"
                       name="business_name"
                       class="form-control"
                       value="{{ old('business_name') }}"
                       maxlength="255"
                       required
                       placeholder="Contoh: Dapur Pusaka">
            </div>

            {{-- NAMA PRODUK --}}
            <div class="col-md-6">
                <label for="product_name" class="form-label fw-semibold">
                    Nama Produk Unggulan <span class="text-danger">*</span>
                </label>

                <input type="text"
                       id="product_name"
                       name="product_name"
                       class="form-control"
                       value="{{ old('product_name') }}"
                       maxlength="255"
                       required
                       placeholder="Contoh: Dimsum Homemade">
            </div>

            {{-- DESKRIPSI --}}
            <div class="col-12">
                <label for="description" class="form-label fw-semibold">
                    Deskripsi Produk
                </label>

                <textarea id="description"
                          name="description"
                          class="form-control"
                          rows="4"
                          placeholder="Jelaskan produk unggulan UMKM...">{{ old('description') }}</textarea>
            </div>

            {{-- FOTO PRODUK --}}
            <div class="col-md-6">
                <label for="image" class="form-label fw-semibold">
                    Foto Produk
                </label>

                <input type="file"
                       id="image"
                       name="image"
                       class="form-control"
                       accept=".jpg,.jpeg,.png,.webp">

                <small class="text-muted">
                    JPG, PNG, atau WEBP. Maksimal 2 MB.
                </small>
            </div>

            {{-- NOMOR WHATSAPP --}}
            <div class="col-md-6">
                <label for="whatsapp" class="form-label fw-semibold">
                    Nomor WhatsApp Pemesanan
                </label>

                <input type="tel"
                       id="whatsapp"
                       name="whatsapp"
                       class="form-control"
                       value="{{ old('whatsapp') }}"
                       maxlength="20"
                       placeholder="Contoh: 081234567890">

                <small class="text-muted">
                    Gunakan nomor yang telah disetujui pemilik usaha
                    untuk dipublikasikan.
                </small>
            </div>

            {{-- ALAMAT --}}
            <div class="col-12">
                <label for="address" class="form-label fw-semibold">
                    Alamat Usaha
                </label>

                <textarea id="address"
                          name="address"
                          class="form-control"
                          rows="3"
                          placeholder="Masukkan alamat atau lokasi usaha yang boleh dipublikasikan...">{{ old('address') }}</textarea>
            </div>

            {{-- URUTAN --}}
            <div class="col-md-6">
                <label for="sort_order" class="form-label fw-semibold">
                    Urutan Tampil
                </label>

                <input type="number"
                       id="sort_order"
                       name="sort_order"
                       class="form-control"
                       value="{{ old('sort_order', 0) }}"
                       min="0">

                <small class="text-muted">
                    Angka lebih kecil ditampilkan terlebih dahulu.
                </small>
            </div>

            {{-- STATUS --}}
            <div class="col-md-6">
                <label class="form-label fw-semibold">
                    Status Publikasi
                </label>

                <div class="form-check form-switch mt-2">
                    <input type="hidden" name="is_active" value="0">

                    <input type="checkbox"
                           class="form-check-input"
                           id="is_active"
                           name="is_active"
                           value="1"
                           {{ old('is_active', 0) ? 'checked' : '' }}>

                    <label class="form-check-label" for="is_active">
                        Tampilkan di website publik
                    </label>
                </div>

                <small class="text-muted">
                    Biarkan nonaktif sampai informasi UMKM
                    selesai diperiksa dan disetujui.
                </small>
            </div>

            {{-- TOMBOL --}}
            <div class="col-12">
                <div class="d-flex gap-3 justify-content-end mt-3">

                    <a href="{{ route('admin.featured-umkm.index') }}"
                       class="btn btn-outline-secondary">
                        Batal
                    </a>

                    <button type="submit"
                            class="admin-primary-button border-0">
                        <i class="bi bi-check-lg"></i>
                        Simpan UMKM
                    </button>

                </div>
            </div>

        </div>

    </form>

</div>

@endsection
