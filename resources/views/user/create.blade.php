@extends('master.main')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3>Form Tambah User</h3>
                </div>
                <div class="card-body border-0">
                    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text"
                                class="form-control form-control-alternative @error('nama') is-invalid @enderror"
                                name="nama" id="nama" placeholder="Nama" value="{{ old('nama') }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text"
                                class="form-control form-control-alternative @error('username') is-invalid @enderror"
                                name="username" id="username" placeholder="Username" value="{{ old('username') }}">
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email"
                                class="form-control form-control-alternative @error('email') is-invalid @enderror"
                                name="email" id="email" placeholder="Email" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" id="role" class="form-control form-control-alternative">
                                @foreach ($roles as $item)
                                    <option value="{{ $item->id }}">{{ $item->role }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text"
                                class="form-control form-control-alternative @error('password') is-invalid @enderror"
                                name="password" id="password" placeholder="Password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="gambar">Profil</label>
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
                            <a href="{{ route('user.list') }}" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
