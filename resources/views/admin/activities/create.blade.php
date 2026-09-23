@extends('admin.layouts.app')

@section('title', 'Tambah Kegiatan')
@section('page-title', 'Tambah Kegiatan')

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
            Tambah <span>Kegiatan</span>
        </h2>

        <p>
            Tambahkan informasi kegiatan Yayasan Pusaka
            yang akan ditampilkan pada website publik.
        </p>
    </div>

    <a href="{{ route('admin.activities.index') }}"
       class="admin-secondary-button">

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


{{-- =========================================================
    FORM
========================================================= --}}
<form
    action="{{ route('admin.activities.store') }}"
    method="POST"
    enctype="multipart/form-data"
>

    @csrf

    <div class="admin-form-layout">


        {{-- =================================================
            MAIN CONTENT
        ================================================= --}}
        <div class="admin-form-main">


            {{-- INFORMASI UTAMA --}}
            <div class="admin-panel">

                <div class="admin-panel-header">

                    <div>
                        <span>
                            INFORMASI UTAMA
                        </span>

                        <h3>
                            Detail Kegiatan
                        </h3>
                    </div>

                </div>


                <div class="admin-form-body">


                    {{-- JUDUL --}}
                    <div class="admin-form-group">

                        <label for="title">
                            Judul Kegiatan
                            <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            id="title"
                            name="title"
                            class="admin-form-control"
                            value="{{ old('title') }}"
                            placeholder="Contoh: Pelatihan Barista Batch 2"
                            required
                        >

                    </div>


                    {{-- KATEGORI --}}
                    <div class="admin-form-group">

                        <label for="category">
                            Kategori
                        </label>

                        <input
                            type="text"
                            id="category"
                            name="category"
                            class="admin-form-control"
                            value="{{ old('category') }}"
                            placeholder="Contoh: Pelatihan"
                        >

                    </div>


                    {{-- TANGGAL + LOKASI --}}
                    <div class="admin-form-row">

                        <div class="admin-form-group">

                            <label for="activity_date">
                                Tanggal Kegiatan
                            </label>

                            <input
                                type="date"
                                id="activity_date"
                                name="activity_date"
                                class="admin-form-control"
                                value="{{ old('activity_date') }}"
                            >

                        </div>


                        <div class="admin-form-group">

                            <label for="location">
                                Lokasi
                            </label>

                            <input
                                type="text"
                                id="location"
                                name="location"
                                class="admin-form-control"
                                value="{{ old('location') }}"
                                placeholder="Contoh: Bandung"
                            >

                        </div>

                    </div>


                    {{-- RINGKASAN --}}
                    <div class="admin-form-group">

                        <label for="excerpt">
                            Ringkasan
                        </label>

                        <textarea
                            id="excerpt"
                            name="excerpt"
                            class="admin-form-control"
                            rows="4"
                            maxlength="500"
                            placeholder="Tuliskan ringkasan singkat kegiatan..."
                        >{{ old('excerpt') }}</textarea>

                        <small class="admin-form-help">
                            Maksimal 500 karakter.
                        </small>

                    </div>


                    {{-- ISI --}}
                    <div class="admin-form-group">

                        <label for="content">
                            Isi Kegiatan
                            <span class="required">*</span>
                        </label>

                        <textarea
                            id="content"
                            name="content"
                            class="admin-form-control admin-content-editor"
                            rows="14"
                            placeholder="Tuliskan informasi lengkap kegiatan..."
                            required
                        >{{ old('content') }}</textarea>

                    </div>

                </div>

            </div>

        </div>


        {{-- =================================================
            SIDEBAR FORM
        ================================================= --}}
        <div class="admin-form-sidebar">


            {{-- PUBLIKASI --}}
            <div class="admin-panel">

                <div class="admin-panel-header">

                    <div>
                        <span>
                            PUBLIKASI
                        </span>

                        <h3>
                            Pengaturan
                        </h3>
                    </div>

                </div>


                <div class="admin-form-body">


                    {{-- STATUS --}}
                    <div class="admin-form-group">

                        <label for="status">
                            Status
                            <span class="required">*</span>
                        </label>

                        <select
                            id="status"
                            name="status"
                            class="admin-form-control"
                            required
                        >

                            <option
                                value="draft"
                                {{ old('status', 'draft') === 'draft' ? 'selected' : '' }}
                            >
                                Draft
                            </option>

                            <option
                                value="published"
                                {{ old('status') === 'published' ? 'selected' : '' }}
                            >
                                Terbitkan
                            </option>

                        </select>

                    </div>


                    {{-- FEATURED --}}
                    <div class="admin-form-group">

                        <label class="admin-checkbox">

                            <input
                                type="checkbox"
                                name="is_featured"
                                value="1"
                                {{ old('is_featured') ? 'checked' : '' }}
                            >

                            <span>
                                <strong>
                                    Jadikan Kegiatan Unggulan
                                </strong>

                                <small>
                                    Kegiatan ini akan diprioritaskan
                                    pada halaman publik.
                                </small>
                            </span>

                        </label>

                    </div>

                </div>

            </div>


            {{-- THUMBNAIL --}}
            <div class="admin-panel">

                <div class="admin-panel-header">

                    <div>
                        <span>
                            MEDIA
                        </span>

                        <h3>
                            Thumbnail
                        </h3>
                    </div>

                </div>


                <div class="admin-form-body">

                    <div class="admin-form-group">

                        <label for="thumbnail">
                            Gambar Kegiatan
                        </label>

                        <input
                            type="file"
                            id="thumbnail"
                            name="thumbnail"
                            class="admin-form-control"
                            accept=".jpg,.jpeg,.png,.webp"
                        >

                        <small class="admin-form-help">
                            JPG, JPEG, PNG atau WEBP. Maksimal 10 MB.
                        </small>

                    </div>

                </div>

            </div>

            
{{-- DOKUMENTASI KEGIATAN --}}
<div class="admin-panel">

    <div class="admin-panel-header">
        <div>
            <span>MEDIA</span>
            <h3>Dokumentasi Kegiatan</h3>
        </div>
    </div>

    <div class="admin-form-body">

        <p class="admin-form-help">
            Tambahkan foto untuk galeri pada halaman detail kegiatan.
            Caption boleh dikosongkan. Maksimal 20 foto dalam satu
            penyimpanan, masing-masing maksimal 10 MB.
        </p>

        <div id="documentation-photo-list"></div>

        <button
            type="button"
            id="add-documentation-photo"
            class="admin-secondary-button"
        >
            <i class="bi bi-plus-lg"></i>
            Tambah Foto Dokumentasi
        </button>

    </div>

