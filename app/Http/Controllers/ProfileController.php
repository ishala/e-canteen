<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Buyer;
use App\Models\Seller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function update(Request $request, $role, $id)
    {
        $akun = null;
        if($role == 2){
            $akun = Seller::where('id', $id)->first();

            return view('/registration/edit-profile-seller', [
                'title' => 'Penjual: Edit Profile',
                'style' => '/styles/profile/edit-profile.css',
                'account' => $akun,
                'role' => $role,
                'id' => $id
            ]);
        } else if($role == 3){
            $akun = Buyer::where('id', $id)->first();

            return view('/registration/edit-profile-buyer', [
                'title' => 'Pembeli: Edit Profile',
                'style' => '/styles/profile/edit-profile.css',
                'account' => $akun,
                'role' => $role,
                'id' => $id
            ]);
        }
    }

    public function updateProcess(Request $request) {
        $role = $request->input('role');
        $id = $request->input('id');
        
        if($role == 2){
            $validatedData = $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:6',
                'name' => 'required|max:255',
                'owner' => 'required|max:30',
                'phone' => 'required'
            ]);

            Seller::where('id', $id)->update($validatedData);
        }else if($role == 3){
            $validatedData = $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:6',
                'name' => 'required|max:255'
            ]);
            Buyer::where('id', $id)->update($validatedData);
        }
        return redirect()->route('seller.edit-profile', ['role' => $role, 'id' => $id]);
    }

    public function getLandingPage()
    {
        return view('/others/landing_page', [
            'title' => 'Hello! Selamat Datang di E-Canteen',
            'style' => '/styles/others/landing-page.css'
        ]);
    }

    public function getAboutUs()
    {
        return view('/others/about', [
            'title' => 'About E-Canteen',
            'style' => '/styles/others/about.css'
        ]);
    }
}
