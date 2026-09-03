@php
    $footerSettings = \App\Models\Setting::pluck('value', 'key');
@endphp

<footer class="footer">

    <div class="container">

        <div class="footer-top">

            <div class="row g-5">

                {{-- BRAND --}}
                <div class="col-lg-4">

                    <div class="footer-brand">

                        <div class="footer-brand-logo">
                            YP
                        </div>

                        <div>
                            <strong>
                                Yayasan Pusaka
                            </strong>

                            <span>
                                Peduli • Berdaya • Berdampak
                            </span>
                        </div>

                    </div>


                    <p class="footer-about">
                        Yayasan Pusaka hadir melalui berbagai program
                        sosial, pendidikan, pemberdayaan, dan pengembangan
                        untuk memberikan manfaat yang berkelanjutan.
                    </p>


                    <div class="footer-social">

                    @if (!empty($footerSettings['instagram_url']))

                        <a href="{{ $footerSettings['instagram_url'] }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="Instagram">

                            <i class="bi bi-instagram"></i>

                        </a>

                    @endif

                        {{-- <a href="#"
                           aria-label="YouTube">
                            <i class="bi bi-youtube"></i>
                        </a>

                        <a href="#"
                           aria-label="Facebook">
                            <i class="bi bi-facebook"></i>
                        </a> --}}

                    </div>

                </div>


                {{-- MENU --}}
                <div class="col-6 col-md-4 col-lg-2">

                    <h5>
                        Jelajahi
                    </h5>

                    <ul>

                        <li>
                            <a href="{{ route('home') }}">
                                Beranda
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('about.profile') }}">
                                Tentang Kami
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('programs.index') }}">
                                Program
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('impact') }}">
                                Dampak
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('information.index') }}">
                                Informasi
                            </a>
                        </li>

                    </ul>

                </div>


                {{-- TRANSPARANSI --}}
                <div class="col-6 col-md-4 col-lg-2">

                    <h5>
                        Transparansi
                    </h5>

                    <ul>

                        <li>
                            <a href="#">
                                Laporan Tahunan
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                Laporan Kegiatan
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('about.legal') }}">
                                Legalitas
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                Kebijakan Privasi
                            </a>
                        </li>

                    </ul>

                </div>


                {{-- CONTACT --}}
                <div class="col-md-4 col-lg-4">

                    <h5>
                        Hubungi Kami
                    </h5>

                    <div class="footer-contact-item">

                        <div class="footer-contact-icon">
                            <i class="bi bi-geo-alt-fill"></i>
                        </div>

                        <div>
                            <span>
                                Alamat
                            </span>

                            <p>
                                {{ $footerSettings['address'] ?? 'Bandung, Jawa Barat' }}
                            </p>
                        </div>

                    </div>


                    <div class="footer-contact-item">

                        <div class="footer-contact-icon">
                            <i class="bi bi-envelope-fill"></i>
                        </div>

                        <div>
                            <span>
                                Email
                            </span>

                            <p>
                            @if (!empty($footerSettings['email']))

                                <a href="mailto:{{ $footerSettings['email'] }}">
                                    {{ $footerSettings['email'] }}
                                </a>

                            @else

                                info@yayasanpusakakai.org

                            @endif
                        </p>
                        </div>

                    </div>


                    <a href="{{ route('contact') }}"
                       class="footer-contact-link">

                        Hubungi Yayasan

                        <i class="bi bi-arrow-right"></i>

                    </a>

                </div>

            </div>

        </div>


        <div class="footer-divider"></div>


        <div class="footer-bottom">

            <span>
                © {{ date('Y') }} Yayasan Pusaka.
                All Rights Reserved.
            </span>

            <div>
                <a href="#">
                    Kebijakan Privasi
                </a>

                <span>•</span>

                <a href="#">
                    Syarat & Ketentuan
                </a>
            </div>

        </div>

    </div>

</footer>