<?php


namespace Webdev\Vuetest;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Webdev\Vuetest\app\View\VueComp;

class VueServiceProvider extends ServiceProvider
{
	public function register()
	{
		// Merge views together
		$this->loadViewsFrom(__DIR__ . '/resources/views', 'vuetest');
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
			__DIR__ . '/resources/views' => resource_path('views/vendor/vuetest'),
		], 'vuetest');

		$this->publishes([
			__DIR__ . '/resources/js' => public_path('js/vendor'),
		], 'vuetest');
	}

	protected function publishComponents()
	{
		$this->loadViewsFrom(__DIR__ . '/resources/views', 'vuetest');

		Blade::component('vue-comp', VueComp::class);
	}
}