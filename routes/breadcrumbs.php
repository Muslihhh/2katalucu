<?php
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Breadcrumb untuk halaman Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});
// Breadcrumb untuk halaman Produk
Breadcrumbs::for('product', function (BreadcrumbTrail $trail, $product) {
    $trail->parent('home', $product); // Menampilkan kategori terlebih dahulu
    $trail->push($product->name, route('products.show', $product->id));
});
