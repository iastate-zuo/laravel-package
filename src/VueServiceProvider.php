<?php


namespace Webdev\Vuetest;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class VueServiceProvider extends ServiceProvider
{
	public function register()
	{
		// Merge views together
		$this->loadViewsFrom(__DIR__ . '/../resources/views', 'vuetest');
	}

	public function boot()
	{
		if ($this->app->runningInConsole())
		{
			$this->publishResources();
		}

		$this->publishComponents();
	}

	protected function publishResources()
	{
		$this->publishes([
			__DIR__ . '/../resources/views' => resource_path('views/vendor/vuetest'),
		], 'vuetest');

		$this->publishes([
			__DIR__ . '/../resources/js' => resource_path('views/vendor/vuetest'),
		], 'vuetest');
	}

	protected function publishComponents()
	{
		$this->loadViewsFrom(__DIR__ . '/resources/views', 'vuetest');
	}
}