<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePeminjamanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id_anggota' => 'required|exists:anggota,id_anggota',
            'buku' => 'required|array|min:1',
            'buku.*.id_buku' => 'required|exists:buku,id_buku',
            'buku.*.jumlah' => 'required|integer|min:1',
        ];
    }
}