<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Peminjaman - LiteraSky</title>
    <link href="<?= base_url('dist/images/logo.svg') ?>" rel="shortcut icon">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        @media print {
            .no-print {
                display: none !important;
            }
            .print-only {
                display: block !important;
            }
            @page {
                margin: 0.5cm;
            }
        }
        .print-only {
            display: none;
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Konten untuk dicetak -->
    <div id="printArea" class="print-only bg-white p-8">
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold">LiteraSky</h1>
            <h2 class="text-xl">Bukti Peminjaman Buku</h2>
            <p class="text-sm text-gray-600">Tanggal Cetak: <?= date('d/m/Y H:i') ?></p>
        </div>
        
        <div class="mb-6">
            <h3 class="font-semibold mb-2">Informasi Peminjam:</h3>
            <p>Nama: <?= session()->get('namaLengkap') ?></p>
            <p>Email: <?= session()->get('email') ?></p>
        </div>

        <div class="mb-6">
            <h3 class="font-semibold mb-2">Detail Peminjaman:</h3>
            <table class="w-full border-collapse">
                <thead>
                    <tr class="border-b">
                        <th class="text-left py-2">Judul Buku</th>
                        <th class="text-left py-2">Kategori</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart as $item): ?>
                    <tr class="border-b">
                        <td class="py-2"><?= $item['judul'] ?></td>
                        <td class="py-2"><?= $item['kategori'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="mb-6">
            <p><strong>Total Buku:</strong> <?= count($cart) ?></p>
            <p><strong>Tanggal Peminjaman:</strong> <span id="printTglPinjam"></span></p>
            <p><strong>Tanggal Pengembalian:</strong> <span id="printTglKembali"></span></p>
        </div>

        <div class="text-sm text-gray-600 mt-8">
            <p>Catatan:</p>
            <ul class="list-disc ml-5">
                <li>Harap menjaga buku tetap dalam kondisi baik</li>
                <li>Pengembalian maksimal pada tanggal yang ditentukan</li>
                <li>Denda keterlambatan sesuai dengan ketentuan yang berlaku</li>
            </ul>
        </div>
    </div>

    <!-- Konten utama -->
    <div class="container mx-auto px-4 py-8 no-print">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-3xl font-bold mb-8">Konfirmasi Peminjaman</h1>
            
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h2 class="text-xl font-semibold mb-4">Daftar Buku</h2>
                <div class="space-y-4">
                    <?php foreach ($cart as $item): ?>
                    <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg">
                        <img src="<?= $item['foto'] ?>" alt="<?= $item['judul'] ?>" 
                             class="w-16 h-20 object-cover rounded"
                             onerror="this.src='<?= base_url('dist/images/default-book.jpg') ?>'">
                        <div class="flex-1">
                            <h4 class="font-semibold"><?= $item['judul'] ?></h4>
                            <p class="text-sm text-gray-600"><?= $item['kategori'] ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h2 class="text-xl font-semibold mb-4">Informasi Peminjaman</h2>
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Tanggal Peminjaman</span>
                        <input type="date" 
                               id="tanggalPeminjaman" 
                               name="tanggalPeminjaman" 
                               class="border rounded-lg px-3 py-2"
                               value="<?= date('Y-m-d') ?>"
                               min="<?= date('Y-m-d') ?>"
                               onchange="updateTanggalPengembalian()">
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Tanggal Pengembalian</span>
                        <input type="date" 
                               id="tanggalPengembalian" 
                               name="tanggalPengembalian" 
                               class="border rounded-lg px-3 py-2"
                               value="<?= date('Y-m-d', strtotime('+7 days')) ?>"
                               min="<?= date('Y-m-d', strtotime('+1 day')) ?>">
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Jumlah Buku</span>
                        <span class="font-medium"><?= count($cart) ?></span>
                    </div>
                </div>
            </div>

            <div class="flex justify-between items-center">
                <a href="<?= base_url('/') ?>" 
                   class="text-gray-600 hover:text-gray-800">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
                <button onclick="processCheckout()" 
                        class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600">
                    Konfirmasi Peminjaman
                </button>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        function updateTanggalPengembalian() {
            const tanggalPeminjaman = document.getElementById('tanggalPeminjaman').value;
            const tanggalPengembalianInput = document.getElementById('tanggalPengembalian');
            
            const minReturn = new Date(tanggalPeminjaman);
            minReturn.setDate(minReturn.getDate() + 1);
            tanggalPengembalianInput.min = minReturn.toISOString().split('T')[0];
            
            const defaultReturn = new Date(tanggalPeminjaman);
            defaultReturn.setDate(defaultReturn.getDate() + 7);
            tanggalPengembalianInput.value = defaultReturn.toISOString().split('T')[0];
        }

        function processCheckout() {
            const tanggalPeminjaman = document.getElementById('tanggalPeminjaman').value;
            const tanggalPengembalian = document.getElementById('tanggalPengembalian').value;

            // Update tanggal di area cetak
            document.getElementById('printTglPinjam').textContent = formatDate(tanggalPeminjaman);
            document.getElementById('printTglKembali').textContent = formatDate(tanggalPengembalian);

            fetch('<?= base_url('checkout/process') ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: new URLSearchParams({
                    tanggalPeminjaman: tanggalPeminjaman,
                    tanggalPengembalian: tanggalPengembalian
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    toastr.success(data.message);
                    // Cetak bukti peminjaman
                    window.print();
                    setTimeout(() => {
                        window.location.href = '<?= base_url('/') ?>';
                    }, 1500);
                } else {
                    toastr.error(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                toastr.error('Terjadi kesalahan. Silakan coba lagi.');
            });
        }

        function formatDate(dateString) {
            const options = { 
                weekday: 'long', 
                year: 'numeric', 
                month: 'long', 
                day: 'numeric' 
            };
            return new Date(dateString).toLocaleDateString('id-ID', options);
        }
    </script>
</body>
</html> 