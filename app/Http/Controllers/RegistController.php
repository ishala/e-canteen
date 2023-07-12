<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Models\Seller;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class RegistController extends Controller
{
    public function index()
    {
        return view('/registration/register');
    }

    public function role(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:admins|unique:buyers|unique:sellers',
            'password' => 'required|min:5|max:255',
        ]);
        $validatedData = collect($validatedData);

        $request->session()->put('name', $validatedData['name']);
        $request->session()->put('email', $validatedData['email']);
        $request->session()->put('password', $validatedData['password']);

        return redirect('/register/role');
    }

    public function addRoleView(Request $request){
        $data = [
            'name' => $request->session()->get('name'),
            'email' => $request->session()->get('email'),
            'password' => $request->session()->get('password'),
        ];
        
        return view('/registration/role', [
            'style' => '/styles/registration/role.css',
            'data' => $data
        ]);
    }

    public function addRole(Request $request)
    {   
        $createData = $request->all();

        if($createData['role'] == 2){
            dd($createData);
            Seller::create([
                'name' => $createData['name'],
                'email' => $createData['email'],
                'password' => $createData['password'],
                'role' => $createData['role'],
                'owner' => '',
                'phone' => ''
            ]);
            return redirect()->route('account.login');
        }
        else if($createData['role'] == 3){
            dd($createData);
            Buyer::create([
                'name' => $createData['name'],
                'email' => $createData['email'],
                'password' => $createData['password'],
                'role' => $createData['role'],
            ]);
            return redirect()->route('account.login');
        }
        else{
            echo 'Data belum benar';
        }
    }
}
