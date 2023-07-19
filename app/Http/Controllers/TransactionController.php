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
            ->where('paid', false)
            ->get();

        $transaction = collect($transaction);
        return view('buyer/products', [
            'title' => 'Pembeli: Keranjang',
            'style' => '/styles/buyer/cart.css',
            'products' => $product,
            'transaction' => $transaction,
            'account' => $akun
        ]);
    }

    public function create(Request $request, $product = null, $qty = null)
    {
        $akun = $request->cookie('account');
        $akun = unserialize($akun);

        if ($product === null && $qty === null) {
            $validatedData = $request->validate([
                'price' => 'required',
                'quantity' => 'required',
                'product_id' => 'required'
            ]);
            $sellerId = Product::select('seller_id')
                ->where('id', $validatedData['product_id'])
                ->value('seller_id');

            $validatedData['buyer_id'] = $akun->id;
            $validatedData['seller_id'] = $sellerId;
            $validatedData['paid'] = false;

            //ubah ke dalam bentuk int
            $validatedData['price'] = intval($validatedData['price']);
            $validatedData['quantity'] = intval($validatedData['quantity']);

            //perkalian ke price dari banyak quantity
            $validatedData['price'] = $validatedData['price'] * $validatedData['quantity'];

            Transaction::create($validatedData);
        } else {

            $product = $product->first();

            $validatedData = [
                'price' => $product->price,
                'quantity' => $qty,
                'paid' => false,
                'status' => '',
                'buyer_id' =>  $akun->id,
                'product_id' => $product->id,
                'seller_id' => $product->seller_id
            ];

            //ubah ke dalam bentuk int
            $validatedData['price'] = intval($validatedData['price']);
            $validatedData['quantity'] = intval($validatedData['quantity']);


            //perkalian ke price dari banyak quantity
            $validatedData['price'] = $validatedData['price'] * $validatedData['quantity'];

            Transaction::create($validatedData);
        }


        return redirect()->route('buyer.cart');
    }

    public function selectTableProcess(Request $request)
    {
        $transactCart = $request->input('productChecked');
        $transactDirect = [
            'qty' => $request->input('quantity'),
            'product_id' => $request->input('product_id')
        ];

        // Cek apakah $transactCart tidak kosong
        if ($transactCart !== null && count($transactCart) > 0) {
            $transactCart = implode(',', $transactCart);
            $request->session()->put('cartIds', $transactCart);

            // Hapus session 'directBuy' jika ada
            $request->session()->forget('directBuy');

            return redirect()->route('buyer.select-table');
        }

        // Cek apakah $transactDirect memiliki semua nilai yang diperlukan
        if (isset($transactDirect['qty'], $transactDirect['product_id'])) {
            $transactDirect = implode(',', $transactDirect);
            $request->session()->put('directBuy', $transactDirect);

            // Hapus session 'cartIds' jika ada
            $request->session()->forget('cartIds');

            return redirect()->route('buyer.select-table');
        }

        // Jika tidak ada nilai yang memenuhi kriteria, kembalikan ke halaman cart
        return redirect()->route('buyer.cart');
    }

    public function selectTable(Request $request)
    {
        $akun = $request->cookie('account');
        $akun = unserialize($akun);

        $transaction = $request->session()->get('cartIds');
        if ($transaction == null) {
            $transaction = $request->session()->get('directBuy');
        }

        return view('buyer/products', [
            'title' => 'Pembeli: Pilih Meja',
            'style' => '/styles/buyer/table.css',
            'transaction' => $transaction,
            'account' => $akun
        ]);
    }

    public function indexProcess(Request $request)
    {

        //PR COBA NANTI KALO NILAINYA DI EKSPLOD LEBIH DR 1 ITU BERARTI BUKAN DIRECT
        $transact = $request->input('cartIds');
        $seatNumber = $request->input('seatNumber');

        if ($transact && $seatNumber) {
            $transact = explode(',', $transact);

            if ($transact !== null && count($transact) > 1) {
                $request->session()->put('cartIds', $transact);

                $request->session()->forget('directBuy');
            } else if ($transact !== null && count($transact) <= 1) {
                $request->session()->put('directBuy', $transact);

                $request->session()->forget('cartIds');
            }

            $request->session()->put('seatNumber', $seatNumber);

            return redirect()->route('buyer.payment');
        }
    }

    public function index(Request $request)
    {
        $akun = $request->cookie('account');
        $akun = unserialize($akun);

        $transaction = $request->session()->get('cartIds');
        if ($transaction == null) {
            $transaction = $request->session()->get('directBuy');
        }

        $transaction = implode(',', $transaction);
        $seatNumber = $request->session()->get('seatNumber');

        return view('buyer/products', [
            'title' => 'Pembeli: Pembayaran',
            'style' => '/styles/buyer/payment.css',
            'transaction' => $transaction,
            'seatNumber' => $seatNumber,
            'account' => $akun
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
        $akun = $request->cookie('account');
        $akun = unserialize($akun);

        $totalProduct = 0;
        $totalPrice = 0;

        $transaction = $request->session()->get('transaction');
        $seatNumber = $request->session()->get('seatNumber');
        $payment = $request->session()->get('payment');

        //Mengubah string transaction menjadi array
        $transaction = explode(',', $transaction);

        if ($transaction !== null) {
            //cek apakah dia ada di model transaction
            $checkFrmWhr = Transaction::whereIn('id', $transaction)->get();
            if ($checkFrmWhr->isEmpty()) {
                //ambil id dari index ke 1 session bernama transaction
                $productId = $transaction[1];
                $qty = $transaction[0];
                //mengambil data produk beserta penjual berdasarkan id yang diambil
                $product = Product::where('id', $productId)->with('seller')->get();

                //buat data transaksi dengan fungsi yang sudah dipakai
                $this->create($request, $product, $qty);
                //cari data transaksi dari ahsil create data transaksi di atas
                $transaction = Transaction::where('product_id', $productId)
                    ->where('buyer_id', $akun->id)
                    ->get();

                //mengambil hanya kolom quantity dan price dari tabel transactions
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
            } else {
                //Mencari data transaksi berdasarkan id yang ditangkap, beserta data productnya
                $transaction = Transaction::whereIn('id', $transaction)->with('product')->get();


                //mengambil hanya kolom quantity dan price dari tabel transactions
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
            }
        }

        return view('buyer/products', [
            'title' => 'Pembeli: Konfirmasi Pesanan',
            'style' => '/styles/buyer/confirm-orders.css',
            'transaction' => $transaction,
            'seatNumber' => $seatNumber,
            'payment' => $payment,
            'totalProduct' => $totalProduct,
            'totalPrice' => $totalPrice,
            'account' => $akun
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
        Transaction::whereIn('id', $allTransId)->update(['paid' => true, 'status' => 'waiting', 'num_table' => $seatNumber]);


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
