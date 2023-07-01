<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Product $product)
    {
        if($request->cookie() != null){
        //Ngambil data dari session dengan nama key = akun
        $akun = $request->cookie('account');

        $akun = unserialize($akun);
        $product = $product->with('seller')->get();
    
        return view('buyer/products', [
            'title' => 'Pembeli: Semua Mitra dan Produk',
            'style' => '/styles/buyer/products.css',
            'account' => $akun,
            'products' => $product,
            'bestSeller' => $product->find(2)
        ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('/buyer/detail_product', [
            'title' => 'Pembeli: Detail Produk',
            'style' => '/styles/buyer/detail_product.css',
            'products' => $product->all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Product $product)
    {
        $akun = $request->cookie('account');
        $product = $product->with('seller')->get();

        return view('buyer/products', [
            'title' => 'Pembeli: Keranjang',
            'style' => '/styles/buyer/cart.css',
            'account' => $akun,
            'products' => $product,
        ]);
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
