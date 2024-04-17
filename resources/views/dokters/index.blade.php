@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-end my-1">
                    {{-- @if ( auth()->user()->jabatan == 'Admin' ) --}}
                        <a href="{{ route('dokter.create') }}" class="btn btn-md btn-success mx-4" data-toggle="tooltip" data-placement="top" title="Tambah User"> Tambah Dokter</a>
                    {{-- @endif --}}
                </div>
                <div class="card card-primary">
                  <div class="card-header" style="background-color: #E3FEF7">
                    <h3 class="card-title">Data Dokter</h3>
                  </div>
                  <div class="card-body">
                    <table class="table table-striped" id="datadokter">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Nama Dokter</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Nomor HP</th>
                                <th scope="col">Status Hari ini</th>
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
        ajax: '{{ route('getdokter') }}',
        columns: [
            { data: 'id' },
            { data: 'user.name' },
            { data: 'alamat' },
            { data: 'no_telepon' },
            {
                data: 'status_kerja',
                render: function(data) {
                    if(data == 0) {
                        return '<span class="badge badge-success">Aktif</span>';
                    } else if(data == 1) {
                        return '<span class="badge badge-danger">Libur</span>';
                    } else {
                        return '';
                    }
                }
            }
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
