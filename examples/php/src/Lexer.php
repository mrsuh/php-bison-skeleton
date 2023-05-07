<?php

namespace App;

use PhpParser\Lexer\Emulative;

class Lexer extends Emulative implements LexerInterface
{
    private $value;

    public function __construct(string $code)
    {
        parent::__construct();

        $this->startLexing($code);
    }

    public function getLVal()
    {
        return $this->value;
    }

    public function yylex(): int
    {
        return $this->getNextToken($this->value);
    }

    public function yyerror(string $message): void
    {
        throw new \RuntimeException($message);
    }
}
