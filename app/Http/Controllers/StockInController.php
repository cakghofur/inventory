<?php

namespace App\Http\Controllers;

use App\Models\StockIn;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class StockInController extends Controller
{
    private $stockIn;
    public function __construct()
    {
        $this->stockIn=new StockIn();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=[
            'title'=>'Barang Masuk',
            'var'=>'stockin',
            'stockin'=>StockIn::All()
        ];
        return view('stockin.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=[
            'title'=>'Input Barang Masuk',
            'var'=>'stockin',
        ];
        return view('stockin.create',$data);
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
                'kode_brg'=>'required',
                'nama_brg'=>'required',
                'tanggal_masuk'=>'required|date|date_format:Y-m-d',
                'jumlah'=>'required',
                'gambar'=>'max:2048|image|mimes:jpg,png,jpeg'
            ],
            [
                'kode_brg.required'=>'Kode barang tidak boleh kosong',
                'nama_brg.required'=>'Nama barang tidak boleh kosong',
                'tanggal_masuk.required'=>'Tanggal masuk tidak boleh kosong',
                'tanggal_masuk.date_format'=>'Tanggal tidak sesuai',
                'jumlah.required'=>'Jumlah tidak boleh kosong',
                'gambar.image'=>'Harus tipe gambar'

            ]
            );
        $kode_barang=$request->kode_brg;
        $file=$request->file('gambar');
        if(!$file)
        {
            $namaGambar="default.png";
        }else{
            $request->validate(['gambar' => 'image|mimes:jpg,png,jpeg'], ['gambar.image' => 'Harus tipe gambar']);
            $destinationPath = public_path('assets/gambar/stockIn');
            $namaGambar =  $kode_barang. '.' . $file->getClientOriginalExtension();
            $img = Image::make($file->path());
            $img->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $namaGambar);
        }
        $data=[
            'kode_brg'=>$kode_barang,
            'nama_brg'=>$request->nama_brg,
            'tanggal_masuk'=>date('Y-m-d',strtotime($request->tanggal_masuk)),
            'jumlah'=>$request->jumlah,
            'gambar'=>$namaGambar,
            'keterangan'=>$request->keterangan
        ];
        $save=StockIn::create($data);
        if($save)
        {
            return redirect()->route('stockin.index')->with('pesan-berhasil','Barang berhasil diinput');
        }else{
            return redirect()->route('stockin.index')->with('pesan-gagal','Barang gagal diinput');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StockIn  $stockIn
     * @return \Illuminate\Http\Response
     */
    public function edit(StockIn $stockIn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StockIn  $stockIn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StockIn $stockIn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StockIn  $stockIn
     * @return \Illuminate\Http\Response
     */
    public function destroy(StockIn $stockIn)
    {
        $cek=StockIn::where('id',$stockIn->id)->first();
        $delete=StockIn::where('id',$stockIn->id)->delete();
        if($delete)
        {
            if (!$cek['gambar'] == 'default.png') {

                unlink(public_path('assets/gambar/stockIn/' . $cek['gambar']));
            }
            return redirect()->route('stockin.index')->with('pesan-berhasil','Barang berhasil dihapus');
        }else{
            return redirect()->route('stockin.index')->with('pesan-gagal','Barang Gagal dihapus');
        }
    }
}
