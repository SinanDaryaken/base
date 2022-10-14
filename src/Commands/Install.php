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

//        $this->copyAssetFiles();
//        $this->copyBladeFiles();
//        $this->copyMigrationFiles();
//        $this->copySeederFile();
//        $this->copyModelFile();
//        $this->copyTraitFile();
//        $this->copyRepositoryFile();
//        $this->copyInterfaceFile();
//        $this->copyControllerFile();
//        $this->copyRequestFile();
//        $this->copyRouteFile();
        $this->copyConfigAuthFile();
        $this->copyMiddlewareFile();

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
        @unlink(database_path('seeders/DatabaseSeeder.php'));
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

    /**
     * @return void
     */
    private function copyRouteFile(): void
    {
        // TODO:  change place of the cleaning operation
        $file = base_path('routes/web.php');
        file_put_contents($file, '<?php');
        $this->info("Route file has been cleaned");

        $sourceRoutePath = __DIR__ . '/../Routes/Admin/Panel';
        $destinationRoutePath = base_path('routes/admin/panel/web.php');
        File::copyDirectory($sourceRoutePath, $destinationRoutePath);
        $this->info('All routes copied to ' . $destinationRoutePath);
    }

    /**
     * @return void
     */
    private function copyConfigAuthFile(): void
    {
        // TODO:  change place of the remove operation
        @unlink(base_path('config/auth.php'));
        $this->info("auth config file has been removed");

        $sourceConfigAuthPath = __DIR__ . '/../Config';
        $destinationConfigAuthPath = base_path('config');
        File::copyDirectory($sourceConfigAuthPath, $destinationConfigAuthPath);
        $this->info('auth file copied to ' . $destinationConfigAuthPath);
    }

    /**
     * @return void
     */
    private function copyMiddlewareFile(): void
    {
        $sourceMiddlewarePath = __DIR__ . '/../Http/Middleware/';
        $destinationMiddlewarePath = app_path('Http/Middleware');
        File::copyDirectory($sourceMiddlewarePath, $destinationMiddlewarePath);
        $this->info('All middleware copied to ' . $destinationMiddlewarePath);
    }
}