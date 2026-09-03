<aside class="admin-sidebar"
       id="adminSidebar">

    {{-- BRAND --}}
    <div class="admin-brand">

        <a href="{{ route('admin.dashboard') }}">

            <div class="admin-brand-logo">
                YP
            </div>

            <div class="admin-brand-text">

                <strong>
                    Yayasan Pusaka
                </strong>

                <span>
                    Content Management System
                </span>

            </div>

        </a>

    </div>


    {{-- NAVIGATION --}}
    <nav class="admin-nav">

        <span class="admin-nav-label">
            UTAMA
        </span>


        {{-- DASHBOARD --}}
        <a href="{{ route('admin.dashboard') }}"
        class="admin-nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

            <i class="bi bi-grid-1x2-fill"></i>

            <span>
                Dashboard
            </span>

        </a>


        {{-- BERITA --}}
        <a href="{{ route('admin.news.index') }}"
        class="admin-nav-item {{ request()->routeIs('admin.news.*') ? 'active' : '' }}">

            <i class="bi bi-newspaper"></i>

            <span>
                Berita
            </span>

        </a>


        {{-- KEGIATAN --}}
        <a href="{{ route('admin.activities.index') }}"
        class="admin-nav-item {{ request()->routeIs('admin.activities.*') ? 'active' : '' }}">

            <i class="bi bi-calendar-event"></i>

            <span>
                Kegiatan
            </span>

        </a>


        {{-- PROGRAM --}}
        <a href="{{ route('admin.programs.index') }}"
        class="admin-nav-item {{ request()->routeIs('admin.programs.*') ? 'active' : '' }}">

            <i class="bi bi-grid"></i>

            <span>
                Program
            </span>

        </a>


        {{-- MITRA --}}
        <a href="{{ route('admin.partners.index') }}"
        class="admin-nav-item {{ request()->routeIs('admin.partners.*') ? 'active' : '' }}">

            <i class="bi bi-people"></i>

            <span>
                Mitra
            </span>

        </a>


        {{-- LEGALITAS --}}
        <a href="{{ route('admin.legalities.index') }}"
        class="admin-nav-item {{ request()->routeIs('admin.legalities.*') ? 'active' : '' }}">

            <i class="bi bi-file-earmark-check"></i>

            <span>
                Legalitas
            </span>

        </a>

        {{-- PESAN MASUK --}}
        <a href="{{ route('admin.messages.index') }}"
        class="admin-nav-item {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">

            <i class="bi bi-envelope"></i>

            <span>
                Pesan Masuk
            </span>

            @php
                $unreadMessages = \App\Models\ContactMessage::where(
                    'is_read',
                    false
                )->count();
            @endphp

            @if ($unreadMessages > 0)

                <span class="admin-nav-badge">
                    {{ $unreadMessages > 99 ? '99+' : $unreadMessages }}
                </span>

            @endif

        </a>


        {{-- KELOLA USER --}}
        @if (auth()->user()->role === 'admin')

            <a href="{{ route('admin.users.index') }}"
            class="admin-nav-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">

                <i class="bi bi-person-gear"></i>

                <span>
                    Kelola User
                </span>

            </a>

        @endif


        {{-- PENGATURAN --}}
        <a href="{{ route('admin.settings.index') }}"
        class="admin-nav-item {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">

            <i class="bi bi-gear"></i>

            <span>
                Pengaturan
            </span>

        </a>

    </nav>


    {{-- SIDEBAR FOOTER --}}
    <div class="admin-sidebar-footer">

        <a href="{{ route('home') }}"
           target="_blank">

            <i class="bi bi-box-arrow-up-right"></i>

            <span>
                Lihat Website
            </span>

        </a>

    </div>

</aside>


<div class="admin-overlay"
     id="adminOverlay">
</div>