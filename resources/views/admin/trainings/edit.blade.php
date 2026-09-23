@extends('admin.layouts.app')

@section('title', 'Edit Pelatihan')
@section('page-title', 'Edit Pelatihan')

@section('content')

<div class="admin-page-header">
    <div>
        <span class="admin-page-label">KONTEN</span>

        <h2>Edit <span>Pelatihan</span></h2>

        <p>
            Perbarui informasi {{ $training->name }} dan kelola
            pelaksanaan kegiatan pada setiap batch.
        </p>
    </div>

    <a href="{{ route('admin.trainings.index') }}"
       class="admin-primary-button">
        <i class="bi bi-arrow-left"></i>
        Kembali
    </a>
</div>

@if (session('success'))
    <div class="admin-alert" role="status" style="margin-bottom: 20px;">
        <i class="bi bi-check-circle-fill"></i>
        <div>{{ session('success') }}</div>
    </div>
@endif

@if ($errors->any())
    <div class="admin-alert" role="alert" style="margin-bottom: 20px;">
        <i class="bi bi-exclamation-circle-fill"></i>
        <div>
            <strong>Data belum berhasil disimpan.</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

{{-- =====================================================
     FORM EDIT INFORMASI PELATIHAN
===================================================== --}}

<div class="admin-panel" style="padding: 24px; margin-bottom: 28px;">

    <h3 style="margin-top: 0; margin-bottom: 20px;">
        Informasi Pelatihan
    </h3>

    <form
        action="{{ route('admin.trainings.update', $training) }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf
        @method('PUT')

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(min(100%, 280px), 1fr)); gap: 20px;">

            <div>
                <label for="name">
                    Nama Pelatihan
                    <span style="color: #dc2626;">*</span>
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $training->name) }}"
                    maxlength="255"
                    required
                    style="display: block; width: 100%; margin-top: 8px;"
                >
            </div>

            <div>
                <label for="title">
                    Judul Halaman Detail
                    <span style="color: #dc2626;">*</span>
                </label>

                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title', $training->title) }}"
                    maxlength="255"
                    required
                    style="display: block; width: 100%; margin-top: 8px;"
                >
            </div>

            <div style="grid-column: 1 / -1;">
                <label for="short_description">
                    Deskripsi Singkat
                </label>

                <textarea
                    id="short_description"
                    name="short_description"
                    rows="3"
                    maxlength="500"
                    style="display: block; width: 100%; margin-top: 8px;"
                >{{ old('short_description', $training->short_description) }}</textarea>
            </div>

            <div style="grid-column: 1 / -1;">
                <label for="description">
                    Deskripsi Lengkap
                </label>

                <textarea
                    id="description"
                    name="description"
                    rows="7"
                    style="display: block; width: 100%; margin-top: 8px;"
                >{{ old('description', $training->description) }}</textarea>
            </div>

            <div>
                <label for="target_participants">
                    Sasaran Peserta
                </label>

                <input
                    type="text"
                    id="target_participants"
                    name="target_participants"
                    value="{{ old('target_participants', $training->target_participants) }}"
                    maxlength="255"
                    style="display: block; width: 100%; margin-top: 8px;"
                >
            </div>

            <div>
                <label for="sort_order">
                    Urutan Tampil
                    <span style="color: #dc2626;">*</span>
                </label>

                <input
                    type="number"
                    id="sort_order"
                    name="sort_order"
                    value="{{ old('sort_order', $training->sort_order) }}"
                    min="0"
                    required
                    style="display: block; width: 100%; margin-top: 8px;"
                >
            </div>

            <div style="grid-column: 1 / -1;">
                <label for="image">
                    Foto Utama Pelatihan
                </label>

                @if ($training->image)
                    <div style="margin: 12px 0;">
                        <img
                            src="{{ asset('storage/' . $training->image) }}"
                            alt="{{ $training->name }}"
                            style="width: 220px; max-width: 100%; height: 145px; object-fit: cover; border-radius: 12px;"
                        >
                    </div>
                @endif

                <input
                    type="file"
                    id="image"
                    name="image"
                    accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                    style="display: block; width: 100%; margin-top: 8px;"
                >

                <small style="color: #64748b;">
                    Kosongkan jika tidak ingin mengganti foto.
                    Format JPG, PNG, atau WebP. Maksimal 4 MB.
                </small>
            </div>

            <div style="grid-column: 1 / -1;">
                <label style="display: inline-flex; align-items: center; gap: 10px;">
                    <input
                        type="checkbox"
                        name="is_active"
                        value="1"
                        {{ old('is_active', $training->is_active ? '1' : '0') == '1' ? 'checked' : '' }}
                    >

                    Tampilkan pelatihan di website publik
                </label>
            </div>

        </div>

        <div style="display: flex; flex-wrap: wrap; gap: 12px; margin-top: 28px;">
            <button type="submit" class="admin-primary-button">
                <i class="bi bi-check-lg"></i>
                Simpan Perubahan
            </button>

            <a
                href="{{ route('programs.training.show', $training) }}"
                target="_blank"
                rel="noopener noreferrer"
                style="display: inline-flex; align-items: center; padding: 10px 14px; text-decoration: none;"
            >
                <i class="bi bi-box-arrow-up-right" style="margin-right: 8px;"></i>
                Lihat Halaman Publik
            </a>
        </div>

    </form>

