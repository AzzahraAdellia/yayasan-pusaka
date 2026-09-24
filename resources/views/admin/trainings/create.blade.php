@extends('admin.layouts.app')

@section('title', 'Tambah Subkegiatan')
@section('page-title', 'Tambah Subkegiatan')

@section('content')

<div class="admin-page-header">
    <div>
        <span class="admin-page-label">KONTEN PROGRAM</span>

        <h2>Tambah <span>Subkegiatan</span></h2>

        <p>
            Tambahkan subkegiatan untuk program
            <strong>{{ $program->name }}</strong>.
        </p>
    </div>

    <a href="{{ route('admin.programs.edit', $program) }}"
       class="admin-secondary-button">
        <i class="bi bi-arrow-left"></i>
        Kembali ke Program
    </a>
</div>

@if ($errors->any())
    <div class="admin-alert error" role="alert">
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

<div class="admin-panel" style="padding: 24px;">

    <form
        action="{{ route('admin.trainings.store') }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf

        {{-- Program ditentukan oleh kartu yang dipilih --}}
        <input
            type="hidden"
            name="program_id"
            value="{{ $program->id }}"
        >

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(min(100%, 280px), 1fr)); gap: 20px;">

            <div style="grid-column: 1 / -1;">
                <label>Program Induk</label>

                <input
                    type="text"
                    value="{{ $program->name }}"
                    disabled
                    style="display: block; width: 100%; margin-top: 8px;"
                >

                <small style="color: #64748b;">
                    Subkegiatan ini akan tersimpan di dalam program tersebut.
                </small>
            </div>

            <div>
                <label for="name">
                    Nama Subkegiatan
                    <span style="color: #dc2626;">*</span>
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Contoh: Pelatihan Barista"
                    maxlength="255"
                    required
                    style="display: block; width: 100%; margin-top: 8px;"
                >

                @error('name')
                    <small style="color: #dc2626;">{{ $message }}</small>
                @enderror
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
                    value="{{ old('title') }}"
                    placeholder="Contoh: Mengembangkan Keterampilan melalui Pelatihan Barista"
                    maxlength="255"
                    required
                    style="display: block; width: 100%; margin-top: 8px;"
                >

                @error('title')
                    <small style="color: #dc2626;">{{ $message }}</small>
                @enderror
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
                    placeholder="Ringkasan yang ditampilkan pada kartu subkegiatan."
                    style="display: block; width: 100%; margin-top: 8px;"
                >{{ old('short_description') }}</textarea>

                @error('short_description')
                    <small style="color: #dc2626;">{{ $message }}</small>
                @enderror
            </div>

            <div style="grid-column: 1 / -1;">
                <label for="description">
                    Deskripsi Lengkap
                </label>

                <textarea
                    id="description"
                    name="description"
                    rows="7"
                    placeholder="Jelaskan tujuan, manfaat, dan pelaksanaan subkegiatan."
                    style="display: block; width: 100%; margin-top: 8px;"
                >{{ old('description') }}</textarea>

                @error('description')
                    <small style="color: #dc2626;">{{ $message }}</small>
                @enderror
            </div>

            <div>
                <label for="target_participants">
                    Sasaran Peserta atau Penerima Manfaat
                </label>

                <input
                    type="text"
                    id="target_participants"
                    name="target_participants"
                    value="{{ old('target_participants') }}"
                    placeholder="Contoh: Anak asuh Yayasan Pusaka"
                    maxlength="255"
                    style="display: block; width: 100%; margin-top: 8px;"
                >

                @error('target_participants')
                    <small style="color: #dc2626;">{{ $message }}</small>
                @enderror
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
                    value="{{ old('sort_order', 1) }}"
                    min="0"
                    required
                    style="display: block; width: 100%; margin-top: 8px;"
                >

                @error('sort_order')
                    <small style="color: #dc2626;">{{ $message }}</small>
                @enderror
            </div>

            <div style="grid-column: 1 / -1;">
                <label for="image">
                    Foto Utama Subkegiatan
                </label>

                <input
                    type="file"
                    id="image"
                    name="image"
                    accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                    style="display: block; width: 100%; margin-top: 8px;"
                >

                <small style="color: #64748b;">
                    Format JPG, PNG, atau WebP. Maksimal 4 MB.
                </small>

                @error('image')
                    <small style="display: block; color: #dc2626;">
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <div style="grid-column: 1 / -1;">
                <label style="display: inline-flex; align-items: center; gap: 10px;">
                    <input
                        type="checkbox"
                        name="is_active"
                        value="1"
                        {{ old('is_active', '1') == '1' ? 'checked' : '' }}
                    >

                    Tampilkan subkegiatan di website publik
                </label>
            </div>

        </div>

        <div style="display: flex; flex-wrap: wrap; gap: 12px; margin-top: 28px;">

            <button type="submit" class="admin-primary-button">
                <i class="bi bi-check-lg"></i>
                Simpan Subkegiatan
            </button>

            <a href="{{ route('admin.programs.edit', $program) }}"
               class="admin-secondary-button">
                Batal
            </a>

        </div>

    </form>

</div>

@endsection