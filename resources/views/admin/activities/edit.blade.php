@extends('admin.layouts.app')

@section('title', 'Edit Kegiatan')
@section('page-title', 'Edit Kegiatan')

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
            Edit <span>Kegiatan</span>
        </h2>

        <p>
            Perbarui informasi kegiatan Yayasan Pusaka
            yang ditampilkan pada website publik.
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


{{-- =========================================================
    FORM
========================================================= --}}
<form
    action="{{ route('admin.activities.update', $activity) }}"
    method="POST"
    enctype="multipart/form-data"
>

    @csrf
    @method('PUT')

    <div class="admin-form-layout">


        {{-- =================================================
            MAIN CONTENT
        ================================================= --}}
        <div class="admin-form-main">

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
                            value="{{ old('title', $activity->title) }}"
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
                            value="{{ old('category', $activity->category) }}"
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
                                value="{{ old(
                                    'activity_date',
                                    optional($activity->activity_date)->format('Y-m-d')
                                ) }}"
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
                                value="{{ old('location', $activity->location) }}"
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
                        >{{ old('excerpt', $activity->excerpt) }}</textarea>

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
                            required
                        >{{ old('content', $activity->content) }}</textarea>

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
                                {{ old('status', $activity->status) === 'draft' ? 'selected' : '' }}
                            >
                                Draft
                            </option>

                            <option
                                value="published"
                                {{ old('status', $activity->status) === 'published' ? 'selected' : '' }}
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
                                {{ old(
                                    'is_featured',
                                    $activity->is_featured
                                ) ? 'checked' : '' }}
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


                    @if ($activity->published_at)

                        <div class="admin-form-info">

                            <i class="bi bi-check-circle"></i>

                            <span>
                                Dipublikasikan:
                                {{ $activity->published_at->format('d/m/Y H:i') }}
                            </span>

                        </div>

                    @endif

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


                    @if ($activity->thumbnail)

                        <div class="admin-current-image">

                            <img
                                src="{{ asset('storage/' . $activity->thumbnail) }}"
                                alt="{{ $activity->title }}"
                            >

                            <span>
                                Gambar saat ini
                            </span>

                        </div>

                    @endif


                    <div class="admin-form-group">

                        <label for="thumbnail">
                            Ganti Gambar
                        </label>

                        <input
                            type="file"
                            id="thumbnail"
                            name="thumbnail"
                            class="admin-form-control"
                            accept=".jpg,.jpeg,.png,.webp"
                        >

                        <small class="admin-form-help">
                            Kosongkan jika tidak ingin mengganti gambar.
                            Maksimal 10 MB.
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
            Foto berikut tampil pada galeri halaman detail kegiatan.
            Kamu bisa mengubah caption, menghapus foto tertentu,
            atau menambahkan foto baru.
        </p>

        {{-- FOTO YANG SUDAH TERSIMPAN --}}
        @forelse ($activity->photos as $photo)

            <div class="admin-documentation-item">

                <img
                    src="{{ asset('storage/' . $photo->image) }}"
                    alt="{{ $photo->caption ?: $activity->title }}"
                    class="admin-documentation-preview"
                >

                <div class="admin-form-group">
                    <label for="existing-caption-{{ $photo->id }}">
                        Caption (Opsional)
                    </label>

                    <textarea
                        id="existing-caption-{{ $photo->id }}"
                        name="existing_captions[{{ $photo->id }}]"
                        class="admin-form-control"
                        rows="2"
                        maxlength="500"
                    >{{ old('existing_captions.' . $photo->id, $photo->caption) }}</textarea>
                </div>

                <label class="admin-checkbox">
                    <input
                        type="checkbox"
                        name="delete_photos[]"
                        value="{{ $photo->id }}"
                        {{ in_array(
                            $photo->id,
                            old('delete_photos', [])
                        ) ? 'checked' : '' }}
                    >

                    <span>
                        <strong>Hapus foto ini</strong>
                        <small>
                            Foto akan dihapus saat kamu menekan
                            Simpan Perubahan.
                        </small>
                    </span>
                </label>

            </div>

        @empty

            <p class="admin-form-help">
                Belum ada foto dokumentasi untuk kegiatan ini.
            </p>

        @endforelse

        {{-- FOTO BARU --}}
        <h4 class="admin-documentation-subtitle">
            Tambah Foto Baru
        </h4>

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

    if (!list || !addButton) return;

    let photoIndex = 0;

    addButton.addEventListener('click', function () {
        if (list.children.length >= 20) {
            alert('Maksimal 20 foto baru dalam satu penyimpanan.');
            return;
        }

        const index = photoIndex++;

        const item = document.createElement('div');
        item.className = 'admin-documentation-item';

        item.innerHTML = `
            <div class="admin-form-group">
                <label>Foto Dokumentasi Baru</label>
                <input
                    type="file"
                    name="documentation_photos[${index}]"
                    class="admin-form-control"
                    accept=".jpg,.jpeg,.png,.webp"
                    required
                >
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
                Batalkan Foto
            </button>
        `;

        item.querySelector('.remove-documentation-photo')
            .addEventListener('click', function () {
                item.remove();
            });

        list.appendChild(item);
    });
});
</script>
@endpush