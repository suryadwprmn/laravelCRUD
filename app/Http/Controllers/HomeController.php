<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    //
    public function dashboard(){
        return view('dashboard');
    }

    public function index(Request $request){
        $data = User::get();
        //mengambil value dari search
        $search = $request->get('search');

        $data = User::when($search, function ($query, $search) {
        return $query->where('name', 'LIKE', '%' . $search . '%') -> orWhere('email', 'LIKE', '%' . $search . '%');
         })->get();
        return view('index',compact('data','request'));
    }

    public function create(){
        return view('create');
    }
    public function store(Request $request){
        //untuk vardump
        // dd($request->all());

    $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
        'photo' => 'required|mimes:png,jpg,jpeg|max:2048',
        'nama' => 'required',
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withInput()->withErrors($validator);
    }
    //mengambil name="photo" dari create.blade.php
    $photo = $request -> file('photo');
    //merubah nama foto menajdi tanggal + nama photo
    $filename = date('Y-m-d').$photo -> getClientOriginalName();
    //memasukan ke storage/app/public folder photo-user
    $path = 'photo-user/' . $filename;

    Storage::disk('public')->put($path,file_get_contents($photo));

    $data = new User();
    $data->name = $request->nama;
    $data->email = $request->email;
    $data->password = Hash::make($request->password);
    $data->image = $filename;
    $data->save();

    return redirect()->route('admin.index');
    }

    public function edit(Request $request, $id){
        $data = User::find($id);
        return view('edit',compact('data'));
    }

    public function update(Request $request, $id){
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'photo' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $user = User::findOrFail($id);
        //Jika ada foto baru yang diunggah
        if($request -> hasFile('photo')){
            // Menghapus foto lama jika ada
            if($user -> image){
                Storage::disk('public')->delete('photo-user/' .$user -> image);
            }

            // Mengambil file foto yang diunggah
        $photo = $request->file('photo');
        // Menamai file baru dengan format tanggal + nama file asli
        $filename = date('Y-m-d') . $photo->getClientOriginalName();
        // Menyimpan file foto baru ke direktori storage
        $path = 'photo-user/' . $filename;
        Storage::disk('public')->put($path, file_get_contents($photo));
        // Mengupdate nama file foto baru ke dalam database
        $user->image = $filename;
        }
        $user->name = $request->nama;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('admin.index');
    }

    public function delete(Request $request, $id){
    $data = User::find($id);

   if($data ->image){
        Storage::disk('public')->delete('photo-user/' . $data->image);
    }
     return redirect()->route('admin.index');
    }

}
