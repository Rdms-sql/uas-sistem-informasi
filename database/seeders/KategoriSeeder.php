<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama_kategori' => 'Fiksi', 'warna' => '#E24B4A'],
            ['nama_kategori' => 'Non-Fiksi', 'warna' => '#3B82F6'],
            ['nama_kategori' => 'Sains & Teknologi', 'warna' => '#10B981'],
            ['nama_kategori' => 'Sejarah', 'warna' => '#8B5E3C'],
            ['nama_kategori' => 'Anak & Remaja', 'warna' => '#F59E0B'],
            ['nama_kategori' => 'Biografi', 'warna' => '#6366F1'],
        ];

        foreach ($data as $item) {
            Kategori::updateOrCreate(
                ['nama_kategori' => $item['nama_kategori']],
                $item
            );
        }
    }
}