<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;

class PaymentDates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'csv:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate CSV for payment dates';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $date = Carbon::now();
        $month = 0;
        while ($month < 12) {
            $base = Carbon::create('last day of '. $date->format('F Y'));
            $base->isWeekend() ? $base->modify('previous friday') : '';

            $bonus = Carbon::create($date->format('Y-m-10'));
            $bonus->isWeekend() ? $bonus->modify('next tuesday') : '';

            $payments[$month]['Month'] = $date->format('F'); 
            $payments[$month]['Base payment'] = ' '. $base->toDateString(). ' ';
            $payments[$month]['Bonus payment'] = ' '. $bonus->toDateString(). ' ';

            $date->addMonth();
            $month++;  
        }
        $csvExporter = new \Laracsv\Export();
        $csvExporter->build(collect($payments), ['Month', 'Base payment', 'Bonus payment'])->download();
    }
}
