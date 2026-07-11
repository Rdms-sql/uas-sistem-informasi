<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateKategoriRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('kategori')->id_kategori;

        return [
            'nama_kategori' => ['required', 'string', 'max:100', Rule::unique('kategori', 'nama_kategori')->ignore($id, 'id_kategori')],
            'warna' => ['required', 'string', 'max:20', Rule::unique('kategori', 'warna')->ignore($id, 'id_kategori'), 'regex:/^#[0-9A-Fa-f]{6}$/'],
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