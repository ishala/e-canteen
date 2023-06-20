<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Models\Seller;
use Illuminate\Http\Request;

class RegistController extends Controller
{
    public function index(){
        return view('/registration/register');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:admins|unique:buyers|unique:sellers',
            'role' => 'required|max:1',
            'password' => 'required|min:5|max:255',
            'chkpass' => 'required|min:5|max:255'
        ]);

        if($validatedData){
            if($validatedData['role'] == 2){
                Seller::create($validatedData);
                return redirect('/login');
            }elseif($validatedData['role'] == 3){
                Buyer::create($validatedData);
                return redirect('/login');
            }else{
                return redirect()->back();
            }
            //return redirect()->action([RegistController::class, 'addRole'])->with('data', $validatedData);
        }
    }

    public function addRole(Request $request){
        $data = $request->session()->get('data');
        $role = $request->input('/register/role');

    }

    public function role(){
        return view('/registration/role', [
            'style' => '/styles/registration/role.css',
        ]);
    }
}
