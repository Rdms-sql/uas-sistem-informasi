<?php

namespace Database\Seeders;

use App\Models\Anggota;
use Illuminate\Database\Seeder;

class AnggotaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Budi Santoso',
                'alamat' => 'Jl. Merdeka No. 10, Cibinong, Bogor',
                'no_hp' => '081234567801',
                'tanggal_daftar' => '2026-01-10',
            ],
            [
                'nama' => 'Siti Aminah',
                'alamat' => 'Jl. Kenanga No. 5, Bogor',
                'no_hp' => '081234567802',
                'tanggal_daftar' => '2026-02-14',
            ],
            [
                'nama' => 'Andi Wijaya',
                'alamat' => 'Jl. Anggrek No. 22, Depok',
                'no_hp' => '081234567803',
                'tanggal_daftar' => '2026-03-05',
            ],
            [
                'nama' => 'Rina Marlina',
                'alamat' => 'Jl. Mawar No. 8, Cibinong, Bogor',
                'no_hp' => '081234567804',
                'tanggal_daftar' => '2026-04-01',
            ],
            [
                'nama' => 'Dedi Kurniawan',
                'alamat' => 'Jl. Melati No. 15, Jakarta Selatan',
                'no_hp' => '081234567805',
                'tanggal_daftar' => '2026-05-20',
            ],
        ];

        foreach ($data as $item) {
            Anggota::updateOrCreate(
                ['no_hp' => $item['no_hp']],
                $item
            );
        }
    }
}