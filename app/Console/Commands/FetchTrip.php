<?php

namespace App\Console\Commands;

use App\Http\Controllers\FetchController;
use Illuminate\Console\Command;

class FetchTrip extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:trip';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Populating data and save it to database';

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
        app(FetchController::class)->fetchData();
    }
}