</div>

{{-- =====================================================
     FORM TAMBAH BATCH
===================================================== --}}

<div class="admin-panel" style="padding: 24px; margin-bottom: 28px;">

    <div style="margin-bottom: 20px;">
        <span class="admin-page-label">PELAKSANAAN KEGIATAN</span>

        <h3 style="margin: 8px 0;">
            Tambah Batch
        </h3>

        <p style="margin: 0; color: #64748b;">
            Tambahkan Batch 1, Batch 2, Batch 3, dan seterusnya
            untuk {{ $training->name }}.
        </p>
    </div>

    <form
        action="{{ route('admin.trainings.batches.store', $training) }}"
        method="POST"
        enctype="multipart/form-data"
        class="training-batch-form"
    >
        @csrf

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(min(100%, 240px), 1fr)); gap: 20px;">

            <div>
                <label for="batch_name">
                    Nama Batch
                    <span style="color: #dc2626;">*</span>
                </label>

                <input
                    type="text"
                    id="batch_name"
                    name="name"
                    placeholder="Contoh: Batch 1"
                    maxlength="255"
                    required
                    style="display: block; width: 100%; margin-top: 8px;"
                >
            </div>

            <div>
                <label for="batch_sort_order">Urutan Tampil</label>

                <input
                    type="number"
                    id="batch_sort_order"
                    name="sort_order"
                    value="{{ $training->batches->count() + 1 }}"
                    min="0"
                    style="display: block; width: 100%; margin-top: 8px;"
                >
            </div>

            <div>
                <label for="batch_start_date">Tanggal Mulai</label>

                <input
                    type="date"
                    id="batch_start_date"
                    name="start_date"
                    style="display: block; width: 100%; margin-top: 8px;"
                >
            </div>

            <div>
                <label for="batch_end_date">Tanggal Selesai</label>

                <input
                    type="date"
                    id="batch_end_date"
                    name="end_date"
                    style="display: block; width: 100%; margin-top: 8px;"
                >
            </div>

            <div>
                <label for="batch_start_time">Jam Mulai</label>

                <input
                    type="time"
                    id="batch_start_time"
                    name="start_time"
                    style="display: block; width: 100%; margin-top: 8px;"
                >
            </div>

            <div>
                <label for="batch_end_time">Jam Selesai</label>

                <input
                    type="time"
                    id="batch_end_time"
                    name="end_time"
                    style="display: block; width: 100%; margin-top: 8px;"
                >
            </div>

            <div>
                <label for="batch_location">Lokasi Kegiatan</label>

                <input
                    type="text"
                    id="batch_location"
                    name="location"
                    placeholder="Contoh: Bandung"
                    maxlength="255"
                    style="display: block; width: 100%; margin-top: 8px;"
                >
            </div>

            <div>
                <label for="batch_participant_count">Jumlah Peserta</label>

                <input
                    type="number"
                    id="batch_participant_count"
                    name="participant_count"
                    placeholder="Contoh: 20"
                    min="0"
                    style="display: block; width: 100%; margin-top: 8px;"
                >
            </div>

            <div style="grid-column: 1 / -1;">
                <label for="batch_participants">Keterangan Peserta</label>

                <input
                    type="text"
                    id="batch_participants"
                    name="participants"
                    placeholder="Contoh: Anak asuh Yayasan Pusaka wilayah Bandung"
                    maxlength="255"
                    style="display: block; width: 100%; margin-top: 8px;"
                >
            </div>

            <div style="grid-column: 1 / -1;">
                <label for="batch_description">Deskripsi Singkat Batch</label>

                <textarea
                    id="batch_description"
                    name="description"
                    rows="4"
                    placeholder="Ceritakan kegiatan yang dilaksanakan pada batch ini."
                    style="display: block; width: 100%; margin-top: 8px;"
                ></textarea>
            </div>

            <div style="grid-column: 1 / -1;">
                <label for="batch_photos">Foto Dokumentasi</label>

                <input
                    type="file"
                    id="batch_photos"
                    name="photos[]"
                    accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                    multiple
                    data-max-photo-size="10485760"
                    style="display: block; width: 100%; margin-top: 8px;"
                >

                <small style="color: #64748b;">
                    Bisa memilih beberapa foto sekaligus.
                    Maksimal 10 MB per foto.
                </small>
            </div>

        </div>

        <button
            type="submit"
            class="admin-primary-button"
            style="margin-top: 24px;"
        >
            <i class="bi bi-plus-lg"></i>
            Simpan Batch
        </button>

    </form>

