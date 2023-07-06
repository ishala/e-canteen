<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\HistoryTransaction;
use App\Models\Product;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('/buyer/payment', [
            'title' => 'Pembeli: Pembayaran',
            'style' => '/styles/user/payment.css'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, Transaction $transaction, Product $product)
    {
        $akun = $request->cookie('account');
        $akun = unserialize($akun);

        $validatedData = $request->validate([
            'price' => 'required',
            'quantity' => 'required',
            'product_id' => 'required'
        ]);

        $validatedData['buyer_id'] = $akun->id;
        $validatedData['status'] = false;

        //ubah ke dalam bentuk int
        $validatedData['price'] = intval($validatedData['price']);
        $validatedData['quantity'] = intval($validatedData['quantity']);

        //perkalian ke price dari banyak quantity
        $validatedData['price'] = $validatedData['price'] * $validatedData['quantity'];

        $transaction->create($validatedData);
        return redirect()->route('buyer.cart');
    }

    public function store(Request $request)
    {
        $totalPrice = 0;
        $allTransId = [];
        $allProductsId = [];
        $allProductsName = [];
        $transaction = json_decode($request->input('transaction'), true);

        //mengambil tiap nilai price dan produk id (PRICE)
        foreach ($transaction as $transact) {
            $totalPrice += $transact['price'];
            //mengambil nilai product_id untuk mencari detail produk
            $allProductsId[] = $transact['product_id']; 
            $allTransId[] = $transact['id'];
        }

        //sementara untuk nilai table menggunakan nilai random (TABLE)
        $numTable = rand(1, 20);

        //menguraikan setiap nilai dalam id array untuk masuk ke dalam db (NAME)
        $products = Product::whereIn('id', $allProductsId)->get();
        foreach($products as $product){
            $allProductsName[] = $product->name;
        }

        //mengubah array menjadi string agar bisa masuk ke dalam kolom db
        $allProducts = implode(', ', $allProductsName);
        $allTransId = implode(', ', $allTransId);

        //data mass assignment yang akan dimasukkan ke dalam database
        $data = [
            'total_price' => $totalPrice,
            'all_products' => $allProducts,
            'num_table' => $numTable,
            'trans_id' => $allTransId
        ];

        HistoryTransaction::create($data);

        $allTransId = explode(', ', $allTransId);

        Transaction::whereIn('id', $allTransId)->update(['status' => true]);

        return redirect()->route('buyer.cart');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction, Request $request, Product $product)
    {
        $akun = $request->cookie('account');
        $akun = unserialize($akun);

        $product = $product->with('seller')->get();

        //untuk cart
        $transaction = $transaction->with('product')
                        ->where('buyer_id', $akun->id)
                        ->where('status', false)
                        ->get();

        $transaction = collect($transaction);
        return view('buyer/products', [
            'title' => 'Pembeli: Keranjang',
            'style' => '/styles/buyer/products.css',
            'products' => $product,
            'transaction' => $transaction
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Transaction $transaction, $transact)
    {
        $transaction = $transaction->find($transact); 
        if ($transaction) {
            $transaction->delete(); // Hapus produk jika ditemukan
        }

        return redirect()->route('buyer.cart');
    }
}
