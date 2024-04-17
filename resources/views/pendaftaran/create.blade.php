@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tambah Pasien Manual</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('pendaftaran.store') }}">
                            @csrf
                           <div class="row">
                            <div class="col-md-6">
                                <div class="form-group my-1">
                                    <label for="nama_hewan">Nama Hewan</label>
                                    <input type="text" class="form-control" id="nama_hewan" name="nama_hewan" required>
                                </div>

                                <div class="form-group my-1">
                                    <label for="jenis_kelamin">Jenis Kelamin Hewan</label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                        <option selected>Pilih Jenis Kelamin</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>

                                <div class="form-group my-1">
                                    <label for="jenis_hewan">Jenis Hewan</label>
                                    <select name="jenis_hewan" id="jenis_hewan" class="form-control">
                                        <option selected>Pilih Hewan</option>
                                        <option value="Kucing">Kucing</option>
                                        <option value="Anjing">Anjing</option>
                                        <option value="Sapi">Sapi</option>
                                        <option value="Kambing">Kambing</option>
                                    </select>
                                </div>

                                <div class="form-group my-1">
                                    <label for="umur">Umur</label>
                                    <input type="text" class="form-control" id="umur" name="umur" required>
                                </div>

                                <div class="form-group my-1">
                                    <label for="nama_pemilik">Nama Pemilik</label>
                                    <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group my-1">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                                </div>

                                <div class="form-group my-1">
                                    <label for="no_telp">Nomor Telepon</label>
                                    <input type="text" class="form-control" id="no_telp" name="no_telp" required>
                                </div>

                                <div class="form-group my-1">
                                    <label for="tanggal_pemeriksaan">Tanggal Pemeriksaan</label>
                                    <input type="date" class="form-control" id="tanggal_pemeriksaan" name="tanggal_pemeriksaan" required>
                                </div>

                                <div class="form-group my-1">
                                    <label for="riwayat_penyakit">Ada Riwayat Penyakit?</label>
                                    <input type="text" class="form-control" id="riwayat_penyakit" name="riwayat_penyakit" required>
                                </div>
                                <div class="float-right">
                                    <button type="submit" class="btn btn-primary my-1">Simpan</button>
                                </div>
                            </div>
                           </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Mendapatkan elemen input tanggal
    var inputTanggal = document.getElementById('tanggal_pemeriksaan');

    // Mendapatkan tanggal hari ini dalam format YYYY-MM-DD
    var today = new Date().toISOString().split('T')[0];

    // Mengatur nilai default input tanggal menjadi tanggal hari ini
    inputTanggal.value = today;
    </script>
@endsection
