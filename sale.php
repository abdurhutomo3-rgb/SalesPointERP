<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\SaleModel;

class Sale extends BaseController
{
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }

        $productModel = new ProductModel();
        $saleModel = new SaleModel();

        return view('sales', [
            'products' => $productModel->findAll(),
            'sales' => $saleModel->orderBy('id', 'DESC')->findAll()
        ]);
    }

    public function simpan()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }

        $productModel = new ProductModel();
        $saleModel = new SaleModel();

        $id = (int) $this->request->getPost('product_id');
        $jumlah = (int) $this->request->getPost('jumlah');

        if ($id < 1 || $jumlah < 1) {
            return redirect()->back()->with('error', 'Barang dan jumlah harus valid.');
        }

        $db = \Config\Database::connect();
        $db->transBegin();

        $barang = $productModel->where('id', $id)->first();

        if (!$barang || (int) $barang['stok'] < $jumlah) {
            $db->transRollback();
            return redirect()->back()->with('error', 'Barang tidak ditemukan atau stok tidak cukup.');
        }

        $harga = (float) $barang['harga'];
        $total = $harga * $jumlah;

        $berhasil = $saleModel->insert([
            'nama_barang' => $barang['nama_barang'],
            'harga' => $harga,
            'jumlah' => $jumlah,
            'total' => $total
        ]);

        if (!$berhasil) {
            $db->transRollback();
            return redirect()->back()->with('error', 'Transaksi gagal disimpan.');
        }

        $db->table('products')
            ->where('id', $id)
            ->set('stok', 'stok - ' . $jumlah, false)
            ->update();

        if ($db->transStatus() === false) {
            $db->transRollback();
            return redirect()->back()->with('error', 'Transaksi gagal diproses.');
        }

        $db->transCommit();

        return redirect()->to('/sales')->with('success', 'Transaksi berhasil disimpan.');
    }
}
