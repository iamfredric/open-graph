<?php

namespace Iamfredric\OpenGraph;

class Collection
{
    /**
     * @param array<string,mixed> $attributes
     */
    public function __construct(protected array $attributes)
    {
    }

    public function get(string $key): ?string
    {
        return $this->attributes[$key] ?? null;
    }

    /**
     * @return array<string,mixed>
     */
    public function toArray(): array
    {
        return $this->attributes;
    }
}
