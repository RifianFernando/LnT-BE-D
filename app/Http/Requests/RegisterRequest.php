<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3|max:10|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'name'=>[
                'required' => 'Nama jangan dikosongin',
                'unique' => 'Nama yang anda masukkan sudah terdaftar'
            ],
            'email'=>[
                'required' => 'Email jangan dikosongin',
                'email' => 'Tolong tulis email yang benar!!',
                'unique' => 'Email yang anda masukkan sudah terdaftar'
            ],
            'password' => [
                'required' => 'Password tidak boleh kosong',
                'min' => 'Password harus lebih dari 3 huruf',
                'max' => 'Password harus kurang dari 10 huruf',
                'confirmed' => 'Password tidak sama dengan password yang anda masukkan'
            ]
            // 'name.required' => 'Nama jangan dikosongin',
            // 'email.email' => 'Tolong tulis email yang benar!!',
            // 'email.unique' => 'Email yang anda masukkan sudah terdaftar',
            // 'password.required' => 'Password tidak boleh kosong',
            // 'password.min' => 'Password harus lebih dari 3 huruf',
        ];
    }
}

