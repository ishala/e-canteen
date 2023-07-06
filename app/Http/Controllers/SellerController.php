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
        return view('seller/main_page', [
            'title' => 'Penjual: Tambah Produk',
            'style' => '/styles/seller/all-products.css'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $akun = $request->cookie('account');
        $akun = unserialize($akun);
        $validatedData = $request->validate([
            'name' => 'required',
            'category' => 'required|max:1',
            'price' => 'required',
            'description' => 'required',
        ]);

        $validatedData['seller_id'] = $akun->id;


        Product::create($validatedData);
        return redirect()->route('seller.all-products');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Product $product)
    {
        $akun = $request->cookie('account');
        $akun = unserialize($akun);
        $kategori = $request->input('category');

        if ($kategori == 0) {
            $product = $product->where('seller_id', $akun->id)->get();
        } else {
            $product = $product->where('seller_id', $akun->id)
                ->where('category', $kategori)
                ->get();
        }

        $totalProduk = $product->where('seller_id', $akun->id)
            ->where('category', $kategori)
            ->count();

        return view('seller/main_page', [
            'title' => 'Penjual: Tampil Produk',
            'style' => '/styles/seller/main-page.css',
            'products' => $product,
            'category' => $kategori,
            'count' => $totalProduk
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seller $seller, Product $product)
    {
        return view('seller/main_page', [
            'title' => 'Penjual: Edit Produk',
            'style' => '/styles/seller/main-page.css',
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'category' => 'required|max:1',
            'price' => 'required',
            'description' => 'required',
        ]);

        $validatedData['price'] = str_replace(['.', ','], '', $validatedData['price']);

        $product->where('id', $product->id)->update($validatedData);
        return redirect()->route('seller.all-products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Product $product)
    {
        $productId = $request->input('id');

        $product = $product->find($productId); // Temukan produk berdasarkan ID
        if ($product) {
            $product->delete(); // Hapus produk jika ditemukan
        }

        return redirect()->route('seller.all-products');
    }

    public function getRevenue()
    {
        return view('seller/revenue_seller');
    }

    public function confirmOrders()
    {
        return view('seller/confirm_order', [
            'title' => 'Penjual: Konfirmasi Pesanan',
            'style' => '/styles/seller/confirm-order.css'
        ]);
    }
}
