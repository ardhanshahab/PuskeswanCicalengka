@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Jadwal Dokter') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('schedules.update', $schedule->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="day" class="form-label">{{ __('Hari') }}</label>
                            <input id="day" type="text" class="form-control @error('day') is-invalid @enderror" name="day" value="{{ $schedule->day }}" required autofocus>

                            @error('day')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="start_time" class="form-label">{{ __('Waktu Mulai') }}</label>
                            <input id="start_time" type="time" class="form-control @error('start_time') is-invalid @enderror" name="start_time" value="{{ $schedule->start_time }}" required>

                            @error('start_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="end_time" class="form-label">{{ __('Waktu Selesai') }}</label>
                            <input id="end_time" type="time" class="form-control @error('end_time') is-invalid @enderror" name="end_time" value="{{ $schedule->end_time }}" required>

                            @error('end_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-check">
                            <input type="hidden" name="is_holiday" value="0">
                            <input type="checkbox" class="form-check-input" id="is_holiday_checkbox" name="is_holiday" {{ $schedule->is_holiday ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_holiday_checkbox">{{ __('Libur') }}</label>
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#is_holiday_checkbox').change(function() {
            if($(this).is(":checked")) {
                $('input[name="is_holiday"]').val('1');
            } else {
                $('input[name="is_holiday"]').val('0');
            }
        });
    });
</script>
@endsection
