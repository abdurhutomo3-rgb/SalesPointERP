<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan - SalesPoint ERP</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 30px;
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            color: #1e293b;
        }

        .container {
            max-width: 1100px;
            margin: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
        }

        .header h1 {
            margin: 0;
        }

        .button {
            display: inline-block;
            padding: 10px 15px;
            border-radius: 6px;
            background: #14213d;
            color: white;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }

        .summary {
            background: white;
            padding: 22px;
            border-radius: 10px;
            margin-bottom: 25px;
        }

        .summary p {
            color: #64748b;
            margin-top: 0;
        }

        .summary h2 {
            margin-bottom: 0;
            color: #14213d;
        }

        .table-box {
            background: white;
            padding: 20px;
            border-radius: 10px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 13px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }

        th {
            background: #f8fafc;
        }

        .empty {
            text-align: center;
            color: #64748b;
            padding: 25px;
        }

        @media print {
            .no-print {
                display: none;
            }

            body {
                background: white;
                padding: 0;
            }

            .summary, .table-box {
                box-shadow: none;
                border: 1px solid #ddd;
            }
        }
    </style>
</head>

<body>
<div class="container">

    <div class="header">
        <h1>Laporan Penjualan</h1>

        <div class="no-print">
            <a href="<?= site_url('dashboard') ?>" class="button">
                Kembali
            </a>

            <button onclick="window.print()" class="button">
                Cetak Laporan
            </button>
        </div>
    </div>

    <div class="summary">
        <p>Total Penjualan Keseluruhan</p>
        <h2>Rp<?= number_format((float) $totalPenjualan, 0, ',', '.') ?></h2>
    </div>

    <div class="table-box">
        <h3>Riwayat Transaksi</h3>

        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Barang</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Tanggal</th>
                </tr>
            </thead>

            <tbody>
                <?php if (!empty($sales)): ?>
                    <?php foreach ($sales as $index => $sale): ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= esc($sale['nama_barang']) ?></td>
                            <td>Rp<?= number_format((float) $sale['harga'], 0, ',', '.') ?></td>
                            <td><?= esc($sale['jumlah']) ?></td>
                            <td>Rp<?= number_format((float) $sale['total'], 0, ',', '.') ?></td>
                            <td><?= esc($sale['tanggal']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="empty">
                            Belum ada transaksi penjualan.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>
</body>
</html>
