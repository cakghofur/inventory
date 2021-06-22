<?php

namespace App\Http\Controllers;

use App\Models\StockIn;
use App\Models\StockOut;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data=[
            'title'=>'Dashboard',
            'var'=>'dashboard',
            'jumlah_masuk'=>StockIn::count(),
            'jumlah_keluar'=>StockOut::count()
        ];
        return view('dashboard',$data);
    }
}
