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

namespace Konceiver\Fabrik;

use Illuminate\Support\Collection;

class ModelCollectionFactory
{
    private ModelFactory $factory;

    private int $times;

    public function __construct(ModelFactory $factory, int $times)
    {
        $this->factory = $factory;
        $this->times   = $times;
    }

    public function create(array $extra = []): Collection
    {
        return $this->build('create', $extra);
    }

    public function make(array $extra = []): Collection
    {
        return $this->build('make', $extra);
    }

    public function raw(array $extra = []): Collection
    {
        return $this->build('raw', $extra);
    }

    private function build(string $creationMethod, array $extra): Collection
    {
        return collect()
            ->times($this->times)
            ->transform(fn () => $this->factory->$creationMethod($extra));
    }
}
