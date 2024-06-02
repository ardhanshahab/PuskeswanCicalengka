<!DOCTYPE html>
<html>
<head>
    <title>Antrian Puskeswan Cicalengka</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }
        .container h1 {
            margin: 0;
        }
        .container p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Antrian Puskeswan Cicalengka</h1>
        <p>Selamat Datang di Puskeswan Cicalengka, anda berada pada antrian nomor:</p>
        <p>Nomor Antrian:</p>
        <h1>{{ $antrian->nomor_antrian }}</h1>
        <p>Mohon Tunggu, anda akan segera dipanggil</p>
        <p>Nama Hewan: {{ $antrian->nama_hewan }}</p>
        <p>Nama Pemilik: {{ $antrian->nama_pemilik }}</p>
        <p>Waktu Datang: {{ $antrian->waktu_datang }}</p>
        <p>Perkiraan Pemeriksaan: {{ $antrian->perkiraan_pemeriksaan }}</p>
        <p>Riwayat Penyakit Sebelumnya: {{ $antrian->riwayat_penyakit }}</p>
    </div>
</body>
</html>
