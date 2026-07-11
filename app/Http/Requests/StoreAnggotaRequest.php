<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAnggotaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:15|unique:anggota,no_hp',
            'tanggal_daftar' => 'required|date',
        ];
    }
}