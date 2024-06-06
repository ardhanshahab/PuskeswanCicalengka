@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end my-2">
                        <a href="{{ route('antrian.create') }}" class="btn btn-primary">Tambah Antrian</a>
                    </div>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Hewan</th>
                                <th>Waktu Datang</th>
                                <th>Waktu Periksa</th>
                                <th>Waktu Selesai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($antrians as $antrian)
                            <tr>
                                <td>{{ $antrian->nomor_antrian }}</td>
                                <td>{{ $antrian->nama_hewan }}</td>
                                <td>{{ $antrian->waktu_datang }}</td>
                                <td>{{ $antrian->waktu_periksa }}</td>
                                <td>{{ $antrian->waktu_selesai }}</td>
                                <td>
                                    @if(!$antrian->waktu_periksa)
                                    <form action="{{ route('antrian.startExamination', $antrian->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Mulai Periksa</button>
                                    </form>
                                    @elseif(!$antrian->waktu_selesai)
                                    <form action="{{ route('antrian.finishExamination', $antrian->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Selesai Periksa</button>
                                    </form>
                                    @endif
                                    <form action="{{ route('antrian.destroy', $antrian->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
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
@endsection
