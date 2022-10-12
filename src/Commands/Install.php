<?php

namespace Nonoco\Base\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class Install
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nono:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create base structure of project';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if(! $this->confirm('Are you sure?')) {
            return;
        }

        $this->copyBladeFiles();

        $this->info("-------------------" . PHP_EOL);
        $this->info(" Install Completed " . PHP_EOL);
        $this->info("-------------------" . PHP_EOL);
    }

    /**
     * @return void
     */
    private function copyBladeFiles()
    {
        @unlink(resource_path('views/welcome.blade.php'));
        $sourceViewPath = __DIR__ . '/../Resources/views';
        $destinationViewPath = resource_path('views');
        File::copyDirectory($sourceViewPath, $destinationViewPath);
        $this->info('All web blades copied to ' . $destinationViewPath);
    }
}