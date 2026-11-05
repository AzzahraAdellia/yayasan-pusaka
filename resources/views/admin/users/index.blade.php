@extends('admin.layouts.app')

@section('title', 'Kelola User')
@section('page-title', 'Kelola User')

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
            Kelola <span>User</span>
        </h2>

        <p>
            Kelola akun Staff CMS Yayasan Pusaka.
            Hanya Administrator yang dapat menambahkan
            atau menghapus pengguna.
        </p>
    </div>

    <a
        href="{{ route('admin.users.create') }}"
        class="admin-primary-button"
    >
        <i class="bi bi-person-plus"></i>
        Tambah Staff
    </a>

</div>


{{-- =========================================
     ALERT
========================================= --}}
@if (session('success'))

    <div class="admin-alert success">
        <i class="bi bi-check-circle-fill"></i>
        <span>{{ session('success') }}</span>
    </div>

@endif

@if (session('error'))

    <div class="admin-alert error">
        <i class="bi bi-exclamation-circle-fill"></i>
        <span>{{ session('error') }}</span>
    </div>

@endif


{{-- =========================================
     DAFTAR USER
========================================= --}}
<div class="admin-panel">

    <div class="admin-panel-header">

        <div>
            <span>USER CMS</span>
            <h3>Daftar Pengguna</h3>
        </div>

        <div class="admin-table-count">
            {{ $users->total() }} user
        </div>

    </div>

    <div class="admin-table-responsive">

        <table class="admin-table">

            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Terdaftar</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($users as $user)

                    <tr>

                        {{-- NAMA --}}
                        <td>
                            <div class="admin-user-table-cell">

                                <div class="admin-user-table-avatar">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>

                                <strong>
                                    {{ $user->name }}
                                </strong>

                            </div>
                        </td>

                        {{-- EMAIL --}}
                        <td>
                            {{ $user->email }}
                        </td>

                        {{-- ROLE --}}
                        <td>

                            @if ($user->role === 'admin')

                                <span class="admin-role-badge admin">
                                    Administrator
                                </span>

                            @else

                                <span class="admin-role-badge staff">
                                    Staff
                                </span>

                            @endif

                        </td>

                        {{-- TANGGAL --}}
                        <td>
                            {{ $user->created_at->format('d/m/Y') }}
                        </td>

                        {{-- AKSI --}}
                        <td>

                            @if ($user->role === 'admin')

                                <span class="admin-muted">
                                    <i class="bi bi-shield-lock"></i>
                                    Admin Utama
                                </span>

                            @else

                                <form
                                    action="{{ route('admin.users.destroy', $user) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus akun Staff ini?')"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="admin-action-button delete"
                                        title="Hapus Staff"
                                    >
                                        <i class="bi bi-trash3"></i>
                                    </button>

                                </form>

                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="5" class="text-center">
                            Belum ada pengguna.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    {{-- =====================================
         PAGINATION
    ===================================== --}}
    @if ($users->hasPages())

        <div class="admin-pagination">
            {{ $users->links('pagination::bootstrap-5') }}
        </div>

    @endif

</div>

@endsection
