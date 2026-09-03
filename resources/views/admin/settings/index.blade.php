@extends('admin.layouts.app')

@section('title', 'Pengaturan')
@section('page-title', 'Pengaturan')

@section('content')

<div class="admin-page-header">

    <div>
        <span class="admin-page-label">
            SISTEM
        </span>

        <h2>
            Pengaturan <span>Website</span>
        </h2>

        <p>
            Kelola informasi umum website Yayasan Pusaka
            yang digunakan pada berbagai halaman publik.
        </p>
    </div>

</div>


@if (session('success'))

    <div class="admin-alert success">

        <i class="bi bi-check-circle-fill"></i>

        <span>
            {{ session('success') }}
        </span>

    </div>

@endif


@if ($errors->any())

    <div class="admin-alert error">

        <i class="bi bi-exclamation-circle-fill"></i>

        <div>

            <strong>
                Pengaturan belum dapat disimpan.
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
    action="{{ route('admin.settings.update') }}"
    method="POST"
>

    @csrf
    @method('PUT')


    <div class="admin-form-layout">

        {{-- =================================================
            MAIN
        ================================================= --}}
        <div class="admin-form-main">

            {{-- KONTAK --}}
            <div class="admin-panel">

                <div class="admin-panel-header">

                    <div>

                        <span>
                            KONTAK
                        </span>

                        <h3>
                            Informasi Yayasan
                        </h3>

                    </div>

                </div>


                <div class="admin-form-body">

                    {{-- ALAMAT --}}
                    <div class="admin-form-group">

                        <label for="address">
                            Alamat Kantor
                        </label>

                        <textarea
                            id="address"
                            name="address"
                            class="admin-form-control"
                            rows="4"
                            placeholder="Masukkan alamat lengkap Yayasan Pusaka"
                        >{{ old('address', $settings['address'] ?? '') }}</textarea>

                    </div>


                    {{-- EMAIL --}}
                    <div class="admin-form-group">

                        <label for="email">
                            Email Resmi
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="admin-form-control"
                            value="{{ old('email', $settings['email'] ?? '') }}"
                            placeholder="info@yayasanpusakakai.org"
                        >

                    </div>


                    {{-- TELEPON --}}
                    <div class="admin-form-group">

                        <label for="phone">
                            Nomor Telepon
                        </label>

                        <input
                            type="text"
                            id="phone"
                            name="phone"
                            class="admin-form-control"
                            value="{{ old('phone', $settings['phone'] ?? '') }}"
                            placeholder="Contoh: 022-xxxxxxx"
                        >

                    </div>


                    {{-- JAM OPERASIONAL --}}
                    <div class="admin-form-group">

                        <label for="operational_hours">
                            Jam Operasional
                        </label>

                        <input
                            type="text"
                            id="operational_hours"
                            name="operational_hours"
                            class="admin-form-control"
                            value="{{ old(
                                'operational_hours',
                                $settings['operational_hours'] ?? ''
                            ) }}"
                            placeholder="Contoh: Senin - Jumat, 08.00 - 17.00 WIB"
                        >

                    </div>

                </div>

            </div>


            {{-- MAPS --}}
            <div class="admin-panel">

                <div class="admin-panel-header">

                    <div>

                        <span>
                            LOKASI
                        </span>

                        <h3>
                            Google Maps
                        </h3>

                    </div>

                </div>


                <div class="admin-form-body">

                    <div class="admin-form-group">

                        <label for="maps_url">
                            Link Google Maps
                        </label>

                        <input
                            type="url"
                            id="maps_url"
                            name="maps_url"
                            class="admin-form-control"
                            value="{{ old(
                                'maps_url',
                                $settings['maps_url'] ?? ''
                            ) }}"
                            placeholder="https://maps.google.com/..."
                        >

                        <small class="admin-form-help">
                            Link yang dapat dibuka pengunjung untuk melihat lokasi.
                        </small>

                    </div>


                    <div class="admin-form-group">

                        <label for="maps_embed">
                            Embed Google Maps
                        </label>

                        <textarea
                            id="maps_embed"
                            name="maps_embed"
                            class="admin-form-control"
                            rows="7"
                            placeholder="Tempel iframe atau URL embed Google Maps di sini"
                        >{{ old(
                            'maps_embed',
                            $settings['maps_embed'] ?? ''
                        ) }}</textarea>

                        <small class="admin-form-help">
                            Bagian ini nantinya digunakan untuk menampilkan peta
                            langsung di halaman Kontak.
                        </small>

                    </div>

                </div>

            </div>

        </div>


        {{-- =================================================
            SIDEBAR
        ================================================= --}}
        <div class="admin-form-sidebar">

            {{-- MEDIA SOSIAL --}}
            <div class="admin-panel">

                <div class="admin-panel-header">

                    <div>

                        <span>
                            MEDIA SOSIAL
                        </span>

                        <h3>
                            Instagram
                        </h3>

                    </div>

                </div>


                <div class="admin-form-body">

                    <div class="admin-form-group">

                        <label for="instagram_url">
                            Link Instagram
                        </label>

                        <input
                            type="url"
                            id="instagram_url"
                            name="instagram_url"
                            class="admin-form-control"
                            value="{{ old(
                                'instagram_url',
                                $settings['instagram_url'] ?? ''
                            ) }}"
                            placeholder="https://instagram.com/..."
                        >

                    </div>

                </div>

            </div>


            {{-- GALERI EKSTERNAL --}}
            <div class="admin-panel">

                <div class="admin-panel-header">

                    <div>

                        <span>
                            GALERI
                        </span>

                        <h3>
                            Website Galeri
                        </h3>

                    </div>

                </div>


                <div class="admin-form-body">

                    <div class="admin-form-group">

                        <label for="gallery_url">
                            Link Galeri Eksternal
                        </label>

                        <input
                            type="url"
                            id="gallery_url"
                            name="gallery_url"
                            class="admin-form-control"
                            value="{{ old(
                                'gallery_url',
                                $settings['gallery_url'] ?? ''
                            ) }}"
                            placeholder="https://galeri.contoh.com"
                        >

                        <small class="admin-form-help">
                            Digunakan untuk tombol Galeri pada website publik.
                        </small>

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

                    Simpan Pengaturan

                </button>

            </div>

        </div>

    </div>

</form>

@endsection