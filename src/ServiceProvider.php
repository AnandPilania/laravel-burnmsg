<?php

namespace AP\Burnmsg;

use Illuminate\Support\ServiceProvider as Base;

class ServiceProvider extends Base
{
	protected $defer = false;
	
	public function register()
	{
		$this->mergeConfigFrom(__DIR__.'/../config/config.php', 'burnmsg');
		
		$this->app->bind('AP\Burnmsg\Contract', 'AP\Burnmsg\Repository');
		$this->app->singleton('burnmsg', 'AP\Burnmsg\Contract');
	}
	
	public function boot()
	{
		$this->registerRoutes();
		
		$this->loadViewsFrom(__DIR__.'/../resources/views', 'burnmsg');
		$this->loadTranslationsFrom(__DIR__.'/../resources/langs', 'burnmsg');
		$this->loadMigrationsFrom(__DIR__.'/../migrations');
		
		$this->publishes([__DIR__.'/../config/config.php' => config_path('burnmsg.php')], 'config');
		$this->publishes([__DIR__.'/../resources/assets' => public_path('vendor/burnmsg')], 'public');
	}
	
	public function provides()
	{
		return ['burnmsg'];
	}
	
	protected function registerRoutes()
	{
		$this->app['router']->group(['prefix' => 'burnmsg', 'middleware' => 'web', 'namespace' => 'AP\Burnmsg'], function($router){
			$router->get('/', ['as' => 'burnmsg.create', 'uses' => 'Controller@create']);
			$router->post('/', ['as' => 'burnmsg.store', 'uses' => 'Controller@store']);
			$router->get('/{url}/{key}', ['as' => 'burnmsg.show', 'uses' => 'Controller@show']);
		});
	}
}