<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'index::index');

$routes->group('Auth', ['namespace' => 'App\Controllers\Auth'], function ($routes) {
    $routes->get('Login', 'LoginController::Login', ['as' => 'Auth.Login']);
    $routes->get('Register', 'RegisterController::Register', ['as' => 'Auth.Register']);
    $routes->post('Register/store', 'RegisterController::store');
});

$routes->group('Admin', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
    $routes->get('Dashboard', 'DashboardController::Dashboard', ['as' => 'Admin.Dashboard']);

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
