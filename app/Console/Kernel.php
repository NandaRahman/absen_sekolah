<?php

namespace App\Console;

use App\Http\Controllers\SMSController;
use App\Models\Absen;
use App\Models\StatusAbsensi;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('inspire')
                 ->hourly();
        $schedule->call(function (){
            $status = StatusAbsensi::all()->where('status','Alpha')->first();
            $absen = Absen::where('status', $status->id)
                ->whereRaw("abs(timestampdiff(day, \"absen_buka\", NOW()))<=6")
                ->get();
            $run = new SMSController();
            foreach ($absen as $val){
                $run->smsGateway();
            }
        })->weekly()->fridays()->at('23:00');
    }
}
