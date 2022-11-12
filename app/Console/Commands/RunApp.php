<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;

class RunApp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:app';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this task to install dependanceis and run migrations and run seedars';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        exec('composer update');

        //migrate database
        $this->call('migrate:fresh');

        // //seed fake data if there is no data
        if (! Post::first()) {
            $this->call('db:seed');
        }

        //run application
        $this->info('You can access API from: http://127.0.0.1:8000');
        $this->call('serv');
    }
}
