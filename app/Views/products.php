<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang - SalesPoint ERP</title>

    <style>
        * {
            box-sizing: border-box;
        }

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
            padding: 30px;
        }

        .panel {
            background: white;
            padding: 25px;
            border-radius: 12px;
            margin-bottom: 25px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 15px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 11px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
        }

        button {
            margin-top: 18px;
            padding: 12px 20px;
            border: 0;
            border-radius: 6px;
            background: #14213d;
            color: white;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #e2e8f0;
            text-align: left;
        }

        th {
            background: #f8fafc;
        }

        a {
            color: #2563eb;
            text-decoration: none;
        }

        .table-wrap {
            overflow-x: auto;
        }

        @media (max-width: 600px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            main {
                padding: 15px;
            }
        }
    </style>
</head>
<body>

<header>
    <h2>SalesPoint ERP</h2>
    <p>Manajemen Data Barang</p>
    <a href="<?= site_url('dashboard') ?>" style="color:white">
        ← Kembali ke Dashboard
    </a>
</header>

<main>
    <div class="panel">
        <h2>Tambah Barang</h2>

        <form action="<?= site_url('products/simpan') ?>" method="post">
            <?= csrf_field() ?>

            <div class="form-grid">
                <div>
                    <label for="nama_barang">Nama Barang</label>
                    <input type="text" id="nama_barang"
                           name="nama_barang" required>
                </div>

                <div>
                    <label for="kategori">Kategori</label>
                    <input type="text" id="kategori"
                           name="kategori">
                </div>

                <div>
                    <label for="harga">Harga (Rp)</label>
                    <input type="number" id="harga"
                           name="harga" min="0" step="0.01" required>
                </div>

                <div>
                    <label for="stok">Stok</label>
                    <input type="number" id="stok"
                           name="stok" min="0" required>
                </div>
            </div>

            <button type="submit">Simpan Barang</button>
        </form>
    </div>

    <div class="panel">
        <h2>Daftar Barang</h2>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (!empty($products)): ?>
                        <?php foreach ($products as $i => $product): ?>
                            <tr>
                                <td><?= $i + 1 ?></td>
                                <td><?= esc($product['nama_barang']) ?></td>
                                <td><?= esc($product['kategori'] ?? '-') ?></td>
                                <td>Rp<?= number_format((float) $product['harga'], 0, ',', '.') ?></td>
                                <td><?= esc($product['stok']) ?></td>
                                
                                <td>
                                     <a href="<?= site_url('products/edit/' . $product['id']) ?>"
                                        style="display:inline-block; padding:10px 12px;
                                               background:#2563eb; color:white;
                                               text-decoration:none; border-radius:6px;
                                               margin-right:5px;">
                                         Edit
                                     </a>

                                    <form action="<?= site_url('products/hapus/' . $product['id']) ?>"
                                          method="post"
                                          onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                                        <?= csrf_field() ?>
                                        <button type="submit"
                                                style="background:#dc2626; margin:0;">
                                            Hapus
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6">Belum ada data barang.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

</body>
</html>
