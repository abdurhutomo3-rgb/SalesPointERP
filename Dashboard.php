<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\SaleModel;

class Dashboard extends BaseController
{
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }

        $productModel = new ProductModel();
        $saleModel = new SaleModel();

        $totalBarang = $productModel->countAll();
        $totalStok = $productModel->selectSum('stok')->first();
        $totalPenjualan = $saleModel->selectSum('total')->first();
        $jumlahTransaksi = $saleModel->countAll();

        return view('dashboard', [
            'totalBarang' => $totalBarang,
            'totalStok' => $totalStok['stok'] ?? 0,
            'totalPenjualan' => $totalPenjualan['total'] ?? 0,
            'jumlahTransaksi' => $jumlahTransaksi,
        ]);
    }
}
