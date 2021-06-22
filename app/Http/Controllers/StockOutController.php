<?php

namespace App\Http\Controllers;

use App\Models\StockIn;
use App\Models\StockOut;
use Illuminate\Http\Request;

class StockOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=[
            'title'=>'Barang Keluar',
            'var'=>'stockout',
            'stockout'=>StockOut::all()
        ];
        return view('stockout.index',$data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'jumlah'=>'required',
                'penerima'=>'required',
                'tanggal_keluar'=>'date|date_format:Y-m-d'
            ],
            [
                'jumlah.required'=>'Jumlah tidak boleh kosong',
                'penerima.required'=>'Penerima tidak boleh kosong',
                'tanggal_keluar'=>'Harus tipe tanggal'
            ]
            );
        $kode_barang=$request->kode_brg;
        $cek=StockIn::where('kode_brg',$kode_barang)->first();
        if($cek['jumlah']!=0)
        {
            $jumlah=$request->jumlah;
            $jumlah1=$cek['jumlah']-$jumlah;
            if($jumlah1<=0){
                return redirect()->route('stockin.index')->with('pesan-gagal','Stock kurang dari jumlah yang diinput');
            }else{
                StockIn::where('kode_brg',$kode_barang)->update(['jumlah'=>$jumlah1]);
                $save=StockOut::create([
                    'kode_brg'=>$kode_barang,
                    'nama_brg'=>$request->nama_brg,
                    'tanggal_keluar'=>$request->tanggal_keluar,
                    'jumlah'=>$jumlah,
                    'penerima'=>$request->penerima,
                    'keterangan'=>$request->keterangan
                ]);
                if($save)
                {
                    return redirect()->route('stockout.index')->with('pesan-berhasil','Barang berhasil diinput');
                }else{
                    return redirect()->route('stockout.index')->with('pesan-gagal','Barang gagal diinput');

                }
            }
        }else{
            return redirect()->route('stockin.index')->with('pesan-gagal','Stock Barang Kosong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StockOut  $stockOut
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=[
            'title'=>'Detail Barang Keluar',
            'var'=>'stockout',
            'row'=>StockOut::where('id',$id)->first()
        ];
        return view('stockout.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StockOut  $stockOut
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $data=[
    //         'title'=>'Edit Barang Keluar',
    //         'var'=>'stockout',
    //         'row'=>StockOut::where('id',$id)->first(),
    //     ];
    //     return view('stockout.edit',$data);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StockOut  $stockOut
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $request->validate(
    //         [
    //             'jumlah'=>'required',
    //             'penerima'=>'required',
    //             'tanggal_keluar'=>'date|date_format:Y-m-d'
    //         ],
    //         [
    //             'jumlah.required'=>'Jumlah tidak boleh kosong',
    //             'penerima.required'=>'Penerima tidak boleh kosong',
    //             'tanggal_keluar'=>'Harus tipe tanggal'
    //         ]
    //         );
    //     $kode_barang=$request->kode_brg;
    //     $cek=StockIn::where('kode_brg',$kode_barang)->first();
    //     if($cek['jumlah']!=0)
    //     {
    //         $jumlah=$request->jumlah;
    //         $jumlah1=$cek['jumlah']-$jumlah;
    //         if($jumlah1<=0){
    //             return redirect()->route('stockin.index')->with('pesan-gagal','Stock kurang dari jumlah yang diedit');
    //         }else{
    //             StockIn::where('kode_brg',$kode_barang)->update(['jumlah'=>$jumlah1]);
    //             $update=StockOut::where('id',$id)->update([
    //                 'tanggal_keluar'=>$request->tanggal_keluar,
    //                 'jumlah'=>$jumlah,
    //                 'penerima'=>$request->penerima,
    //                 'keterangan'=>$request->keterangan
    //             ]);
    //             if($update)
    //             {
    //                 return redirect()->route('stockout.index')->with('pesan-berhasil','Barang berhasil diedit');
    //             }else{
    //                 return redirect()->route('stockout.index')->with('pesan-gagal','Barang gagal diedit');

    //             }
    //         }
    //     }else{
    //         return redirect()->route('stockin.index')->with('pesan-gagal','Stock Barang Kosong');
    //     }
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StockOut  $stockOut
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=StockOut::where('id',$id)->delete();
        if($delete)
        {
            return redirect()->route('stockout.index')->with('pesan-berhasil','Barang berhasil dihapus');
        }else{
            return redirect()->route('stockout.index')->with('pesan-gagal','Barang Gagal dihapus');
        }
    }

    public function process($id)
    {
        $data=[
            'title'=>'Input Barang Keluar',
            'var'=>'stockout',
            'row'=>StockIn::where('id',$id)->first()
        ];
        return view('stockout.create',$data);
    }
}
