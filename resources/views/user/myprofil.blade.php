@extends('master.main')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3>Your Profile</h3>
                </div>
                <div class="card-body border-0">
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
                    <form action="#"
                        method="POST" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text"
                                class="form-control form-control-alternative @error('nama') is-invalid @enderror"
                                name="nama" id="nama" placeholder="Nama" value="{{ session()->get('akun-admin.nama') }}"
                                disabled>
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
                                name="username" id="username" placeholder="Username"
                                value="{{ session()->get('akun-admin.username') }}" disabled>
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
                                name="email" id="email" placeholder="Email"
                                value="{{ session()->get('akun-admin.email') }}" disabled>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text"
                                class="form-control form-control-alternative @error('password') is-invalid @enderror"
                                name="password" id="password" placeholder="Password"
                                value="{{ session()->get('akun-admin.password') }}" disabled>
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
                                    <img id="previewImg" width="200" height="200" class="img-thumbnail" alt=""
                                        src="{{ asset('assets/admin') }}/img/profil/{{ session()->get('akun-admin.gambar') }}">
                                </div>
                                <div class="col-md-10 col-sm-12">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('gambar') is-invalid @enderror"
                                            id="gambar" name="gambar" value="{{ session()->get('akun-admin.gambar') }}"
                                            disabled>
                                        @error('gambar')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <label class="custom-file-label disabled"
                                            for="gambar">{{ session()->get('akun-admin.gambar') }}</label>
                                    </div>


                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-primary" id="btnEdit">Edit</button>
                            <button type="submit" class="btn btn-secondary" id="btnUpdate" disabled>Update</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
