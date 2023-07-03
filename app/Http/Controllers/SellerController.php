<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSellerRequest;
use App\Http\Requests\UpdateSellerRequest;
use App\Models\Product;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Product $product)
    {
        if ($request->cookie() != null) {
            $akun = $request->cookie('account');
            $akun = unserialize($akun);

            //Ngambil data produk yang punya seller_id sama dengan id akun 
            $myProduct = $product->where('seller_id', $akun->id)->get();

            //Ngitung banyak produk
            $totalProduct = $product->where('seller_id', $akun->id)->get()->count();

            return view('seller/main_page', [
                'title' => 'Dashboard Mitra',
                'style' => '/styles/seller/main-page.css',
                'account' => $akun,
                'products' => $myProduct,
                'totalProducts' => $totalProduct,
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('seller/add_product', [
            'title' => 'Penjual: Tambah Produk',
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSellerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Product $product)
    {
        $akun = $request->cookie('account');
        $akun = unserialize($akun);
        $kategori = $request->input('category');

        if($kategori == 0){
            $product = $product->where('seller_id', $akun->id)->get();
        }else {
            $product = $product->where('seller_id', $akun->id)
                                ->where('category', $kategori)
                                ->get();
        }

        $totalProduk = $product->where('seller_id', $akun->id)
                                ->where('category', $kategori)
                                ->count();

        return view('seller/main_page', [
            'title' => 'Penjual: Tampil Produk',
            'style' => '/styles/seller/all-products.css',
            'products' => $product,
            'category' => $kategori,
            'count' => $totalProduk
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seller $seller)
    {
        return view('seller/edit_product');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSellerRequest $request, Seller $seller)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seller $seller)
    {
        //
    }

    public function getRevenue()
    {
        return view('seller/revenue_seller');
    }
}
