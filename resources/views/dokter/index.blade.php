@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex justify-content-end">
                <a href="#" class="btn btn-md click-primary mx-4" data-bs-toggle="modal" data-bs-target="#modalTambahDokter" data-placement="top" title="Tambah kategori produk">Tambah Dokter</a>
            </div>
            <div class="card m-4" id="peserta">
                <div class="card-body table-responsive">
                    <h3 class="card-title text-center my-1">{{ __('Dokter') }}</h3>
                    <table class="table table-striped" id="pesertatable">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Dokter</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Status</th>
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
                    <h5 class="modal-title" id="modalTambahDokterTitle">Tambah Kategori Produk</h5>
                    <button type="button" class="btn close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Isi form tambah kategori produk di sini -->
                    <form action="{{ route('dokter.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama_dokter">Nama Dokter</label>
                            <input type="text" class="form-control" id="nama_dokter" name="nama_dokter" required>
                        </div>
                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="text" class="form-control" id="nip" name="nip" required>
                        </div>
                        <!-- Modal tambah dokter -->
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="l">Laki-laki</option>
                                <option value="p">Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" required>
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
                    <h5 class="modal-title" id="modalEditKategoriTitle">Edit Data Dokter</h5>
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
                            <label for="nama_dokter">Nama Dokter</label>
                            <input type="text" class="form-control" id="nama_dokter_edit" name="nama_dokter" required>
                        </div>
                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="text" class="form-control" id="nip_edit" name="nip" required>
                        </div>
                        <!-- Modal edit kategori -->
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kelamin_edit" name="jenis_kelamin" required>
                                <option value="l">Laki-laki</option>
                                <option value="p">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat_edit" name="alamat" required>
                        </div>
                        <div class="form-group">
                            <label for="status_kerja">Status Kerja</label>
                            <select class="form-control" id="status_kerja_edit" name="status_kerja" required>
                                <option value="aktif">Onsite</option>
                                <option value="tidak aktif">Libur</option>
                            </select>
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
        var nama_dokter = $('#nama_dokter_edit').val();
        var nip = $('#nip_edit').val(); // Sesuaikan dengan id input NIP pada form edit
        var jenis_kelamin = $('#jenis_kelamin_edit').val(); // Sesuaikan dengan id input Jenis Kelamin pada form edit
        var alamat = $('#alamat_edit').val(); // Sesuaikan dengan id input Alamat pada form edit
        var status_kerja = $('#status_kerja_edit').val(); // Sesuaikan dengan id input Alamat pada form edit

        $.ajax({
            url: "{{ route('dokters.update', ':id') }}".replace(':id', id),
            type: 'PUT',
            data: {
                _token: '{{ csrf_token() }}',
                nama_dokter: nama_dokter,
                nip: nip,
                jenis_kelamin: jenis_kelamin,
                alamat: alamat,
                status_kerja: status_kerja,
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


    function openEditModal(id, nama_dokter, nip, jenis_kelamin, alamat, status_kerja) {
        $('#nama_dokter_edit').val(nama_dokter);
        $('#nip_edit').val(nip);
        $('#jenis_kelamin_edit').val(jenis_kelamin);
        $('#alamat_edit').val(alamat);
        $('#status_kerja_edit').val(status_kerja);
        $('#id_kategori_produk').val(id);
        // Mengubah atribut action pada form untuk menyimpan perubahan pada kategori dengan id tertentu
        $('#formEditKategori').attr('action', '/dokter/' + id);

        // Menampilkan modal edit kategori
        $('#modalEditKategori').modal('show');
    }


$(document).ready(function(){
    $('#pesertatable').DataTable({
        "processing": true,
        "ajax": {
            "url": "{{ route('getDokter') }}", // URL API untuk mengambil data
            "type": "GET",
        },
        "columns": [
            {"data": "id"},
            {"data": "nama_dokter"},
            {"data": "nip"},
            // {"data": "jenis_kelamin"},
            {
                "data": "jenis_kelamin",
                "render": function (data, type, row) {
                    return data === 'l' ? 'Laki-Laki' : 'Perempuan';
                }
            },
            {"data": "alamat"},
            {
                "data": "status_kerja",
                "render": function (data, type, row) {
                    return data === 'aktif' ? 'Onsite' : 'Libur';
                }
            },
            {
                "data": null,
                "render": function(data, type, row) {
                    var actions = ''
                    actions += '<div class="dropdown">';
                    actions += '<button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>';
                    actions += '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
                    actions += '<a class="dropdown-item" href="#" onclick="openEditModal(' + row.id + ', \'' + row.nama_dokter + '\', \'' + row.nip + '\', \'' + row.jenis_kelamin + '\', \'' + row.alamat + '\', \'' + row.status_kerja + '\',)">Edit</a>';
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
