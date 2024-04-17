@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tambah Dokter</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('dokter.store') }}">
                            @csrf

                            <div class="form-group my-1">
                                <label for="user_id">Nama Dokter</label>
                                <select class="form-control" id="user_id" name="user_id" required>
                                    @foreach ($users as $user)
                                    <option selected>Pilih Nama Dokter</option>
                                        @if ($user->role == 'dokter')
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group my-1">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" required></textarea>
                            </div>

                            <div class="form-group my-1">
                                <label for="no_telepon">Nomor Telepon</label>
                                <input type="text" class="form-control" id="no_telepon" name="no_telepon" required>
                            </div>

                            <button type="submit" class="btn btn-primary my-1">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
