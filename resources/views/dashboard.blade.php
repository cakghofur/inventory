@extends('master.main')
@section('content')

<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <div class="card-body">
                <h5>Daftar Barang Masuk</h5>
                <p>Jumlah : {{$jumlah_masuk}}</p>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <div class="card-body">
                <h5>Daftar Barang Keluar</h5>
                <p>Jumlah : {{$jumlah_keluar}}</p>
            </div>
        </div>
    </div>
</div>
@endsection
