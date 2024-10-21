<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    public $homeRoute;
    public $categories;
    public $products;
    public $daerah; // Tambahkan properti untuk daerah

    public function __construct($homeRoute, $categories = [], $products = [], $daerah = []) // Tambahkan parameter daerah
    {
        $this->homeRoute = $homeRoute;
        $this->categories = $categories;
        $this->products = $products;
        $this->daerah = $daerah; // Simpan daerah
    }

    public function render(): View|Closure|string
    {
        return view('components.navbar');
    }
}
