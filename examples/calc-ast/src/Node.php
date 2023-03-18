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
        $line = $this->name;
        if (!empty($this->value)) {
            $line .= sprintf(" '%s'", $this->value);
        }

        return $line;
    }
}
