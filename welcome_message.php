<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SalesPoint ERP</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f2f5fa;
            padding: 20px;
        }

        .container {
            display: flex;
            width: 850px;
            max-width: 100%;
            min-height: 480px;
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.1);
        }

        .brand {
            flex: 1;
            background: #172b4d;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 40px;
        }

        .brand h1 {
            font-size: 32px;
            margin-bottom: 15px;
        }

        .brand p {
            color: #d5deed;
            line-height: 1.7;
        }

        .form-area {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 40px;
        }

        .form-area h2 {
            color: #172b4d;
            font-size: 28px;
            margin-bottom: 10px;
        }

        .subtitle {
            color: #777;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin: 16px 0 8px;
            color: #333;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 13px;
            border: 1px solid #d5dce7;
            border-radius: 7px;
            outline: none;
        }

        input:focus {
            border-color: #315b96;
        }

        .forgot {
            display: block;
            text-align: right;
            margin: 12px 0 22px;
            color: #315b96;
            text-decoration: none;
            font-size: 13px;
        }

        button {
            width: 100%;
            padding: 13px;
            border: none;
            border-radius: 7px;
            background: #244879;
            color: white;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background: #172b4d;
        }

        .note {
            margin-top: 25px;
            text-align: center;
            font-size: 12px;
            color: #999;
        }

        @media (max-width: 650px) {
            .container {
                flex-direction: column;
            }

            .brand {
                padding: 30px;
            }

            .brand h1 {
                font-size: 26px;
            }

            .form-area {
                padding: 30px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="brand">
            <h1>SalesPoint ERP</h1>
            <p>Sistem pengelolaan penjualan dan stok barang yang mudah, teratur, dan efisien.</p>
        </div>

        <div class="form-area">
            <h2>Selamat Datang</h2>
            <p class="subtitle">Silakan masuk ke akun Anda.</p>

            <?php if (session()->getFlashdata('error')): ?>
                    <p style="color: red;">
                        <?= esc(session()->getFlashdata('error')) ?>
                    </p>
                <?php endif; ?>
                    
                <form action="<?= site_url('login/proses') ?>" method="post">
                        <?= csrf_field() ?>

                        <label for="username">Username</label>
                        <input type="text" id="username" name="username"
                             placeholder="Masukkan username" required>

                        <label for="password">Password</label>
                        <input type="password" id="password" name="password"
                             placeholder="Masukkan password" required>

                        <a href="#" class="forgot">Lupa password?</a>

                        <button type="submit">Masuk</button>
                </form>


            <p class="note">SalesPoint ERP &copy; 2026</p>
        </div>
    </div>
</body>
</html>