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
        <title>LiteraSky - Register</title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <link rel="stylesheet" href="<?= base_url('dist/css/app.css') ?>" />
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="login">
        <div class="container sm:px-10">
            <div class="block xl:grid grid-cols-2 gap-4">
                <!-- BEGIN: Register Info -->
                <div class="hidden xl:flex flex-col min-h-screen">
                    <a href="" class="-intro-x flex items-center pt-5">
                        <img alt="LiteraSky" class="w-6" src="<?= base_url('dist/images/logo.svg') ?>">
                        <span class="text-white text-lg ml-3">LiteraSky</span> 
                    </a>
                    <div class="my-auto">
                        <img alt="Perpustakaan Digital" class="-intro-x w-1/2 -mt-16" src="<?= base_url('dist/images/illustration.svg') ?>">
                        <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                            Selamat datang di
                            <br>
                            LiteraSky.
                        </div>
                        <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400">Kelola dan akses koleksi buku digital dalam satu platform</div>
                    </div>
                </div>
                <!-- END: Register Info -->
                <!-- BEGIN: Register Form -->
                <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                    <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                            Daftar
                        </h2>
                        <div class="intro-x mt-2 text-slate-400 xl:hidden text-center">Beberapa langkah lagi untuk membuat akun Anda. Kelola semua aktivitas perpustakaan dalam satu tempat</div>
                        <form action="<?= base_url('Auth/Register/store') ?>" method="post">
                            <?= csrf_field() ?>
                            <div class="intro-x mt-8">
                                <input type="text" name="username" 
                                    class="intro-x login__input form-control py-3 px-4 block" 
                                    placeholder="Username" required>
                                    
                                <input type="text" name="nama_lengkap" 
                                    class="intro-x login__input form-control py-3 px-4 block mt-4" 
                                    placeholder="Nama Lengkap" required>
                                    
                                <input type="email" name="email" 
                                    class="intro-x login__input form-control py-3 px-4 block mt-4" 
                                    placeholder="Email" required>
                                    
                                <textarea name="alamat" 
                                    class="intro-x login__input form-control py-3 px-4 block mt-4" 
                                    placeholder="Alamat" required></textarea>
                                    
                                <input type="password" name="password" 
                                    class="intro-x login__input form-control py-3 px-4 block mt-4" 
                                    placeholder="Kata Sandi" required>
                                    
                                <input type="password" name="confirm_password" 
                                    class="intro-x login__input form-control py-3 px-4 block mt-4" 
                                    placeholder="Konfirmasi Kata Sandi" required>
                            </div>

                            <!-- Tampilkan pesan error jika ada -->
                            <?php if (session()->has('error')) : ?>
                                <div class="intro-x mt-4 text-danger">
                                    <?php 
                                    $errors = session('error');
                                    if (is_array($errors)) {
                                        foreach ($errors as $error) {
                                            echo $error . '<br>';
                                        }
                                    } else {
                                        echo $errors;
                                    }
                                    ?>
                                </div>
                            <?php endif; ?>

                            <div class="intro-x flex items-center text-slate-600 dark:text-slate-500 mt-4 text-xs sm:text-sm">
                                <input id="remember-me" type="checkbox" class="form-check-input border mr-2" required>
                                <label class="cursor-pointer select-none" for="remember-me">Saya setuju dengan</label>
                                <a class="text-primary dark:text-slate-200 ml-1" href="">Syarat dan Ketentuan</a>
                            </div>

                            <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                                <button type="submit" class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Daftar</button>
                                <a href="<?= base_url('Auth/Login') ?>" 
                                   class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top">Masuk</a>
                            </div>
                        </form>
                        <div class="intro-x mt-10 xl:mt-24 text-slate-600 dark:text-slate-500 text-center xl:text-left">
                            Dengan mendaftar, Anda menyetujui <a class="text-primary dark:text-slate-200" href="">Syarat dan Ketentuan</a> & <a class="text-primary dark:text-slate-200" href="">Kebijakan Privasi</a> kami
                        </div>
                    </div>
                </div>
                <!-- END: Register Form -->
            </div>
        </div>
        <!-- BEGIN: JS Assets-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="<?= base_url('dist/js/app.js') ?>"></script>
        <!-- END: JS Assets-->
        
        <script>
            // Konfigurasi Toastr
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "timeOut": "3000"
            };

            // Tampilkan pesan error jika ada
            <?php if (session()->has('error')) : ?>
                <?php if (is_array(session('error'))) : ?>
                    <?php foreach (session('error') as $error) : ?>
                        toastr.error('<?= $error ?>');
                    <?php endforeach; ?>
                <?php else : ?>
                    toastr.error('<?= session('error') ?>');
                <?php endif; ?>
            <?php endif; ?>

            // Tampilkan pesan sukses jika ada
            <?php if (session()->has('success')) : ?>
                toastr.success('<?= session('success') ?>');
            <?php endif; ?>
        </script>
    </body>
</html>