@extends('master.main')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3>{{$title}}</h3>
                </div>
                <div class="card-body border-0">
                    <form action="{{ route('stockout.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="kode_brg">Kode Barang</label>
                            <input type="text"
                                class="form-control form-control-alternative"
                                name="kode_brg" id="kode_brg" placeholder="Kode Barang" value="{{$row['kode_brg']}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama_brg">Nama Barang</label>
                            <input type="text"
                                class="form-control form-control-alternative"
                                name="nama_brg" id="nama_brg" placeholder="Nama Barang" value="{{$row['nama_brg']}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_keluar">Tanggal Keluar</label>
                                <input class="form-control form-control-alternative @error('tanggal_keluar') is-invalid @enderror" name="tanggal_keluar" type="date" value="{{ date('Y-m-d',strtotime(now())) }}" id="tanggal_keluar">
                            @error('tanggal_keluar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input class="form-control form-control-alternative @error('jumlah') is-invalid @enderror" type="number" name="jumlah" id="jumlah" placeholder="Jumlah" value="{{old('jumlah')}}">
                            @error('jumlah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="penerima">Penerima</label>
                            <input type="text"
                                class="form-control form-control-alternative @error('penerima') is-invalid @enderror"
                                name="penerima" id="penerima" placeholder="Nama Penerima" value="{{old('penerima')}}">
                            @error('penerima')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control form-control-alternative @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan" rows="5">{{old('keterangan')}}</textarea>
                            @error('keterangan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                          </div>

                        <div class="form-group float-right">
                            <a href="{{ route('stockout.index') }}" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-info">Simpan</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
