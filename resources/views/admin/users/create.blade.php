@extends('admin.layouts.app')

@section('title', 'Tambah Staff')
@section('page-title', 'Tambah Staff')

@section('content')

{{-- =========================================
     PAGE HEADER
========================================= --}}
<div class="admin-page-header">

    <div>
        <span class="admin-page-label">
            SISTEM
        </span>

        <h2>
            Tambah <span>Staff</span>
        </h2>

        <p>
            Daftarkan pengguna baru untuk mengakses
            CMS Yayasan Pusaka. Setiap akun baru
            otomatis memiliki role Staff.
        </p>
    </div>

    <a
        href="{{ route('admin.users.index') }}"
        class="admin-secondary-button"
    >
        <i class="bi bi-arrow-left"></i>
        Kembali
    </a>

</div>


{{-- =========================================
     VALIDATION ERRORS
========================================= --}}
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


{{-- =========================================
     FORM TAMBAH STAFF
========================================= --}}
<div class="admin-panel">

    <div class="admin-panel-header">

        <div>
            <span>AKUN PENGGUNA</span>
            <h3>Informasi Staff Baru</h3>
        </div>

    </div>

    <form
        action="{{ route('admin.users.store') }}"
        method="POST"
    >

        @csrf

        <div class="admin-form-body">

            {{-- NAMA --}}
            <div class="admin-form-group">

                <label for="name">
                    Nama Lengkap
                    <span class="required">*</span>
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    class="admin-form-control"
                    value="{{ old('name') }}"
                    placeholder="Masukkan nama lengkap Staff"
                    maxlength="255"
                    autocomplete="name"
                    required
                >

            </div>


            {{-- EMAIL --}}
            <div class="admin-form-group">

                <label for="email">
                    Email
                    <span class="required">*</span>
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    class="admin-form-control"
                    value="{{ old('email') }}"
                    placeholder="contoh@email.com"
                    maxlength="255"
                    autocomplete="off"
                    required
                >

                <small class="admin-form-help">
                    Email digunakan untuk login ke CMS.
                </small>

            </div>


            {{-- PASSWORD --}}
            <div class="admin-form-group">

                <label for="password">
                    Password
                    <span class="required">*</span>
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    class="admin-form-control"
                    placeholder="Masukkan password Staff"
                    autocomplete="new-password"
                    minlength="8"
                    required
                >

                <small class="admin-form-help">
                    Gunakan password yang kuat dan unik.
                    Disarankan minimal 12 karakter.
                </small>

            </div>


            {{-- KONFIRMASI PASSWORD --}}
            <div class="admin-form-group">

                <label for="password_confirmation">
                    Konfirmasi Password
                    <span class="required">*</span>
                </label>

                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    class="admin-form-control"
                    placeholder="Ulangi password"
                    autocomplete="new-password"
                    minlength="8"
                    required
                >

            </div>


            {{-- ROLE --}}
            <div class="admin-form-group">

                <label>
                    Hak Akses
                </label>

                <input
                    type="text"
                    class="admin-form-control"
                    value="Staff"
                    disabled
                >

                <small class="admin-form-help">
                    Role Staff ditetapkan otomatis oleh sistem.
                    Hanya Admin yang dapat mengelola akun pengguna.
                </small>

            </div>

        </div>


        {{-- =====================================
             FORM ACTIONS
        ===================================== --}}
        <div class="admin-form-actions">

            <button
                type="submit"
                class="admin-primary-button"
            >
                <i class="bi bi-person-plus"></i>
                Simpan Staff
            </button>

            <a
                href="{{ route('admin.users.index') }}"
                class="admin-secondary-button"
            >
                Batal
            </a>

        </div>

    </form>

</div>

@endsection
