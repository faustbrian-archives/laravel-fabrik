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

class PostFactory extends ModelFactory
{
    protected string $modelClass = Post::class;

    public function getData(Generator $faker): array
    {
        return [
            'name' => $faker->name,
        ];
    }
}
