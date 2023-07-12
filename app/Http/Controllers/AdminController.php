<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Seller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Seller $seller)
    {
        if ($request->cookie() != null) {
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
    public function create(Request $request, Seller $seller)
    {
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
            'picture' => 'image|file|max:10240',
            'phone' => 'required',
            'rent' => 'required|min:1',
        ]);

        $validatedData['picture'] = $request->file('picture')->store('mitra-images');
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
            'picture' => 'image|file|max:10240',
            'phone' => 'required',
            'rent' => 'required|min:1',
        ]);

        if($request->file('picture')){
            if($request->oldPicture){
                Storage::delete($request->oldPicture);
            }
            $validatedData['picture'] = $request->file('picture')->store('mitra-images');
        }
        Seller::where('id', $seller->id)->update($validatedData);
        return redirect()->route('admin.detail-mitra', ['seller' => $seller]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Seller $seller)
    {
        $sellerIds = $request->get('sellerChecked');

        //hapus gambar
        if ($sellerIds) {
            foreach($sellerIds as $sellerid){
                $seller = $seller->find($sellerid);
                if($seller->picture){
                    Storage::delete($seller->picture);
                }
            }
        }
        
        //hapus data
        $seller->whereIn('id', $sellerIds)->delete();
        return redirect()->route('admin');
    }

    public function search(Seller $seller, Product $product)
    {
        $seller = $seller->all();
        $product = $product->all();

        return view('/admin/search_mitra', [
            'title' => 'Admin: Cari Mitra',
            'style' => '/styles/admin/search-mitra.css',
            'routeProcess' => '/admin/search-mitra',
            'sellers' => $seller,
            'products' => $product
        ]);
    }

    public function searchControl(Request $request, Seller $seller)
    {
        $name = $request->input('query');
        $dataSeller = $seller->where('name', 'like', '%' . $name . '%')->get();
        $dataAll = $seller->all();

        $data = [
            'dataSeller' => $dataSeller,
            'dataAll' => $dataAll
        ];
        
        return response()->json($data);
    }

    public function totalRevenue()
    {
        return view('/admin/total_revenue', [
            'title' => 'Admin: Total Pendapatan',
        ]);
    }
}
