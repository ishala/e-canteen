<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\HistoryTransaction;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreHistoryTransactionRequest;
use App\Http\Requests\UpdateHistoryTransactionRequest;


class HistoryTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Transaction $transaction, Product $product)
    {
        $akun = $request->cookie('account');
        $akun = unserialize($akun);

        $transaction = $transaction->with('seller')->with('product')->get();
        if ($transaction !== null) {
            //tampung product id untuk dicari di dalam model produk
            $allProductId[] = '';


            //Mengambil hanya tabel created_at saja
            $createdDate = $transaction->pluck('created_at');

            if ($createdDate !== null) {
                //karena bentuk awal string array, jadikan dalam bentuk array asli
                $createdDate = json_decode($createdDate);
                //lalu ambil indeks ke 0, karena indexnya ada 3, yg 1 dia tanggal
                if (isset($createdDate[0])) {
                    // Jika elemen indeks 0 ada, maka ambil nilainya
                    $createdDate = $createdDate[0];
                    $createdDate = Carbon::parse($createdDate)->format('d F Y');;
                } else {
                    $createdDate = 'Data tidak ditemukan';
                }
            }
        }

        return view('buyer/products', [
            'title' => 'Pembeli: Pesanan',
            'style' => '/styles/buyer/history_orders.css',
            'transactions' => $transaction,
            'createdDate' => $createdDate,
            'account' => $akun
        ]);
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
    public function store(StoreHistoryTransactionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $akun = $request->cookie('account');
        $akun = unserialize($akun);
        $totalTrans = null;

        //Ambil semua data transaksi yang memiliki id seller sama dengan seller yg sdg login
        $transactions = Transaction::with('product')
            ->where('seller_id', $akun->id)
            ->orderBy('num_table')
            ->get();

        // Mengelompokkan data transaksi berdasarkan num_table
        $byTables = $transactions->groupBy('num_table');
        //menghitung banyak table yang ada di dalam per grup meja
        foreach ($byTables as $byTable => $table) {
            $totalTrans = $table->count();
        }



        return view('seller/main_page', [
            'title' => 'Penjual: Lihat Pesanan',
            'style' => '/styles/seller/incoming-orders.css',
            'account' => $akun,
            'transactions' => $byTables,
            'totalOrders' => $totalTrans,
            // 'totalPrice' => $totalPrice
        ]);
    }

    public function showDetail(Request $request, $tables)
    {
        $akun = $request->cookie('account');
        $akun = unserialize($akun);

        $transactions = Transaction::with('product')
            ->where('seller_id', $akun->id)
            ->where('num_table', $tables)
            ->get();

        return view('seller/main_page', [
            'title' => 'Penjual: Detail Pesanan',
            'style' => '/styles/seller/detail-orders.css',
            'account' => $akun,
            'transactions' => $transactions,
            'numTable' => $tables
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $status = $request->input('status');
        $transId = $request->input('transId');

        if ($status !== null && $transId !== null) {
            Transaction::where('id', $transId)->update(['status' => $status]);
        }

        return response()->json($status);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHistoryTransactionRequest $request, HistoryTransaction $historyTransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HistoryTransaction $historyTransaction)
    {
        //
    }
}
