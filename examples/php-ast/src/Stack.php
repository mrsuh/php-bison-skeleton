<?php

namespace App;

class Stack implements \ArrayAccess
{
    public function offsetSet($offset, $value): void
    {
    }

    public function offsetExists($offset): bool
    {
        return false;
    }

    public function offsetUnset($offset): void
    {
    }

    public function offsetGet($offset): array
    {
        return [];
    }
}
