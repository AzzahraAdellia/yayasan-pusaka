<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    private function authorizeAdmin(): void
    {
        abort_unless(
            Auth::check() && Auth::user()->role === 'admin',
            403,
            'Akses hanya untuk Admin.'
        );
    }

    public function index()
    {
        $this->authorizeAdmin();

        $users = User::latest()->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $this->authorizeAdmin();

        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $this->authorizeAdmin();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users,email',
            ],
            'password' => [
                'required',
                'confirmed',
                Password::defaults(),
            ],
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => strtolower($validated['email']),
            'role' => 'staff',
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Akun Staff berhasil dibuat.');
    }

    public function updateRole(Request $request, User $user)
    {
        $this->authorizeAdmin();

        return back()->with(
            'error',
            'Perubahan role dinonaktifkan. Semua akun tambahan wajib berstatus Staff.'
        );
    }

    public function destroy(User $user)
    {
        $this->authorizeAdmin();

        if ($user->id === Auth::id() || $user->role === 'admin') {
            return back()->with(
                'error',
                'Akun Admin tidak dapat dihapus.'
            );
        }

        DB::transaction(function () use ($user) {
            // Hapus sesi login Staff pada database,
            // apabila aplikasi menggunakan database session.
            if (config('session.driver') === 'database') {
                DB::table('sessions')
                    ->where('user_id', $user->id)
                    ->delete();
            }

            $user->delete();
        });

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Akun Staff berhasil dihapus.');
    }
}
