<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\HistoryTransaction;
use App\Models\Product;
use Termwind\Components\Dd;

class TransactionController extends Controller
{
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
            'style' => '/styles/buyer/cart.css',
            'products' => $product,
            'transaction' => $transaction
        ]);
    }

    public function create(Request $request, Transaction $transaction)
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

    public function selectTableProcess(Request $request)
    {
        $transact = $request->input('productChecked');

        if ($transact) {
            $transact = implode(',', $transact);
            $request->session()->put('cartIds', $transact);

            return redirect()->route('buyer.select-table');
        }
        return redirect()->route('buyer.cart');
    }

    public function selectTable(Request $request)
    {
        $transaction = $request->session()->get('cartIds');

        return view('buyer/products', [
            'title' => 'Pembeli: Pilih Meja',
            'style' => '/styles/buyer/table.css',
            'transaction' => $transaction
        ]);
    }

    public function indexProcess(Request $request)
    {
        $transact = $request->input('cartIds');
        $seatNumber = $request->input('seatNumber');

        if ($transact && $seatNumber) {
            $request->session()->put('cartIds', $transact);
            $request->session()->put('seatNumber', $seatNumber);

            return redirect()->route('buyer.payment');
        }
    }

    public function index(Request $request)
    {
        $transaction = $request->session()->get('cartIds');
        $seatNumber = $request->session()->get('seatNumber');

        return view('buyer/products', [
            'title' => 'Pembeli: Pembayaran',
            'style' => '/styles/buyer/payment.css',
            'transaction' => $transaction,
            'seatNumber' => $seatNumber
        ]);
    }


    public function confirmOrdersProcess(Request $request)
    {
        $transaction = $request->input('transaction');
        $seatNumber = $request->input('seatNumber');
        $payment = $request->input('payment');

        if ($transaction && $seatNumber && $payment) {
            $request->session()->put('transaction', $transaction);
            $request->session()->put('seatNumber', $seatNumber);
            $request->session()->put('payment', $payment);

            return redirect()->route('buyer.confirm-orders');
        }
        return redirect()->route('buyer.payment');
    }

    public function confirmOrders(Request $request)
    {
        $totalProduct = 0;
        $totalPrice = 0;

        $transaction = $request->session()->get('transaction');
        $seatNumber = $request->session()->get('seatNumber');
        $payment = $request->session()->get('payment');

        //Mengubah string id menjadi array
        $transaction = explode(',', $transaction);
        //Mencari data transaksi berdasarkan id yang ditangkap, beserta data productnya
        $transaction = Transaction::whereIn('id', $transaction)->with('product')->get();
        //mengambil hanya kolom quantity dan price dari tabel trannsactions
        $sumProduct = $transaction->pluck('quantity');
        //menjumlahkan banyak produk yang akan di co
        foreach ($sumProduct as $sum) {
            $totalProduct += $sum;
        }

        //menjumlahkan total harga yang akan di co
        $sumPrice = $transaction->pluck('price');
        foreach ($sumPrice as $sum) {
            $totalPrice += $sum;
        }

        return view('buyer/products', [
            'title' => 'Pembeli: Konfirmasi Pesanan',
            'style' => '/styles/buyer/confirm-orders.css',
            'transaction' => $transaction,
            'seatNumber' => $seatNumber,
            'payment' => $payment,
            'totalProduct' => $totalProduct,
            'totalPrice' => $totalPrice
        ]);
    }



    public function store(Request $request)
    {
        $allTransId = [];
        $allProductsName = [];

        $transaction = json_decode($request->input('transaction'), true);
        $totalPrice = $request->input('totalPrice');
        $payment = $request->input('payment');
        $seatNumber = $request->input('seatNumber');

        //mengambil tiap nilai price dan produk id (PRICE)
        foreach ($transaction as $transact) {
            $allTransId[] = $transact['id'];
            $allProductsName[] = $transact['product']['name'];
        }
        
        //mengubah array menjadi string agar bisa masuk ke dalam kolom db
        $allProductsName = implode(', ', $allProductsName);
        $allTransId = implode(', ', $allTransId);

        //data mass assignment yang akan dimasukkan ke dalam database
        $data = [
            'total_price' => $totalPrice,
            'num_table' => $seatNumber,
            'all_products' => $allProductsName,
            'payment' => $payment,
            'trans_id' => $allTransId
        ];

        HistoryTransaction::create($data);

        $allTransId = explode(', ', $allTransId);

        Transaction::whereIn('id', $allTransId)->update(['status' => true]);

        return redirect()->route('buyer.cart');
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
