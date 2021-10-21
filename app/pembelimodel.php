<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembelimodel extends Model
{
    protected $table = 'pembeli';
    protected $primaryKey ='id_pembeli';
    public $timestamps = false;

    protected $fillable = [
        'id_pembeli','nama_pembeli','jenis_kelamin','no_telp','alamat'
    ];
}
