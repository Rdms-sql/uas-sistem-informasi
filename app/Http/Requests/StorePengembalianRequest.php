<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePengembalianRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id_peminjaman' => 'required|exists:peminjaman,id_peminjaman',
            'tanggal_dikembalikan' => 'required|date',
        ];
    }
}