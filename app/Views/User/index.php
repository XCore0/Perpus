<style>
    .book-cover-container {
        width: 100%;
        /* Takes full width of parent card */
        aspect-ratio: 3/4;
        /* Slightly taller aspect ratio */
        overflow: hidden;
    }

    .book-cover {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        transition: transform 0.3s ease;
    }

    .book-cover:hover {
        transform: scale(1.05);
    }
</style>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <link href="<?= base_url('dist/images/logo.svg') ?>" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LiteraSky - Perpustakaan Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-gray-800 text-white">
        <div class="container mx-auto px-6 py-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <a href="/" class="text-2xl font-bold">
                        <span class="text-blue-400">Litera</span>Sky
                    </a>
                </div>

                <div class="flex items-center space-x-4">
                    <?php if (session()->get('isLoggedIn')) : ?>
                        <div class="relative">
                            <button onclick="openKoleksiModal()" class="hover:text-blue-400 mr-4">
                                <i class="fas fa-bookmark"></i>
                            </button>
                        </div>
                    <?php endif; ?>
                    
                    <div class="relative">
                        <button id="cartButton" class="hover:text-blue-400 mr-4">
                            <i class="fas fa-shopping-cart"></i>
                            <span id="cartCount" class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">0</span>
                        </button>
                    </div>

                    <?php if (session()->get('isLoggedIn')) : ?>
                        <!-- User Info dan Logout -->
                        <div class="flex items-center space-x-4">
                            <div class="flex items-center space-x-3 px-4 py-2">
                                <div class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center">
                                    <span class="text-sm font-semibold">
                                        <?= substr(session()->get('namaLengkap'), 0, 1) ?>
                                    </span>
                                </div>
                                <span class="text-sm font-medium"><?= session()->get('namaLengkap') ?></span>
                                <a href="<?= base_url('Auth/Logout') ?>"
                                    class="text-gray-300 hover:text-red-400 transition-colors duration-200 border-gray-700 px-4 rounded-full">
                                    <i class="fas fa-sign-out-alt"></i>
                                </a>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="flex items-center space-x-4">
                            <a href="<?= base_url('Auth/Login') ?>"
                                class="text-gray-300 hover:text-blue-400 transition-colors duration-200">
                                <i class="fas fa-sign-in-alt mr-2"></i>Masuk
                            </a>
                            <a href="<?= base_url('Auth/Register') ?>"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition-colors duration-200">
                                <i class="fas fa-user-plus mr-2"></i>Daftar
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="relative w-[50%] mx-auto h-[50vh] text-white py-16 bg-cover bg-center bg-no-repeat z-0"
        style="background-image: url('<?= base_url('dist/images/bg.jpg') ?>');">
        <!-- Add overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>

        <div class="container mx-auto px-6 relative z-10 h-96 flex items-center">
            <div class="flex flex-col md:flex-row items-center w-full">
                <div class="md:w-1/2">
                    <h1 class="text-4xl font-bold mb-4">Selamat Datang di LiteraSky</h1>
                    <p class="mb-6">Temukan ribuan buku digital dan resources pembelajaran dalam genggaman Anda.</p>
                    <a href="#catalog"
                        class="bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100">
                        Jelajahi Katalog
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="relative mt-8 mb-12uto px-6">
        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="flex flex-col md:flex-row gap-4">
                <div class="flex-1">
                    <div class="relative">
                        <input type="text" placeholder="Cari judul buku, penulis, atau kategori..."
                            class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                </div>
                <div class="flex gap-4">

                    <button class="bg-blue-500 text-white px-8 py-3 rounded-lg hover:bg-blue-600 transition-colors">
                        Cari
                    </button>
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- Featured Books Section -->
    <!-- Main Content Section -->
    <div class="container mx-auto px-6 py-12">
        <div class="flex flex-col md:flex-row gap-8">
            <!-- Categories Sidebar -->
            <div class="md:w-1/4">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-bold mb-6 text-gray-800">Kategori</h2>
                    <ul class="space-y-3">
                        <li>
                            <a href="#" class="flex items-center justify-between p-3 rounded-lg border border-blue-500 bg-blue-50 text-blue-600">
                                <span class="flex items-center">
                                    <i class="fas fa-book-open mr-3 text-blue-500"></i>
                                    Semua Kategori
                                </span>
                                <span class="bg-blue-100 text-blue-600 text-sm px-2 py-1 rounded-full"><?= $totalBooks ?></span>
                            </a>
                        </li>
                        <?php foreach ($categories as $category): ?>
                            <li>
                                <a href="#" class="flex items-center justify-between p-3 rounded-lg border border-gray-200 hover:border-blue-500 hover:bg-blue-50 transition-all duration-300">
                                    <span class="flex items-center">
                                        <i class="fas fa-book mr-3 text-gray-500"></i>
                                        <?= $category['NamaKategori'] ?>
                                    </span>
                                    <span class="bg-gray-100 text-gray-600 text-sm px-2 py-1 rounded-full">
                                        <?= $bookCountByCategory[$category['KategoriID']] ?? 0 ?>
                                    </span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <!-- Books Grid Section -->
            <div class="md:w-3/4">
                <h2 class="text-3xl font-bold mb-8">Semua Kategori</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <?php foreach ($books as $book): ?>
                        <div class="bg-white rounded-lg shadow-md overflow-hidden" data-buku-id="<?= $book['BukuID'] ?>">
                            <div class="book-cover-container">
                                <?php if ($book['Foto']): ?>
                                    <img src="<?= base_url('uploads/buku/' . $book['Foto']) ?>" alt="<?= $book['Judul'] ?>" class="book-cover">
                                <?php else: ?>
                                    <img src="<?= base_url('dist/images/default-book.jpg') ?>" alt="Default Cover" class="book-cover">
                                <?php endif; ?>
                            </div>
                            <div class="p-4">
                                <h3 class="font-semibold mb-2"><?= $book['Judul'] ?></h3>
                                <p class="text-gray-600 text-sm mb-2"><?= $book['NamaKategori'] ?? 'Tanpa Kategori' ?></p>
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center space-x-2">
                                        <?php if ($book['Stok'] > 0): ?>
                                            <span class="text-blue-600">Tersedia</span>
                                            <span class="text-gray-500 text-sm">(Stok: <?= $book['Stok'] ?>)</span>
                                        <?php else: ?>
                                            <span class="text-red-600">Tidak Tersedia</span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="flex space-x-2">
                                        <button onclick="openDetailModal('<?= $book['BukuID'] ?>')"
                                            class="bg-blue-500 text-white px-3 py-2 rounded-lg text-sm hover:bg-blue-600">
                                            Detail
                                        </button>
                                        <?php 
                                        // Cek status peminjaman aktif
                                        $db = \Config\Database::connect();
                                        $activeLoan = $db->table('peminjaman')
                                            ->where('UserID', session()->get('userID'))
                                            ->where('StatusPeminjaman', 'Dipinjam')
                                            ->get()
                                            ->getResult();
                                        ?>

                                        <?php if (!empty($activeLoan)): ?>
                                            <button class="bg-gray-500 text-white px-3 py-2 rounded-lg text-sm cursor-not-allowed">
                                                Sedang Meminjam
                                            </button>
                                        <?php elseif ($book['Stok'] > 0): ?>
                                            <button onclick="addToCart('<?= $book['BukuID'] ?>', '<?= addslashes($book['Judul']) ?>', '<?= base_url('uploads/buku/' . $book['Foto']) ?>', '<?= addslashes($book['NamaKategori']) ?>')" 
                                                class="bg-green-500 text-white px-3 py-2 rounded-lg text-sm hover:bg-green-600">
                                                Pinjam
                                            </button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Pagination section remains the same -->
                <div class="mt-8 flex justify-center">
                    <div class="flex items-center space-x-2" id="pagination">
                        <button onclick="changePage(currentPage - 1)" 
                                class="px-4 py-2 rounded-lg transition-colors duration-200">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <div id="pageNumbers" class="flex items-center space-x-2">
                            <!-- Page numbers will be inserted here -->
                        </div>
                        <button onclick="changePage(currentPage + 1)" 
                                class="px-4 py-2 rounded-lg transition-colors duration-200">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="book1" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white"
            onclick="event.stopPropagation()">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-bold">Detail Buku</h3>
                <button onclick="closeModal('book1')" class="text-gray-400 hover:text-gray-500">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="mt-4">
                <div class="flex space-x-4 mb-4">
                    <img src="" alt="Book Cover" class="w-24 h-32 object-cover rounded">
                    <div>
                        <h4 class="font-semibold"></h4>
                        <p class="text-sm text-gray-600">Penulis</p>
                        <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded mt-2 inline-block"></span>
                    </div>
                </div>
                <div class="space-y-2 text-sm">
                    <p><span class="font-semibold">Tahun Terbit:</span> 2024</p>
                    <p><span class="font-semibold">Penerbit:</span> Penerbit Buku</p>
                    <p><span class="font-semibold">Stok:</span> 0 buku</p>
                    <p><span class="font-semibold">Status:</span> <span class="text-blue-600">Tersedia</span></p>
                </div>
                <div class="mt-4">
                    <h5 class="font-semibold mb-2">Sinopsis</h5>
                    <p class="text-sm text-gray-600">
                        Sinopsis buku akan ditampilkan di sini...
                    </p>
                </div>
                <!-- Add Reviews Section -->
                <div class="mt-6 border-t pt-4">
                    <h5 class="font-semibold mb-4">Ulasan Pembaca</h5>
                    <div class="space-y-4" id="bookReviews">
                        <!-- Reviews will be inserted here -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Cart Modal -->
    <div id="cartModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-[600px] shadow-lg rounded-md bg-white"
            onclick="event.stopPropagation()">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-bold">Keranjang Peminjaman</h3>
                <button type="button" onclick="closeCartModal()" class="text-gray-400 hover:text-gray-500">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div id="cartItems" class="space-y-4 mb-4">
                <!-- Cart items will be inserted here -->
            </div>
            <div class="border-t pt-4">
                <div class="flex justify-between items-center mb-4">
                    <span class="font-semibold">Total Buku:</span>
                    <span id="totalBooks">0/3</span>
                </div>
                <a href="<?= base_url('checkout') ?>" 
                    class="block w-full bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 text-center transition-colors">
                    Checkout Peminjaman
                </a>
            </div>
        </div>
    </div>

    <!-- Checkout Modal -->
    <div id="checkoutModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-bold">Konfirmasi Peminjaman</h3>
                <button onclick="closeCheckoutModal()" class="text-gray-400 hover:text-gray-500">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="mt-4">
                <p class="mb-4">Peminjaman berhasil! Berikut kode peminjaman Anda:</p>
                <div class="bg-gray-100 p-4 rounded-lg text-center mb-4">
                    <span id="borrowCode" class="text-2xl font-bold text-blue-600"></span>
                </div>
                <p class="text-sm text-gray-600 mb-4">
                    Silakan tunjukkan kode ini kepada petugas perpustakaan untuk mengambil buku.
                </p>
                <button onclick="closeCheckoutModal()"
                    class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                    Tutup
                </button>
            </div>
        </div>
    </div>

    <!-- Update the Detail Modal Structure -->
    <div id="detailModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50 flex items-center justify-center">
        <div class="relative mx-auto p-4 border w-[500px] shadow-lg rounded-lg bg-white max-h-[600px] overflow-y-auto">
            <div class="flex justify-between items-center mb-3">
                <h3 class="text-lg font-bold text-gray-800">Detail Buku</h3>
                <button onclick="closeDetailModal()" class="text-gray-400 hover:text-gray-500">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="flex flex-col gap-3">
                <!-- Book Cover -->
                <div class="flex justify-center">
                    <img id="modalBookCover" src="" alt="Book Cover" 
                        class="w-32 aspect-[3/4] object-cover rounded-lg shadow-sm">
                </div>
                
                <!-- Action Buttons -->
                <div class="flex gap-2 justify-center">
                    <?php if (session()->get('isLoggedIn')) : ?>
                        <button id="addToCartBtn" onclick="addToCartFromModal()" 
                            class="bg-green-500 text-white px-4 py-1.5 rounded-lg text-sm hover:bg-green-600">
                            Pinjam
                        </button>
                        <button id="toggleKoleksiBtn" onclick="toggleKoleksiFromModal()"
                            class="koleksi-btn bg-gray-100 text-gray-600 px-4 py-1.5 rounded-lg text-sm hover:bg-gray-200">
                            <i class="fas fa-bookmark"></i>
                        </button>
                    <?php else: ?>
                        <a href="<?= base_url('Auth/Login') ?>" 
                            class="bg-blue-500 text-white px-4 py-1.5 rounded-lg text-sm text-center hover:bg-blue-600">
                            Login untuk Meminjam
                        </a>
                    <?php endif; ?>
                </div>
                
                <!-- Book Details -->
                <div class="space-y-2">
                    <div class="text-center">
                        <h4 id="modalBookTitle" class="text-base font-bold text-gray-800 mb-1"></h4>
                        <span id="modalBookCategory" class="inline-block bg-blue-50 text-blue-600 text-xs px-2 py-0.5 rounded-full"></span>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-2 text-xs">
                        <div>
                            <p class="flex items-center text-gray-700">
                                <i class="fas fa-user-edit w-4 text-blue-500"></i>
                                <span class="font-medium ml-1">Penulis:</span>
                                <span id="modalBookAuthor" class="ml-1"></span>
                            </p>
                            <p class="flex items-center text-gray-700 mt-1">
                                <i class="fas fa-building w-4 text-blue-500"></i>
                                <span class="font-medium ml-1">Penerbit:</span>
                                <span id="modalBookPublisher" class="ml-1"></span>
                            </p>
                        </div>
                        <div>
                            <p class="flex items-center text-gray-700">
                                <i class="fas fa-calendar-alt w-4 text-blue-500"></i>
                                <span class="font-medium ml-1">Tahun:</span>
                                <span id="modalBookYear" class="ml-1"></span>
                            </p>
                            <p class="flex items-center text-gray-700 mt-1">
                                <i class="fas fa-book w-4 text-blue-500"></i>
                                <span class="font-medium ml-1">Stok:</span>
                                <span id="modalBookStock" class="ml-1"></span>
                            </p>
                        </div>
                    </div>

                    <div class="pt-2 border-t">
                        <div class="flex items-center mb-2">
                            <span class="font-medium text-gray-700 text-sm">Status:</span>
                            <span id="modalBookStatus" class="ml-2 text-sm"></span>
                            <span id="modalBookStatusIcon" class="ml-1"></span>
                        </div>
                        <h5 class="font-medium text-gray-700 text-sm mb-1">Sinopsis</h5>
                        <p id="modalBookSynopsis" class="text-xs text-gray-600 leading-relaxed max-h-20 overflow-y-auto"></p>
                    </div>

                    <!-- Review Section -->
                    <div class="pt-2 border-t">
                        <h5 class="font-medium text-gray-700 text-sm mb-2">Ulasan Pembaca</h5>
                        
                        <!-- Review Form -->
                        <?php if (session()->get('isLoggedIn')) : ?>
                            <form id="reviewForm" class="space-y-2">
                                <input type="hidden" id="bookIdForReview" name="bukuId">
                                <div class="flex items-center mb-2">
                                    <div class="flex space-x-1" id="ratingStars">
                                        <?php for($i = 1; $i <= 5; $i++): ?>
                                            <button type="button" data-rating="<?= $i ?>" 
                                                class="rating-star text-gray-300 hover:text-yellow-400 transition-colors text-sm">
                                                <i class="fas fa-star"></i>
                                            </button>
                                        <?php endfor; ?>
                                    </div>
                                    <span class="ml-2 text-xs text-gray-500" id="ratingText">Pilih rating</span>
                                    <input type="hidden" name="rating" id="selectedRating">
                                </div>
                                <textarea id="reviewText" name="ulasan" rows="2"
                                    class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-transparent text-sm"
                                    placeholder="Tulis ulasan Anda..."></textarea>
                                <button type="submit" 
                                    class="bg-blue-500 text-white px-3 py-1.5 rounded-lg hover:bg-blue-600 text-xs">
                                    Kirim Ulasan
                                </button>
                            </form>
                        <?php else: ?>
                            <p class="text-xs text-gray-500 mb-2">
                                <a href="<?= base_url('Auth/Login') ?>" class="text-blue-500 hover:underline">Login</a> 
                                untuk memberikan ulasan
                            </p>
                        <?php endif; ?>

                        <!-- Reviews List -->
                        <div id="reviewsList" class="space-y-2 max-h-28 overflow-y-auto">
                            <!-- Reviews will be loaded here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gradient-to-b from-gray-900 to-gray-800 text-white pt-16 pb-8">
        <div class="container mx-auto px-6">
            <!-- Top Footer -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
                <!-- About Section -->
                <div class="space-y-6">
                    <div class="flex items-center">
                        <span class="text-3xl font-bold">
                            <span class="text-blue-400">Litera</span>Sky
                        </span>
                    </div>
                    <p class="text-gray-400 leading-relaxed">
                        Perpustakaan digital terlengkap dengan koleksi ribuan buku dari berbagai kategori.
                        Baca dan pinjam buku favoritmu dengan mudah.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#"
                            class="bg-blue-600 hover:bg-blue-700 w-10 h-10 rounded-full flex items-center justify-center transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#"
                            class="bg-sky-500 hover:bg-sky-600 w-10 h-10 rounded-full flex items-center justify-center transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#"
                            class="bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 w-10 h-10 rounded-full flex items-center justify-center transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-semibold mb-6 relative inline-block">
                        Tautan Cepat
                        <span class="absolute -bottom-2 left-0 w-12 h-1 bg-blue-500"></span>
                    </h4>
                    <ul class="space-y-4">
                        <li>
                            <a href="#home"
                                class="text-gray-400 hover:text-white hover:translate-x-2 transition-all flex items-center">
                                <i class="fas fa-chevron-right mr-2 text-sm text-blue-400"></i> Beranda
                            </a>
                        </li>
                        <li>
                            <a href="#catalog"
                                class="text-gray-400 hover:text-white hover:translate-x-2 transition-all flex items-center">
                                <i class="fas fa-chevron-right mr-2 text-sm text-blue-400"></i> Katalog
                            </a>
                        </li>
                        <li>
                            <a href="#categories"
                                class="text-gray-400 hover:text-white hover:translate-x-2 transition-all flex items-center">
                                <i class="fas fa-chevron-right mr-2 text-sm text-blue-400"></i> Kategori
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="text-lg font-semibold mb-6 relative inline-block">
                        Hubungi Kami
                        <span class="absolute -bottom-2 left-0 w-12 h-1 bg-blue-500"></span>
                    </h4>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1.5 mr-3 text-blue-400"></i>
                            <span class="text-gray-400">Jl. Perpustakaan No. 123<br>Jakarta Pusat, 10110</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone-alt mr-3 text-blue-400"></i>
                            <span class="text-gray-400">(021) 1234-5678</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-3 text-blue-400"></i>
                            <span class="text-gray-400">info@LiteraSky.com</span>
                        </li>
                    </ul>
                </div>

                <!-- Newsletter -->
                <div>
                    <h4 class="text-lg font-semibold mb-6 relative inline-block">
                        Newsletter
                        <span class="absolute -bottom-2 left-0 w-12 h-1 bg-blue-500"></span>
                    </h4>
                    <p class="text-gray-400 mb-4">Dapatkan update terbaru dan promo menarik.</p>
                    <form class="space-y-3">
                        <div class="relative">
                            <input type="email" placeholder="Masukkan email Anda"
                                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>
                        <button
                            class="w-full bg-blue-500 hover:bg-blue-600 text-white px-4 py-3 rounded-lg transition-colors">
                            Berlangganan
                        </button>
                    </form>
                </div>
            </div>

            <!-- Bottom Footer -->
            <div class="border-t border-gray-700 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-400 text-sm">
                        &copy; 2024 LiteraSky. All rights reserved.
                    </p>
                    <div class="flex space-x-6 mt-4 md:mt-0">
                        <a href="#" class="text-gray-400 hover:text-white text-sm">Kebijakan Privasi</a>
                        <a href="#" class="text-gray-400 hover:text-white text-sm">Syarat & Ketentuan</a>
                        <a href="#" class="text-gray-400 hover:text-white text-sm">FAQ</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Koleksi Sidebar -->
    <div id="koleksiSidebar" class="fixed inset-y-0 right-0 w-80 bg-white shadow-lg transform translate-x-full transition-transform duration-300 ease-in-out z-50">
        <div class="flex flex-col h-full">
            <!-- Koleksi Header -->
            <div class="p-4 border-b flex justify-between items-center bg-gray-50">
                <h3 class="text-lg font-bold text-gray-800">Koleksi Saya</h3>
                <button onclick="toggleKoleksiSidebar()" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Koleksi Items -->
            <div id="koleksiItems" class="flex-1 overflow-y-auto p-4 space-y-4">
                <!-- Koleksi items will be loaded here -->
            </div>
        </div>
    </div>

    <!-- Overlay for koleksi -->
    <div id="koleksiOverlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40" onclick="toggleKoleksiSidebar()"></div>

    <!-- Add CSS -->
    <style>
    .koleksi-open {
        transform: translateX(0);
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateX(20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .koleksi-item {
        animation: slideIn 0.3s ease-out;
    }
    </style>

    <!-- Add JavaScript -->
    <script>
    function toggleKoleksiSidebar() {
        const sidebar = document.getElementById('koleksiSidebar');
        const overlay = document.getElementById('koleksiOverlay');
        
        sidebar.classList.toggle('koleksi-open');
        if (sidebar.classList.contains('koleksi-open')) {
            overlay.classList.remove('hidden');
            loadKoleksiItems();
        } else {
            overlay.classList.add('hidden');
        }
    }

    function loadKoleksiItems() {
        const koleksiItems = document.getElementById('koleksiItems');
        
        fetch('<?= base_url('koleksi/items') ?>', {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                koleksiItems.innerHTML = '';
                
                if (!data.koleksi || data.koleksi.length === 0) {
                    koleksiItems.innerHTML = `
                        <div class="text-center text-gray-500 py-8">
                            <i class="fas fa-bookmark text-4xl mb-3"></i>
                            <p>Belum ada buku dalam koleksi</p>
                        </div>
                    `;
                    return;
                }

                data.koleksi.forEach(item => {
                    koleksiItems.innerHTML += `
                        <div class="koleksi-item flex gap-3 p-3 bg-gray-50 rounded-lg">
                            <img src="<?= base_url('uploads/buku/') ?>/${item.Foto}" 
                                alt="${item.Judul}" 
                                class="w-16 h-20 object-cover rounded"
                                onerror="this.src='<?= base_url('dist/images/default-book.jpg') ?>'">
                            <div class="flex-1">
                                <h4 class="font-medium text-sm mb-1">${item.Judul}</h4>
                                <p class="text-xs text-gray-600 mb-2">${item.NamaKategori || 'Tanpa Kategori'}</p>
                                <div class="flex gap-2">
                                    <button onclick="openDetailModal('${item.BukuID}')" 
                                        class="text-xs bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600">
                                        Detail
                                    </button>
                                    <button onclick="toggleKoleksi('${item.BukuID}', this)" 
                                        class="text-xs bg-red-100 text-red-600 px-2 py-1 rounded hover:bg-red-200">
                                        Hapus
                                    </button>
                                </div>
                            </div>
                        </div>
                    `;
                });
            } else {
                toastr.error(data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            toastr.error('Terjadi kesalahan saat memuat koleksi');
        });
    }

    // Update koleksi button click handler
    function openKoleksiModal() {
        toggleKoleksiSidebar();
    }

    // Close koleksi when pressing Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const sidebar = document.getElementById('koleksiSidebar');
            if (sidebar.classList.contains('koleksi-open')) {
                toggleKoleksiSidebar();
            }
        }
    });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        // Konfigurasi toastr di awal
        toastr.options = {
            "closeButton": true,
            "newestOnTop": false,
            "progressBar": true,
            "preventDuplicates": true,  // Mencegah duplikasi notifikasi
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "3000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        // Tampilkan pesan sukses jika ada
        <?php if (session()->has('success')) : ?>
            toastr.success('<?= session('success') ?>');
        <?php endif; ?>

        <?php if (session()->has('error')) : ?>
            toastr.error('<?= session('error') ?>');
        <?php endif; ?>

        document.addEventListener('DOMContentLoaded', function() {
            // DOM Elements
            const categoryLinks = document.querySelectorAll('.md\\:w-1\\/4 ul li a');
            const bookCards = document.querySelectorAll('.md\\:w-3\\/4 .grid > div');
            const categoryTitle = document.querySelector('.md\\:w-3\\/4 h2');

            // Function to update active category styling
            function updateCategoryStyle(activeLink) {
                categoryLinks.forEach(link => {
                    // Reset all links
                    link.classList.remove('border-blue-500', 'bg-blue-50', 'text-blue-600');
                    link.classList.add('border-gray-200');

                    const counter = link.querySelector('span:last-child');
                    counter.classList.remove('bg-blue-100', 'text-blue-600');
                    counter.classList.add('bg-gray-100', 'text-gray-600');

                    const icon = link.querySelector('i');
                    icon.classList.remove('text-blue-500');
                    icon.classList.add('text-gray-500');
                });

                // Style active link
                if (activeLink) {
                    activeLink.classList.remove('border-gray-200');
                    activeLink.classList.add('border-blue-500', 'bg-blue-50', 'text-blue-600');

                    const counter = activeLink.querySelector('span:last-child');
                    counter.classList.remove('bg-gray-100', 'text-gray-600');
                    counter.classList.add('bg-blue-100', 'text-blue-600');

                    const icon = activeLink.querySelector('i');
                    icon.classList.remove('text-gray-500');
                    icon.classList.add('text-blue-500');
                }
            }

            // Function to filter books
            function filterBooks(category) {
                bookCards.forEach(card => {
                    const bookCategory = card.querySelector('.text-gray-600.text-sm.mb-2').textContent.trim();
                    if (category === 'Semua Kategori' || bookCategory === category) {
                        card.style.display = '';
                    } else {
                        card.style.display = 'none';
                    }
                });
            }

            // Add click event listener to category links
            categoryLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();

                    const categoryText = this.querySelector('span:first-child').textContent.trim();

                    // Update styles
                    updateCategoryStyle(this);

                    // Filter books
                    filterBooks(categoryText);

                    // Update title
                    categoryTitle.textContent = categoryText === 'Semua Kategori' ?
                        'Semua Kategori' : `Buku ${categoryText}`;
                });
            });

            // Modal functions
            window.openModal = function(modalId) {
                const clickedBook = event.target.closest('.bg-white'); // Get the parent book card
                const bookImage = clickedBook.querySelector('.book-cover').src;
                const bookTitle = clickedBook.querySelector('.font-semibold').textContent;
                const bookCategory = clickedBook.querySelector('.text-gray-600.text-sm.mb-2').textContent;
                const bookStock = clickedBook.querySelector('.text-gray-500.text-sm').textContent.match(/\d+/)[0];

                // Update modal content
                const modal = document.getElementById(modalId);
                modal.querySelector('img').src = bookImage;
                modal.querySelector('h4').textContent = bookTitle;
                modal.querySelector('.text-xs').textContent = bookCategory;
                modal.querySelector('p:nth-of-type(3)').innerHTML = `<span class="font-semibold">Stok:</span> ${bookStock} buku`;

                modal.classList.remove('hidden');

                // Add event listener to close modal when clicking outside
                modal.addEventListener('click', function(e) {
                    if (e.target === this) {
                        closeModal(modalId);
                    }
                });
            }

            window.closeModal = function(modalId) {
                const modal = document.getElementById(modalId);
                if (modal) {
                    modal.classList.add('hidden');
                }
            }

            // Add this to your DOMContentLoaded event listener
            document.addEventListener('DOMContentLoaded', function() {
                // Close button functionality
                const closeButtons = document.querySelectorAll('[onclick*="closeModal"]');
                closeButtons.forEach(button => {
                    button.addEventListener('click', function(e) {
                        e.stopPropagation();
                        const modalId = this.getAttribute('onclick').match(/'([^']+)'/)[1];
                        closeModal(modalId);
                    });
                });

                // Prevent modal content from triggering close
                const modalContents = document.querySelectorAll('.relative.top-20');
                modalContents.forEach(content => {
                    content.addEventListener('click', function(e) {
                        e.stopPropagation();
                    });
                });
            });

            // Tambahkan di dalam DOMContentLoaded event listener

            let cart = [];
            const MAX_BOOKS = 3;

            // Update tombol Pinjam untuk menambahkan event listener
            document.querySelectorAll('.bg-green-500').forEach(button => {
                button.addEventListener('click', function() {
                    const bookCard = this.closest('.bg-white');
                    const book = {
                        id: Math.random().toString(36).substr(2, 9),
                        title: bookCard.querySelector('.font-semibold').textContent,
                        image: bookCard.querySelector('.book-cover').src,
                        category: bookCard.querySelector('.text-gray-600.text-sm.mb-2').textContent
                    };

                    addToCart(book);
                });
            });

            function addToCart(bukuId, judul, foto, kategori) {
                <?php if (!session()->get('isLoggedIn')): ?>
                    window.location.href = '<?= base_url('Auth/Login') ?>';
                    return;
                <?php endif; ?>

                const formData = new URLSearchParams();
                formData.append('bukuId', bukuId);
                formData.append('judul', judul);
                formData.append('foto', foto);
                formData.append('kategori', kategori);

                fetch('<?= base_url('cart/add') ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('cartCount').textContent = data.cartCount;
                        toastr.success(data.message);
                        loadCartItems();
                    } else {
                        toastr.error(data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    toastr.error('Terjadi kesalahan. Silakan coba lagi.');
                });
            }

            function updateCartCount() {
                document.getElementById('cartCount').textContent = cart.length;
                document.getElementById('totalBooks').textContent = `${cart.length}/3`;
            }

            function showNotification(message) {
                const notification = document.createElement('div');
                notification.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50';
                notification.textContent = message;
                document.body.appendChild(notification);

                setTimeout(() => {
                    notification.remove();
                }, 3000);
            }

            // Cart Modal Functions
            document.getElementById('cartButton').addEventListener('click', openCartModal);

            // Cart Modal Functions
            function openCartModal() {
                const modal = document.getElementById('cartModal');
                const cartItems = document.getElementById('cartItems');
                cartItems.innerHTML = '';

                cart.forEach(book => {
                    cartItems.innerHTML += `
            <div class="flex items-center space-x-4">
                <img src="${book.image}" class="w-16 h-20 object-cover rounded">
                <div class="flex-1">
                    <h4 class="font-semibold">${book.title}</h4>
                    <p class="text-sm text-gray-600">${book.category}</p>
                </div>
                <button onclick="removeFromCart('${book.id}')" class="text-red-500 hover:text-red-600">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        `;
                });

                modal.classList.remove('hidden');

                // Add event listeners for closing
                const closeBtn = modal.querySelector('[onclick="closeCartModal()"]');
                if (closeBtn) {
                    closeBtn.addEventListener('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        closeCartModal();
                    });
                }

                // Close when clicking outside modal
                modal.addEventListener('click', function(e) {
                    if (e.target === this) {
                        closeCartModal();
                    }
                });
            }

            function closeCartModal() {
                const modal = document.getElementById('cartModal');
                if (modal) {
                    modal.classList.add('hidden');
                }
            }

            // Add ESC key listener
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeCartModal();
                }
            });

            // Initialize cart button
            document.addEventListener('DOMContentLoaded', function() {
                const cartButton = document.getElementById('cartButton');
                if (cartButton) {
                    cartButton.addEventListener('click', openCartModal);
                }
            });

            function removeFromCart(bookId) {
                cart = cart.filter(book => book.id !== bookId);
                updateCartCount();
                openCartModal(); // Refresh cart modal
            }

            // Checkout Modal Functions
            function checkout() {
                if (cart.length === 0) {
                    alert('Keranjang kosong!');
                    return;
                }

                const borrowCode = generateBorrowCode();
                const cartModal = document.getElementById('cartModal');
                const checkoutModal = document.getElementById('checkoutModal');

                // Hide cart modal first
                cartModal.classList.add('hidden');

                // Update checkout modal content
                document.getElementById('borrowCode').textContent = borrowCode;

                // Show checkout modal
                checkoutModal.classList.remove('hidden');

                // Add event listeners for closing
                const closeBtn = checkoutModal.querySelector('[onclick="closeCheckoutModal()"]');
                if (closeBtn) {
                    closeBtn.addEventListener('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        closeCheckoutModal();
                    });
                }

                // Close when clicking outside
                checkoutModal.addEventListener('click', function(e) {
                    if (e.target === this) {
                        closeCheckoutModal();
                    }
                });
            }

            function closeCheckoutModal() {
                const modal = document.getElementById('checkoutModal');
                if (modal) {
                    modal.classList.add('hidden');
                    // Reset cart after successful checkout
                    cart = [];
                    updateCartCount();
                }
            }

            // Add ESC key listener
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeCheckoutModal();
                    closeCartModal();
                }
            });

            // Tombol close di modal checkout
            document.querySelectorAll('[onclick="closeCheckoutModal()"]').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.stopPropagation();
                    closeCheckoutModal();
                });
            });

            // Menutup modal checkout saat mengklik area luar modal
            document.getElementById('checkoutModal').addEventListener('click', function(e) {
                if (e.target === this) {
                    closeCheckoutModal();
                }
            });

            function closeModal(modalId) {
                const modal = document.getElementById(modalId);
                if (modal) {
                    modal.classList.add('hidden');
                }
            }



            // Tambahkan event listener saat dokumen dimuat
            document.addEventListener('DOMContentLoaded', function() {
                // Event listener untuk menutup modal saat mengklik area luar modal
                const checkoutModal = document.getElementById('checkoutModal');
                if (checkoutModal) {
                    checkoutModal.addEventListener('click', function(e) {
                        // Jika yang diklik adalah background modal (bukan konten modal)
                        if (e.target === this) {
                            closeCheckoutModal();
                        }
                    });
                }

                // Event listener untuk tombol ESC
                document.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape') {
                        closeCheckoutModal();
                    }
                });
            });

            // Update fungsi checkout untuk memastikan modal ditampilkan dengan benar
            function checkout() {
                if (cart.length === 0) {
                    alert('Keranjang kosong!');
                    return;
                }

                const borrowCode = generateBorrowCode();
                document.getElementById('borrowCode').textContent = borrowCode;

                // Close modal if clicking outside the modal content
                document.getElementById('cartModal').addEventListener('click', function(e) {
                    if (e.target === this) {
                        closeCartModal();
                    }
                });


                const checkoutModal = document.getElementById('checkoutModal');
                checkoutModal.classList.remove('hidden');
            }

            function generateBorrowCode() {
                return Math.random().toString(36).substr(2, 6).toUpperCase();
            }

            const bookReviews = {
                'book1': [{
                        username: 'John Doe',
                        review: 'Buku yang sangat menarik dan informatif. Sangat direkomendasikan untuk dibaca.',
                        rating: 5,
                        date: '2024-02-15'
                    },
                    {
                        username: 'Jane Smith',
                        review: 'Penjelasannya mudah dipahami dan relevan dengan kondisi saat ini.',
                        rating: 4,
                        date: '2024-02-10'
                    }
                ]
            };

            function openModal(modalId) {
                const clickedBook = event.target.closest('.bg-white');
                // ... existing code ...

                // Add reviews
                const reviewsContainer = modal.querySelector('#bookReviews');
                reviewsContainer.innerHTML = '';

                if (bookReviews[modalId]) {
                    bookReviews[modalId].forEach(review => {
                        reviewsContainer.innerHTML += `
                <div class="bg-gray-50 p-4 rounded-lg">
                    <div class="flex justify-between items-center mb-2">
                        <div class="font-semibold text-gray-800">${review.username}</div>
                        <div class="text-sm text-gray-500">${review.date}</div>
                    </div>
                    <div class="flex items-center mb-2">
                        ${generateStarRating(review.rating)}
                    </div>
                    <p class="text-gray-600">${review.review}</p>
                </div>
            `;
                    });
                } else {
                    reviewsContainer.innerHTML = '<p class="text-gray-500 italic">Belum ada ulasan untuk buku ini.</p>';
                }

                modal.classList.remove('hidden');
            }

            function generateStarRating(rating) {
                let stars = '';
                for (let i = 1; i <= 5; i++) {
                    stars += `<i class="fas fa-star ${i <= rating ? 'text-yellow-400' : 'text-gray-300'} mr-1"></i>`;
                }
                return stars;
            }

            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    const href = this.getAttribute('href');
                    if (href !== '#' && href.length > 1) {
                        e.preventDefault();
                        const target = document.querySelector(href);
                        if (target) {
                            target.scrollIntoView({
                                behavior: 'smooth'
                            });
                        }
                    }
                });
            });

            // Search functionality
            const searchInput = document.querySelector('input[placeholder*="Cari judul"]');
            const searchButton = searchInput?.nextElementSibling?.querySelector('button');

            function performSearch() {
                const searchTerm = searchInput.value.toLowerCase();
                bookCards.forEach(card => {
                    const title = card.querySelector('.font-semibold').textContent.toLowerCase();
                    const category = card.querySelector('.text-gray-600.text-sm.mb-2').textContent.toLowerCase();
                    if (title.includes(searchTerm) || category.includes(searchTerm)) {
                        card.style.display = '';
                    } else {
                        card.style.display = 'none';
                    }
                });
            }

            if (searchInput) {
                searchInput.addEventListener('keyup', function(e) {
                    if (e.key === 'Enter') {
                        performSearch();
                    }
                });
            }

            if (searchButton) {
                searchButton.addEventListener('click', performSearch);
            }


            // Initialize tooltips if you're using them
            const tooltips = document.querySelectorAll('[data-tooltip]');
            tooltips.forEach(tooltip => {
                tooltip.addEventListener('mouseenter', function() {
                    const tooltipText = this.getAttribute('data-tooltip');
                    // Add your tooltip display logic here
                });
            });

            // Handle mobile menu toggle if you have one
            const mobileMenuButton = document.querySelector('[data-mobile-menu]');
            const mobileMenu = document.querySelector('#mobile-menu');
            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                });
            }
        });

        // Add this inside your DOMContentLoaded event listener

        const ITEMS_PER_PAGE = 6;
        let currentPage = 1;
        let currentCategory = 'Semua Kategori';

        function filterBooks(category) {
            currentCategory = category;
            currentPage = 1; // Reset ke halaman pertama saat ganti kategori

            const bookCards = document.querySelectorAll('.md\\:w-3\\/4 .grid > div');
            const filteredBooks = Array.from(bookCards).filter(card => {
                const bookCategory = card.querySelector('p.text-gray-600.text-sm.mb-2').textContent.trim();
                return category === 'Semua Kategori' || bookCategory === category;
            });

            // Sembunyikan semua buku dulu
            bookCards.forEach(card => {
                card.style.display = 'none';
            });

            // Tampilkan buku untuk halaman pertama dari kategori yang dipilih
            const start = 0;
            const end = Math.min(ITEMS_PER_PAGE, filteredBooks.length);

            filteredBooks.slice(start, end).forEach(book => {
                book.style.display = '';
            });

            // Update pagination berdasarkan jumlah buku dalam kategori
            const totalPages = Math.ceil(filteredBooks.length / ITEMS_PER_PAGE);
            updatePaginationUI(totalPages);

            // Update judul kategori
            const categoryTitle = document.querySelector('.md\\:w-3\\/4 h2');
            categoryTitle.textContent = category === 'Semua Kategori' ? 'Semua Kategori' : `Buku ${category}`;

            // Sembunyikan pagination jika tidak ada buku
            const paginationContainer = document.getElementById('pagination');
            paginationContainer.style.display = filteredBooks.length > ITEMS_PER_PAGE ? 'flex' : 'none';
        }

        function changePage(newPage) {
            const bookCards = document.querySelectorAll('.md\\:w-3\\/4 .grid > div');
            const filteredBooks = Array.from(bookCards).filter(card => {
                const bookCategory = card.querySelector('p.text-gray-600.text-sm.mb-2').textContent.trim();
                return currentCategory === 'Semua Kategori' || bookCategory === currentCategory;
            });

            const totalPages = Math.ceil(filteredBooks.length / ITEMS_PER_PAGE);

            if (newPage < 1 || newPage > totalPages) return;

            currentPage = newPage;

            // Sembunyikan semua buku
            bookCards.forEach(card => {
                card.style.display = 'none';
            });

            // Tampilkan buku untuk halaman yang dipilih
            const start = (currentPage - 1) * ITEMS_PER_PAGE;
            const end = Math.min(start + ITEMS_PER_PAGE, filteredBooks.length);

            filteredBooks.slice(start, end).forEach(book => {
                book.style.display = '';
            });

            updatePaginationUI(totalPages);
        }

        function updatePaginationUI(totalPages) {
            const pageNumbers = document.getElementById('pageNumbers');
            const paginationContainer = document.getElementById('pagination');

            // Sembunyikan pagination jika hanya ada 1 halaman atau tidak ada buku
            if (totalPages <= 1) {
                paginationContainer.style.display = 'none';
                return;
            }

            paginationContainer.style.display = 'flex';
            pageNumbers.innerHTML = '';

            // Previous Button
            const prevButton = document.querySelector('#pagination button:first-child');
            prevButton.disabled = currentPage === 1;
            prevButton.className = `px-4 py-2 rounded-lg transition-colors duration-200 ${
                currentPage === 1 
                    ? 'bg-gray-200 text-gray-400 cursor-not-allowed' 
                    : 'bg-gray-200 hover:bg-gray-300 text-gray-700'
            }`;

            // Next Button
            const nextButton = document.querySelector('#pagination button:last-child');
            nextButton.disabled = currentPage === totalPages;
            nextButton.className = `px-4 py-2 rounded-lg transition-colors duration-200 ${
                currentPage === totalPages 
                    ? 'bg-gray-200 text-gray-400 cursor-not-allowed' 
                    : 'bg-gray-200 hover:bg-gray-300 text-gray-700'
            }`;

            // Fungsi untuk membuat tombol halaman
            function createPageButton(pageNum, isActive = false) {
                const button = document.createElement('button');
                button.className = `px-4 py-2 rounded-lg transition-colors duration-200 ${
                    isActive 
                        ? 'bg-blue-500 text-white' 
                        : 'bg-gray-200 hover:bg-gray-300 text-gray-700'
                }`;
                button.textContent = pageNum;
                button.onclick = () => changePage(pageNum);
                return button;
            }

            // Logika tampilan nomor halaman
            if (totalPages <= 7) {
                // Tampilkan semua nomor halaman jika total halaman <= 7
                for (let i = 1; i <= totalPages; i++) {
                    pageNumbers.appendChild(createPageButton(i, i === currentPage));
                }
            } else {
                // Tampilkan halaman pertama
                pageNumbers.appendChild(createPageButton(1, currentPage === 1));

                // Tambahkan ellipsis jika perlu
                if (currentPage > 3) {
                    const ellipsis = document.createElement('span');
                    ellipsis.className = 'px-2';
                    ellipsis.textContent = '...';
                    pageNumbers.appendChild(ellipsis);
                }

                // Tampilkan halaman di sekitar halaman aktif
                for (let i = Math.max(2, currentPage - 1); 
                     i <= Math.min(currentPage + 1, totalPages - 1); i++) {
                    pageNumbers.appendChild(createPageButton(i, i === currentPage));
                }

                // Tambahkan ellipsis jika perlu
                if (currentPage < totalPages - 2) {
                    const ellipsis = document.createElement('span');
                    ellipsis.className = 'px-2';
                    ellipsis.textContent = '...';
                    pageNumbers.appendChild(ellipsis);
                }

                // Tampilkan halaman terakhir
                pageNumbers.appendChild(createPageButton(totalPages, currentPage === totalPages));
            }
        }

        // Initialize pagination dan filter pada saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            // Set event listener untuk kategori
            const categoryLinks = document.querySelectorAll('.md\\:w-1\\/4 ul li a');
            categoryLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Reset styling semua kategori
                    categoryLinks.forEach(l => {
                        l.classList.remove('border-blue-500', 'bg-blue-50', 'text-blue-600');
                        l.classList.add('border-gray-200');
                    });

                    // Set styling kategori aktif
                    this.classList.remove('border-gray-200');
                    this.classList.add('border-blue-500', 'bg-blue-50', 'text-blue-600');

                    // Filter buku berdasarkan kategori yang dipilih
                    const categoryName = this.querySelector('span:first-child').textContent.trim();
                    filterBooks(categoryName);
                });
            });

            // Inisialisasi dengan "Semua Kategori"
            filterBooks('Semua Kategori');
        });

        function addToCart(bukuId, judul, foto, kategori) {
            <?php if (!session()->get('isLoggedIn')): ?>
                window.location.href = '<?= base_url('Auth/Login') ?>';
                return;
            <?php endif; ?>

            const formData = new URLSearchParams();
            formData.append('bukuId', bukuId);
            formData.append('judul', judul);
            formData.append('foto', foto);
            formData.append('kategori', kategori);

            fetch('<?= base_url('cart/add') ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('cartCount').textContent = data.cartCount;
                    toastr.success(data.message);
                    loadCartItems();
                } else {
                    toastr.error(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }

        function loadCartItems() {
            fetch('<?= base_url('cart/items') ?>', {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const cartItems = document.getElementById('cartItems');
                    cartItems.innerHTML = '';
                    
                    if (!data.items || data.items.length === 0) {
                        cartItems.innerHTML = '<p class="text-center text-gray-500">Keranjang kosong</p>';
                        document.getElementById('totalBooks').textContent = '0/3';
                        return;
                    }

                    // Filter dan tampilkan hanya item yang valid
                    const validItems = data.items.filter(item => 
                        item && 
                        item.bukuId && 
                        item.judul && 
                        item.judul !== 'undefined' &&
                        item.foto && 
                        item.kategori && 
                        item.kategori !== 'undefined'
                    );

                    validItems.forEach(item => {
                        cartItems.innerHTML += `
                            <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg">
                                <img src="${item.foto}" alt="${item.judul}" 
                                    class="w-16 h-20 object-cover rounded"
                                    onerror="this.src='<?= base_url('dist/images/default-book.jpg') ?>'">
                                <div class="flex-1">
                                    <h4 class="font-semibold">${item.judul}</h4>
                                    <p class="text-sm text-gray-600">${item.kategori}</p>
                                </div>
                                <button onclick="removeFromCart('${item.bukuId}')" 
                                        class="text-red-500 hover:text-red-700">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        `;
                    });
                    
                    document.getElementById('totalBooks').textContent = `${validItems.length}/3`;
                    document.getElementById('cartCount').textContent = validItems.length;
                } else {
                    toastr.error(data.message || 'Terjadi kesalahan saat memuat keranjang');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                toastr.error('Terjadi kesalahan saat memuat keranjang');
            });
        }

        function removeFromCart(bukuId) {
            fetch('<?= base_url('cart/remove') ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: `bukuId=${bukuId}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    toastr.success(data.message);
                    loadCartItems(); // Reload cart items after removal
                } else {
                    toastr.error(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                toastr.error('Terjadi kesalahan. Silakan coba lagi.');
            });
        }

        // Load cart items when page loads
        document.addEventListener('DOMContentLoaded', function() {
            const cartCount = <?= count(session()->get('cart') ?? []) ?>;
            document.getElementById('cartCount').textContent = cartCount;
            
            // Load cart items immediately when page loads
            loadCartItems();
            
            // Add click handler for cart button
            document.getElementById('cartButton').addEventListener('click', function() {
                openCartModal();
            });
        });

        // Update fungsi openCartModal
        function openCartModal() {
            const modal = document.getElementById('cartModal');
            modal.classList.remove('hidden');
            loadCartItems(); // Reload cart items when opening modal
        }

        // Update fungsi untuk membuka cart modal
        function openCartModal() {
            const modal = document.getElementById('cartModal');
            modal.classList.remove('hidden');
            loadCartItems(); // Reload cart items when opening modal
        }

        // Update fungsi untuk menutup cart modal
        function closeCartModal() {
            const modal = document.getElementById('cartModal');
            modal.classList.add('hidden');
        }

        // Event listener untuk menutup modal saat klik di luar
        document.getElementById('cartModal')?.addEventListener('click', function(e) {
            if (e.target === this) {
                closeCartModal();
            }
        });

        // Event listener untuk tombol cart
        document.getElementById('cartButton')?.addEventListener('click', function() {
            openCartModal();
        });

        function openDetailModal(bookId) {
            currentBookId = bookId;
            const modal = document.getElementById('detailModal');
            modal.classList.remove('hidden');
            
            fetch(`<?= base_url('index/getBookDetail') ?>/${bookId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        const book = data.book;
                        // Update semua informasi buku
                        document.getElementById('modalBookCover').src = book.Foto ? `<?= base_url('uploads/buku/') ?>/${book.Foto}` : '<?= base_url('dist/images/default-book.jpg') ?>';
                        document.getElementById('modalBookTitle').textContent = book.Judul;
                        document.getElementById('modalBookCategory').textContent = book.NamaKategori || 'Tanpa Kategori';
                        document.getElementById('modalBookAuthor').textContent = book.Penulis || '-';
                        document.getElementById('modalBookPublisher').textContent = book.Penerbit || '-';
                        document.getElementById('modalBookYear').textContent = book.TahunTerbit || '-';
                        document.getElementById('modalBookStock').textContent = book.Stok || '0';
                        document.getElementById('modalBookSynopsis').textContent = book.Sinopsis || 'Tidak ada sinopsis';

                        // Update status buku
                        const statusElement = document.getElementById('modalBookStatus');
                        const statusIconElement = document.getElementById('modalBookStatusIcon');
                        const addToCartBtn = document.getElementById('addToCartBtn');
                        const stock = parseInt(book.Stok) || 0;

                        if (stock > 0) {
                            statusElement.textContent = 'Tersedia';
                            statusElement.className = 'ml-2 text-sm text-green-600 font-medium';
                            statusIconElement.innerHTML = '<i class="fas fa-check-circle text-green-600"></i>';
                            
                            if (addToCartBtn) {
                                addToCartBtn.disabled = false;
                                addToCartBtn.className = 'bg-green-500 text-white px-4 py-1.5 rounded-lg text-sm hover:bg-green-600';
                            }
                        } else {
                            statusElement.textContent = 'Tidak Tersedia';
                            statusElement.className = 'ml-2 text-sm text-red-600 font-medium';
                            statusIconElement.innerHTML = '<i class="fas fa-times-circle text-red-600"></i>';
                            
                            if (addToCartBtn) {
                                addToCartBtn.disabled = true;
                                addToCartBtn.className = 'bg-gray-400 text-white px-4 py-1.5 rounded-lg text-sm cursor-not-allowed';
                            }
                        }

                        // Cek status koleksi jika user sudah login
                        <?php if (session()->get('isLoggedIn')) : ?>
                            checkKoleksiStatus(bookId);
                        <?php endif; ?>
                        
                        // Load reviews
                        loadBookReviews(bookId);
                    } else {
                        toastr.error('Gagal memuat detail buku');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    toastr.error('Terjadi kesalahan saat memuat detail buku');
                });
        }

        function closeDetailModal() {
            const modal = document.getElementById('detailModal');
            modal.classList.add('hidden');
        }

        // Handle rating stars
        document.querySelectorAll('.rating-star').forEach(button => {
            button.addEventListener('click', function() {
                const rating = this.dataset.rating;
                document.getElementById('selectedRating').value = rating;
                
                // Reset all stars
                document.querySelectorAll('.rating-star i').forEach(star => {
                    star.parentElement.classList.remove('text-yellow-400');
                    star.parentElement.classList.add('text-gray-300');
                });
                
                // Fill stars up to selected rating
                for (let i = 1; i <= rating; i++) {
                    const star = document.querySelector(`.rating-star[data-rating="${i}"]`);
                    star.classList.remove('text-gray-300');
                    star.classList.add('text-yellow-400');
                }
                
                document.getElementById('ratingText').textContent = `${rating} dari 5 bintang`;
            });
        });

        // Handle review form submission
        document.getElementById('reviewForm')?.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const bookId = currentBookId; // Use the currentBookId from the modal
            const rating = document.getElementById('selectedRating').value;
            const ulasan = document.getElementById('reviewText').value;
            
            if (!rating) {
                toastr.error('Silakan pilih rating');
                return;
            }
            
            if (!ulasan.trim()) {
                toastr.error('Silakan tulis ulasan Anda');
                return;
            }

            // Submit review using fetch
            fetch('<?= base_url('index/submitReview') ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: new URLSearchParams({
                    bukuId: bookId,
                    rating: rating,
                    ulasan: ulasan
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    toastr.success(data.message);
                    // Reset form
                    this.reset();
                    document.querySelectorAll('.rating-star').forEach(star => {
                        star.classList.remove('text-yellow-400');
                        star.classList.add('text-gray-300');
                    });
                    document.getElementById('ratingText').textContent = 'Pilih rating';
                    document.getElementById('selectedRating').value = '';
                    // Reload reviews
                    loadBookReviews(bookId);
                } else {
                    toastr.error(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                toastr.error('Terjadi kesalahan saat mengirim ulasan');
            });
        });

        // Close modal when clicking outside
        document.getElementById('detailModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeDetailModal();
            }
        });

        // Close modal with ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeDetailModal();
            }
        });

        // Function untuk memuat ulasan buku
        function loadBookReviews(bookId) {
            fetch(`<?= base_url('index/getBookReviews') ?>/${bookId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const reviewsList = document.getElementById('reviewsList');
                        reviewsList.innerHTML = '';

                        if (data.reviews.length === 0) {
                            reviewsList.innerHTML = '<p class="text-gray-500 text-sm">Belum ada ulasan</p>';
                            return;
                        }

                        data.reviews.forEach(review => {
                            const stars = '★'.repeat(review.Rating) + '☆'.repeat(5 - review.Rating);
                            reviewsList.innerHTML += `
                                <div class="border-b pb-3">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p class="font-medium">${review.NamaLengkap}</p>
                                            <div class="text-yellow-400 text-sm">${stars}</div>
                                        </div>
                                    </div>
                                    <p class="text-gray-600 text-sm mt-1">${review.Ulasan}</p>
                                </div>
                            `;
                        });
                    } else {
                        toastr.error(data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    toastr.error('Terjadi kesalahan saat memuat ulasan');
                });
        }

        let currentBookId = null;

        function openDetailModal(bookId) {
            currentBookId = bookId;
            document.getElementById('bookIdForReview').value = bookId; // Set the book ID for review
            const modal = document.getElementById('detailModal');
            modal.classList.remove('hidden');
            
            fetch(`<?= base_url('index/getBookDetail') ?>/${bookId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        const book = data.book;
                        // Update semua informasi buku
                        document.getElementById('modalBookCover').src = book.Foto ? `<?= base_url('uploads/buku/') ?>/${book.Foto}` : '<?= base_url('dist/images/default-book.jpg') ?>';
                        document.getElementById('modalBookTitle').textContent = book.Judul;
                        document.getElementById('modalBookCategory').textContent = book.NamaKategori || 'Tanpa Kategori';
                        document.getElementById('modalBookAuthor').textContent = book.Penulis || '-';
                        document.getElementById('modalBookPublisher').textContent = book.Penerbit || '-';
                        document.getElementById('modalBookYear').textContent = book.TahunTerbit || '-';
                        document.getElementById('modalBookStock').textContent = book.Stok || '0';
                        document.getElementById('modalBookSynopsis').textContent = book.Sinopsis || 'Tidak ada sinopsis';

                        // Update status buku
                        const statusElement = document.getElementById('modalBookStatus');
                        const statusIconElement = document.getElementById('modalBookStatusIcon');
                        const addToCartBtn = document.getElementById('addToCartBtn');
                        const stock = parseInt(book.Stok) || 0;

                        if (stock > 0) {
                            statusElement.textContent = 'Tersedia';
                            statusElement.className = 'ml-2 text-sm text-green-600 font-medium';
                            statusIconElement.innerHTML = '<i class="fas fa-check-circle text-green-600"></i>';
                            
                            if (addToCartBtn) {
                                addToCartBtn.disabled = false;
                                addToCartBtn.className = 'bg-green-500 text-white px-4 py-1.5 rounded-lg text-sm hover:bg-green-600';
                            }
                        } else {
                            statusElement.textContent = 'Tidak Tersedia';
                            statusElement.className = 'ml-2 text-sm text-red-600 font-medium';
                            statusIconElement.innerHTML = '<i class="fas fa-times-circle text-red-600"></i>';
                            
                            if (addToCartBtn) {
                                addToCartBtn.disabled = true;
                                addToCartBtn.className = 'bg-gray-400 text-white px-4 py-1.5 rounded-lg text-sm cursor-not-allowed';
                            }
                        }

                        // Cek status koleksi jika user sudah login
                        <?php if (session()->get('isLoggedIn')) : ?>
                            checkKoleksiStatus(bookId);
                        <?php endif; ?>
                        
                        // Load reviews
                        loadBookReviews(bookId);
                    } else {
                        toastr.error('Gagal memuat detail buku');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    toastr.error('Terjadi kesalahan saat memuat detail buku');
                });
        }

        function checkKoleksiStatus(bookId) {
            fetch('<?= base_url('koleksi/items') ?>', {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success && data.koleksi) {
                    const isCollected = data.koleksi.some(item => item.BukuID === bookId);
                    const btn = document.getElementById('toggleKoleksiBtn');
                    btn.classList.toggle('collected', isCollected);
                    btn.querySelector('i').style.color = isCollected ? '#4299e1' : '#718096';
                }
            });
        }

        function toggleKoleksiFromModal() {
            if (!currentBookId) return;
            
            fetch('<?= base_url('koleksi/toggle') ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: new URLSearchParams({
                    bukuId: currentBookId
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const btn = document.getElementById('toggleKoleksiBtn');
                    btn.classList.toggle('collected');
                    btn.querySelector('i').style.color = data.isCollected ? '#4299e1' : '#718096';
                    toastr.success(data.message);
                } else {
                    toastr.error(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                toastr.error('Terjadi kesalahan');
            });
        }

        function addToCartFromModal() {
            if (!currentBookId) return;
            
            const stockElement = document.getElementById('modalBookStock');
            const stock = parseInt(stockElement.textContent) || 0;
            
            if (stock <= 0) {
                toastr.error('Buku tidak tersedia untuk dipinjam');
                return;
            }
            
            const bookTitle = document.getElementById('modalBookTitle').textContent;
            const bookImage = document.getElementById('modalBookCover').src;
            const bookCategory = document.getElementById('modalBookCategory').textContent;
            
            addToCart(currentBookId, bookTitle, bookImage, bookCategory);
        }

        // Pastikan CSS untuk tombol koleksi ada
        document.head.insertAdjacentHTML('beforeend', `
            <style>
                .koleksi-btn i {
                    color: #718096;
                    transition: color 0.2s;
                }
                .koleksi-btn.collected i {
                    color: #4299e1;
                }
            </style>
        `);
    </script>
</body>

</html>