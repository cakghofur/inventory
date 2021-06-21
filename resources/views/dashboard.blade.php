@extends('master.main')
@section('content')
<div class="row">
    <div class="col">
        <div class="card border-0">
            <div class="card-header">
                <h1>Dashboard</h1>
            </div>
            <div class="card-body">
                <h3>Selamat Datang @if (session()->has('akun-admin')) {{ session()->get('akun-admin.nama') }} @endif</h3>
            </div>
        </div>
    </div>
</div>
@endsection
