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
</head>

<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-gray-800 text-white">
        <div class="container mx-auto px-6 py-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <a href="/" class="text-xl font-bold">
                        <span class="text-blue-400">Litera</span>Sky
                    </a>
                    <div class="hidden md:block ml-10">
                        <div class="flex items-center space-x-4">
                            <a href="#home" class="hover:text-blue-400">Beranda</a>
                            <a href="#catalog" class="hover:text-blue-400">Katalog</a>
                            <a href="#categories" class="hover:text-blue-400">Kategori</a>
                            <a href="#about" class="hover:text-blue-400">Tentang</a>
                            <a href="#contact" class="hover:text-blue-400">Kontak</a>
                        </div>
                    </div>
                </div>


                <div class="flex items-center space-x-4">

                    <div class="relative">
                        <button id="cartButton" class="hover:text-blue-400 mr-4">
                            <i class="fas fa-shopping-cart"></i>
                            <span id="cartCount"
                                class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">0</span>
                        </button>
                    </div>
                    <a href="<?= base_url('Auth/Login') ?>" class="hover:text-blue-400">Masuk</a>
                    <a href="<?= base_url('Auth/Register') ?>" class="bg-blue-500 px-4 py-2 rounded-lg hover:bg-blue-600">Daftar</a>
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
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
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
                                        <button onclick="openModal('book<?= $book['BukuID'] ?>')"
                                            class="bg-blue-500 text-white px-3 py-2 rounded-lg text-sm hover:bg-blue-600">
                                            Detail
                                        </button>
                                        <?php if ($book['Stok'] > 0): ?>
                                            <button class="bg-green-500 text-white px-3 py-2 rounded-lg text-sm hover:bg-green-600">
                                                Pinjam
                                            </button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- BEGIN: Pagination -->
    <div class="flex justify-center mb-8">
        <div class="flex flex-col items-center space-y-5">
            <nav>
                <ul class="flex items-center space-x-2">
                    <!-- First & Previous -->

                    <li>
                        <a href="#"
                            class="flex items-center justify-center w-10 h-10 rounded-md bg-white border border-gray-200 hover:bg-blue-50">
                            <span class="text-gray-600">&lt;</span>
                        </a>
                    </li>

                    <!-- Page Numbers -->
                    <li>
                        <a href="#"
                            class="flex items-center justify-center w-10 h-10 rounded-md bg-white border border-gray-200 hover:bg-blue-50">1</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center w-10 h-10 rounded-md bg-blue-500 text-white">2</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center w-10 h-10 rounded-md bg-white border border-gray-200 hover:bg-blue-50">3</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center w-10 h-10 rounded-md bg-white border border-gray-200 hover:bg-blue-50">4</a>
                    </li>

                    <!-- Next & Last -->
                    <li>
                        <a href="#"
                            class="flex items-center justify-center w-10 h-10 rounded-md bg-white border border-gray-200 hover:bg-blue-50">
                            <span class="text-gray-600">&gt;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- END: Pagination -->

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
                <button onclick="checkout()"
                    class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 disabled:opacity-50 disabled:cursor-not-allowed">
                    Checkout Peminjaman
                </button>
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
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
                link.addEventListener('click', function (e) {
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
            window.openModal = function (modalId) {
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
                modal.addEventListener('click', function (e) {
                    if (e.target === this) {
                        closeModal(modalId);
                    }
                });
            }

            window.closeModal = function (modalId) {
                const modal = document.getElementById(modalId);
                if (modal) {
                    modal.classList.add('hidden');
                }
            }

            // Add this to your DOMContentLoaded event listener
            document.addEventListener('DOMContentLoaded', function () {
                // Close button functionality
                const closeButtons = document.querySelectorAll('[onclick*="closeModal"]');
                closeButtons.forEach(button => {
                    button.addEventListener('click', function (e) {
                        e.stopPropagation();
                        const modalId = this.getAttribute('onclick').match(/'([^']+)'/)[1];
                        closeModal(modalId);
                    });
                });

                // Prevent modal content from triggering close
                const modalContents = document.querySelectorAll('.relative.top-20');
                modalContents.forEach(content => {
                    content.addEventListener('click', function (e) {
                        e.stopPropagation();
                    });
                });
            });

            // Tambahkan di dalam DOMContentLoaded event listener

            let cart = [];
            const MAX_BOOKS = 3;

            // Update tombol Pinjam untuk menambahkan event listener
            document.querySelectorAll('.bg-green-500').forEach(button => {
                button.addEventListener('click', function () {
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

            function addToCart(book) {
                if (cart.length >= MAX_BOOKS) {
                    alert('Maksimal peminjaman 3 buku!');
                    return;
                }

                cart.push(book);
                updateCartCount();
                showNotification('Buku ditambahkan ke keranjang');
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
                    closeBtn.addEventListener('click', function (e) {
                        e.preventDefault();
                        e.stopPropagation();
                        closeCartModal();
                    });
                }

                // Close when clicking outside modal
                modal.addEventListener('click', function (e) {
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
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') {
                    closeCartModal();
                }
            });

            // Initialize cart button
            document.addEventListener('DOMContentLoaded', function () {
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
                    closeBtn.addEventListener('click', function (e) {
                        e.preventDefault();
                        e.stopPropagation();
                        closeCheckoutModal();
                    });
                }

                // Close when clicking outside
                checkoutModal.addEventListener('click', function (e) {
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
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') {
                    closeCheckoutModal();
                    closeCartModal();
                }
            });

            // Tombol close di modal checkout
            document.querySelectorAll('[onclick="closeCheckoutModal()"]').forEach(button => {
                button.addEventListener('click', function (e) {
                    e.stopPropagation();
                    closeCheckoutModal();
                });
            });

            // Menutup modal checkout saat mengklik area luar modal
            document.getElementById('checkoutModal').addEventListener('click', function (e) {
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
            document.addEventListener('DOMContentLoaded', function () {
                // Event listener untuk menutup modal saat mengklik area luar modal
                const checkoutModal = document.getElementById('checkoutModal');
                if (checkoutModal) {
                    checkoutModal.addEventListener('click', function (e) {
                        // Jika yang diklik adalah background modal (bukan konten modal)
                        if (e.target === this) {
                            closeCheckoutModal();
                        }
                    });
                }

                // Event listener untuk tombol ESC
                document.addEventListener('keydown', function (e) {
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
                document.getElementById('cartModal').addEventListener('click', function (e) {
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
                'book1': [
                    {
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
                anchor.addEventListener('click', function (e) {
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
                searchInput.addEventListener('keyup', function (e) {
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
                tooltip.addEventListener('mouseenter', function () {
                    const tooltipText = this.getAttribute('data-tooltip');
                    // Add your tooltip display logic here
                });
            });

            // Handle mobile menu toggle if you have one
            const mobileMenuButton = document.querySelector('[data-mobile-menu]');
            const mobileMenu = document.querySelector('#mobile-menu');
            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function () {
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
                const bookCategory = card.querySelector('.text-gray-600.text-sm.mb-2').textContent.trim();
                return category === 'Semua Kategori' || bookCategory === category;
            });

            // Sembunyikan semua buku dulu
            bookCards.forEach(card => {
                card.style.display = 'none';
                card.classList.add('hidden');
            });

            // Tampilkan hanya 6 buku untuk halaman saat ini dari kategori yang dipilih
            const start = (currentPage - 1) * ITEMS_PER_PAGE;
            const end = Math.min(start + ITEMS_PER_PAGE, filteredBooks.length);

            filteredBooks.slice(start, end).forEach(book => {
                book.style.display = '';
                book.classList.remove('hidden');
            });

            updatePaginationUI(Math.ceil(filteredBooks.length / ITEMS_PER_PAGE));
        }

        function changePage(newPage) {
            const bookCards = document.querySelectorAll('.md\\:w-3\\/4 .grid > div');
            const filteredBooks = Array.from(bookCards).filter(card => {
                const bookCategory = card.querySelector('.text-gray-600.text-sm.mb-2').textContent.trim();
                return currentCategory === 'Semua Kategori' || bookCategory === currentCategory;
            });

            const totalPages = Math.ceil(filteredBooks.length / ITEMS_PER_PAGE);

            if (newPage < 1 || newPage > totalPages) return;

            currentPage = newPage;

            // Sembunyikan semua buku
            bookCards.forEach(card => {
                card.style.display = 'none';
                card.classList.add('hidden');
            });

            // Tampilkan buku untuk halaman yang dipilih
            const start = (currentPage - 1) * ITEMS_PER_PAGE;
            const end = Math.min(start + ITEMS_PER_PAGE, filteredBooks.length);

            filteredBooks.slice(start, end).forEach(book => {
                book.style.display = '';
                book.classList.remove('hidden');
            });

            updatePaginationUI(totalPages);
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function () {
            // Initial setup
            filterBooks('Semua Kategori');

            // Category click handlers
            const categoryLinks = document.querySelectorAll('.md\\:w-1\\/4 ul li a');
            categoryLinks.forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    const categoryText = this.querySelector('span:first-child').textContent.trim();

                    updateCategoryStyle(this);

                    const categoryTitle = document.querySelector('.md\\:w-3\\/4 h2');
                    categoryTitle.textContent = categoryText === 'Semua Kategori' ?
                        'Semua Kategori' : `Buku ${categoryText}`;

                    filterBooks(categoryText);
                });
            });
        });
    </script>