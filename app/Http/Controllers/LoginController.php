<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Buyer;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        return view('/registration/login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email' => 'Email is still empty, please fill it',
            'password' => 'Password is still empty, please fill it'
        ]);

        $tabels = ['admins', 'sellers', 'buyers'];

        foreach ($tabels as $tabel) {
            $account = DB::table($tabel)
                ->select('*')
                ->where('email', $credentials['email'])
                ->where('password', $credentials['password'])
                ->first();

            if (!empty($account)) {
                //Kalo akunnya admin
                if ($account->role == 1) {
                    return redirect()->route('admin')->cookie('account', serialize($account), 1800, '/admin');
                }
                //Kalo akunnya seller
                else if ($account->role == 2) {
                    return redirect()->route('seller')->cookie('account', serialize($account), 1800, '/seller');;
                }
                //kalo akunnya buyer
                else if ($account->role == 3) {
                    return redirect()->route('buyer')->cookie('account', serialize($account), 1800, '/buyer');;
                }
                break;
            }
        }
        return back()->with('loginError', 'Failed');
    }

    public function forgotPw()
    {
        return view('/registration/forgot_pw_enEmail', [
            'title' => 'Lupa Password',
            'style' => '/styles/registration/forgot_pw_enEmail.css'
        ]);
    }

    public function forgotPwNext()
    {
        return view('/registration/forgot_pw_enPass', [
            'title' => 'Lupa Password',
            'style' => '/styles/registration/forgot_pw_enPass.css'
        ]);
    }
}
