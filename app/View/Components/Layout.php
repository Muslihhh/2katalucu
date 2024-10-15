<?php
namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Layout extends Component
{
    public $categories;
    public $products; // Tambahkan properti untuk produk

    /**
     * Create a new component instance.
     *
     * @param  array  $categories
     * @param  array  $products
     */
    public function __construct($categories = [], $products = []) // Tambahkan parameter produk
    {
        $this->categories = $categories;
        $this->products = $products; // Simpan produk
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout');
    }
}
