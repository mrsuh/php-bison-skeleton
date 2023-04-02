<?php

namespace App\Tests;

use App\Parser;
use App\Lexer;

class Bench
{
    private string $jsonFilePath = __DIR__ . '/../bench.json';

    /**
     * @Revs(5)
     * @Iterations(5)
     * @RetryThreshold(2.0)
     */
    public function benchNative()
    {
        json_decode(file_get_contents($this->jsonFilePath), true);
    }

    /**
     * @Revs(5)
     * @Iterations(5)
     * @RetryThreshold(2.0)
     */
    public function benchBison()
    {
        $lexer  = new Lexer(fopen($this->jsonFilePath, 'r'));
        $parser = new Parser($lexer);
        if (!$parser->parse()) {
            exit(1);
        }
    }
}
