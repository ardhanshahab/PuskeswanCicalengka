@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="margin-top: 50px">
                    <div class="card-header">Pendaftaran Pasien</div>

                    <div class="card-body">
                        {{-- Display error messages --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- Display success message --}}
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('antrian.store') }}">
                            @csrf
                            @if (auth()->user()->role == 'member')
                            <div class="form-group my-1">
                                <label for="nama_hewan">Nama Pasien</label>
                                <select name="nama_hewan" id="nama_hewan" class="form-control">
                                    <option selected>Pilih Hewan</option>
                                    @foreach ($hewans as $hewan)
                                        <option value="{{ $hewan->nama_hewan }}">{{ $hewan->nama_hewan }}</option>
                                    @endforeach
                                </select>
                            </div>

                            @else
                            <div class="form-group my-1">
                                <label for="nama_hewan">Nama Pasien</label>
                                <input type="text" class="form-control" id="nama_hewan" name="nama_hewan" value="{{ old('nama_hewan') }}" required>
                            </div>
                            @endif
                            <div class="form-group my-1">
                                <label for="umur">Umur Pasien</label>
                                <input type="text" class="form-control" id="umur" name="umur" value="{{ old('umur') }}" required>
                            </div>

                            <div class="form-group my-1">
                                <label for="jenis_kelamin">Jenis Kelamin Hewan</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                    <option selected>Pilih Jenis Kelamin</option>
                                    <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Jantan</option>
                                    <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Betina</option>
                                </select>
                            </div>

                            <div class="form-group my-1">
                                <label for="jenis_hewan">Jenis Hewan</label>
                                <select class="form-control" id="jenis_hewan" name="jenis_hewan" required>
                                    <option selected>Pilih Jenis Hewan</option>
                                    <option value="Kucing" {{ old('jenis_hewan') == 'Kucing' ? 'selected' : '' }}>Kucing</option>
                                    <option value="Anjing" {{ old('jenis_hewan') == 'Anjing' ? 'selected' : '' }}>Anjing</option>
                                    <option value="Sapi" {{ old('jenis_hewan') == 'Sapi' ? 'selected' : '' }}>Sapi</option>
                                    <option value="Domba" {{ old('jenis_hewan') == 'Domba' ? 'selected' : '' }}>Domba</option>
                                    <option value="Kambing" {{ old('jenis_hewan') == 'Kambing' ? 'selected' : '' }}>Kambing</option>
                                    <option value="Kuda" {{ old('jenis_hewan') == 'Kuda' ? 'selected' : '' }}>Kuda</option>
                                </select>
                            </div>

                            <div class="form-group my-1">
                                <label for="riwayat_penyakit">Riwayat Penyakit</label>
                                <input type="text" class="form-control" id="riwayat_penyakit" name="riwayat_penyakit" value="{{ old('riwayat_penyakit') }}" required>
                            </div>
                            @if (auth()->user()->role == 'member')
                            <div class="form-group my-1">
                                <label for="nama_pemilik">Nama Pemilik</label>
                                <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" value="{{ auth()->user()->name }}" readonly required>
                            </div>
                            @else
                            <div class="form-group my-1">
                                <label for="nama_pemilik">Nama Pemilik</label>
                                <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" value="{{ old('nama_pemilik') }}" required>
                            </div>
                            @endif

                            <div class="form-group my-1">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" required>{{ old('alamat') }}</textarea>
                            </div>

                            <div class="form-group my-1">
                                <label for="no_telp">Nomor Telepon</label>
                                <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ old('no_telp') }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary my-1">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
