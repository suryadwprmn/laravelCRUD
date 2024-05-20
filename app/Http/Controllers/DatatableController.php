<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\User;
use Yajra\DataTables\Facades\DataTables;

class DatatableController extends Controller
{
    //
    public function serverside(Request $request){

            if($request -> ajax()){
                $data = new User;
                $data = $data -> latest();
                return DataTables::of($data)
                ->addColumn('no',function($data){
                    return $data->id;
                })
                ->addColumn('photo',function($data){
                    return '<img src="'. asset('storage/photo-user/' . $data->image) .'" width="100" />';
                })
                ->addColumn('nama',function($data){
                    return $data ->name;
                })
                ->addColumn('email',function($data){
                    return $data ->email;
                })
                ->addColumn('action',function($data){
                    $editUrl = route('admin.user.edit', $data->id);
                    $deleteUrl = route('admin.user.delete', $data->id);
                    $actionBtn = '<a href="'.$editUrl.'" class="btn btn-warning">Edit</a>
                                  <a href="'.$deleteUrl.'" class="btn btn-danger">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['photo','action'])
                ->make(true);
            }
        return view('datatable.serverside',compact('request'));
    }
    public function clientside(Request $request){
        $data = User::get();
        //mengambil value dari search
        // $search = $request->get('search');

        // $data = User::when($search, function ($query, $search) {
        // return $query->where('name', 'LIKE', '%' . $search . '%') -> orWhere('email', 'LIKE', '%' . $search . '%');
        //  })->get();
        return view('datatable.clientside',compact('data','request'));
    }
}
