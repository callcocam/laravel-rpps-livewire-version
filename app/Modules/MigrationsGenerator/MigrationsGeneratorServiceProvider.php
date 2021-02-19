<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */
namespace SIGA\MigrationsGenerator;

use SIGA\MigrationsGenerator\Generators\Commands\MigrateAlterCommand;
use Illuminate\Support\ServiceProvider;
use SIGA\MigrationsGenerator\Generators\Commands\MigrateGenerateCommand;
use SIGA\MigrationsGenerator\Seed\IseedServiceProvider;

class MigrationsGeneratorServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{


        $this->mergeConfigFrom(
            __DIR__.'/config/generators.php', 'generators'
        );
        $this->app->register(IseedServiceProvider::class);
		$this->app->singleton('migration.generate',
            function($app) {
                return new MigrateGenerateCommand(
                    $app->make('SIGA\MigrationsGenerator\Generators\Generator'),
                    $app->make('SIGA\MigrationsGenerator\Generators\Filesystem\Filesystem'),
                    $app->make('SIGA\MigrationsGenerator\Generators\Compilers\TemplateCompiler'),
                    $app->make('migration.repository'),
                    $app->make('config')
                );
            });

		$this->commands('migration.generate');

		$this->app->singleton('migration.alter',
            function($app) {
                return new MigrateAlterCommand(
                    $app->make('SIGA\MigrationsGenerator\Generators\Generator'),
                    $app->make('SIGA\MigrationsGenerator\Generators\Filesystem\Filesystem'),
                    $app->make('SIGA\MigrationsGenerator\Generators\Compilers\TemplateCompiler'),
                    $app->make('migration.repository'),
                    $app->make('config')
                );
            });

		$this->commands('migration.alter');

		// Bind the Repository Interface to $app['migrations.repository']
		$this->app->bind('Illuminate\Database\Migrations\MigrationRepositoryInterface', function($app) {
			return $app['migration.repository'];
		});
	}

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
