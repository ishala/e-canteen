<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBuyerRequest;
use App\Http\Requests\UpdateBuyerRequest;
use App\Models\Product;
use App\Models\Seller;

class BuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Product $product)
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function search(Request $request, Product $product, Seller $seller)
    {
        $akun = $request->cookie('account');
        $akun = unserialize($akun);

        $product = $product->with('seller')->get();
        $seller = $seller->all();

        return view('buyer/products', [
            'title' => 'Pembeli: Cari Produk',
            'style' => '/styles/buyer/search_product.css',
            'products' => $product,
            'sellers' => $seller,
            'account' => $akun
        ]);
    }

    public function searchProcess(Request $request, Product $product, Seller $seller)
    {
        $name = $request->input('query');

        $dataFoundSeller = $seller->where('name', 'like', '%' . $name . '%')->get();
        $dataFoundProduct = $product->where('name', 'like', '%' . $name . '%')
                            ->with('seller')
                            ->get();

        
        $dataAllSeller = $seller->all();
        $dataAllProduct = $product->all();

        $data = [
            'dataFoundProduct' => $dataFoundProduct,
            'dataFoundSeller' => $dataFoundSeller,
            'dataAllProduct' => $dataAllProduct,
            'dataAllSeller' => $dataAllSeller
        ];
        
        return response()->json($data);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBuyerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Buyer $buyer)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buyer $buyer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBuyerRequest $request, Buyer $buyer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buyer $buyer)
    {
        //
    }
}
