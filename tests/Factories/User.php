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

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as BaseUser;

class User extends BaseUser
{
    protected $guarded = [];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
