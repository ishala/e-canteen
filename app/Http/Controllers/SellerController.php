<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreSellerRequest;
use App\Http\Requests\UpdateSellerRequest;
use App\Models\Transaction;

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
            $totalIncome = 0;

            //Ngambil data produk yang punya seller_id sama dengan id akun 
            $myProduct = $product->where('seller_id', $akun->id)->get();

            $totalOrders = Transaction::where('seller_id', $akun->id)->get()->count();
            //Ngitung banyak produk
            $totalProduct = $product->where('seller_id', $akun->id)->get()->count();

            $allIncome = Transaction::select('price')->where('seller_id', $akun->id)
                                    ->where('status', 'done')
                                    ->get();
            foreach($allIncome as $income){
                $totalIncome += $income->price;
            }
            

            return view('seller/main_page', [
                'title' => 'Dashboard Mitra',
                'style' => '/styles/seller/main-page.css',
                'account' => $akun,
                'products' => $myProduct,
                'totalProducts' => $totalProduct,
                'totalOrders' => $totalOrders,
                'totalIncome' => $totalIncome
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $akun = $request->cookie('account');
        $akun = unserialize($akun);
        return view('seller/main_page', [
            'title' => 'Penjual: Tambah Produk',
            'style' => '/styles/seller/add-product.css',
            'account' => $akun
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
            'picture' => 'image|file|max:10240'
        ]);

        $validatedData['picture'] = $request->file('picture')->store('product-images');
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
            'style' => '/styles/seller/all-products.css',
            'products' => $product,
            'category' => $kategori,
            'count' => $totalProduk,
            'account' => $akun
        ]);
    }

    public function search(Product $product, Request $request)
    {
        $akun = $request->cookie('account');
        $akun = unserialize($akun);
        $product = $product->where('seller_id', $akun->id)->get();

        return view('seller/main_page', [
            'title' => 'Penjual: Cari Produk',
            'style' => '/styles/seller/search-product.css',
            'products' => $product,
            'account' => $akun
        ]);
    }

    public function searchProcess(Request $request, Product $product, Seller $seller)
    {
        $akun = $request->cookie('account');
        $akun = unserialize($akun);

        $name = $request->input('query');

        $dataProduct = $product->where('name', 'like', '%' . $name . '%')->where('seller_id', $akun->id)->get();
        $dataAll = $product->where('seller_id', $akun->id)->get();

        $data = [
            'dataProduct' => $dataProduct,
            'dataAll' => $dataAll
        ];

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seller $seller, Product $product, Request $request)
    {
        $akun = $request->cookie('account');
        $akun = unserialize($akun);

        return view('seller/main_page', [
            'title' => 'Penjual: Edit Produk',
            'style' => '/styles/seller/detail-product.css',
            'product' => $product,
            'account' => $akun
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $akun = $request->cookie('account');
        $akun = unserialize($akun);

        $validatedData = $request->validate([
            'name' => 'required',
            'category' => 'required|max:1',
            'price' => 'required',
            'description' => 'required',
            'picture' => 'image|file|max:10240'
        ]);

        if ($request->file('picture')) {
            if ($request->oldPicture) {
                Storage::delete($request->oldPicture);
            }
            $validatedData['picture'] = $request->file('picture')->store('product-images');
        }

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
            if ($product->picture) {
                Storage::delete($product->picture);
            }
            $product->delete(); // Hapus produk jika ditemukan
        }

        return redirect()->route('seller.all-products');
    }

    public function getRevenue(Request $request)
    {
        $akun = $request->cookie('account');
        $akun = unserialize($akun);

        $transactions = Transaction::with('product')->where('seller_id', $akun->id)->get();
        return view('seller/main_page', [
            'title' => 'Penjual: Pendapatan',
            'style' => '/styles/seller/total-income.css',
            'account' => $akun,
            'transactions' => $transactions
        ]);
    }

    public function confirmOrders()
    {
        return view('seller/confirm_order', [
            'title' => 'Penjual: Konfirmasi Pesanan',
            'style' => '/styles/seller/total-income.css'
        ]);
    }
}
