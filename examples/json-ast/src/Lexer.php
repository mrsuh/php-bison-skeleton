<?php

namespace App;

use Doctrine\Common\Lexer\AbstractLexer;

class Lexer extends AbstractLexer implements LexerInterface
{
    public function __construct($resource)
    {
        $this->setInput(stream_get_contents($resource));
        $this->moveNext();
    }

    protected function getCatchablePatterns(): array
    {
        return [
            '\:',
            '\{',
            '\}',
            '\[',
            '\]',
            '\,',
            "\"[^\"]+\"",
            'true',
            'false',
            'null',
        ];
    }

    protected function getNonCatchablePatterns(): array
    {
        return [
            ' ',
            '\n'
        ];
    }

    protected function getType(&$value): int
    {
        if (in_array($value, [':', '{', '}', '[', ']', ','], true)) {
            return ord($value);
        }

        if (is_numeric($value)) {
            return LexerInterface::T_NUMBER;
        }

        switch (strtolower($value)) {
            case 'true':
            case 'false':
                return LexerInterface::T_BOOL;
            case 'null':
                return LexerInterface::T_NULL;
        }

        return LexerInterface::T_STRING;
    }

    public function yyerror(string $message): void
    {
        print($message);
    }

    public function getLVal()
    {
        return trim($this->token->value, '"');
    }

    public function yylex(): int
    {
        if (!$this->lookahead) {
            return LexerInterface::YYEOF;
        }

        $this->moveNext();

        return $this->token->type;
    }
}
