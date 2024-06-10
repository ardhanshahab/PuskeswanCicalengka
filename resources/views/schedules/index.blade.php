@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-end">
                {{-- <a href="" class="btn btn-md click-primary mx-4" data-bs-toggle="modal" data-bs-target="#modalTambahDokter" data-placement="top" title="Tambah kategori produk">Tambah Dokter</a> --}}
            </div>
            <div class="card m-4" id="peserta">
                <div class="card-body table-responsive">
                    <h3 class="card-title text-center my-1">{{ __('Jadwal Puskeswan Cicalengka') }}</h3>
                    @foreach($schedules as $schedule)
                        <div class="d-flex justify-content-between align-items-center p-4">
                            @if($schedule->is_holiday)
                                <p class="m-0">{{ $schedule->day }} - Libur</p>
                            @else
                                <p class="m-0">{{ $schedule->day }} {{ $schedule->start_time }} - {{ $schedule->end_time }} {{ $schedule->keterangan }}</p>
                            @endif
                            <a href="{{ route('schedules.edit', $schedule->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Schedule -->
    <div class="modal fade" id="modalEditSchedule" tabindex="-1" aria-labelledby="editScheduleLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="editScheduleForm" method="POST" action="{{ route('schedules.update', 'id') }}">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editScheduleLabel">Edit Jadwal Dokter</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="scheduleId" name="id">
                        <div class="mb-3">
                            <label for="day" class="form-label">Hari</label>
                            <input type="text" class="form-control" id="day" name="day" required>
                        </div>
                        <div class="mb-3">
                            <label for="start_time" class="form-label">Waktu Mulai</label>
                            <input type="time" class="form-control" id="start_time" name="start_time" required>
                        </div>
                        <div class="mb-3">
                            <label for="end_time" class="form-label">Waktu Selesai</label>
                            <input type="time" class="form-control" id="end_time" name="end_time" required>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_holiday" name="is_holiday">
                            <label class="form-check-label" for="is_holiday">
                                Libur
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>
        $('#modalEditSchedule').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var day = button.data('day');
            var start = button.data('start');
            var end = button.data('end');
            var holiday = button.data('holiday');

            console.log('ID:', id);
            console.log('Day:', day);
            console.log('Start:', start);
            console.log('End:', end);
            console.log('Holiday:', holiday);

            var modal = $(this);
            modal.find('#scheduleId').val(id);
            modal.find('#day').val(day);
            modal.find('#start_time').val(start);
            modal.find('#end_time').val(end);
            modal.find('#is_holiday').prop('checked', holiday);

            var action = $('#editScheduleForm').attr('action');
            $('#editScheduleForm').attr('action', action.replace('id', id));
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
</div>
@endsection
