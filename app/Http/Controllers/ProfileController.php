<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        return view('/partials/profile', [
            'style' => '/styles/profile/profile.css'
        ]);
    }

    public function update(){
        return view('/partials/edit-profile', [
            'style' => '/styles/profile/edit-profile.css'
        ]);
    }
}
