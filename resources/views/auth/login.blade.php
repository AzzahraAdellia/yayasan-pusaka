<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    <title>Login Admin | Yayasan Pusaka</title>

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
                    CMS YAYASAN PUSAKA
                </span>

                <h1>
                    Kelola Website
                    <strong>dengan Lebih Mudah.</strong>
                </h1>

                <p>
                    Masuk ke dashboard admin untuk mengelola berita,
                    kegiatan, galeri, program, mitra, legalitas,
                    dan berbagai informasi website Yayasan Pusaka.
                </p>

            </div>


            <div class="admin-login-features">

                <div>
                    <i class="bi bi-check-circle-fill"></i>
                    <span>Kelola konten tanpa mengubah coding</span>
                </div>

                <div>
                    <i class="bi bi-check-circle-fill"></i>
                    <span>Publikasikan berita dan kegiatan</span>
                </div>

                <div>
                    <i class="bi bi-check-circle-fill"></i>
                    <span>Kelola galeri dan informasi website</span>
                </div>

            </div>

        </div>

    </div>


    <div class="admin-login-right">

        <div class="admin-login-card">

            <div class="admin-login-card-header">

                <span>ADMINISTRATOR</span>

                <h2>
                    Selamat Datang
                </h2>

                <p>
                    Masuk menggunakan akun admin Yayasan Pusaka.
                </p>

            </div>


            @if (session('status'))

                <div class="admin-login-success">

                    <i class="bi bi-check-circle-fill"></i>

                    {{ session('status') }}

                </div>

            @endif


            <form
                method="POST"
                action="{{ route('login') }}"
            >

                @csrf


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
                            autofocus
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
                            autocomplete="current-password"
                        >

                        <button
                            type="button"
                            class="admin-password-toggle"
                            id="passwordToggle"
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


                <div class="admin-login-options">

                    <label class="admin-remember">

                        <input
                            type="checkbox"
                            name="remember"
                        >

                        <span>
                            Ingat saya
                        </span>

                    </label>


                    @if (Route::has('password.request'))

                        <a href="{{ route('password.request') }}">
                            Lupa password?
                        </a>

                    @endif

                </div>


                <button
                    type="submit"
                    class="admin-login-button"
                >

                    Masuk ke Dashboard

                    <i class="bi bi-arrow-right"></i>

                </button>

            </form>

            @if (Route::has('register'))

                <a href="{{ route('register') }}"
                class="admin-register-button">

                    <i class="bi bi-person-plus"></i>

                    Daftar Akun

                </a>

            @endif


            <div class="admin-login-footer">

                <a href="{{ route('home') }}">

                    <i class="bi bi-arrow-left"></i>

                    Kembali ke Website

                </a>

            </div>

        </div>

    </div>

</div>


<script>
    const toggle = document.getElementById('passwordToggle');
    const password = document.getElementById('password');

    if (toggle && password) {

        toggle.addEventListener('click', function () {

            const icon = this.querySelector('i');

            if (password.type === 'password') {

                password.type = 'text';

                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');

            } else {

                password.type = 'password';

                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');

            }

        });

    }
</script>

</body>

</html>