<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:50|unique:users,email,'.$this->id,
            'identify' => 'required|numeric|digits_between:8,30|unique:users,identify,'.$this->id,
            'gender' => 'required|in:Laki-laki,Perempuan',
            'telp' => 'required|numeric|digits_between:11,12',
            'role' => 'required|in:Petugas,Anggota,Kepala',
            'birthdate' => 'required|date',
            'status' => 'required|in:Guru,Siswa,Staf,Kepala',
        ];
    }
}
