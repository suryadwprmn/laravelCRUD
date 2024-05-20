<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }

    public function login_proses(Request $request){
        // dd($request->all());
        //email dan password validasi di login
        //jika tidak diisi email dan password maka muncul messagge error di login
        $request -> validate([
        'email' => 'required',
        'password' => 'required'
        ]);

        $data = [
            'email' =>  $request->email,
            'password' => $request ->password
        ];

        //pengecekan auth
        if(Auth::attempt($data)){
            return redirect()->route('admin.dashboard');
        } else{
            return redirect()->route('login')->with('failed', 'Email dan password salah');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success','Kamu berhasil logout');
    }

    public function register(){
        return view('auth.register');
    }

    public function register_proses(Request $request){
        // dd($request->all());
        $request -> validate(
            [
                'nama' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8'
            ]
        );

        $data['name']  = $request ->nama ;
        $data['email']  = $request ->email;
        $data['password'] = Hash::make($request -> password);

        if(User::create($data)){
            return redirect()->route('login');
        }else{
            return redirect()->route('register');
        }

    }
    /**
     * Show the form for creating a new resource.
     */

}
