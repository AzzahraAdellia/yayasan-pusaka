@extends('admin.layouts.app')

@section('title', 'Edit Mitra')
@section('page-title', 'Edit Mitra')

@section('content')

<div class="admin-page-header">

    <div>
        <span class="admin-page-label">
            INFORMASI
        </span>

        <h2>
            Edit <span>Mitra</span>
        </h2>

        <p>
            Perbarui informasi mitra Yayasan Pusaka
            yang ditampilkan pada website publik.
        </p>
    </div>

    <a href="{{ route('admin.partners.index') }}"
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
    action="{{ route('admin.partners.update', $partner) }}"
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
                            INFORMASI MITRA
                        </span>

                        <h3>
                            Detail Mitra
                        </h3>

                    </div>

                </div>


                <div class="admin-form-body">

                    {{-- NAMA --}}
                    <div class="admin-form-group">

                        <label for="name">
                            Nama Mitra
                            <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="admin-form-control"
                            value="{{ old('name', $partner->name) }}"
                            required
                        >

                    </div>


                    {{-- WEBSITE --}}
                    <div class="admin-form-group">

                        <label for="website">
                            Website Mitra
                        </label>

                        <input
                            type="url"
                            id="website"
                            name="website"
                            class="admin-form-control"
                            value="{{ old('website', $partner->website) }}"
                            placeholder="https://contoh.com"
                        >

                        <small class="admin-form-help">
                            Gunakan alamat lengkap, termasuk https://
                        </small>

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
                            placeholder="Tuliskan deskripsi singkat mengenai mitra..."
                        >{{ old('description', $partner->description) }}</textarea>

                        <small class="admin-form-help">
                            Maksimal 1000 karakter.
                        </small>

                    </div>

                </div>

            </div>

        </div>


        {{-- =================================================
            SIDEBAR
        ================================================= --}}
        <div class="admin-form-sidebar">

            {{-- LOGO --}}
            <div class="admin-panel">

                <div class="admin-panel-header">

                    <div>

                        <span>
                            MEDIA
                        </span>

                        <h3>
                            Logo Mitra
                        </h3>

                    </div>

                </div>


                <div class="admin-form-body">

                    @if ($partner->logo)

                        <div class="admin-current-image">

                            <img
                                src="{{ asset('storage/' . $partner->logo) }}"
                                alt="{{ $partner->name }}"
                            >

                            <span>
                                Logo saat ini
                            </span>

                        </div>

                    @endif


                    <div class="admin-form-group">

                        <label for="logo">
                            {{ $partner->logo ? 'Ganti Logo' : 'Upload Logo' }}
                        </label>

                        <input
                            type="file"
                            id="logo"
                            name="logo"
                            class="admin-form-control"
                            accept=".jpg,.jpeg,.png,.webp"
                        >

                        <small class="admin-form-help">
                            Kosongkan jika tidak ingin mengganti logo.
                            JPG, JPEG, PNG atau WEBP. Maksimal 4 MB.
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
                                $partner->sort_order
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
                                    $partner->is_active
                                ) ? 'checked' : '' }}
                            >

                            <span>

                                <strong>
                                    Mitra Aktif
                                </strong>

                                <small>
                                    Mitra ditampilkan pada website publik.
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
                    href="{{ route('admin.partners.index') }}"
                    class="admin-secondary-button"
                >
                    Batal
                </a>

            </div>

        </div>

    </div>

</form>

@endsection