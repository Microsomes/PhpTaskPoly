<?php

namespace App\Console\Commands;

use App\Services\DogCeoService;
use Illuminate\Console\Command;

class PopulateCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:populate-cache';

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
        $dceo = app()->make(DogCeoService::class);

        $dceo->getAllBreeds();
    }
}
