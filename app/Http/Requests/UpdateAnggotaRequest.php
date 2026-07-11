<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAnggotaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('anggotum')->id_anggota;

        return [
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string',
            'no_hp' => ['required', 'string', 'max:15', Rule::unique('anggota', 'no_hp')->ignore($id, 'id_anggota')],
            'tanggal_daftar' => 'required|date',
        ];
    }
}