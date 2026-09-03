<header>

    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">

        <div class="container">

            {{-- LOGO / BRAND --}}
            <a class="navbar-brand d-flex align-items-center"
               href="{{ route('home') }}">

                <div class="brand-logo">
                    YP
                </div>

                <div class="brand-text">
                    <strong>Yayasan Pusaka</strong>
                    <span>Peduli • Berdaya • Berdampak</span>
                </div>

            </a>


            {{-- MOBILE BUTTON --}}
            <button class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#mainNavbar"
                    aria-controls="mainNavbar"
                    aria-expanded="false"
                    aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>

            </button>


            <div class="collapse navbar-collapse"
                 id="mainNavbar">

                <ul class="navbar-nav ms-auto align-items-lg-center">


                    {{-- BERANDA --}}
                    <li class="nav-item">

                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                           href="{{ route('home') }}">

                            Beranda

                        </a>

                    </li>


                    {{-- TENTANG --}}
                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle
                            {{ request()->routeIs('about.*') ? 'active' : '' }}"
                           href="#"
                           role="button"
                           data-bs-toggle="dropdown"
                           aria-expanded="false">

                            Tentang Kami

                        </a>

                        <ul class="dropdown-menu">

                            <li>
                                <a class="dropdown-item"
                                   href="{{ route('about.profile') }}">
                                    Profil Yayasan
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item"
                                   href="{{ route('about.history') }}">
                                    Sejarah
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item"
                                   href="{{ route('about.vision') }}">
                                    Visi & Misi
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item"
                                   href="{{ route('about.values') }}">
                                    Nilai-Nilai Yayasan
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item"
                                   href="{{ route('about.organization') }}">
                                    Struktur Organisasi
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item"
                                   href="{{ route('about.legal') }}">
                                    Legalitas
                                </a>
                            </li>

                        </ul>

                    </li>


                    {{-- PROGRAM --}}
                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle
                            {{ request()->routeIs('programs.*') ? 'active' : '' }}"
                        href="#"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">

                            Program

                        </a>

                        <ul class="dropdown-menu">

                            <li>
                                <a class="dropdown-item"
                                href="{{ route('programs.index') }}">

                                    Semua Program

                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item"
                                href="{{ route('programs.education') }}">

                                    Pendidikan

                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item"
                                href="{{ route('programs.social') }}">

                                    Sosial & Kemanusiaan

                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item"
                                href="{{ route('programs.empowerment') }}">

                                    Pemberdayaan

                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item"
                                href="{{ route('programs.training') }}">

                                    Pelatihan & Pengembangan

                                </a>
                            </li>

                        </ul>

                    </li>


                    {{-- DAMPAK --}}
                    <li class="nav-item">

                        <a class="nav-link
                            {{ request()->routeIs('impact') ? 'active' : '' }}"
                           href="{{ route('impact') }}">

                            Dampak

                        </a>

                    </li>


                    {{-- INFORMASI --}}
                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle
                            {{ request()->routeIs('information.*') ? 'active' : '' }}"
                        href="#"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">

                            Informasi

                        </a>

                        <ul class="dropdown-menu">

                            <li>
                                <a class="dropdown-item"
                                href="{{ route('information.index') }}">
                                    Semua Informasi
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item"
                                href="{{ route('information.news') }}">
                                    Berita
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item"
                                href="{{ route('information.activities') }}">
                                    Kegiatan
                                </a>
                            </li>


                            @php
                                $navbarSettings = \App\Models\Setting::pluck('value', 'key');
                            @endphp

                            @if (!empty($navbarSettings['gallery_url']))

                                <li>

                                    <a
                                        class="dropdown-item"
                                        href="{{ $navbarSettings['gallery_url'] }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                    >
                                        Galeri
                                    </a>

                                </li>

                            @endif

                        </ul>

                    </li>


                    {{-- MITRA --}}
                    <li class="nav-item">

                        <a class="nav-link
                            {{ request()->routeIs('partners') ? 'active' : '' }}"
                           href="{{ route('partners') }}">

                            Mitra

                        </a>

                    </li>


                    {{-- KONTAK --}}
                    <li class="nav-item">

                        <a class="nav-link
                            {{ request()->routeIs('contact') ? 'active' : '' }}"
                           href="{{ route('contact') }}">

                            Kontak

                        </a>

                    </li>


                    {{-- DONASI --}}
                    <li class="nav-item ms-lg-3">

                        <a href="{{ route('donation') }}"
                           class="btn btn-donation">

                            <i class="bi bi-heart-fill me-1"></i>

                            Donasi

                        </a>

                    </li>

                </ul>

            </div>

        </div>

    </nav>

</header>