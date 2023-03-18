# PHP skeleton for Bison

![](https://github.com/mrsuh/php-bison-skeleton/actions/workflows/tests.yml/badge.svg)
![](https://img.shields.io/github/license/mrsuh/php-bison-skeleton.svg)
![](https://img.shields.io/github/v/release/mrsuh/php-bison-skeleton)

A set of Bison skeleton files that can be used to generate a Bison parser written in PHP.

## Requirements:
* PHP >= 7.4
* Bison >= 3.8

## Installation
```bash
composer require --dev mrsuh/php-bison-skeleton
```

## Usage
```bash
bison -S vendor/mrsuh/php-bison-skeleton/src/php-skel.m4 -o parser.php grammar.y
```

## Posts
* [PHP Skeleton for Bison](https://dev.to/mrsuh/php-skeleton-for-bison-po2)

## Example

`grammar.y`
```php
%define api.parser.class {Parser}
%token T_NUMBER
%left '-' '+'

%%
start:
  expression                       { printf("%d\n", $1); }
;

expression:
  T_NUMBER                         { $$ = $1; }
| expression '+' expression        { $$ = $1 + $3;  }
| expression '-' expression        { $$ = $1 - $3;  }
;

%%
class Lexer implements LexerInterface {
    private array $words;
    private int   $index = 0;
    private int   $value = 0;

    public function __construct($resource)
    {
        $this->words = explode(' ', trim(fgets($resource)));
    }

    public function yyerror(string $message): void
    {
        printf("%s\n", $message);
    }

    public function getLVal()
    {
        return $this->value;
    }

    public function yylex(): int
    {
        if ($this->index >= count($this->words)) {
            return LexerInterface::YYEOF;
        }

        $word = $this->words[$this->index++];
        if (is_numeric($word)) {
            $this->value = (int)$word;

            return LexerInterface::T_NUMBER;
        }

        return ord($word);
    }
}

$lexer  = new Lexer(STDIN);
$parser = new Parser($lexer);
if (!$parser->parse()) {
    exit(1);
}
```

```bash
bison -S vendor/mrsuh/php-bison-skeleton/src/php-skel.m4 -o parser.php grammar.y
```

```bash
php parser.php <<< "1 + 2"
3
```

See more examples in the [folder](./examples)

### Tests
```bash
composer test
```
