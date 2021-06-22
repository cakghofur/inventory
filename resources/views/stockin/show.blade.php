@extends('master.main')
@section('content')
<div class="row">
    <div class="col">
        <div class="card border-0 rounded-0">
            <div class="card-header">
                <h1>{{$title}}</h1>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item active" aria-current="true"><strong>Kode Barang :</strong> {{$row['kode_brg']}}</li>
                    <li class="list-group-item"><strong>Nama Barang :</strong>  {{$row['nama_brg']}}</li>
                    <li class="list-group-item"><strong>Jumlah :</strong> {{$row['jumlah']}}</li>
                    <li class="list-group-item"><strong>Tanggal Masuk :</strong> {{date('d/m/Y',strtotime($row['tanggal_masuk']))}}</li>
                    <li class="list-group-item"><strong>Terakhir diedit :</strong> {{$row['updated_at']}}</li>
                    <li class="list-group-item"><strong>Gambar :</strong> <img src="{{asset('assets/gambar/stockIn')}}/{{$row['gambar']}}" class="img-fluid" alt=""></li>
                    <li class="list-group-item"><strong>Keterangan :</strong>  {{$row['keterangan']}}</li>

                  </ul>
            </div>
            <div class="card-footer">
                <a href="{{ route('stockout.process', ['stockout'=>$row['id']]) }}" class="btn btn-success float-right ml-2">Process</a>
                <a href="{{ route('stockin.index') }}" class="btn btn-primary float-right">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
