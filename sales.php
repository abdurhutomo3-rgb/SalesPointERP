<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penjualan - SalesPoint ERP</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            color: #1e293b;
        }

        header {
            background: #14213d;
            color: white;
            padding: 20px 30px;
        }

        main {
            max-width: 1100px;
            margin: auto;
            padding: 25px;
        }

        .panel {
            background: white;
            padding: 25px;
            margin-bottom: 25px;
            border-radius: 12px;
        }

        label {
            display: block;
            margin: 15px 0 7px;
            font-weight: bold;
        }

        select, input {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            box-sizing: border-box;
        }

        button {
            margin-top: 20px;
            padding: 12px 20px;
            background: #14213d;
            color: white;
            border: 0;
            border-radius: 6px;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }

        th {
            background: #f8fafc;
        }

        .table-wrap {
            overflow-x: auto;
        }

        .message {
            padding: 12px;
            background: #dcfce7;
            border-radius: 6px;
            margin-bottom: 15px;
        }

        .error {
            background: #fee2e2;
        }

        .back {
            color: white;
        }
    </style>
</head>
<body>

<header>
    <h2>SalesPoint ERP</h2>
    <p>Transaksi Penjualan</p>
    <a class="back" href="<?= site_url('dashboard') ?>">
        ← Kembali ke Dashboard
    </a>
</header>

<main>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="message">
            <?= esc(session()->getFlashdata('success')) ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="message error">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>
    <?php endif; ?>

    <div class="panel">
        <h2>Buat Transaksi</h2>

        <form action="<?= site_url('sales/simpan') ?>" method="post">
            <?= csrf_field() ?>

            <label for="product_id">Pilih Barang</label>
            <select id="product_id" name="product_id" required>
                <option value="">-- Pilih Barang --</option>

                <?php foreach ($products as $product): ?>
                    <option
                        value="<?= esc($product['id']) ?>"
                        data-harga="<?= esc($product['harga']) ?>"
                        data-stok="<?= esc($product['stok']) ?>">
                        <?= esc($product['nama_barang']) ?>
                        - Rp<?= number_format((float) $product['harga'], 0, ',', '.') ?>
                        (Stok: <?= esc($product['stok']) ?>)
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="harga">Harga Satuan</label>
            <input type="text" id="harga" readonly>

            <label for="jumlah">Jumlah Pembelian</label>
            <input type="number" id="jumlah" name="jumlah"
                   min="1" value="1" required>

            <p>Total: <strong id="total">Rp0</strong></p>

            <button type="submit">Simpan Transaksi</button>
        </form>
    </div>

    <div class="panel">
        <h2>Riwayat Transaksi</h2>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Barang</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($sales)): ?>
                        <?php foreach ($sales as $i => $sale): ?>
                            <tr>
                                <td><?= $i + 1 ?></td>
                                <td><?= esc($sale['nama_barang']) ?></td>
                                <td>Rp<?= number_format((float) $sale['harga'], 0, ',', '.') ?></td>
                                <td><?= esc($sale['jumlah']) ?></td>
                                <td>Rp<?= number_format((float) $sale['total'], 0, ',', '.') ?></td>
                                <td><?= esc($sale['tanggal']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6">Belum ada transaksi.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</main>

<script>
    const pilihan = document.getElementById('product_id');
    const jumlah = document.getElementById('jumlah');
    const harga = document.getElementById('harga');
    const total = document.getElementById('total');

    function hitungTotal() {
        const option = pilihan.options[pilihan.selectedIndex];
        const nilaiHarga = Number(option.dataset.harga || 0);
        const stok = Number(option.dataset.stok || 0);

        jumlah.max = stok;
        harga.value = 'Rp' + nilaiHarga.toLocaleString('id-ID');
        total.textContent = 'Rp' +
            (nilaiHarga * Number(jumlah.value || 0)).toLocaleString('id-ID');
    }

    pilihan.addEventListener('change', hitungTotal);
    jumlah.addEventListener('input', hitungTotal);
    hitungTotal();
</script>

</body>
</html>
