<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockOut extends Model
{
    use HasFactory;

    protected $fillable=['kode_brg','nama_brg','jumlah','tanggal_keluar','penerima','keterangan'];

}
