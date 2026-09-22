<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    <title>
        @yield('title', 'Admin') | Yayasan Pusaka
    </title>

    {{-- GOOGLE FONT --}}
    <link rel="preconnect"
          href="https://fonts.googleapis.com">

    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    >

    {{-- BOOTSTRAP ICONS --}}
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    {{-- VITE --}}
    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    {{-- ADMIN CSS --}}
    <link
     rel="stylesheet" href="{{ asset('css/admin.css') }}?v={{ filemtime(public_path('css/admin.css')) }}"
    >

    @stack('styles')
</head>

<body class="admin-body">

    <div class="admin-wrapper">

        {{-- SIDEBAR --}}
        @include('admin.partials.sidebar')


        {{-- MAIN --}}
        <div class="admin-main">

            {{-- TOPBAR --}}
            @include('admin.partials.topbar')


            {{-- CONTENT --}}
            <main class="admin-content">

                @yield('content')

            </main>

        </div>

    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const sidebar = document.getElementById('adminSidebar');
            const overlay = document.getElementById('adminOverlay');
            const toggle = document.getElementById('sidebarToggle');

            if (toggle && sidebar && overlay) {

                toggle.addEventListener('click', function () {
                    sidebar.classList.toggle('show');
                    overlay.classList.toggle('show');
                });

                overlay.addEventListener('click', function () {
                    sidebar.classList.remove('show');
                    overlay.classList.remove('show');
                });

            }

        });
    </script>

    @stack('scripts')

</body>

</html>