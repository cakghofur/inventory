@extends('master.main')

@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="card border-0">
                <div class="card-header">

                    <div class="row align-items-center">

                        <div class="col">
                            <h1>Daftar User</h1>

                        </div>
                        <div class="col text-right">
                            <a href="{{ route('user.create') }}" class="btn btn-success">Tambah User</a>

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
                        <table class="table table-hover text-center table-flush table-striped display nowrap" id="table-user"
                            style="width:100%">
                            <thead>
                                <th>No</th>
                                <th>Username</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Gambar</th>
                                <th>Terakhir Login</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @foreach ($user as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row['username'] }}</td>
                                        <td>{{ $row['nama'] }}</td>
                                        <td>{{ $row['email'] }}</td>
                                        <td><img src="{{ asset('assets/admin') }}/img/profil/{{ $row['gambar'] }}"
                                            alt="User Gambar" class="img-fluid"></td>
                                        <td>{{ date('d/m/Y G:i', strtotime($row['login_time'])) }}</td>
                                        <td>
                                            <form action="{{ route('user.destroy', ['id' => $row['id']]) }}"
                                                method="POST" class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-secondary btn-sm text-danger"><i class="ni ni-fat-remove fa-2x"></i></button>
                                            </form>
                                            |
                                            <a href="{{ route('user.edit', ['id'=>$row['id']]) }}" class="btn btn-secondary btn-sm text-warning"><i class="fas fa-edit fa-2x"></i></a>

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
