@extends('admin.layouts.app')

@section('title', 'Edit Program')
@section('page-title', 'Edit Program')

@section('content')

<div class="admin-page-header">

    <div>

        <span class="admin-page-label">
            KONTEN
        </span>

        <h2>
            Edit <span>{{ $program->name }}</span>
        </h2>

        <p>
            Perbarui informasi program yang ditampilkan
            pada website publik Yayasan Pusaka.
        </p>

    </div>


    <a href="{{ route('admin.programs.index') }}"
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

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    </div>

@endif


<form
    action="{{ route('admin.programs.update', $program) }}"
    method="POST"
    enctype="multipart/form-data"
>

    @csrf
    @method('PUT')


    <div class="admin-form-layout">


        <div class="admin-form-main">


            <div class="admin-panel">

                <div class="admin-panel-header">

                    <div>

                        <span>
                            INFORMASI PROGRAM
                        </span>

                        <h3>
                            Konten Utama
                        </h3>

                    </div>

                </div>


                <div class="admin-form-body">


                    <div class="admin-form-group">

                        <label for="name">
                            Nama Program
                            <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="admin-form-control"
                            value="{{ old('name', $program->name) }}"
                            required
                        >

                    </div>


                    <div class="admin-form-group">

                        <label for="title">
                            Judul Utama
                            <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            id="title"
                            name="title"
                            class="admin-form-control"
                            value="{{ old('title', $program->title) }}"
                            required
                        >

                    </div>


                    <div class="admin-form-group">

                        <label for="short_description">
                            Deskripsi Singkat
                        </label>

                        <textarea
                            id="short_description"
                            name="short_description"
                            class="admin-form-control"
                            rows="4"
                            maxlength="500"
                        >{{ old(
                            'short_description',
                            $program->short_description
                        ) }}</textarea>

                        <small class="admin-form-help">
                            Maksimal 500 karakter.
                        </small>

                    </div>


                    <div class="admin-form-group">

                        <label for="description">
                            Deskripsi Lengkap
                        </label>

                        <textarea
                            id="description"
                            name="description"
                            class="admin-form-control admin-content-editor"
                            rows="14"
                        >{{ old(
                            'description',
                            $program->description
                        ) }}</textarea>

                    </div>

                </div>

            </div>

        </div>


        <div class="admin-form-sidebar">


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


                    <div class="admin-form-group">

                        <label>
                            Slug
                        </label>

                        <input
                            type="text"
                            class="admin-form-control"
                            value="{{ $program->slug }}"
                            disabled
                        >

                        <small class="admin-form-help">
                            Slug dikunci agar route publik tidak berubah.
                        </small>

                    </div>


                    <div class="admin-form-group">

                        <label for="icon">
                            Bootstrap Icon
                        </label>

                        <input
                            type="text"
                            id="icon"
                            name="icon"
                            class="admin-form-control"
                            value="{{ old('icon', $program->icon) }}"
                            placeholder="Contoh: bi-mortarboard-fill"
                        >

                    </div>


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
                                $program->sort_order
                            ) }}"
                            min="0"
                            required
                        >

                    </div>


                    <div class="admin-form-group">

                        <label class="admin-checkbox">

                            <input
                                type="checkbox"
                                name="is_active"
                                value="1"
                                {{ old(
                                    'is_active',
                                    $program->is_active
                                ) ? 'checked' : '' }}
                            >

                            <span>

                                <strong>
                                    Program Aktif
                                </strong>

                                <small>
                                    Program ditampilkan pada website publik.
                                </small>

                            </span>

                        </label>

                    </div>

                </div>

            </div>


            <div class="admin-panel">

                <div class="admin-panel-header">

                    <div>

                        <span>
                            MEDIA
                        </span>

                        <h3>
                            Gambar Program
                        </h3>

                    </div>

                </div>


                <div class="admin-form-body">


                    @if ($program->image)

                        <div class="admin-current-image">

                            <img
                                src="{{ asset(
                                    'storage/' . $program->image
                                ) }}"
                                alt="{{ $program->name }}"
                            >

                            <span>
                                Gambar saat ini
                            </span>

                        </div>

                    @endif


                    <div class="admin-form-group">

                        <label for="image">
                            {{ $program->image
                                ? 'Ganti Gambar'
                                : 'Upload Gambar'
                            }}
                        </label>

                        <input
                            type="file"
                            id="image"
                            name="image"
                            class="admin-form-control"
                            accept=".jpg,.jpeg,.png,.webp"
                        >

                        <small class="admin-form-help">
                            JPG, JPEG, PNG atau WEBP.
                            Maksimal 4 MB.
                        </small>

                    </div>

                </div>

            </div>


            <div class="admin-form-actions">

                <button
                    type="submit"
                    class="admin-primary-button"
                >
                    <i class="bi bi-check-lg"></i>
                    Simpan Perubahan
                </button>

                <a
                    href="{{ route('admin.programs.index') }}"
                    class="admin-secondary-button"
                >
                    Batal
                </a>

            </div>

        </div>

    </div>

</form>

@endsection