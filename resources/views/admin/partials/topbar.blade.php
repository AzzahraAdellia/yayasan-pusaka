<header class="admin-topbar">

    <div class="admin-topbar-left">

        <button
            type="button"
            class="admin-menu-toggle"
            id="sidebarToggle"
            aria-label="Buka menu"
        >
            <i class="bi bi-list"></i>
        </button>

        <div class="admin-topbar-title">

            <h1>
                @yield('page-title', 'Dashboard')
            </h1>

            <span>
                CMS Yayasan Pusaka
            </span>

        </div>

    </div>


    <div class="admin-topbar-right">

        <a
            href="{{ route('home') }}"
            target="_blank"
            class="admin-website-button"
        >
            <i class="bi bi-globe2"></i>

            <span>
                Lihat Website
            </span>
        </a>


        <div class="admin-user">

            <div class="admin-user-avatar">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>


            <div class="admin-user-info">

                <strong>
                    {{ auth()->user()->name }}
                </strong>

                <span>
                    {{ auth()->user()->role === 'admin' ? 'Administrator' : 'Staff' }}
                </span>

            </div>


            <form
                method="POST"
                action="{{ route('logout') }}"
                class="admin-logout-form"
            >
                @csrf

                <button
                    type="submit"
                    class="admin-logout"
                    title="Keluar"
                    aria-label="Logout"
                >
                    <i class="bi bi-box-arrow-right"></i>
                </button>

            </form>

        </div>

    </div>

</header>