<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    private $userModel;
    public function __construct()
    {
        $this->userModel=new User();
    }
    public function index()
    {
        $data=[
            'title'=>'Log in',
            'var'=>'login'
        ];
        return view('index',$data);
    }

    public function loginAct(Request $request)
    {
        $request->validate(
            [
                'username'=>'required',
                'password'=>'required'

            ],
            [
                'username.required'=>'Username tidak boleh kosong',
                'password.required'=>'Password tidak boleh kosong',
            ]
        );
        $username=$request->username;
        $cek=$this->userModel->getUsername($username);
        if($cek)
        {
            $password=sha1($request->password);
            if($password==$cek['password'])
            {
                return "Selamat Datang";

            }else{
                return redirect()->back()->with('message','Password Salah!!');
            }
        }else{
            return redirect()->back()->with('message','User Tidak ada');
        }

    }
}