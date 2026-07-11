<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BadgeKategori extends Component
{
    public $nama;
    public $warna;

    public function __construct($nama, $warna)
    {
        $this->nama = $nama;
        $this->warna = $warna;
    }

    public function render()
    {
        return view('components.badge-kategori');
    }
}