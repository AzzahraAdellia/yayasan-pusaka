@extends('admin.layouts.app')

@section('title', 'Tambah Legalitas')
@section('page-title', 'Tambah Legalitas')

@section('content')

<div class="admin-page-header">

    <div>
        <span class="admin-page-label">
            INFORMASI
        </span>

        <h2>
            Tambah <span>Legalitas</span>
        </h2>

        <p>
            Tambahkan dokumen legalitas Yayasan Pusaka
            untuk ditampilkan pada website publik.
        </p>
    </div>

    <a href="{{ route('admin.legalities.index') }}"
       class="admin-secondary-button">

        <i class="bi bi-arrow-left"></i>
        Kembali

    </a>

</div>


@if ($errors->any())

    <div class="admin-alert error">

        <i class="bi bi-exclamation-circle-fill"></i>

        <div>

            <strong>
                Data belum dapat disimpan.
            </strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>

    </div>

@endif


<form
    action="{{ route('admin.legalities.store') }}"
    method="POST"
    enctype="multipart/form-data"
>

    @csrf

    <div class="admin-form-layout">

        {{-- MAIN CONTENT --}}
        <div class="admin-form-main">

            <div class="admin-panel">

                <div class="admin-panel-header">

                    <div>

                        <span>
                            INFORMASI DOKUMEN
                        </span>

                        <h3>
                            Detail Legalitas
                        </h3>

                    </div>

                </div>


                <div class="admin-form-body">

                    {{-- JUDUL --}}
                    <div class="admin-form-group">

                        <label for="title">
                            Nama Dokumen
                            <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            id="title"
                            name="title"
                            class="admin-form-control"
                            value="{{ old('title') }}"
                            placeholder="Contoh: Akta Pendirian Yayasan"
                            required
                        >

                    </div>


                    {{-- NOMOR DOKUMEN --}}
                    <div class="admin-form-group">

                        <label for="document_number">
                            Nomor Dokumen
                        </label>

                        <input
                            type="text"
                            id="document_number"
                            name="document_number"
                            class="admin-form-control"
                            value="{{ old('document_number') }}"
                            placeholder="Contoh: AHU-0000000.AH.01.04"
                        >

                    </div>


                    {{-- TANGGAL --}}
                    <div class="admin-form-group">

                        <label for="document_date">
                            Tanggal Dokumen
                        </label>

                        <input
                            type="date"
                            id="document_date"
                            name="document_date"
                            class="admin-form-control"
                            value="{{ old('document_date') }}"
                        >

                    </div>


                    {{-- DESKRIPSI --}}
                    <div class="admin-form-group">

                        <label for="description">
                            Deskripsi
                        </label>

                        <textarea
                            id="description"
                            name="description"
                            class="admin-form-control"
                            rows="7"
                            maxlength="1000"
                            placeholder="Tuliskan keterangan singkat mengenai dokumen legalitas..."
                        >{{ old('description') }}</textarea>

                        <small class="admin-form-help">
                            Maksimal 1000 karakter.
                        </small>

                    </div>

                </div>

            </div>

        </div>


        {{-- SIDEBAR --}}
        <div class="admin-form-sidebar">

            {{-- FILE --}}
            <div class="admin-panel">

                <div class="admin-panel-header">

                    <div>

                        <span>
                            DOKUMEN
                        </span>

                        <h3>
                            Upload File
                        </h3>

                    </div>

                </div>


                <div class="admin-form-body">

                    <div class="admin-form-group">

                        <label for="file">
                            File Legalitas
                        </label>

                        <input
                            type="file"
                            id="file"
                            name="file"
                            class="admin-form-control"
                            accept=".pdf,.jpg,.jpeg,.png"
                        >

                        <small class="admin-form-help">
                            PDF, JPG, JPEG atau PNG. Maksimal 5 MB.
                        </small>

                    </div>

                </div>

            </div>


            {{-- PENGATURAN --}}
            <div class="admin-panel">

                <div class="admin-panel-header">

                    <div>

                        <span>
                            TAMPILAN
                        </span>

                        <h3>
                            Pengaturan
                        </h3>

                    </div>

                </div>


                <div class="admin-form-body">

                    {{-- URUTAN --}}
                    <div class="admin-form-group">

                        <label for="sort_order">
                            Urutan Tampil
                            <span class="required">*</span>
                        </label>

                        <input
                            type="number"
                            id="sort_order"
                            name="sort_order"
                            class="admin-form-control"
                            value="{{ old('sort_order', 0) }}"
                            min="0"
                            required
                        >

                        <small class="admin-form-help">
                            Angka lebih kecil akan tampil lebih dahulu.
                        </small>

                    </div>


                    {{-- STATUS --}}
                    <div class="admin-form-group">

                        <label class="admin-checkbox">

                            <input
                                type="checkbox"
                                name="is_active"
                                value="1"
                                {{ old('is_active', true) ? 'checked' : '' }}
                            >

                            <span>

                                <strong>
                                    Legalitas Aktif
                                </strong>

                                <small>
                                    Dokumen ditampilkan pada website publik.
                                </small>

                            </span>

                        </label>

                    </div>

                </div>

            </div>


            {{-- ACTION --}}
            <div class="admin-form-actions">

                <button
                    type="submit"
                    class="admin-primary-button"
                >
                    <i class="bi bi-check-lg"></i>
                    Simpan Legalitas
                </button>

                <a
                    href="{{ route('admin.legalities.index') }}"
                    class="admin-secondary-button"
                >
                    Batal
                </a>

            </div>

        </div>

    </div>

</form>

@endsection