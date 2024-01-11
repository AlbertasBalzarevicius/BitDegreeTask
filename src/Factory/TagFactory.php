<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\Tag;

class TagFactory
{
    public function create(string $value): Tag
    {
        return new Tag($value);
    }

    /**
     * @param string[] $tags
     * @return Tag[]
     */
    public function createMany(array $tags): array
    {
        return \array_map(
            fn(string $tag): Tag => $this->create($tag),
            $tags,
        );
    }
}