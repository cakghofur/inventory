@extends('master.main')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card border-0">
                <div class="card-header">
                    <h3>{{$title}}</h3>
                </div>
                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-danger" role="alert">
                            {{ session()->get('message') }}
                        </div>

                    @endif
                    <form action="{{ route('user.change') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="password" id="oldPassword" name="oldPassword"
                                class="form-control form-control-alternative @error('oldPassword') is-invalid @enderror"
                                placeholder="Current Password">
                            @error('oldPassword')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="custom-control custom-control-alternative custom-checkbox mb-4">
                            <input class="custom-control-input" id="showPass" type="checkbox">
                            <label class="custom-control-label" for="showPass">
                                <span class="text-muted">Show Password</span>
                            </label>
                        </div>
                        <div class="form-group">
                            <input type="text" name="newPassword"
                                class="form-control form-control-alternative @error('newPassword') is-invalid @enderror"
                                placeholder="Password Baru">
                            @error('newPassword')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" name="confirmPassword" id="confirmPassword"
                                class="form-control form-control-alternative @error('confirmPassword') is-invalid @enderror"
                                placeholder="Konfirmasi Password">
                            @error('confirmPassword')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="custom-control custom-control-alternative custom-checkbox mb-4">
                            <input class="custom-control-input" id="showPass2" type="checkbox">
                            <label class="custom-control-label" for="showPass2">
                                <span class="text-muted">Show Password</span>
                            </label>
                        </div>
                        <div class="form-group">
                            <a href="{{ route('user.list') }}" class="btn btn-secondary">Batal</a>
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
