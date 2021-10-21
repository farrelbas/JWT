<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tokomodel;
use Illuminate\support\Facades\Validator;

class tokocontroller extends Controller
{
    public function store(Request $req)
    {
         $validator = Validator::make($req->all(),[
                'nama_barang'=>'required',
                'harga'=>'required',
                
         ]);
         if($validator->fails()){
             return Response()->json($validator->errors());

         }
         $simpan = tokomodel::create([
            'nama_barang'=>$req->nama_barang,
            'harga'=>$req->harga,
            'stok'=>$req->stok,
         ]);
         if($simpan){
             return Response()->json(['status'=>1]); 
         }else{
             return Response()->json(['status'=>0 ]);
         }
    }
}