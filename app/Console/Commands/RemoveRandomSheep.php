<?php

namespace App\Console\Commands;

use App\Date;
use App\Jobs\RemoveRandomSheepJob;
use Carbon\Carbon;
use Illuminate\Console\Command;

class RemoveRandomSheep extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remove:sheep';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove sheep from random corral';

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
     * @return mixed
     */
    public function handle()
    {
        $counter = 2;

        do {
            $last = Date::whereRaw("description LIKE '%deleted%'")
                        ->orderBy("id", "desc")
                        ->first();

            $date = isset($last->date) ? $last->date : Date::all()->last()->date;
            $addDay = Carbon::parse($date)->addDays(10);
            RemoveRandomSheepJob::dispatch($addDay);
            sleep(100);
        } while ($counter-- > 0);
    }
}
