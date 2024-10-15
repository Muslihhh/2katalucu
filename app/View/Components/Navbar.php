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

    public function __construct($homeRoute, $categories = [], $products = [])
    {
        $this->homeRoute = $homeRoute;
        $this->categories = $categories;
        $this->products = $products;
    }

    public function render(): View|Closure|string
    {
        return view('components.navbar');
    }
}
