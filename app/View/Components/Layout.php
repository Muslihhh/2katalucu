<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Layout extends Component
{
    public $categories;
    public $products; // Tambahkan properti untuk produk
    public $daerah;   // Tambahkan properti untuk daerah

    /**
     * Buat instance komponen baru.
     *
     * @param  array  $categories
     * @param  array  $products
     * @param  array  $daerah
     */
    public function __construct($categories = [], $products = [], $daerah = []) // Tambahkan parameter daerah
    {
        $this->categories = $categories;
        $this->products = $products; // Simpan produk
        $this->daerah = $daerah;     // Simpan daerah
    }

    /**
     * Dapatkan tampilan / konten yang mewakili komponen.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout');
    }
}
