@extends('admin.layouts.app')

@section('title', 'Tambah Cerita Dampak')
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
            Tambah <span>Cerita Dampak</span>
        </h2>

        <p>
            Tambahkan cerita penerima manfaat dan dampak program
            Yayasan Pusaka untuk ditampilkan pada website publik.
        </p>
    </div>

    <a
        href="{{ route('admin.impact-stories.index') }}"
        class="admin-secondary-button"
    >
        <i class="bi bi-arrow-left"></i>
        Kembali
    </a>

</div>


{{-- =========================================================
    VALIDATION ERROR
========================================================= --}}
@if ($errors->any())

    <div class="admin-alert error">

        <i class="bi bi-exclamation-circle-fill"></i>

        <div>
            <strong>Data belum dapat disimpan.</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    </div>

@endif


{{-- =========================================================
    FORM
========================================================= --}}
<form
    action="{{ route('admin.impact-stories.store') }}"
    method="POST"
    enctype="multipart/form-data"
>

    @csrf

    <div class="admin-panel">

        <div class="admin-panel-header">

            <div>
                <span>
                    INFORMASI CERITA
                </span>

                <h3>
                    Data Cerita Dampak
                </h3>
            </div>

        </div>


        {{-- KATEGORI --}}
        <div class="admin-form-group">

            <label for="category">
                Kategori Program
                <span class="required">*</span>
            </label>

            <select
                name="category"
                id="category"
                class="admin-form-control"
                required
            >
                <option value="">Pilih kategori</option>

                <option
                    value="Pendidikan"
                    @selected(old('category') === 'Pendidikan')
                >
                    Pendidikan
                </option>

                <option
                    value="Sosial & Kemanusiaan"
                    @selected(old('category') === 'Sosial & Kemanusiaan')
                >
                    Sosial & Kemanusiaan
                </option>

                <option
                    value="Pemberdayaan"
                    @selected(old('category') === 'Pemberdayaan')
                >
                    Pemberdayaan
                </option>

                <option
                    value="Pelatihan & Pengembangan"
                    @selected(old('category') === 'Pelatihan & Pengembangan')
                >
                    Pelatihan & Pengembangan
                </option>

                <option
                    value="Lainnya"
                    @selected(old('category') === 'Lainnya')
                >
                    Lainnya
                </option>
            </select>

        </div>


        {{-- JUDUL --}}
        <div class="admin-form-group">

            <label for="title">
                Judul Cerita
                <span class="required">*</span>
            </label>

            <input
                type="text"
                name="title"
                id="title"
                class="admin-form-control"
                value="{{ old('title') }}"
                placeholder="Contoh: Dari Pelatihan Menjadi Peluang untuk Mandiri"
                required
            >

        </div>


        {{-- NAMA PENERIMA --}}
        <div class="admin-form-group">

            <label for="beneficiary_name">
                Nama Penerima Manfaat
            </label>

            <input
                type="text"
                name="beneficiary_name"
                id="beneficiary_name"
                class="admin-form-control"
                value="{{ old('beneficiary_name') }}"
                placeholder="Nama penerima manfaat (opsional)"
            >

            <small class="admin-form-help">
                Kosongkan apabila nama penerima manfaat tidak ingin ditampilkan.
            </small>

        </div>


        {{-- SUBJUDUL --}}
        <div class="admin-form-group">

            <label for="subtitle">
                Subjudul
            </label>

            <input
                type="text"
                name="subtitle"
                id="subtitle"
                class="admin-form-control"
                value="{{ old('subtitle') }}"
                placeholder="Kalimat pendek pendukung judul (opsional)"
            >

        </div>


        {{-- RINGKASAN --}}
        <div class="admin-form-group">

            <label for="excerpt">
                Ringkasan Cerita
            </label>

            <textarea
                name="excerpt"
                id="excerpt"
                class="admin-form-control"
                rows="4"
                placeholder="Tuliskan ringkasan singkat cerita yang akan tampil pada kartu..."
            >{{ old('excerpt') }}</textarea>

            <small class="admin-form-help">
                Ringkasan ini digunakan pada kartu Cerita Dampak di website.
            </small>

        </div>


        {{-- ISI CERITA --}}
        <div class="admin-form-group">

            <label for="content">
                Isi Cerita
                <span class="required">*</span>
            </label>

            <textarea
                name="content"
                id="content"
                class="admin-form-control"
                rows="12"
                placeholder="Tuliskan cerita lengkap penerima manfaat..."
                required
            >{{ old('content') }}</textarea>

        </div>


        {{-- FOTO --}}
        <div class="admin-form-group">

            <label for="image">
                Foto Utama
            </label>

            <input
                type="file"
                name="image"
                id="image"
                class="admin-form-control"
                accept="image/jpeg,image/png,image/webp"
            >

            <small class="admin-form-help">
                Format JPG, PNG, atau WEBP. Maksimal 5 MB.
            </small>

        </div>


        {{-- URUTAN --}}
        <div class="admin-form-group">

            <label for="sort_order">
                Urutan Tampilan
            </label>

            <input
                type="number"
                name="sort_order"
                id="sort_order"
                class="admin-form-control"
                value="{{ old('sort_order', 0) }}"
                min="0"
            >

            <small class="admin-form-help">
                Angka yang lebih kecil akan ditampilkan lebih dahulu.
            </small>

        </div>


        {{-- PENGATURAN --}}
        <div class="admin-form-group">

            <label>
                Pengaturan Publikasi
            </label>

            <div class="admin-checkbox-group">

                <label class="admin-checkbox">

                    <input
                        type="checkbox"
                        name="show_on_home"
                        value="1"
                        @checked(old('show_on_home'))
                    >

                    <span>
                        Tampilkan di Beranda
                    </span>

                </label>


                <label class="admin-checkbox">

                    <input
                        type="checkbox"
                        name="is_active"
                        value="1"
                        @checked(old('is_active', true))
                    >

                    <span>
                        Aktifkan Cerita
                    </span>

                </label>

            </div>

        </div>

    </div>


    {{-- =====================================================
        ACTION
    ====================================================== --}}
    <div class="admin-form-actions">

        <a
            href="{{ route('admin.impact-stories.index') }}"
            class="admin-secondary-button"
        >
            Batal
        </a>

        <button
            type="submit"
            class="admin-primary-button"
        >
            <i class="bi bi-check-lg"></i>
            Simpan Cerita
        </button>

    </div>

</form>

@endsection