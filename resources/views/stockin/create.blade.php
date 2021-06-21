@extends('master.main')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3>{{$title}}</h3>
                </div>
                <div class="card-body border-0">
                    <form action="{{ route('stockin.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="kode_brg">Kode Barang</label>
                            <input type="text"
                                class="form-control form-control-alternative @error('kode_brg') is-invalid @enderror"
                                name="kode_brg" id="kode_brg" placeholder="Kode Barang" value="{{ old('kode_brg') }}">
                            @error('kode_brg')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama_brg">Nama Barang</label>
                            <input type="text"
                                class="form-control form-control-alternative @error('nama_brg') is-invalid @enderror"
                                name="nama_brg" id="nama_brg" placeholder="Nama Barang" value="{{ old('nama_brg') }}">
                            @error('nama_brg')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal_masuk">Tanggal Masuk</label>
                                <input class="form-control form-control-alternative @error('tangal_masuk') is-invalid @enderror" name="tanggal_masuk" type="date" value="{{ old('tanggal_masuk') }}" id="tanggal_masuk">
                            @error('tanggal_masuk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input class="form-control form-control-alternative @error('jumlah') is-invalid @enderror" type="number" name="jumlah" id="jumlah" value="{{ old('jumlah') }}">
                            @error('jumlah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <div class="row">
                                <div class="col-md-2 col-sm-12">
                                    <img id="previewImg" width="200" height="200" class="img-thumbnail" alt="">
                                </div>
                                <div class="col-md-10 col-sm-12">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('gambar') is-invalid @enderror"
                                            id="gambar" name="gambar" lang="en">
                                        @error('gambar')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <label class="custom-file-label" for="gambar">Pilih Gambar</label>
                                    </div>


                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control form-control-alternative @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan" rows="5">{{ old('keterangan') }}</textarea>
                            @error('keterangan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                          </div>

                        <div class="form-group float-right">
                            <a href="{{ route('stockin.index') }}" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-info">Simpan</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
