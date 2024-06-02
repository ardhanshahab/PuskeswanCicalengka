@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 d-block justify-content-center">
                <h1>Antrian Puskeswan Cicalengka</h1>
                <p>Selamat Datang di Puskeswan Cicalengka, anda berada pada antrian nomor :</p>
                <p>Nomor Antrian: </p><h1>1</h1>
                <p>Mohon Tunggu, anda akan segera dipanggil</p>
                <p>Nama Hewan: {{ $antrian->nama_hewan }}</p>
                <p>Nama Pemilik: {{ $antrian->nama_pemilik }}</p>
                <p>Waktu Datang: {{ $antrian->waktu_datang }}</p>
                <p>Perkiraan Pemeriksaan: {{ $antrian->perkiraan_pemeriksaan }}</p>
                <p>Riwayat Penyakit Sebelumnya: {{ $antrian->riwayat_penyakit }}</p>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>
</script>
<style>
    .modal-backdrop {
        display: flex !important;
        align-items: center;
        justify-content: center;
        background-color: rgba(0, 0, 0, 0.5);
    }
</style>
@endsection
