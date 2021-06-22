<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

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
                User::where('id',$cek['id'])->update(['login_time'=>now()]);
                $request->session()->put('akun-admin',$cek);
                return redirect('dashboard/');

            }else{
                return redirect()->back()->with('message','Password Salah!!');
            }
        }else{
            return redirect()->back()->with('message','User Tidak ada');
        }

    }

    public function logout(Request $request)
    {
        $request->session()->forget('akun-admin');
        return redirect()->route('login');

    }

    public function list()
    {
        $data=[
            'title'=>'Daftar user',
            'var'=>'user',
            'user'=>User::all()
        ];
        return view('user.index',$data);
    }

    public function edit($id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function change_password()
    {
        $data = [
            'title' => 'Ganti Password',
            'var'=>'user'
        ];
        return view('user.changePassword', $data);
    }

    public function change(Request $request)
    {
        $request->validate(
            [
                'oldPassword' => 'required',
                'newPassword' => 'min:8|required',
                'confirmPassword' => 'min:8|required|same:newPassword'
            ],
            [
                'newPassword.min' => 'harus lebih dari 8 karakter',
                'oldPassword.required' => 'tidak boleh kosong',
                'newPassword.required' => 'tidak boleh kosong',
                'confirmPassword.required' => 'tidak boleh kosong',
                'confirmPassword.min' => 'harus lebih dari 8 karakter',
                'confirmPassword.same' => 'Konfirmasi password tidak sama dengan password baru',

            ]
        );
        $cek = User::where('id', session()->get('akun-admin.id'))->first();
        if (sha1($request->input('oldPassword')) == $cek['password']) {
            if (sha1($request->input('newPassword')) == $cek['password']) {
                return redirect()->back()->with('message', 'Password tidak boleh sama dengan sebelumnya');
            } else {
                $newPass = sha1($request->input('newPassword'));
                User::where('id', $cek['id'])->update(['password' => $newPass]);
                if($request->session()->get('akun-admin.role_id')==2)
                {
                    return redirect()->route('user.profile');

                }else{
                    return redirect()->route('user.list')->with('pesan-berhasil', 'Password berhasil diubah');
                }
            }
        } else {
            return redirect()->back()->with('message', 'Password salah!!');
        }
    }

    public function myprofile()
    {
        $data = [
            'title' => 'My Profil',
            'var'=>'user'
        ];
        return view('user.myprofil', $data);
    }

    public function create()
    {
        $data=[
            'title'=>'Form Tambah User',
            'var'=>'user',
            'roles' => DB::table('role')->get()
        ];
        return view('user.create',$data);
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required',
                'username' => 'required|unique:users,username',
                'gambar' => 'max:2048|image|mimes:jpg,png,jpeg'
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong',
                'email.required' => 'Email tidak boleh kosong',
                'email.unique' => 'Email sudah digunakan',
                'password.required' => 'Password tidak boleh kosong',
                'username.required' => 'Username tidak boleh kosong',
                'username.unique' => 'Username sudah digunakan',
                'gambar.required' => 'Tidak boleh kosong',
                'gambar.image' => 'Harus tipe gambar'
            ]
        );
        $file = $request->file('gambar');
        if (!$file) {
            $namaGambar = 'default.png';
        } else {
            $request->validate(['gambar' => 'image|mimes:jpg,png,jpeg'], ['gambar.image' => 'Harus tipe gambar']);
            $destinationPath = public_path('assets/admin/img/profil');
            $namaGambar = time() . '.' . $file->getClientOriginalExtension();
            $img = Image::make($file->path());
            $img->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $namaGambar);
        }
        $data = [
            'username' => $request->input('username'),
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'role_id' => $request->input('role'),
            'password' => sha1($request->input('password')),
            'gambar' => $namaGambar,
            'login_time' => now()
        ];
        $save = User::create($data);
        if ($save) {
            return redirect('user')->with('pesan-berhasil', 'Data Berhasil disimpan');
        } else {
            return redirect('user')->with('pesan-gagal', 'Data Gagal disimpan');
        }
    }
}
