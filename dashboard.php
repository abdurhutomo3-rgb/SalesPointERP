<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SalesPoint ERP</title>

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

        .sidebar {
            position: fixed;
            width: 230px;
            height: 100vh;
            background: #14213d;
            color: white;
            padding: 25px 15px;
        }

        .sidebar h2 {
            margin: 0 10px 35px;
        }

        .sidebar a {
            display: block;
            padding: 13px 15px;
            margin-bottom: 8px;
            color: #cbd5e1;
            text-decoration: none;
            border-radius: 7px;
        }

        .sidebar a.active,
        .sidebar a:hover {
            background: #263858;
            color: white;
        }

        .main {
            margin-left: 230px;
            padding: 30px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .topbar h1 {
            margin: 0;
            font-size: 26px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 20px;
        }

        .card {
            background: white;
            padding: 22px;
            border-radius: 12px;
            box-shadow: 0 2px 8px #00000008;
        }

        .card p {
            color: #64748b;
            margin: 0 0 15px;
        }

        .card h2 {
            margin: 0;
            font-size: 25px;
        }

        .info {
            margin-top: 25px;
            background: white;
            padding: 25px;
            border-radius: 12px;
        }

        .info p {
            color: #64748b;
            line-height: 1.6;
        }

        @media (max-width: 750px) {
            .sidebar {
                width: 170px;
            }

            .main {
                margin-left: 170px;
                padding: 18px;
            }

            .cards {
                grid-template-columns: 1fr;
            }

            .topbar {
                align-items: flex-start;
                gap: 10px;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

<div class="sidebar">
    <h2>SalesPoint</h2>

    <a href="<?= site_url('dashboard') ?>" class="active">
        Dashboard
    </a>

    <a href="<?= site_url('products') ?>">Data Barang</a>
    <a href="<?= site_url('sales') ?>">Penjualan</a>
    <a href="<?= site_url('report') ?>">Laporan</a>
    <a href="#">Pengaturan</a>
    <a href="<?= site_url('logout') ?>"
       onclick="return confirm('Yakin ingin keluar?')">
        Logout
</a>

</div>


<div class="main">

    <div class="topbar">
        <h1>Dashboard</h1>
        <span>Admin: <?= esc(session()->get('username')) ?></span>
    </div>

    <div class="cards">
        <div class="card">
            <p>Total Penjualan</p>
            <h2>Rp<?= number_format((float) $totalPenjualan, 0, ',', '.') ?></h2>
        </div>

        <div class="card">
            <p>Total Transaksi</p>
            <h2><?= number_format((int) $jumlahTransaksi, 0, ',', '.') ?></h2>
        </div>

        <div class="card">
            <p>Total Jenis Barang</p>
            <h2><?= number_format((int) $totalBarang, 0, ',', '.') ?></h2>
        </div>
        <div class="card">
            <p>Total Stok Barang</p>
            <h2><?= number_format((int) $totalStok, 0, ',', '.') ?></h2>
        </div>
    </div>


    <div class="info">  
        <h2>Selamat Datang!</h2>
        <p>
            Selamat datang di SalesPoint ERP.
            Kelola data barang, transaksi penjualan,
            dan laporan usaha melalui menu navigasi.
        </p>
        <p>
            Angka pada ringkasan saat ini masih data contoh.
            Data asli akan ditampilkan setelah fitur database dibuat.
        </p>
    </div>

</div>

</body>
</html>
