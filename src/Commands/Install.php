<?php

namespace Nonoco\Base\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class Install extends Command
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
     * @return void
     */
    public function handle(): void
    {
        if(! $this->confirm('Are you sure?')) {
            return;
        }

        $this->copyAssetFiles();
        $this->copyBladeFiles();
        //copyMigrations
        //copySeeder
        //Models
        //Traits
        //Repository
        //Interface
        //Controller
        //Request

        $this->info("-------------------" . PHP_EOL);
        $this->info(" Install Completed " . PHP_EOL);
        $this->info("-------------------" . PHP_EOL);
    }

    /**
     * @return void
     */
    private function copyAssetFiles(): void
    {
        $sourceAssetPath = __DIR__ . '/../Assets';
        $destinationAssetPath = public_path('assets');
        File::copyDirectory($sourceAssetPath, $destinationAssetPath);
        $this->info('All web assets copied to ' . $destinationAssetPath);
    }

    /**
     * @return void
     */
    private function copyBladeFiles(): void
    {
        @unlink(resource_path('views/welcome.blade.php'));
        $sourceViewPath = __DIR__ . '/../Resources/views';
        $destinationViewPath = resource_path('views');
        File::copyDirectory($sourceViewPath, $destinationViewPath);
        $this->info('All web blades copied to ' . $destinationViewPath);
    }

    /**
     * @return void
     */
    private function copyMigrationFiles()
    {
        $sourceMigrationPath = __DIR__ . '/../Database/Postgres/Migrations';
        $destinationMigrationPath = database_path('migrations');
        File::copyDirectory($sourceMigrationPath, $destinationMigrationPath);
        $this->info('All migration copied to ' . $destinationMigrationPath);
    }
}