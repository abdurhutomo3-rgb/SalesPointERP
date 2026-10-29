<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang - SalesPoint ERP</title>

    <style>
        body {
            margin: 0;
            padding: 30px;
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            color: #1e293b;
        }

        .container {
            max-width: 600px;
            margin: 30px auto;
            padding: 25px;
            background: white;
            border-radius: 12px;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 7px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 11px;
            box-sizing: border-box;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
        }

        button, .back {
            display: inline-block;
            margin-top: 20px;
            padding: 11px 18px;
            border: 0;
            border-radius: 6px;
            background: #14213d;
            color: white;
            text-decoration: none;
            cursor: pointer;
        }

        .back {
            background: #64748b;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Edit Barang</h1>
    <p>Ubah informasi barang sesuai kebutuhan.</p>

    <form action="<?= site_url('products/update/' . $product['id']) ?>"
          method="post">
        <?= csrf_field() ?>

        <label for="nama_barang">Nama Barang</label>
        <input type="text" id="nama_barang" name="nama_barang"
               value="<?= esc($product['nama_barang']) ?>" required>

        <label for="kategori">Kategori</label>
        <input type="text" id="kategori" name="kategori"
               value="<?= esc($product['kategori'] ?? '') ?>">

        <label for="harga">Harga (Rp)</label>
        <input type="number" id="harga" name="harga"
               min="0" step="0.01"
               value="<?= esc($product['harga']) ?>" required>

        <label for="stok">Stok</label>
        <input type="number" id="stok" name="stok"
               min="0" value="<?= esc($product['stok']) ?>" required>

        <button type="submit">Simpan Perubahan</button>
        <a href="<?= site_url('products') ?>" class="back">Batal</a>
    </form>
</div>

</body>
</html>
