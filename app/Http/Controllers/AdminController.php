<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Product;
use App\Models\Seller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Seller $seller)
    {
        if($request->cookie() != null){
            $akun = $request->cookie('account');
            $akun = unserialize($akun);
            
            return view('admin/main_page_admin', [
                'title' => 'Admin: Semua Mitra',
                'style' => '/styles/admin/main-page.css',
                'sellers' => $seller->all(),
                'account' => $akun
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, Seller $seller){
        return view('/admin/add_mitra', [
            'title' => 'Tambah Mitra',
            'seller' => $seller
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'owner' => 'required|max:255',
            'email' => 'required|email|unique:admins|unique:buyers|unique:sellers',
            'password' => 'required|min:5|max:255',
            'phone' => 'required',
            'rent' => 'required|min:1',
        ]);

        $validatedData['role'] = 2;

        Seller::create($validatedData);
        return redirect()->route('admin');
    }

    /**
     * Display the specified resource.
     */
    public function edit(Seller $seller)
    {
        return view('/admin/edit_mitra', [
            'title' => 'Edit Mitra',
            'seller' => $seller
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function show(Seller $seller)
    {
        return view('admin/detail_mitra', [
            'title' => 'Detail Mitra',
            //'style' => ''
            'seller' => $seller
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Seller $seller)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'owner' => 'required|max:255',
            'email' => 'required',
            'password' => 'required|min:5|max:255',
            'phone' => 'required',
            'rent' => 'required|min:1',
        ]);

        Seller::where('id', $seller->id)->update($validatedData);
        return redirect()->route('admin.detail-mitra', ['seller' => $seller]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Seller $seller)
    {
        $sellerId = $request->get('sellerChecked');
        $seller->whereIn('id', $sellerId)->delete();

        return redirect()->route('admin');
    }

    public function search(Seller $seller, Product $product){
        $seller = $seller->all();
        $product = $product->all();
        
        return view('/admin/search_mitra', [
            'title' => 'Cari Mitra',
            'style' => '/styles/admin/search-mitra.css',
            'sellers' => $seller,
            'products' => $product
        ]);
    }

    public function totalRevenue(){
        return view('/admin/total_revenue', [
            'title' => 'Edit Mitra',
            'style' => '/styles/admin/revenue.css'
        ]);
    }
}
