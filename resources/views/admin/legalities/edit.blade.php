@extends('admin.layouts.app')

@section('title', 'Edit Legalitas')
@section('page-title', 'Edit Legalitas')

@section('content')

<div class="admin-page-header">

    <div>
        <span class="admin-page-label">
            INFORMASI
        </span>

        <h2>
            Edit <span>Legalitas</span>
        </h2>

        <p>
            Perbarui informasi dan dokumen legalitas Yayasan Pusaka
            yang ditampilkan pada website publik.
        </p>
    </div>

    <a href="{{ route('admin.legalities.index') }}"
       class="admin-secondary-button">

        <i class="bi bi-arrow-left"></i>
        Kembali

    </a>

</div>


{{-- ERROR --}}
@if ($errors->any())

    <div class="admin-alert error">

        <i class="bi bi-exclamation-circle-fill"></i>

        <div>

            <strong>
                Data belum dapat diperbarui.
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
    action="{{ route('admin.legalities.update', $legality) }}"
    method="POST"
    enctype="multipart/form-data"
>

    @csrf
    @method('PUT')


    <div class="admin-form-layout">

        {{-- =============================================
             MAIN CONTENT
        ============================================== --}}
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

                    {{-- NAMA DOKUMEN --}}
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
                            value="{{ old('title', $legality->title) }}"
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
                            value="{{ old(
                                'document_number',
                                $legality->document_number
                            ) }}"
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
                            value="{{ old(
                                'document_date',
                                optional($legality->document_date)->format('Y-m-d')
                            ) }}"
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
                        >{{ old('description', $legality->description) }}</textarea>

                        <small class="admin-form-help">
                            Maksimal 1000 karakter.
                        </small>

                    </div>

                </div>

            </div>

        </div>


        {{-- =============================================
             SIDEBAR
        ============================================== --}}
        <div class="admin-form-sidebar">

            {{-- FILE --}}
            <div class="admin-panel">

                <div class="admin-panel-header">

                    <div>

                        <span>
                            DOKUMEN
                        </span>

                        <h3>
                            File Legalitas
                        </h3>

                    </div>

                </div>


                <div class="admin-form-body">

                    {{-- FILE SAAT INI --}}
                    @if ($legality->file)

                        <div class="admin-current-file">

                            <div>

                                <i class="bi bi-file-earmark-check"></i>

                                <span>
                                    Dokumen saat ini
                                </span>

                            </div>

                            <a
                                href="{{ asset('storage/' . $legality->file) }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="admin-table-link"
                            >
                                <i class="bi bi-eye"></i>
                                Lihat File
                            </a>

                        </div>

                    @else

                        <div class="admin-form-help"
                             style="margin-bottom: 18px;">

                            Belum ada file yang diunggah.

                        </div>

                    @endif


                    <div class="admin-form-group">

                        <label for="file">

                            {{ $legality->file
                                ? 'Ganti File'
                                : 'Upload File' }}

                        </label>

                        <input
                            type="file"
                            id="file"
                            name="file"
                            class="admin-form-control"
                            accept=".pdf,.jpg,.jpeg,.png"
                        >

                        <small class="admin-form-help">
                            Kosongkan jika tidak ingin mengganti file.
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
                            value="{{ old(
                                'sort_order',
                                $legality->sort_order
                            ) }}"
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
                                {{ old(
                                    'is_active',
                                    $legality->is_active
                                ) ? 'checked' : '' }}
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
                    Simpan Perubahan

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