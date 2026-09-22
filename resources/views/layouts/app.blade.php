<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Yayasan Pusaka')
    </title>

    <meta name="description"
          content="Yayasan Pusaka bergerak di bidang sosial, pendidikan, pemberdayaan, dan pengembangan bagi para penerima manfaat.">


    {{-- GOOGLE FONT --}}
    <link rel="preconnect"
          href="https://fonts.googleapis.com">

    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
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


    {{-- WEBSITE CSS --}}
    <link
        rel="stylesheet"
            href="{{ asset('css/style.css') }}?v={{ filemtime(public_path('css/style.css')) }}"
    >

    @stack('styles')

</head>


<body>

    {{-- =========================
         PUBLIC NAVBAR
    ========================= --}}
    @include('partials.navbar')


    {{-- =========================
         PAGE CONTENT
    ========================= --}}
    <main>

        @yield('content')

    </main>


    {{-- =========================
         PUBLIC FOOTER
    ========================= --}}
    @include('partials.footer')


    @stack('scripts')

</body>

</html>