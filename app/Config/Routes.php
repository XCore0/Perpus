<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'index::index');

$routes->group('Auth', ['namespace' => 'App\Controllers\Auth'], function ($routes) {
    $routes->get('Login', 'LoginController::Login', ['as' => 'Auth.Login']);
    $routes->post('Login/authenticate', 'LoginController::authenticate');
    
    $routes->get('Register', 'RegisterController::Register', ['as' => 'Auth.Register']);
    $routes->post('Register/store', 'RegisterController::store');
    
    $routes->get('Logout', 'LoginController::logout');
});

$routes->group('Admin', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
    $routes->get('Dashboard', 'DashboardController::index', ['as' => 'Admin.Dashboard']);

    // Nama Kategori
    $routes->get('Kategori', 'NamaKategoriController::NamaKategori', ['as' => 'Admin.Kategori']);
    $routes->post('Kategori/store', 'NamaKategoriController::store', ['as' => 'Admin.Kategori.store']);
    $routes->post('Kategori/update/(:num)', 'NamaKategoriController::update/$1', ['as' => 'Admin.Kategori.update']);
    $routes->get('Kategori/delete/(:num)', 'NamaKategoriController::delete/$1', ['as' => 'Admin.Kategori.delete']);

    //Laporan
    $routes->get('Laporan', 'LaporanController::Laporan', ['as' => 'Admin.Laporan']);

    //Nama Buku
    $routes->get('Buku', 'DataBukuController::DataBuku', ['as' => 'Admin.Buku']);
    $routes->post('Buku/store', 'DataBukuController::store', ['as' => 'Admin.Buku.store']);
    $routes->post('Buku/update/(:num)', 'DataBukuController::update/$1', ['as' => 'Admin.Buku.update']);
    $routes->get('Buku/delete/(:num)', 'DataBukuController::delete/$1', ['as' => 'Admin.Buku.delete']);
    $routes->get('Buku/edit/(:num)', 'DataBukuController::edit/$1', ['as' => 'Admin.Buku.edit']);
});

$routes->group('index', function($routes) {
    $routes->post('addToCart', 'index::addToCart');
    $routes->get('getCartItems', 'index::getCartItems');
    $routes->post('removeFromCart', 'index::removeFromCart');
    $routes->post('checkout', 'index::checkout');
    $routes->post('pinjamBuku', 'index::pinjamBuku');
});

// Cart Routes
$routes->post('cart/add', 'CartController::add');
$routes->get('cart/items', 'CartController::getItems');
$routes->post('cart/remove', 'CartController::remove');

$routes->get('checkout', 'CheckoutController::index');
$routes->post('checkout/process', 'CheckoutController::process');

$routes->get('index/getBookDetail/(:num)', 'index::getBookDetail/$1');

$routes->post('index/submitReview', 'Index::submitReview');
$routes->get('index/getBookReviews/(:num)', 'Index::getBookReviews/$1');

$routes->post('koleksi/toggle', 'KoleksiController::toggleKoleksi');
$routes->get('koleksi/items', 'KoleksiController::getKoleksi');

$routes->post('wishlist/toggle', 'WishlistController::toggleWishlist');
$routes->get('wishlist/items', 'WishlistController::getWishlist');

$routes->post('submitReview', 'Index::submitReview');
