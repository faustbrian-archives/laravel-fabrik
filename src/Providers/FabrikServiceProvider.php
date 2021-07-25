<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Fabrik.
 *
 * (c) Konceiver <info@konceiver.dev>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Konceiver\Fabrik\Providers;

use Illuminate\Support\ServiceProvider;
use Konceiver\Fabrik\Commands\MakeFabrikCommand;

class FabrikServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/fabrik.php', 'fabrik');
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../config/fabrik.php' => $this->app->configPath('fabrik.php'),
            ], 'config');

            $this->commands([MakeFabrikCommand::class]);
        }

        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'fabrik');
    }
}
