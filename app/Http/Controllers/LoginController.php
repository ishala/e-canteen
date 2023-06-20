<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Buyer;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('/registration/login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $tabels = ['admins', 'sellers', 'buyers'];

        foreach ($tabels as $tabel) {
            $account = DB::table($tabel)
            ->select('email', 'password')
            ->where('email', $credentials['email'])
            ->where('password', $credentials['password'])
            ->first();

            if (!empty($account)) {
                break;
            }
        }
        
        if ($account) {
            $request->session()->regenerate();
            return redirect()->intended('/products');
        } else {

            return back()->with('loginError', 'Failed');
        }
    }
}
