<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Two extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:two';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // cache()->put('breeds', ['one', 'two', 'three'], 60);
        $breeds = cache()->get('breeds');

        dd($breeds);
    }
}
