<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\RentedBook;
use App\Mail\SendMailLateReturn;
use Mail;


class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        /**
         * Método responsável por encaminhar um e-mail todo o dia às 16:00 aos leitores com devolução em atraso.
         */
        $schedule->job(function() {
            $renteds = RentedBook::where('return_date', '<' ,date('Y-m-d'))->get();
            foreach ($renteds as $key => $rented) {
                if ( !is_null($rented->reader->email)){
                    Mail::to($rented->reader->email)->send(new SendMailLateReturn($rented));
                }
            }
        })->dailyAt('16:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
