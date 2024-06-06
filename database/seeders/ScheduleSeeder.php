<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Schedule;

class ScheduleSeeder extends Seeder
{
    public function run()
    {
        $schedules = [
            ['day' => 'Senin', 'start_time' => '08:00:00', 'end_time' => '12:00:00', 'is_holiday' => false],
            ['day' => 'Selasa', 'start_time' => '08:00:00', 'end_time' => '12:00:00', 'is_holiday' => false],
            ['day' => 'Rabu', 'start_time' => '08:00:00', 'end_time' => '12:00:00', 'is_holiday' => false],
            ['day' => 'Kamis', 'start_time' => '08:00:00', 'end_time' => '12:00:00', 'is_holiday' => false],
            ['day' => 'Jumat', 'start_time' => '08:00:00', 'end_time' => '12:00:00', 'is_holiday' => false],
        ];

        foreach ($schedules as $schedule) {
            Schedule::create($schedule);
        }
    }
}
