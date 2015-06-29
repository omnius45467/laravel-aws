<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Marx\Repositories\Contracts\UserRepository;
use App\Marx\Repositories\EloquentUserRepository;
use Illuminate\Support\Facades\Auth;

class DatabaseServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{

		$this->app->bind(UserRepository::class, function () {
			return new EloquentUserRepository(Auth::user());
		});
	}

}
