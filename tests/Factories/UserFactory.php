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

namespace Konceiver\Fabrik\Tests\Factories;

use Faker\Generator;
use Konceiver\Fabrik\ModelFactory;

class UserFactory extends ModelFactory
{
    protected string $modelClass = User::class;

    public function getData(Generator $faker): array
    {
        return [
            'name'     => $faker->name,
            'email'    => $faker->email,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ];
    }
}
