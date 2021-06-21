<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockIn extends Model
{
    use HasFactory;

    protected $fillable=['kode_brg','nama_brg','tanggal_masuk','jumlah','gambar','keterangan'];


}
