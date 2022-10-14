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
//        if(! $this->confirm('Are you sure?')) {
//            return;
//        }

        $this->copyAssetFiles();
        $this->copyBladeFiles();
        $this->copyMigrationFiles();
        $this->copySeederFile();
        $this->copyModelFile();
        $this->copyTraitFile();
        $this->copyRepositoryFile();
        $this->copyInterfaceFile();
        $this->copyControllerFile();
        $this->copyRequestFile();

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
    private function copyMigrationFiles(): void
    {
        $sourceMigrationPath = __DIR__ . '/../Database/Postgres/Migrations';
        $destinationMigrationPath = database_path('migrations');
        File::copyDirectory($sourceMigrationPath, $destinationMigrationPath);
        $this->info('All migration copied to ' . $destinationMigrationPath);
    }

    /**
     * @return void
     */
    private function copySeederFile(): void
    {
        $sourceSeederPath = __DIR__ . '/../Database/Postgres/Seeders';
        $destinationSeederPath = database_path('seeders');
        File::copyDirectory($sourceSeederPath, $destinationSeederPath);
        $this->info('All seeders copied to ' . $destinationSeederPath);
    }

    /**
     * @return void
     */
    private function copyModelFile(): void
    {
        $sourceModelPath = __DIR__ . '/../Models/';
        $destinationModelPath = app_path('Models');
        File::copyDirectory($sourceModelPath, $destinationModelPath);
        $this->info('All models copied to ' . $destinationModelPath);
    }

    /**
     * @return void
     */
    private function copyTraitFile(): void
    {
        $sourceTraitPath = __DIR__ . '/../Traits/';
        $destinationTraitPath = app_path('Traits');
        File::copyDirectory($sourceTraitPath, $destinationTraitPath);
        $this->info('All traits copied to ' . $destinationTraitPath);
    }

    /**
     * @return void
     */
    private function copyRepositoryFile(): void
    {
        $sourceRepositoryPath = __DIR__ . '/../Repositories/';
        $destinationRepositoryPath = app_path('Repositories');
        File::copyDirectory($sourceRepositoryPath, $destinationRepositoryPath);
        $this->info('All repositories copied to ' . $destinationRepositoryPath);
    }

    /**
     * @return void
     */
    private function copyInterfaceFile(): void
    {
        $sourceInterfacePath = __DIR__ . '/../Interfaces/';
        $destinationInterfacePath = app_path('Interfaces');
        File::copyDirectory($sourceInterfacePath, $destinationInterfacePath);
        $this->info('All interfaces copied to ' . $destinationInterfacePath);
    }

    /**
     * @return void
     */
    private function copyControllerFile(): void
    {
        $sourceControllerPath = __DIR__ . '/../Http/Controllers/Admin/Panel/';
        $destinationControllerPath = app_path('Http/Controllers/Admin/Panel');
        File::copyDirectory($sourceControllerPath, $destinationControllerPath);
        $this->info('All controllers copied to ' . $destinationControllerPath);
    }

    /**
     * @return void
     */
    private function copyRequestFile(): void
    {
        $sourceRequestPath = __DIR__ . '/../Http/Requests/Admin/';
        $destinationRequestPath = app_path('Http/Requests/Admin');
        File::copyDirectory($sourceRequestPath, $destinationRequestPath);
        $this->info('All requests copied to ' . $destinationRequestPath);
    }
}