<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKategoriRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama_kategori' => 'required|string|max:100|unique:kategori,nama_kategori',
            'warna' => 'required|string|max:20|unique:kategori,warna|regex:/^#[0-9A-Fa-f]{6}$/',
        ];
    }

    public function messages(): array
    {
        return [
            'nama_kategori.unique' => 'Nama kategori sudah digunakan.',
            'warna.unique' => 'Warna ini sudah dipakai kategori lain, pilih warna berbeda.',
            'warna.regex' => 'Format warna tidak valid.',
        ];
    }
}