@extends('master.main')

@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="card border-0">
                <div class="card-header">

                    <div class="row align-items-center">

                        <div class="col">
                            <h1>{{$title}}</h1>

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (session()->has('pesan-berhasil'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <span class="alert-text">{{ session()->get('pesan-berhasil') }}</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @elseif(session()->has('pesan-gagal'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <span class="alert-text">{{ session()->get('pesan-gagal') }}</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                    @endif
                    <div class="table-responsive">
                        <table class="table table-hover text-center table-flush display nowrap" id="stockIn"
                            style="width:100%">
                            <thead>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Tanggal Masuk</th>
                                <th>Jumlah</th>
                                <th>Gambar</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @foreach ($stockin as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row['kode_brg'] }}</td>
                                        <td>{{ $row['nama_brg'] }}</td>
                                        <td>{{ date('G:i', strtotime($row['tanggal_masuk'])) }}</td>
                                        <td>{{ $row['jumlah'] }}</td>
                                        <td><img src="{{ asset('assets/gambar') }}/stockIn/{{ $row['gambar'] }}"
                                                alt="StockIn Gambar"></td>
                                        <td>{{ $row['keterangan'] }}</td>
                                        <td>
                                            <form action="{{ route('stockin.destroy', ['id' => $row['id']]) }}"
                                                method="POST" class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-secondary btn-sm text-danger"><i
                                                        class="ni ni-fat-remove fa-2x"></i></button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
