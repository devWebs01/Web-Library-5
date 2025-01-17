<?php

namespace App\Http\Controllers;

use App\Models\User;

class ConfirmationAccountController extends Controller
{
    public function index()
    {
        return view('confirmation.index', [
            'users' => User::whereNull('email_verified_at')->latest()->get(),
            'verified' => User::whereNotNull('email_verified_at')->get(),
            'non_verified' => User::whereNull('email_verified_at')->get(),
        ]);
    }

    public function accept($id)
    {
        $user = User::findOrfail($id);
        $user->update([
            'email_verified_at' => now(),
        ]);

        return back()->with('success', 'Pengguna '.$user->name.' berhasil dikonfirmasi menjadi anggota perpustakaan.');
    }
}
