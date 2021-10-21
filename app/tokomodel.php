<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tokomodel extends Model
{
    protected $table = 'barang';
    protected $primaryKey ='id_barang';
    public $timestamps = false;

    protected $fillable = [
        'id_barang','nama_barang','harga','stok','id_supplier'
    ];
}
