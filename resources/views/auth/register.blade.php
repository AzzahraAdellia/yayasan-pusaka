<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    <title>Register Staff | Yayasan Pusaka</title>

    <link rel="preconnect"
          href="https://fonts.googleapis.com">

    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <link
        rel="stylesheet"
        href="{{ asset('css/admin-login.css') }}"
    >

</head>

<body>

<div class="admin-login-page">

    <div class="admin-login-left">

        <div class="admin-login-left-content">

            <a href="{{ route('home') }}"
               class="admin-login-brand">

                <div class="admin-login-logo">
                    YP
                </div>

                <div>
                    <strong>Yayasan Pusaka</strong>
                    <span>Content Management System</span>
                </div>

            </a>


            <div class="admin-login-intro">

                <span class="admin-login-label">
                    PENDAFTARAN STAFF
                </span>

                <h1>
                    Buat Akun untuk
                    <strong>Mengelola Website.</strong>
                </h1>

                <p>
                    Akun yang dibuat melalui halaman ini akan terdaftar
                    sebagai staff dan dapat digunakan untuk mengakses
                    CMS Yayasan Pusaka.
                </p>

            </div>


            <div class="admin-login-features">

                <div>
                    <i class="bi bi-check-circle-fill"></i>
                    <span>Akun baru otomatis berstatus Staff</span>
                </div>

                <div>
                    <i class="bi bi-check-circle-fill"></i>
                    <span>Role Admin tidak dapat dipilih saat registrasi</span>
                </div>

                <div>
                    <i class="bi bi-check-circle-fill"></i>
                    <span>Gunakan akun untuk mengakses dashboard CMS</span>
                </div>

            </div>

        </div>

    </div>


    <div class="admin-login-right">

        <div class="admin-login-card">

            <div class="admin-login-card-header">

                <span>STAFF ACCOUNT</span>

                <h2>
                    Daftar Akun
                </h2>

                <p>
                    Lengkapi data berikut untuk membuat akun staff.
                </p>

            </div>


            <form
                method="POST"
                action="{{ route('register') }}"
            >

                @csrf


                {{-- NAME --}}
                <div class="admin-login-group">

                    <label for="name">
                        Nama Lengkap
                    </label>

                    <div class="admin-login-input">

                        <i class="bi bi-person"></i>

                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Masukkan nama lengkap"
                            required
                            autofocus
                            autocomplete="name"
                        >

                    </div>

                    @error('name')
                        <span class="admin-login-error">
                            {{ $message }}
                        </span>
                    @enderror

                </div>


                {{-- EMAIL --}}
                <div class="admin-login-group">

                    <label for="email">
                        Email
                    </label>

                    <div class="admin-login-input">

                        <i class="bi bi-envelope"></i>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Masukkan email"
                            required
                            autocomplete="username"
                        >

                    </div>

                    @error('email')
                        <span class="admin-login-error">
                            {{ $message }}
                        </span>
                    @enderror

                </div>


                {{-- PASSWORD --}}
                <div class="admin-login-group">

                    <label for="password">
                        Password
                    </label>

                    <div class="admin-login-input">

                        <i class="bi bi-lock"></i>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            placeholder="Masukkan password"
                            required
                            autocomplete="new-password"
                        >

                        <button
                            type="button"
                            class="admin-password-toggle"
                            data-target="password"
                        >
                            <i class="bi bi-eye"></i>
                        </button>

                    </div>

                    @error('password')
                        <span class="admin-login-error">
                            {{ $message }}
                        </span>
                    @enderror

                </div>


                {{-- CONFIRM PASSWORD --}}
                <div class="admin-login-group">

                    <label for="password_confirmation">
                        Konfirmasi Password
                    </label>

                    <div class="admin-login-input">

                        <i class="bi bi-shield-lock"></i>

                        <input
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            placeholder="Ulangi password"
                            required
                            autocomplete="new-password"
                        >

                        <button
                            type="button"
                            class="admin-password-toggle"
                            data-target="password_confirmation"
                        >
                            <i class="bi bi-eye"></i>
                        </button>

                    </div>

                </div>


                <button
                    type="submit"
                    class="admin-login-button"
                >
                    Daftar Akun Staff
                    <i class="bi bi-person-plus"></i>
                </button>

            </form>


            <div class="admin-login-footer">

                <a href="{{ route('login') }}">
                    <i class="bi bi-arrow-left"></i>
                    Sudah punya akun? Kembali ke Login
                </a>

            </div>

        </div>

    </div>

</div>


<script>
    document.querySelectorAll('.admin-password-toggle')
        .forEach(function (button) {

            button.addEventListener('click', function () {

                const targetId = this.dataset.target;
                const input = document.getElementById(targetId);
                const icon = this.querySelector('i');

                if (!input) return;

                if (input.type === 'password') {
                    input.type = 'text';

                    icon.classList.remove('bi-eye');
                    icon.classList.add('bi-eye-slash');
                } else {
                    input.type = 'password';

                    icon.classList.remove('bi-eye-slash');
                    icon.classList.add('bi-eye');
                }

            });

        });
</script>

</body>

</html>