<!DOCTYPE html>
<!--
Template Name: Midone - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" class="light">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="<?= base_url('dist/images/logo.svg') ?>" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Midone Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>Dashboard - Perpustakaan Digital</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="<?= base_url('dist/css/app.css') ?>" />
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="py-5">
    <!-- BEGIN: Mobile Menu -->
    <div class="mobile-menu md:hidden">
        <div class="mobile-menu-bar">
            <a href="" class="flex mr-auto">
                <img alt="LiteraSky" class="w-6" src="<?= base_url('dist/images/logo.svg') ?>">
            </a>
            <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
        </div>
    </div>
    <!-- END: Mobile Menu -->
    <div class="flex mt-[4.7rem] md:mt-0">
        <!-- BEGIN: Side Menu -->
        <nav class="side-nav">
            <a href="" class="intro-x flex items-center pl-5 pt-4">
                <img alt="LiteraSky" class="w-6" src="<?= base_url('dist/images/logo.svg') ?>">
                <span class="hidden xl:block text-white text-lg ml-3">LiteraSky</span>
            </a>
            <div class="side-nav__devider my-6"></div>
            <ul>
                <li>
                    <a href="<?= route_to('Admin.Dashboard') ?>" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                        <div class="side-menu__title"> Dashboard </div>
                    </a>
                </li>

                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="book"></i> </div>
                        <div class="side-menu__title">
                            Data Master
                            <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="<?= route_to('Admin.Kategori') ?>" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="list"></i> </div>
                                <div class="side-menu__title"> Kategori Buku </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?= route_to('Admin.Buku') ?>" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="book-open"></i> </div>
                                <div class="side-menu__title"> Data Buku </div>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="<?= route_to('Admin.User') ?>" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="users"></i> </div>
                        <div class="side-menu__title"> Pengguna </div>
                    </a>
                </li>
                <li>
                    <a href="<?= route_to('Admin.PeminjamanPengembalian') ?>" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="layers"></i> </div>
                        <div class="side-menu__title"> Peminjaman dan Pengembalian </div>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('Auth/Logout') ?>" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="log-out"></i> </div>
                        <div class="side-menu__title"> Keluar </div>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- END: Side Menu -->
        <!-- BEGIN: Content -->
        <div class="content">
            <!-- BEGIN: Top Bar -->
            <div class="top-bar">
                <!-- BEGIN: Breadcrumb -->
                <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Application</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
                <!-- END: Breadcrumb -->
                <!-- BEGIN: Search -->
                <div class="intro-x relative mr-3 sm:mr-6">
                    <div class="search hidden sm:block">
                        <input type="text" class="search__input form-control border-transparent" placeholder="Search...">
                        <i data-lucide="search" class="search__icon dark:text-slate-500"></i>
                    </div>
                    <a class="notification sm:hidden" href=""> <i data-lucide="search" class="notification__icon dark:text-slate-500"></i> </a>
                    <div class="search-result">
                        <div class="search-result__content">
                            <div class="search-result__content__title">Pages</div>
                            <div class="mb-5">
                                <a href="" class="flex items-center">
                                    <div class="w-8 h-8 bg-success/20 dark:bg-success/10 text-success flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-lucide="inbox"></i> </div>
                                    <div class="ml-3">Mail Settings</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 bg-pending/10 text-pending flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-lucide="users"></i> </div>
                                    <div class="ml-3">Users & Permissions</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 bg-primary/10 dark:bg-primary/20 text-primary/80 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-lucide="credit-card"></i> </div>
                                    <div class="ml-3">Transactions Report</div>
                                </a>
                            </div>
                            <div class="search-result__content__title">Users</div>
                            <div class="mb-5">
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-7.jpg">
                                    </div>
                                    <div class="ml-3">Tom Cruise</div>
                                    <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">tomcruise@left4code.com</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-3.jpg">
                                    </div>
                                    <div class="ml-3">Denzel Washington</div>
                                    <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">denzelwashington@left4code.com</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-11.jpg">
                                    </div>
                                    <div class="ml-3">Kevin Spacey</div>
                                    <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">kevinspacey@left4code.com</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-15.jpg">
                                    </div>
                                    <div class="ml-3">Sean Connery</div>
                                    <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">seanconnery@left4code.com</div>
                                </a>
                            </div>
                            <div class="search-result__content__title">Products</div>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/preview-11.jpg">
                                </div>
                                <div class="ml-3">Dell XPS 13</div>
                                <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">PC &amp; Laptop</div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/preview-10.jpg">
                                </div>
                                <div class="ml-3">Apple MacBook Pro 13</div>
                                <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">PC &amp; Laptop</div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/preview-11.jpg">
                                </div>
                                <div class="ml-3">Sony Master Series A9G</div>
                                <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">Electronic</div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/preview-1.jpg">
                                </div>
                                <div class="ml-3">Dell XPS 13</div>
                                <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">PC &amp; Laptop</div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- END: Search -->
                <!-- BEGIN: Notifications -->
                <div class="intro-x dropdown mr-auto sm:mr-6">
                    <div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="bell" class="notification__icon dark:text-slate-500"></i> </div>
                    <div class="notification-content pt-2 dropdown-menu">
                        <div class="notification-content__box dropdown-content">
                            <div class="notification-content__title">Notifications</div>
                            <div class="cursor-pointer relative flex items-center ">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-7.jpg">
                                    <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600"></div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">Tom Cruise</a>
                                        <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">06:05 AM</div>
                                    </div>
                                    <div class="w-full truncate text-slate-500 mt-0.5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500</div>
                                </div>
                            </div>
                            <div class="cursor-pointer relative flex items-center mt-5">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-3.jpg">
                                    <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600"></div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">Denzel Washington</a>
                                        <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">01:10 PM</div>
                                    </div>
                                    <div class="w-full truncate text-slate-500 mt-0.5">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 20</div>
                                </div>
                            </div>
                            <div class="cursor-pointer relative flex items-center mt-5">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-11.jpg">
                                    <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600"></div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">Kevin Spacey</a>
                                        <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">01:10 PM</div>
                                    </div>
                                    <div class="w-full truncate text-slate-500 mt-0.5">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 20</div>
                                </div>
                            </div>
                            <div class="cursor-pointer relative flex items-center mt-5">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-15.jpg">
                                    <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600"></div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">Sean Connery</a>
                                        <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">01:10 PM</div>
                                    </div>
                                    <div class="w-full truncate text-slate-500 mt-0.5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500</div>
                                </div>
                            </div>
                            <div class="cursor-pointer relative flex items-center mt-5">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-2.jpg">
                                    <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600"></div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">Denzel Washington</a>
                                        <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">01:10 PM</div>
                                    </div>
                                    <div class="w-full truncate text-slate-500 mt-0.5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Notifications -->
                <!-- BEGIN: Account Menu -->
                <div class="intro-x dropdown w-8 h-8">
                    <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button" aria-expanded="false" data-tw-toggle="dropdown">
                        <img alt="Midone - HTML Admin Template" src="dist/images/profile-6.jpg">
                    </div>
                    <div class="dropdown-menu w-56">
                        <ul class="dropdown-content bg-primary text-white">
                            <li class="p-2">
                                <div class="font-medium">Tom Cruise</div>
                                <div class="text-xs text-white/70 mt-0.5 dark:text-slate-500">Backend Engineer</div>
                            </li>
                            <li>
                                <hr class="dropdown-divider border-white/[0.08]">
                            </li>
                            <li>
                                <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="user" class="w-4 h-4 mr-2"></i> Profile </a>
                            </li>
                            <li>
                                <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="edit" class="w-4 h-4 mr-2"></i> Add Account </a>
                            </li>
                            <li>
                                <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="lock" class="w-4 h-4 mr-2"></i> Reset Password </a>
                            </li>
                            <li>
                                <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="help-circle" class="w-4 h-4 mr-2"></i> Help </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider border-white/[0.08]">
                            </li>
                            <li>
                                <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- END: Account Menu -->
            </div>
            <!-- END: Top Bar -->

            <div class="intro-y flex items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    Chart
                </h2>
            </div>
            <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-6">
                <div class="w-full xl:w-auto flex items-center mt-3 xl:mt-0">
                    <!-- Filter Tanggal -->
                    <select class="w-32 xl:w-auto form-select box mr-2" id="filterTanggal">
                        <option>Pilih Tanggal</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>

                    <!-- Filter Bulan -->
                    <select class="w-32 xl:w-auto form-select box mr-2" id="filterBulan">
                        <option>Pilih Bulan</option>
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>

                    <!-- Filter Tahun -->
                    <select class="w-32 xl:w-auto form-select box mr-2" id="filterTahun">
                        <option>Pilih Tahun</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                    </select>

                    <!-- Tombol Filter -->
                    <button class="btn btn-primary ml-2" id="filterButton">Filter</button>
                </div>
            </div>

            <!-- Tempat Menampilkan Data -->
            <div id="filteredData" class="mt-4">
                <!-- Data yang difilter akan muncul di sini -->
            </div>

            <div class="intro-y grid grid-cols-12 gap-6 mt-5">
                <div class="col-span-12 lg:col-span-6">
                    <!-- BEGIN: Vertical Bar Chart -->
                    <div class="intro-y box">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto">
                                Vertical Bar Chart
                            </h2>
                            <div class="form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                                <label class="form-check-label ml-0" for="show-example-1">Show example code</label>
                                <input id="show-example-1" data-target="#vertical-bar-chart" class="show-code form-check-input mr-0 ml-3" type="checkbox">
                            </div>
                        </div>
                        <div id="vertical-bar-chart" class="p-5">
                            <div class="preview">
                                <div class="h-[400px]">
                                    <canvas id="vertical-bar-chart-widget"></canvas>
                                </div>
                            </div>
                            <div class="source-code hidden">
                                <button data-target="#copy-vertical-bar-chart" class="copy-code btn py-1 px-2 btn-outline-secondary"> <i data-lucide="file" class="w-4 h-4 mr-2"></i> Copy example code </button>
                                <div class="overflow-y-auto mt-3 rounded-md">
                                    <pre id="copy-vertical-bar-chart" class="source-preview"> <code class="html"> HTMLOpenTagdiv class=&quot;h-[400px]&quot;HTMLCloseTag HTMLOpenTagcanvas id=&quot;vertical-bar-chart-widget&quot;HTMLCloseTagHTMLOpenTag/canvasHTMLCloseTag HTMLOpenTag/divHTMLCloseTag </code> </pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-6">
                    <!-- BEGIN: Pie Chart -->
                    <div class="intro-y box">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto">
                                Pie Chart
                            </h2>
                            <div class="form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                                <label class="form-check-label ml-0" for="show-example-6">Show example code</label>
                                <input id="show-example-6" data-target="#pie-chart" class="show-code form-check-input mr-0 ml-3" type="checkbox">
                            </div>
                        </div>
                        <div id="pie-chart" class="p-5">
                            <div class="preview">
                                <div class="h-[400px]">
                                    <canvas id="pie-chart-widget"></canvas>
                                </div>
                            </div>
                            <div class="source-code hidden">
                                <button data-target="#copy-pie-chart" class="copy-code btn py-1 px-2 btn-outline-secondary"> <i data-lucide="file" class="w-4 h-4 mr-2"></i> Copy example code </button>
                                <div class="overflow-y-auto mt-3 rounded-md">
                                    <pre id="copy-pie-chart" class="source-preview"> <code class="html"> HTMLOpenTagdiv class=&quot;h-[400px]&quot;HTMLCloseTag HTMLOpenTagcanvas id=&quot;pie-chart-widget&quot;HTMLCloseTagHTMLOpenTag/canvasHTMLCloseTag HTMLOpenTag/divHTMLCloseTag </code> </pre>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Pie Chart -->
                </div>
            </div>

            <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-6">
                <div class="w-full xl:w-auto flex items-center mt-3 xl:mt-0">
                    <!-- Status Dropdown -->
                    <select class="w-32 xl:w-auto form-select box mr-2">
                        <option>Pilih</option>
                        <option>Buku</option>
                        <option>Nama</option>
                        <option>ID</option>
                        <option>Kategori</option>
                    </select>
                    <select class="w-32 xl:w-auto form-select box mr-2">
                        <option>Status</option>
                        <option>Sudah</option>
                        <option>Belum</option>
                    </select>

                    <!-- Search Input -->
                    <div class="w-full xl:w-auto relative text-slate-500">
                        <input type="text" class="form-control w-full xl:w-80 box pr-10" placeholder="Search...">
                        <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                    </div>
                </div>
            </div>

            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                <table class="table table-report -mt-2">
                    <thead>
                        <tr>
                            <th class="whitespace-nowrap">FOTO</th>
                            <th class="whitespace-nowrap">NAMA PEMINJAM</th>
                            <th class="text-center whitespace-nowrap">BUKU DIPINJAM</th>
                            <th class="text-center whitespace-nowrap">TANGGAL PINJAM</th>
                            <th class="text-center whitespace-nowrap">TANGGAL KEMBALI</th>
                            <th class="text-center whitespace-nowrap">STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($peminjaman as $pinjam): ?>
                        <tr class="intro-x">
                            <td class="w-40">
                                <div class="flex">
                                    <div class="w-10 h-10 image-fit">
                                        <div class="w-full h-full rounded-full bg-primary text-white flex items-center justify-center font-bold text-lg">
                                            <?= substr($pinjam['NamaLengkap'], 0, 1) ?>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="javascript:;" class="font-medium whitespace-nowrap"><?= $pinjam['NamaLengkap'] ?></a>
                                <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5"><?= $pinjam['Username'] ?></div>
                            </td>
                            <td class="text-center">
                                <div class="flex flex-col items-center">
                                    <?php foreach (array_slice($pinjam['Buku'], 0, 3) as $index => $buku): ?>
                                        <span class="text-xs <?= $index > 0 ? 'mt-1' : '' ?>"><?= $buku ?></span>
                                    <?php endforeach; ?>
                                    
                                </div>
                            </td>
                            <td class="text-center"><?= date('d M Y', strtotime($pinjam['TanggalPeminjaman'])) ?></td>
                            <td class="text-center"><?= date('d M Y', strtotime($pinjam['TanggalPengembalian'])) ?></td>
                            <td class="text-center">
                                <div class="flex justify-center">
                                    <?php 
                                    $statusArray = explode(',', $pinjam['StatusPeminjaman']);
                                    $displayStatus = in_array('Terlambat', $statusArray) ? 'Terlambat' : 
                                                  (in_array('Dipinjam', $statusArray) ? 'Dipinjam' : 'Dikembalikan');
                                    ?>
                                    <div class="px-2 py-1 rounded-full 
                                        <?= $displayStatus == 'Dipinjam' ? 'bg-warning/20 text-warning' : 
                                           ($displayStatus == 'Dikembalikan' ? 'bg-success/20 text-success' : 
                                           ($displayStatus == 'Terlambat' ? 'bg-danger/20 text-danger' : 'bg-slate-100 text-slate-500')) ?>">
                                        <?= $displayStatus ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- END: Data List -->
            <!-- BEGIN: Pagination -->
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
                <nav class="w-full sm:w-auto sm:mr-auto">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevrons-left"></i> </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevron-left"></i> </a>
                        </li>
                        <li class="page-item"> <a class="page-link" href="#">...</a> </li>
                        <li class="page-item"> <a class="page-link" href="#">1</a> </li>
                        <li class="page-item active"> <a class="page-link" href="#">2</a> </li>
                        <li class="page-item"> <a class="page-link" href="#">3</a> </li>
                        <li class="page-item"> <a class="page-link" href="#">...</a> </li>
                        <li class="page-item">
                            <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevron-right"></i> </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevrons-right"></i> </a>
                        </li>
                    </ul>
                </nav>
                <div class="hidden xl:block mx-auto text-slate-500">Showing 1 to 10 of 150 entries</div>
                <select class="w-20 form-select box mt-3 sm:mt-0">
                    <option>10</option>
                    <option>25</option>
                    <option>35</option>
                    <option>50</option>
                </select>
            </div>
        </div>
        <!-- END: Content -->
    </div>
    <!-- BEGIN: JS Assets-->
    <script src="<?= base_url('dist/js/app.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/lucide-icons@latest/dist/lucide.umd.js"></script>
    <!-- END: JS Assets-->

    <script>
        window.addEventListener('DOMContentLoaded', () => {
            lucide.set();
        });
    </script>

    <!-- BEGIN: Detail Modal -->
    <div id="detail-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Detail Peminjaman</h2>
                </div>
                <div class="modal-body p-5" id="detail-content">
                    <!-- Content will be loaded here -->
                </div>
            </div>
        </div>
    </div>
    <!-- END: Detail Modal -->

    <script>
    function showDetailPeminjaman(id) {
        // Fetch detail data
        fetch(`<?= base_url('admin/dashboard/getDetail') ?>/${id}`)
            .then(response => response.json())
            .then(data => {
                // Populate modal content
                let content = `
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 mb-3">
                            <div class="text-slate-500 text-xs">INFORMASI PEMINJAM</div>
                            <div class="font-medium mt-1">${data.peminjam.NamaLengkap}</div>
                            <div class="text-slate-500">${data.peminjam.Username}</div>
                        </div>
                        <div class="col-span-12">
                            <div class="text-slate-500 text-xs mb-2">BUKU YANG DIPINJAM</div>
                            ${data.buku.map(book => `
                                <div class="flex items-center mt-3 border-b pb-3">
                                    <div class="ml-3">
                                        <div class="font-medium">${book.Judul}</div>
                                        <div class="text-slate-500 text-xs mt-0.5">${book.Kategori}</div>
                                    </div>
                                </div>
                            `).join('')}
                        </div>
                        <div class="col-span-12 mt-3">
                            <div class="text-slate-500 text-xs">TANGGAL PEMINJAMAN</div>
                            <div class="font-medium mt-1">${data.peminjaman.TanggalPeminjaman}</div>
                        </div>
                        <div class="col-span-12 mt-3">
                            <div class="text-slate-500 text-xs">TANGGAL PENGEMBALIAN</div>
                            <div class="font-medium mt-1">${data.peminjaman.TanggalPengembalian}</div>
                        </div>
                        <div class="col-span-12 mt-3">
                            <div class="text-slate-500 text-xs">STATUS</div>
                            <div class="font-medium mt-1">
                                <span class="px-2 py-1 rounded-full ${getStatusClass(data.peminjaman.StatusPeminjaman)}">
                                    ${data.peminjaman.StatusPeminjaman}
                                </span>
                            </div>
                        </div>
                    </div>
                `;
                document.getElementById('detail-content').innerHTML = content;
                
                // Show modal
                const modal = tailwind.Modal.getInstance(document.querySelector("#detail-modal"));
                modal.show();
            });
    }

    function getStatusClass(status) {
        switch(status) {
            case 'Dipinjam':
                return 'bg-warning/20 text-warning';
            case 'Dikembalikan':
                return 'bg-success/20 text-success';
            case 'Terlambat':
                return 'bg-danger/20 text-danger';
            default:
                return 'bg-slate-100 text-slate-500';
        }
    }
    </script>
</body>

</html>