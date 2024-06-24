@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-start my-2">
                        <h6 class="mx-2">Silahkan klik tambah antrian utk mendaftar -></h6>
                        <h6></h6>
                        <a href="{{ route('antrian.create') }}" class="btn btn-primary">Tambah Antrian</a>
                    </div>
                    <div class="d-flex justify-content-start my-2">
                        <h6 class="mx-2">Silahkan klik untuk menambahkan data hewan anda -></h6>
                        <a href="{{ route('hewan.create') }}" class="btn btn-primary">Tambah Data Hewan</a>
                    </div>
                    <div class="card m-4" id="peserta">
                        <div class="card-body table-responsive">
                            <h3 class="card-title text-center my-1">{{ __('Hewan Anda') }}</h3>
                            <table class="table table-striped" id="pesertatable">
                                <thead>
                                  <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Pasien</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Umur</th>
                                    {{-- <th scope="col">Nama Pemilik</th>
                                    <th scope="col">Alamat</th> --}}
                                    {{-- <th scope="col">Riwayat Penyakit</th> --}}
                                    <th scope="col">Aksi</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($hewan as $h)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $h->nama_hewan }}</td>
                                        @if ($h->jenis_kelamin == 'L')
                                            <td>Jantan</td>
                                        @else
                                            <td>Betina</td>
                                        @endif
                                        <td>{{ $h->umur }} Tahun</td>
                                        <td>
                                            <form action="{{ route('hewan.destroy', $h->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
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
    </div>
</div>
@endsection
