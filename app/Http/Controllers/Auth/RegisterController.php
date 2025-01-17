<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'identify' => ['required', 'numeric', 'digits_between:8,30', 'unique:users,identify'],
            'gender' => ['required', 'in:Laki-laki,Perempuan'],
            'telp' => ['required', 'numeric', 'digits_between:11,12', 'unique:users'],
            'role' => ['required', 'in:Anggota'],
            'birthdate' => ['required', 'date'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'slug' => Str::slug($data['name']).Str::random(5),
            'identify' => $data['identify'],
            'gender' => $data['gender'],
            'telp' => $data['telp'],
            'role' => $data['role'],
            'birthdate' => $data['birthdate'],
        ]);
    }

    protected function registered()
    {
        $this->guard()->logout();

        return back()->with('success', 'Terima kasih atas mendaftar di situs Perpustakaan. Mohon tunggu konfirmasi dari administrator dalam waktu 24x6 jam atau kunjungi perpustakaan langsung..');
    }
}
