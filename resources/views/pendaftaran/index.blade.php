@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-end my-1">
                </div>
                <div class="card card-primary">
                  <div class="card-header" style="background-color: #E3FEF7">
                    <h3 class="card-title text-center">Data Histori Pasien Hewan</h3>
                  </div>
                  <div class="card-body">
                    <table class="table table-striped" id="datadokter">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Nama Hewan</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Umur</th>
                                <th scope="col">Jenis Hewan</th>
                                <th scope="col">Nama Pemilik</th>
                                <th scope="col">Dokter yang memeriksa</th>
                                <th scope="col">Riwayat Penyakit</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>
   $(document).ready(function() {
    var table = $('#datadokter').DataTable({
        processing: true,
        language: {
            processing: '<div class="modal-backdrop show"><div class="card"><div class="card-body"><div class="spinner-border text-primary" role="status"></div></div></div></div>'
        },
        serverSide: false,
        ajax: '{{ route('getPendaftaran') }}',
        columns: [
            { data: 'id' },
            { data: 'nama_hewan' },
            { data: 'hewan.jenis_kelamin' },
            { data: 'hewan.umur' },
            { data: 'hewan.jenis_hewan' },
            { data: 'nama_pemilik' },
            { data: 'nama_dokter' },
            { data: 'riwayat_penyakit' },
            { data: 'status' },
            // {
            //     data: 'status',
            //     render: function(data) {
            //         if(data == 0) {
            //             return '<span class="badge badge-success">Aktif</span>';
            //         } else if(data == 1) {
            //             return '<span class="badge badge-danger">Libur</span>';
            //         } else {
            //             return '';
            //         }
            //     }
            // }
        ]
    });
});
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
