<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\HistoryTransaction;
use App\Http\Requests\StoreHistoryTransactionRequest;
use App\Http\Requests\UpdateHistoryTransactionRequest;
use App\Models\Product;
use App\Models\Transaction;

class HistoryTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Transaction $transaction, Product $product)
    {
        $transaction = $transaction->with('seller')->with('product')->get();
        //tampung product id untuk dicari di dalam model produk
        $allProductId[] = '';


        //Mengambil hanya tabel created_at saja
        $createdDate = $transaction->pluck('created_at');

        //karena bentuk awal string array, jadikan dalam bentuk array asli
        //lalu ambil indeks ke 0, karena indexnya ada 3, yg 1 dia tanggal
        $createdDate = json_decode($createdDate)[0];
        $createdDate = Carbon::parse($createdDate)->format('d F Y');;

        return view('buyer/products', [
            'title' => 'Pembeli: Pesanan',
            'style' => '/styles/buyer/history_orders.css',
            'transactions' => $transaction,
            'createdDate' => $createdDate
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
    public function show(HistoryTransaction $historyTransaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HistoryTransaction $historyTransaction)
    {
        //
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
