<?php

declare(strict_types=1);

/*
 * This file is part of Fabrik.
 *
 * (c) Konceiver <info@konceiver.dev>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Konceiver\Fabrik\Tests;

use Illuminate\Foundation\Testing\WithFaker;
use Konceiver\Fabrik\Providers\FabrikServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    use WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->loadLaravelMigrations(['--database' => 'testbench']);

        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }

    protected function getEnvironmentSetUp($app): void
    {
        $app['config']->set('database.default', 'testbench');

        $app['config']->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);

        $app['config']->set('fabrik.namespaces.models', 'Konceiver\Fabrik\Tests\Factories');
        $app['config']->set('fabrik.namespaces.factories', 'Konceiver\Fabrik\Tests\Factories');
    }

    protected function getPackageProviders($app): array
    {
        return [FabrikServiceProvider::class];
    }
}
