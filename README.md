# Laravel starter kit from NoNo Company

With this package, you will be able to create the modules required in the Laravel project in the main directory of the project.


## Installation

Install steps of pure laravel project

```bash
  composer create-project laravel/laravel projectName
  -----------------------------------------------------
  add lines to composer.json file:

  "require": {
        "nonoco/base": "dev-main"
    },
   "repositories": [
        {
            "type": "git",
            "url": "git@github.com:SinanDaryaken/base.git"
        }
    ],
    ---------------------------------------------------
    DB setup .env
    ---------------------------------------------------
    composer update
   ----------------------------------------------------
   php artisan nono:install
   ----------------------------------------------------
   Add line in App/Http/kernel.php:

   'auth.admin' => \App\Http\Middleware\AdminAuthenticate::class,
   -----------------------------------------------------
   Add line in App/Providers/RouteServiceProvider:

   Route::middleware('web')
                ->prefix('admin')
                ->group(base_path('routes/admin/panel/web.php'));
   -----------------------------------------------------
   Add line in App/Providers/AppServiceProvider:

   use Illuminate\Pagination\Paginator;
   Paginator::useBootstrap();
   -----------------------------------------------------
   php artisan migrate:fresh --seed

```