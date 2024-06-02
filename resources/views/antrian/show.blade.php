@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Dokter</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('dokter.update', $dokter->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nama">Nama Dokter</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ $dokter->nama }}" required>
                            </div>

                            <div class="form-group">
                                <label for="spesialisasi">Spesialisasi</label>
                                <input type="text" class="form-control" id="spesialisasi" name="spesialisasi" value="{{ $dokter->spesialisasi }}" required>
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" required>{{ $dokter->alamat }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="no_telepon">Nomor Telepon</label>
                                <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="{{ $dokter->no_telepon }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
