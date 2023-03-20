<?php

namespace App;

use Mrsuh\Tree\NodeInterface;

class Node implements NodeInterface
{
    private string $name;
    /** @var array<string, string> */
    private array $attributes;
    /** @var Node[] */
    private array $children;

    public function __construct(string $name, array $attributes = [], array $children = [])
    {
        $this->name       = $name;
        $this->attributes = $attributes;
        $this->children   = $children;
    }

    public function getChildren(): array
    {
        return $this->children;
    }

    public function __toString(): string
    {
        $line = $this->name;
        if (!empty($this->attributes)) {
            $line .= ' {';
            foreach ($this->attributes as $key => $value) {
                $line .= sprintf(
                    " %s: '%s'",
                    $key,
                    is_array($value) ? implode(', ', $value) : $value
                );
            }
            $line .= ' }';
        }

        return $line;
    }
}
