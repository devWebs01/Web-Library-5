<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('auth.profile.account', [
            'user' => Auth()->user(),
        ]);
    }

    public function account(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users,email, '.$id],
            'identify' => ['required', 'numeric', 'digits_between:8,30', 'unique:users,identify, '.$id],
            'gender' => ['required', 'in:Laki-laki,Perempuan'],
            'telp' => ['required', 'numeric', 'digits_between:11,12'],
            'birthdate' => ['required', 'date'],
        ]);

        $user = User::findOrFail($id);

        $user->update($validate);

        return redirect()->route('profile', $user->slug)->with('success', 'Pembaruan data akun berhasil dilakukan.');
    }

    public function password(Request $request, $id)
    {
        $validate = $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::findOrFail($id);

        $user->update($validate);

        return back()->with('success', 'Berhasil memperbarui password.');
    }
}
