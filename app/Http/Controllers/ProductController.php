<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Transaction;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Product $product)
    {
        if ($request->cookie() != null) {
            //Ngambil data dari session dengan nama key = akun
            $akun = $request->cookie('account');

            $akun = unserialize($akun);

            $bestSeller = $product->find(2);
            $kategori = $request->input('category');

            if ($kategori == 0) {
                $product = $product->all();
            } else {
                $product = $product->where('category', $kategori)
                    ->get();
            }

            $totalProduk = $product->where('seller_id', $akun->id)
                ->where('category', $kategori)
                ->count();

            return view('buyer/products', [
                'title' => 'Pembeli: Menu Utama',
                'style' => '/styles/buyer/products.css',
                'products' => $product,
                'category' => $kategori,
                'count' => $totalProduk,
                'bestSeller' => $bestSeller,
                'account' => $akun
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Product $product)
    {
        $akun = $request->cookie('account');
        $akun = unserialize($akun);

        //Ngambil data dari session dengan nama key = akun
        $akun = $request->cookie('account');
        $akun = unserialize($akun);
        return view('/buyer/products', [
            'title' => 'Pembeli: Detail Produk',
            'style' => '/styles/buyer/detail_product.css',
            'product' => $product,
            'account' => $akun
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Product $product, Transaction $transaction)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
