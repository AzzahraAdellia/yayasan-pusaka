@extends('admin.layouts.app')

@section('title', 'Kelola User')
@section('page-title', 'Kelola User')

@section('content')

<div class="admin-page-header">

    <div>

        <span class="admin-page-label">
            SISTEM
        </span>

        <h2>
            Kelola <span>User</span>
        </h2>

        <p>
            Lihat akun pengguna dan atur role Admin atau Staff.
        </p>

    </div>

</div>


@if (session('success'))

    <div class="admin-alert-success">
        <i class="bi bi-check-circle-fill"></i>
        <span>{{ session('success') }}</span>
    </div>

@endif


@if (session('error'))

    <div class="admin-alert-error">
        <i class="bi bi-exclamation-circle-fill"></i>

        <div>
            <strong>Perubahan gagal.</strong>
            <span>{{ session('error') }}</span>
        </div>
    </div>

@endif


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

                @foreach ($users as $user)

                    <tr>

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

                        <td>
                            {{ $user->email }}
                        </td>

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

                        <td>
                            {{ $user->created_at->format('d/m/Y') }}
                        </td>

                        <td>

                            <form
                                action="{{ route('admin.users.update-role', $user) }}"
                                method="POST"
                                class="admin-role-form"
                            >

                                @csrf
                                @method('PATCH')

                                <select
                                    name="role"
                                    class="admin-role-select"
                                    @disabled($user->id === auth()->id())
                                >

                                    <option
                                        value="staff"
                                        @selected($user->role === 'staff')
                                    >
                                        Staff
                                    </option>

                                    <option
                                        value="admin"
                                        @selected($user->role === 'admin')
                                    >
                                        Admin
                                    </option>

                                </select>

                                @if ($user->id !== auth()->id())

                                    <button
                                        type="submit"
                                        class="admin-action-button edit"
                                        title="Simpan Role"
                                    >
                                        <i class="bi bi-check-lg"></i>
                                    </button>

                                @endif

                            </form>

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>


    <div class="admin-pagination">
        {{ $users->links() }}
    </div>

</div>

@endsection