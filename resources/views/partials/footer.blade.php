@php
    $footerSettings = \App\Models\Setting::pluck('value', 'key');
@endphp

<footer class="footer">

    <div class="container">

        <div class="footer-top">

            <div class="row g-5">

                
                {{-- =========================
                    BRAND YAYASAN PUSAKA
                ========================= --}}

                <div class="col-lg-6">

                    <div class="footer-brand">

                        <div class="footer-brand-logo">
                            <img
                                src="{{ asset('images/logo-yp.png') }}"
                                alt="Logo Yayasan Pusaka"
                            >
                        </div>

                        <div>
                            <strong>
                                YAYASAN PUSAKA
                            </strong>

                            <span>
                                Berkembang • Berbagi • Bermakna
                            </span>
                        </div>

                    </div>


                    {{-- =========================
                        LOGO ANAK USAHA YP
                    ========================= --}}

                    @php
                        $anakUsahaYP = [
                            [
                                'name' => 'PT Pusaka Nusantara',
                                'logo' => 'images/perusahaan/pn.png',
                                'url' => 'https://pt-pusaka-nusantara.com/',

                            ],
                            [
                                'name' => 'PT Bangun Trans Pusaka',
                                'logo' => 'images/perusahaan/btp.png',
                                'url' => '',
                            ],
                            [
                                'name' => 'Transmikons Brahmanakurda',
                                'logo' => 'images/perusahaan/transmikons.png',
                                'url' => 'https://transmikons-bk.co.id/',
                            ],
                            [
                                'name' => 'BPRS Baiturridha Pusaka',
                                'logo' => 'images/perusahaan/bprs.png',
                                'url' => 'https://baiturridhapusaka.co.id/',
                            ],
                            [
                                'name' => 'Wahanatrans Pusaka',
                                'logo' => 'images/perusahaan/wtp.png',
                                'url' => 'https://wahanatranspusaka.com/',
                            ],
                        ];
                    @endphp

                    <div class="footer-company-section">

                        <h5>
                            Badan Usaha Yayasan Pusaka
                        </h5>

                        <div class="footer-company-grid yp-grid">

                            
                            @foreach ($anakUsahaYP as $company)

                                <a
                                    href="{{ $company['url'] }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="footer-company-logo"
                                    title="Kunjungi website {{ $company['name'] }}"
                                    aria-label="Kunjungi website {{ $company['name'] }}"
                                >

                                    <img
                                        src="{{ asset($company['logo']) }}"
                                        alt="{{ $company['name'] }}"
                                        loading="lazy"
                                    >

                                </a>

                            @endforeach

                        </div>

                    </div>


                    {{-- =========================
                        DESKRIPSI YAYASAN
                    ========================= --}}

                    <p class="footer-about">

                        Sejak 1967, Yayasan Pusaka hadir membawa
                        semangat kepedulian bagi keluarga besar
                        PT Kereta Api Indonesia (Persero) melalui
                        program pendidikan, sosial, pemberdayaan,
                        dan pengembangan yang berkelanjutan.

                    </p>


                    {{-- =========================
                        LOGO PT KAI DAN ANAK USAHA
                    ========================= --}}

                    @php
                        $kaiGroup = [
                            [
                                'name' => 'PT Kereta Api Indonesia',
                                'logo' => 'images/perusahaan/kai.png',
                                'url' => 'https://www.kai.id/'
                            ],
                            [
                                'name' => 'KAI Service',
                                'logo' => 'images/perusahaan/kai-service.png',
                                'url' => 'https://karir.reska.id/'
                            ],
                            [
                                'name' => 'KAI Wisata',
                                'logo' => 'images/perusahaan/kai-wisata.png',
                                'url' => 'https://kaiwisata.id/'
                            ],
                            [
                                'name' => 'KAI Commuter',
                                'logo' => 'images/perusahaan/kai-commuter.png',
                                'url' => 'https://www.kci.id/'
                            ],
                            [
                                'name' => 'KAI Logistik',
                                'logo' => 'images/perusahaan/kai-logistik.png',
                                'url' => 'https://kailogistik.id/'
                            ],
                            [
                                'name' => 'KAI Properti',
                                'logo' => 'images/perusahaan/kai-properti.png',
                                'url' => 'https://kaiproperti.id/'
                            ],
                        ];
                    @endphp


                    
                    <div class="footer-company-section">

                        {{-- <h5>
                            PT KAI dan Anak Usahanya
                        </h5> --}}

                        <div class="footer-company-grid kai-grid">

                            @foreach ($kaiGroup as $company)

                                <a
                                    href="{{ $company['url'] }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="footer-company-logo"
                                    title="Kunjungi website {{ $company['name'] }}"
                                    aria-label="Kunjungi website {{ $company['name'] }}"
                                >

                                    <img
                                        src="{{ asset($company['logo']) }}"
                                        alt="{{ $company['name'] }}"
                                        loading="lazy"
                                    >

                                </a>

                            @endforeach

                        </div>

                    </div>

                </div>


                {{-- MENU --}}
                <div class="col-lg-2 col-md-6">

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


                {{-- TRANSPARANSI
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

                </div> --}}


                {{-- CONTACT --}}
                <div class="col-lg-4 col-md-6">

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
                    
                    {{-- =========================
                        INSTAGRAM
                    ========================= --}}

                    @if (!empty($footerSettings['instagram_url']))

                        <div class="footer-social footer-social-contact">

                            <a
                                href="{{ $footerSettings['instagram_url'] }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                aria-label="Instagram Yayasan Pusaka"
                                title="Instagram Yayasan Pusaka"
                            >
                                <i class="bi bi-instagram"></i>
                            </a>

                            <a
                                href="{{ $footerSettings['instagram_url'] }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="footer-instagram-text"
                            >
                                
                            </a>

                        </div>

                    @endif

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