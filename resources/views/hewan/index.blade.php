@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex justify-content-end">
                <a href="#" class="btn btn-md click-primary mx-4" data-bs-toggle="modal" data-bs-target="#modalTambahDokter" data-placement="top" title="Tambah kategori produk">Tambah Pasien</a>
            </div>
            <div class="card m-4" id="peserta">
                <div class="card-body table-responsive">
                    <h3 class="card-title text-center my-1">{{ __('Pasien') }}</h3>
                    <table class="table table-striped" id="pesertatable">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Pasien</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Umur</th>
                            <th scope="col">Nama Pemilik</th>
                            <th scope="col">Alamat</th>
                            {{-- <th scope="col">Riwayat Penyakit</th> --}}
                            <th scope="col">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Spinner -->
    <div class="modal fade" id="loadingModal" tabindex="-1" aria-labelledby="spinnerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="loader"></div>
                        <div clas="loader-txt">
                            <p>Mohon Tunggu..</p>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalTambahDokter" tabindex="-1" role="dialog" aria-labelledby="modalTambahDokterTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahDokterTitle">Tambah Data Hewan</h5>
                    <button type="button" class="btn close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Isi form tambah kategori produk di sini -->
                    <form action="{{ route('dokter.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama_pasien">Nama Pasien</label>
                            <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                        </div>
                        <div class="form-group">
                            <label for="umur">Umur</label>
                            <input type="text" class="form-control" id="umur" name="umur" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_pemilik">Nama Pemilik</label>
                            <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" required>
                        </div>
                        <div class="form-group">
                            <label for="riwayat_penyakit">Riwayat Penyakit</label>
                            <input type="text" class="form-control" id="riwayat_penyakit" name="riwayat_penyakit" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEditKategori" tabindex="-1" role="dialog" aria-labelledby="modalEditKategoriTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditKategoriTitle">Edit Data Hewan</h5>
                    <button type="button" class="btn close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Isi form Edit kategori produk di sini -->
                    <form id="formEditKategori" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <input type="hidden" name="id_kategori_produk" id="id_kategori_produk" value="">
                            <label for="nama_pasien">Nama Pasien</label>
                            <input type="text" class="form-control" id="nama_pasien_edit" name="nama_pasien" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <input type="text" class="form-control" id="jenis_kelamin_edit" name="jenis_kelamin" required>
                        </div>
                        <div class="form-group">
                            <label for="umur">Umur</label>
                            <input type="text" class="form-control" id="umur_edit" name="umur" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_pemilik">Nama Pemilik</label>
                            <input type="text" class="form-control" id="nama_pemilik_edit" name="nama_pemilik" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat_edit" name="alamat" required>
                        </div>
                        <div class="form-group">
                            <label for="riwayat_penyakit">Riwayat Penyakit</label>
                            <input type="text" class="form-control" id="riwayat_penyakit_edit" name="riwayat_penyakit" required>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="updateKategori()">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



</div>
<style>
    .loader {
    position: relative;
    text-align: center;
    margin: 15px auto 35px auto;
    z-index: 9999;
    display: block;
    width: 80px;
    height: 80px;
    border: 10px solid rgba(0, 0, 0, .3);
    border-radius: 50%;
    border-top-color: #000;
    animation: spin 1s ease-in-out infinite;
    -webkit-animation: spin 1s ease-in-out infinite;
    }

    @keyframes spin {
    to {
        -webkit-transform: rotate(360deg);
    }
    }

    @-webkit-keyframes spin {
    to {
        -webkit-transform: rotate(360deg);
    }
    }
    .modal-content {
    border-radius: 0px;
    box-shadow: 0 0 20px 8px rgba(0, 0, 0, 0.7);
    }

    .modal-backdrop.show {
    opacity: 0.75;
    }

    .loader-txt {
    p {
        font-size: 13px;
        color: #666;
        small {
        font-size: 11.5px;
        color: #999;
        }
    }
    }
</style>
@push('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

<script>
    function updateKategori() {
        var id = $('#id_kategori_produk').val();
        var nama_pasien = $('#nama_pasien_edit').val();
        var jenis_kelamin = $('#jenis_kelamin_edit').val();
        var umur = $('#umur_edit').val();
        var nama_pemilik = $('#nama_pemilik_edit').val();
        var alamat = $('#alamat_edit').val();
        var riwayat_penyakit = $('#riwayat_penyakit_edit').val();

        $.ajax({
            url: "{{ route('pasiens.update', ':id') }}".replace(':id', id),
            type: 'PUT',
            data: {
                _token: '{{ csrf_token() }}',
                nama_pasien: nama_pasien,
                jenis_kelamin: jenis_kelamin,
                umur: umur,
                nama_pemilik: nama_pemilik,
                alamat: alamat,
                riwayat_penyakit: riwayat_penyakit
            },
            success: function(response) {
                console.log(response);
                $('#modalEditKategori').modal('hide');
                location.reload();
            },
            error: function(xhr) {
                console.error(xhr.responseText);
            }
        });
    }



    function openEditModal(id, nama_pasien, jenis_kelamin, umur, nama_pemilik, alamat, riwayat_penyakit) {
        $('#nama_pasien_edit').val(nama_pasien);
        $('#jenis_kelamin_edit').val(jenis_kelamin);
        $('#umur_edit').val(umur);
        $('#nama_pemilik_edit').val(nama_pemilik);
        $('#alamat_edit').val(alamat);
        $('#riwayat_penyakit_edit').val(riwayat_penyakit);
        $('#id_kategori_produk').val(id);
        // Mengubah atribut action pada form untuk menyimpan perubahan pada kategori dengan id tertentu
        $('#formEditKategori').attr('action', '/pasiens/' + id);

        // Menampilkan modal edit kategori
        $('#modalEditKategori').modal('show');
    }



$(document).ready(function(){
    $('#pesertatable').DataTable({
        "processing": true,
        "ajax": {
            "url": "{{ route('getPasien') }}", // URL API untuk mengambil data
            "type": "GET",
        },
        "columns": [
            {"data": "id"},
            {"data": "nama_hewan"},
            {
                "data": "jenis_kelamin",
                "render": function(data, type, row) {
                    return data === 'L' ? 'Laki-laki' : 'Perempuan';
                }
            },
            {
                "data": "umur",
                "render": function(data, type, row) {
                    return data + ' tahun';
                }
            },
            {"data": "nama_pemilik"},
            {"data": "alamat"},
            // {"data": "riwayat_penyakit"},
            {
                "data": null,
                "render": function(data, type, row) {
                    var actions = ''
                    actions += '<div class="dropdown">';
                    actions += '<button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>';
                    actions += '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
                    actions += '<a class="dropdown-item" href="#" onclick="openEditModal(' + row.id + ', \'' + row.nama_pasien + '\', \'' + row.umur + '\', \'' + row.jenis_kelamin + '\', \'' + row.nama_pemilik + '\', \'' + row.riwayat_penyakit + '\', \'' + row.alamat + '\')">Edit</a>';
                    actions += '<form onsubmit="return confirm(\'Apakah Anda Yakin ?\');" action="/dokter/' + row.id + '" method="POST">';
                    actions += '<input type="hidden" name="_method" value="DELETE">';
                    actions += '<input type="hidden" name="_token" value="' + '{{ csrf_token() }}' + '">';
                    actions += '<button type="submit" class="dropdown-item">Hapus</button>';
                    actions += '</form>';
                    actions += '</div>';
                    actions += '</div>';
                    return actions;
                }
            }

        ],
    });


});

</script>
@endpush
@endsection
