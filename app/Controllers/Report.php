<?php

namespace App\Controllers;

use App\Models\SaleModel;

class Report extends BaseController
{
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $saleModel = new SaleModel();

        $sales = $saleModel
            ->orderBy('id', 'DESC')
            ->findAll();

        $totalPenjualan = $saleModel
            ->selectSum('total')
            ->first();

        return view('report', [
            'sales' => $sales,
            'totalPenjualan' => $totalPenjualan['total'] ?? 0,
        ]);
    }
}
