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
                                <th>Dokter yang memeriksa</th>
                                <th>Waktu Datang</th>
                                <th>Waktu Periksa</th>
                                <th>Waktu Selesai</th>
                                <th>Durasi Tunggu (Datang -> Periksa)</th>
                                <th>Durasi Periksa (Periksa -> Selesai)</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                                $totalDurasiTunggu = 0;
                                $totalDurasiPeriksa = 0;
                                $countDurasiTunggu = 0;
                                $countDurasiPeriksa = 0;
                                use Carbon\Carbon;
                            @endphp
                            @foreach($antrians->sortBy('waktu_datang') as $antrian)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $antrian->nama_hewan }}</td>
                                <td>{{ $antrian->pendaftaran->nama_dokter }}</td>
                                <td>{{ $antrian->waktu_datang }}</td>
                                <td>{{ $antrian->waktu_periksa }}</td>
                                <td>{{ $antrian->waktu_selesai }}</td>
                                <td>
                                    @if($antrian->waktu_datang && $antrian->waktu_periksa)
                                        @php
                                            $durasiTunggu = Carbon::parse($antrian->waktu_datang)->diffInMinutes(Carbon::parse($antrian->waktu_periksa));
                                            $totalDurasiTunggu += $durasiTunggu;
                                            $countDurasiTunggu++;
                                        @endphp
                                        {{ Carbon::parse($antrian->waktu_datang)->diffForHumans(Carbon::parse($antrian->waktu_periksa), true) }}
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    @if($antrian->waktu_periksa && $antrian->waktu_selesai)
                                        @php
                                            $durasiPeriksa = Carbon::parse($antrian->waktu_periksa)->diffInMinutes(Carbon::parse($antrian->waktu_selesai));
                                            $totalDurasiPeriksa += $durasiPeriksa;
                                            $countDurasiPeriksa++;
                                        @endphp
                                        {{ Carbon::parse($antrian->waktu_periksa)->diffForHumans(Carbon::parse($antrian->waktu_selesai), true) }}
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    @if(!$antrian->waktu_periksa)
                                    <form action="{{ route('antrian.startExamination', $antrian->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-primary">Mulai Periksa</button>
                                    </form>
                                    @elseif(!$antrian->waktu_selesai)
                                    <form action="{{ route('antrian.finishExamination', $antrian->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success">Selesai Periksa</button>
                                    </form>
                                    @endif
                                    <form action="{{ route('antrian.destroy', $antrian->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="6">Total Durasi Tunggu</th>
                                <td colspan="2">
                                    {{ $totalDurasiTunggu }} menit
                                </td>
                            </tr>
                            <tr>
                                <th colspan="6">Total Durasi Periksa</th>
                                <td colspan="2">
                                    {{ $totalDurasiPeriksa }} menit
                                </td>
                            </tr>
                            <tr>
                                <th colspan="6">Rata-rata Durasi Tunggu</th>
                                <td colspan="2">
                                    @if($countDurasiTunggu > 0)
                                        {{ round($totalDurasiTunggu / $countDurasiTunggu) }} menit
                                    @else
                                        N/A
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th colspan="6">Rata-rata Durasi Periksa</th>
                                <td colspan="2">
                                    @if($countDurasiPeriksa > 0)
                                        {{ round($totalDurasiPeriksa / $countDurasiPeriksa) }} menit
                                    @else
                                        N/A
                                    @endif
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
