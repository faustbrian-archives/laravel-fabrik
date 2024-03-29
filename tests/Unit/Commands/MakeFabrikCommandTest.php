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

namespace Konceiver\Fabrik\Tests\Unit\Commands;

use Konceiver\Fabrik\Tests\Factories\User;
use Konceiver\Fabrik\Tests\TestCase;

/**
 * @covers \Konceiver\Fabrik\Commands\MakeFabrikCommand
 */
class MakeFabrikCommandTest extends TestCase
{
    /** @test */
    public function it_should_create_a_new_factory(): void
    {
        $this
            ->artisan('make:fabrik', ['modelClass' => User::class, '--force' => true])
            ->expectsOutput('Konceiver\Fabrik\Tests\Factories\User created successfully.')
            ->assertExitCode(0);
    }

    /** @test */
    public function it_should_fail_to_overwrite_an_existing_factory_without_the_force_flag(): void
    {
        $this
            ->artisan('make:fabrik', ['modelClass' => User::class])
            ->expectsOutput('Fabrik already exists!')
            ->assertExitCode(0);
    }
}
