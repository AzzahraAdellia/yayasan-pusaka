<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $currentUser = Auth::user();

        abort_if(
            !$currentUser || $currentUser->role !== 'admin',
            403
        );

        $users = User::latest()->paginate(10);

        return view('admin.users.index', compact('users'));
    }


    public function updateRole(Request $request, User $user)
    {
        $currentUser = Auth::user();

        abort_if(
            !$currentUser || $currentUser->role !== 'admin',
            403
        );

        $validated = $request->validate([
            'role' => ['required', 'in:admin,staff'],
        ]);

        if (
            $user->id === $currentUser->id &&
            $validated['role'] !== 'admin'
        ) {
            return back()->with(
                'error',
                'Role akun admin yang sedang digunakan tidak dapat diturunkan.'
            );
        }

        $user->update([
            'role' => $validated['role'],
        ]);

        return back()->with(
            'success',
            'Role user berhasil diperbarui.'
        );
    }
}