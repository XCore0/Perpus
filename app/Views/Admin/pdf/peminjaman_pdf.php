<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Peminjaman - LiteraSky</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 15px;
            color: #333;
            font-size: 12px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            padding: 15px;
            border-bottom: 2px solid #eee;
        }
        .logo-container {
            width: 90px;
            height: 90px;
            margin: 0 auto 10px;
            background: #007bff;
            border-radius: 50%;
            padding: 0;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #0056b3;
            position: relative;
        }
        .header img {
            width: 50px;
            height: 50px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            margin: 0;
            filter: brightness(0) invert(1);
            object-fit: contain;
        }
        .header h1 {
            margin: 8px 0 4px;
            color: #007bff;
            font-size: 20px;
        }
        .header h2 {
            margin: 4px 0 12px;
            color: #555;
            font-size: 16px;
        }
        .header p {
            margin: 4px 0;
            color: #666;
            font-size: 12px;
        }
        .info-section {
            margin-bottom: 15px;
        }
        .info-section h3 {
            color: #007bff;
            border-bottom: 2px solid #eee;
            padding-bottom: 4px;
            margin-bottom: 12px;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
            background: #fff;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px 6px;
            text-align: left;
            font-size: 11px;
        }
        table th {
            background-color: #f8f9fa;
            color: #495057;
            font-weight: bold;
        }
        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 10px;
            color: #666;
            padding-top: 15px;
            border-top: 2px solid #eee;
        }
        .footer p {
            margin: 3px 0;
        }
        .status-badge {
            padding: 3px 6px;
            border-radius: 3px;
            font-size: 10px;
            font-weight: bold;
        }
        .status-dipinjam {
            background-color: #e3f2fd;
            color: #1976d2;
        }
        .status-dikembalikan {
            background-color: #e8f5e9;
            color: #2e7d32;
        }
        .status-terlambat {
            background-color: #fbe9e7;
            color: #d84315;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo-container">
            <?php if (!empty($logo)): ?>
                <img src="<?= $logo ?>" alt="LiteraSky Logo">
            <?php endif; ?>
        </div>
        <h1>LiteraSky</h1>
        <h2>Laporan Data Peminjaman Buku</h2>
        <p>Tanggal Cetak: <?= $tanggal_cetak ?></p>
        <p>Filter: <?= $filter_info ?></p>
    </div>

    <div class="info-section">
        <h3>Data Peminjaman</h3>
        <table>
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="18%">Nama Peminjam</th>
                    <th width="35%">Judul Buku</th>
                    <th width="12%">Tgl Pinjam</th>
                    <th width="12%">Tgl Kembali</th>
                    <th width="18%">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($peminjaman as $index => $pinjam): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $pinjam['NamaLengkap'] ?></td>
                    <td><?= $pinjam['Judul'] ?></td>
                    <td><?= date('d/m/Y', strtotime($pinjam['TanggalPeminjaman'])) ?></td>
                    <td><?= date('d/m/Y', strtotime($pinjam['TanggalPengembalian'])) ?></td>
                    <td>
                        <span class="status-badge status-<?= strtolower($pinjam['StatusPeminjaman']) ?>">
                            <?= $pinjam['StatusPeminjaman'] ?>
                        </span>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="info-section">
        <h3>Ringkasan</h3>
        <table>
            <tr>
                <td width="150">Total Peminjaman</td>
                <td>: <?= count($peminjaman) ?></td>
            </tr>
            <tr>
                <td>Periode Laporan</td>
                <td>: <?= $filter_info ?></td>
            </tr>
        </table>
    </div>

    <div class="footer">
        <p>Laporan ini digenerate secara otomatis oleh sistem LiteraSky</p>
        <p>© <?= date('Y') ?> LiteraSky - Sistem Perpustakaan Digital</p>
    </div>
</body>
</html>