</div>

            {{-- SUBMIT --}}
            <div class="admin-form-actions">

                <button
                    type="submit"
                    class="admin-primary-button"
                >
                    <i class="bi bi-check-lg"></i>
                    Simpan Kegiatan
                </button>

                <a
                    href="{{ route('admin.activities.index') }}"
                    class="admin-secondary-button"
                >
                    Batal
                </a>

            </div>

        </div>

    </div>

</form>

@endsection 



@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const list = document.getElementById('documentation-photo-list');
    const addButton = document.getElementById('add-documentation-photo');
    const form = list?.closest('form');
    const thumbnail = document.getElementById('thumbnail');

    if (!list || !addButton || !form) return;

    const MAX_PHOTOS = 20;
    const MAX_FILE_SIZE = 10 * 1024 * 1024;

    const ALLOWED_EXTENSIONS = ['jpg', 'jpeg', 'png', 'webp'];
    const ALLOWED_TYPES = [
        'image/jpeg',
        'image/png',
        'image/webp'
    ];

    let photoIndex = 0;

    function validateFile(file) {
        if (!file) {
            return 'Silakan pilih foto terlebih dahulu.';
        }

        const extension = file.name
            .split('.')
            .pop()
            .toLowerCase();

        if (
            !ALLOWED_EXTENSIONS.includes(extension) ||
            (file.type && !ALLOWED_TYPES.includes(file.type))
        ) {
            return 'Format foto harus JPG, JPEG, PNG, atau WEBP.';
        }

        if (file.size > MAX_FILE_SIZE) {
            return `Ukuran foto "${file.name}" melebihi 10 MB. Silakan ganti atau hapus foto ini.`;
        }

        return '';
    }

    function showFileError(input, message) {
        const group = input.closest('.admin-form-group');

        if (!group) return;

        let error = group.querySelector('.yp-photo-file-error');

        if (!error) {
            error = document.createElement('small');
            error.className = 'yp-photo-file-error';
            error.style.display = 'block';
            error.style.marginTop = '7px';
            error.style.color = '#b91c1c';
            error.style.fontWeight = '600';

            group.appendChild(error);
        }

        error.textContent = message;
        error.style.display = message ? 'block' : 'none';

        input.style.borderColor = message ? '#dc2626' : '';
    }

    function checkInput(input) {
        const file = input.files?.[0];

        const message = file
            ? validateFile(file)
            : (input.required
                ? 'Silakan pilih foto atau hapus bagian foto ini.'
                : '');

        showFileError(input, message);

        return message === '';
    }

    function createPhotoItem() {
        if (list.children.length >= MAX_PHOTOS) {
            alert('Maksimal 20 foto dalam satu penyimpanan.');
            return;
        }

        const index = photoIndex++;

        const item = document.createElement('div');
        item.className = 'admin-documentation-item';

        item.innerHTML = `
            <div class="admin-form-group">
                <label>Foto Dokumentasi</label>

                <input
                    type="file"
                    name="documentation_photos[${index}]"
                    class="admin-form-control yp-documentation-file"
                    accept=".jpg,.jpeg,.png,.webp"
                    required
                >

                <small class="admin-form-help">
                    Maksimal 10 MB per foto.
                </small>
            </div>

            <div class="admin-form-group">
                <label>Caption (Opsional)</label>

                <textarea
                    name="documentation_captions[${index}]"
                    class="admin-form-control"
                    rows="2"
                    maxlength="500"
                    placeholder="Keterangan foto..."
                ></textarea>
            </div>

            <button
                type="button"
                class="admin-secondary-button remove-documentation-photo"
            >
                <i class="bi bi-trash3"></i>
                Hapus Foto
            </button>
        `;

        const fileInput = item.querySelector('.yp-documentation-file');
        const removeButton = item.querySelector(
            '.remove-documentation-photo'
        );

        fileInput.addEventListener('change', function () {
            checkInput(fileInput);
        });

        removeButton.addEventListener('click', function () {
            item.remove();
        });

        list.appendChild(item);
    }

    addButton.addEventListener('click', createPhotoItem);

    if (thumbnail) {
        thumbnail.addEventListener('change', function () {
            const file = thumbnail.files?.[0];

            showFileError(
                thumbnail,
                file ? validateFile(file) : ''
            );
        });
    }

    form.addEventListener('submit', function (event) {
        let firstInvalidInput = null;

        if (thumbnail?.files?.length) {
            const thumbnailIsValid = checkInput(thumbnail);

            if (!thumbnailIsValid) {
                firstInvalidInput = thumbnail;
            }
        }

        const photoInputs = list.querySelectorAll(
            '.yp-documentation-file'
        );

        photoInputs.forEach(function (input) {
            const isValid = checkInput(input);

            if (!isValid && !firstInvalidInput) {
                firstInvalidInput = input;
            }
        });

        if (firstInvalidInput) {
            event.preventDefault();

            firstInvalidInput.scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });

            firstInvalidInput.focus();
        }
    });
});
</script>
@endpush