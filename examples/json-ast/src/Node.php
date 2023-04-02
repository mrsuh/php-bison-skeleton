<?php

namespace App;

use Mrsuh\Tree\NodeInterface;

class Node implements NodeInterface
{
    private string $name;
    private string $value;
    /** @var Node[] */
    private array $children;

    public function __construct(string $name, string $value, array $children = [])
    {
        $this->name     = $name;
        $this->value    = $value;
        $this->children = $children;
    }

    public function getChildren(): array
    {
        return $this->children;
    }

    public function __toString(): string
    {
        if (!empty($this->value)) {
            return sprintf("%s: '%s'", $this->name, $this->value);
        }

        return $this->name;
    }
}