</div>

{{-- =====================================================
     DAFTAR BATCH YANG SUDAH DIBUAT
===================================================== --}}

<div class="admin-panel" style="padding: 24px;">

    <div style="margin-bottom: 22px;">
        <span class="admin-page-label">DATA TERSIMPAN</span>

        <h3 style="margin: 8px 0;">
            Daftar Batch
        </h3>

        <p style="margin: 0; color: #64748b;">
            Setiap batch di bawah ini akan ditampilkan sebagai kartu
            pada halaman detail {{ $training->name }}.
        </p>
    </div>

    @forelse ($training->batches as $batch)

        <div style="padding: 22px; margin-bottom: 20px; border: 1px solid #e2e8f0; border-radius: 14px;">

            <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 12px; margin-bottom: 18px;">

                <h4 style="margin: 0;">
                    {{ $batch->name }}
                </h4>

                <form
                    action="{{ route('admin.trainings.batches.destroy', [$training, $batch]) }}"
                    method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus batch ini beserta seluruh foto dokumentasinya?')"
                >
                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        style="padding: 9px 14px; border: 1px solid #fecaca; border-radius: 8px; background: #fff1f2; color: #b91c1c; cursor: pointer;"
                    >
                        <i class="bi bi-trash"></i>
                        Hapus Batch
                    </button>
                </form>

            </div>

            <form
                action="{{ route('admin.trainings.batches.update', [$training, $batch]) }}"
                method="POST"
                enctype="multipart/form-data"
                class="training-batch-form"
            >
                @csrf
                @method('PUT')

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(min(100%, 240px), 1fr)); gap: 18px;">

                    <div>
                        <label for="batch_name_{{ $batch->id }}">
                            Nama Batch
                            <span style="color: #dc2626;">*</span>
                        </label>

                        <input
                            type="text"
                            id="batch_name_{{ $batch->id }}"
                            name="name"
                            value="{{ $batch->name }}"
                            maxlength="255"
                            required
                            style="display: block; width: 100%; margin-top: 8px;"
                        >
                    </div>

                    <div>
                        <label for="batch_sort_{{ $batch->id }}">Urutan Tampil</label>

                        <input
                            type="number"
                            id="batch_sort_{{ $batch->id }}"
                            name="sort_order"
                            value="{{ $batch->sort_order }}"
                            min="0"
                            style="display: block; width: 100%; margin-top: 8px;"
                        >
                    </div>

                    <div>
                        <label for="batch_start_date_{{ $batch->id }}">Tanggal Mulai</label>

                        <input
                            type="date"
                            id="batch_start_date_{{ $batch->id }}"
                            name="start_date"
                            value="{{ $batch->start_date?->format('Y-m-d') }}"
                            style="display: block; width: 100%; margin-top: 8px;"
                        >
                    </div>

                    <div>
                        <label for="batch_end_date_{{ $batch->id }}">Tanggal Selesai</label>

                        <input
                            type="date"
                            id="batch_end_date_{{ $batch->id }}"
                            name="end_date"
                            value="{{ $batch->end_date?->format('Y-m-d') }}"
                            style="display: block; width: 100%; margin-top: 8px;"
                        >
                    </div>

                    <div>
                        <label for="batch_start_time_{{ $batch->id }}">Jam Mulai</label>

                        <input
                            type="time"
                            id="batch_start_time_{{ $batch->id }}"
                            name="start_time"
                            value="{{ $batch->start_time ? substr($batch->start_time, 0, 5) : '' }}"
                            style="display: block; width: 100%; margin-top: 8px;"
                        >
                    </div>

                    <div>
                        <label for="batch_end_time_{{ $batch->id }}">Jam Selesai</label>

                        <input
                            type="time"
                            id="batch_end_time_{{ $batch->id }}"
                            name="end_time"
                            value="{{ $batch->end_time ? substr($batch->end_time, 0, 5) : '' }}"
                            style="display: block; width: 100%; margin-top: 8px;"
                        >
                    </div>

                    <div>
                        <label for="batch_location_{{ $batch->id }}">Lokasi Kegiatan</label>

                        <input
                            type="text"
                            id="batch_location_{{ $batch->id }}"
                            name="location"
                            value="{{ $batch->location }}"
                            maxlength="255"
                            style="display: block; width: 100%; margin-top: 8px;"
                        >
                    </div>

                    <div>
                        <label for="batch_count_{{ $batch->id }}">Jumlah Peserta</label>

                        <input
                            type="number"
                            id="batch_count_{{ $batch->id }}"
                            name="participant_count"
                            value="{{ $batch->participant_count }}"
                            min="0"
                            style="display: block; width: 100%; margin-top: 8px;"
                        >
                    </div>

                    <div style="grid-column: 1 / -1;">
                        <label for="batch_participants_{{ $batch->id }}">Keterangan Peserta</label>

                        <input
                            type="text"
                            id="batch_participants_{{ $batch->id }}"
                            name="participants"
                            value="{{ $batch->participants }}"
                            maxlength="255"
                            style="display: block; width: 100%; margin-top: 8px;"
                        >
                    </div>

                    <div style="grid-column: 1 / -1;">
                        <label for="batch_description_{{ $batch->id }}">Deskripsi Singkat Batch</label>

                        <textarea
                            id="batch_description_{{ $batch->id }}"
                            name="description"
                            rows="4"
                            style="display: block; width: 100%; margin-top: 8px;"
                        >{{ $batch->description }}</textarea>
                    </div>

                    <div style="grid-column: 1 / -1;">
                        <label for="batch_photos_{{ $batch->id }}">
                            Tambah Foto Dokumentasi
                        </label>

                        <input
                            type="file"
                            id="batch_photos_{{ $batch->id }}"
                            name="photos[]"
                            accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                            multiple
                            data-max-photo-size="10485760"
                            style="display: block; width: 100%; margin-top: 8px;"
                        >

                        <small style="color: #64748b;">
                            Foto lama tetap tersimpan.
                            Maksimal 10 MB per foto baru.
                        </small>
                    </div>

                </div>

                <button
                    type="submit"
                    class="admin-primary-button"
                    style="margin-top: 22px;"
                >
                    <i class="bi bi-check-lg"></i>
                    Simpan Perubahan Batch
                </button>

            </form>

            @if ($batch->photos->isNotEmpty())

                <div style="margin-top: 24px; padding-top: 20px; border-top: 1px solid #e2e8f0;">

                    <h5 style="margin: 0 0 14px;">
                        Foto Dokumentasi
                    </h5>

                    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(120px, 1fr)); gap: 14px;">

                        @foreach ($batch->photos as $photo)

                            <div>
                                <img
                                    src="{{ asset('storage/' . $photo->image) }}"
                                    alt="{{ $photo->caption ?: 'Dokumentasi ' . $batch->name }}"
                                    style="display: block; width: 100%; aspect-ratio: 1 / 1; object-fit: cover; border-radius: 10px;"
                                >

                                <form
                                    action="{{ route('admin.trainings.batches.photos.destroy', [$training, $batch, $photo]) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus foto ini?')"
                                    style="margin-top: 8px;"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        style="width: 100%; padding: 8px; border: 1px solid #fecaca; border-radius: 8px; background: #fff1f2; color: #b91c1c; cursor: pointer;"
                                    >
                                        <i class="bi bi-trash"></i>
                                        Hapus Foto
                                    </button>
                                </form>
                            </div>

                        @endforeach

                    </div>

                </div>

            @endif

        </div>

    @empty

        <div style="padding: 35px 20px; border: 1px dashed #cbd5e1; border-radius: 12px; text-align: center; color: #64748b;">
            <i class="bi bi-calendar2-event" style="display: block; margin-bottom: 10px; font-size: 28px;"></i>
            Belum ada batch. Gunakan formulir Tambah Batch di atas.
        </div>

    @endforelse

</div>

<script>
document.querySelectorAll('.training-batch-form').forEach(function (form) {
    form.addEventListener('submit', function (event) {
        const photoInput = form.querySelector('input[type="file"][name="photos[]"]');

        if (!photoInput || !photoInput.files.length) {
            return;
        }

        const maxSize = 10 * 1024 * 1024;

        for (const file of photoInput.files) {
            if (file.size > maxSize) {
                event.preventDefault();

                alert(
                    'Foto "' + file.name + '" melebihi batas 10 MB. ' +
                    'Pilih foto berukuran lebih kecil sebelum menyimpan.'
                );

                photoInput.focus();
                return;
            }
        }
    });
});
</script>

@endsection