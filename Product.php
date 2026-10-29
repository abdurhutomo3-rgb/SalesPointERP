<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Product extends BaseController
{
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }

        $model = new ProductModel();

        $data['products'] = $model->findAll();

        return view('products', $data);
    }

    public function simpan()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }

        $model = new ProductModel();

        $model->save([
            'nama_barang' => $this->request->getPost('nama_barang'),
            'kategori' => $this->request->getPost('kategori'),
            'harga' => $this->request->getPost('harga'),
            'stok' => $this->request->getPost('stok')
        ]);

        return redirect()->to('/products');
    }

    public function hapus($id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }

        $model = new ProductModel();
        $model->delete($id);

        return redirect()->to('/products');
    }

    public function edit($id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }

        $model = new ProductModel();
        $product = $model->find($id);

        if (!$product) {
            return redirect()->to('/products');
        }

        return view('edit_product', ['product' => $product]);
    }

    public function update($id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }

        $model = new ProductModel();

        if (!$model->find($id)) {
            return redirect()->to('/products');
        }

        $model->update($id, [
            'nama_barang' => $this->request->getPost('nama_barang'),
            'kategori' => $this->request->getPost('kategori'),
            'harga' => $this->request->getPost('harga'),
            'stok' => $this->request->getPost('stok')
        ]);

        return redirect()->to('/products');
    }
}
