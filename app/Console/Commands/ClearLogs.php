<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ClearLogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'logs:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear out all application logs';

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
        //Clear default log
        exec('echo "" > ' . storage_path('logs/laravel.log'));

        //Clear experian log
        exec('echo "" > ' . storage_path('logs/experian.log'));

        //Remove daily logs
        if (glob(storage_path('logs/laravel-*.log'))) {
            exec('rm ' . storage_path('logs/laravel-*.log'));
        }

        $this->info('Logs have been cleared');
    }
}
