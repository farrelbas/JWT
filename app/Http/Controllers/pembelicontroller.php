<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pembelimodel;
use Illuminate\support\Facades\Validator;

class pembelicontroller extends Controller
{
    public function store(Request $req)
    {
         $validator = Validator::make($req->all(),[
                'nama_pembeli'=>'required',
                'jenis_kelamin'=>'required',

         ]);
         if($validator->fails()){
             return Response()->json($validator->errors());

         }
         $simpan = pembelimodel::create([
            'nama_pembeli'  =>$req->nama_pembeli,
            'jenis_kelamin' =>$req->jenis_kelamin,
            'no_telp'       =>$req->no_telp,
            'alamat'        =>$req->alamat,
         ]);
         if($simpan){
             return Response()->json(['status'=>1]); 
         }else{
             return Response()->json(['status'=>0 ]);
         }
    } 
    public function update(Request $req,$id)
    {
        $validator = Validator::make($req->all(),[
            'nama_pembeli'=>'required',
            'jenis_kelamin'=>'required',

     ]);
     if($validator->fails()){
         return Response()->json($validator->errors());

     }
     $ubah=pembelimodel::where('id_pembeli',$id)->update([
        'nama_pembeli'  =>$req->nama_pembeli,
        'jenis_kelamin' =>$req->jenis_kelamin,
        'no_telp'       =>$req->no_telp,
        'alamat'        =>$req->alamat,
     ]);
     if($ubah){
        return Response()->json(['status'=>1]);
     }else{
        return Response()->json(['status'=>0]);
     }
    }
    public function hapus($id)
    {
        $delete=pembelimodel::where('id_pembeli',$id)->delete();
        if($delete){
            return Response()->json(['status'=>1]);
        }else{
            return Response()->json(['status'=>0]);
        }
    }
    public function getpembeli()
    {
        $getpembeli=pembelimodel::get();
        return Response()->json(['data'=>$getpembeli]);
    }
    public function getpembelitransaksi()
    {
        $pembeli=pembelimodel::join('transaksi','transaksi.id_transaksi','pembeli.id_pembeli')->get();
        return Response()->json(['data'=>$pembeli]);
    }
    public function getpembelitransaksi_leftjoin()
    {
        $pembeli=pembelimodel::leftJoin('transaksi','transaksi.id_transaksi','pembeli.id_pembeli')->get();
        return Response()->json(['data'=>$pembeli]);
    }
    public function getpembelitransaksi_rightjoin()
    {
        $pembeli=pembelimodel::rightJoin('transaksi','transaksi.id_transaksi','pembeli.id_pembeli')->get();
        return Response()->json(['data'=>$pembeli]);
    }
}
