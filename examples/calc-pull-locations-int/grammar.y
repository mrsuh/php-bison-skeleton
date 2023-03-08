%define api.parser.class {Parser}
%define api.position.type {int}
%define api.location.type {Location}
%define api.push-pull pull
%locations

%token T_NUMBER

%left '-' '+'

%%
input:
  expression                       { printf("%d\n", $1); }
;

expression:
  T_NUMBER                         { $$ = $1; }
| expression '+' expression        { $$ = $1 + $3;  }
| expression '-' expression        { $$ = $1 - $3;  }
;

%%
class Lexer implements LexerInterface
{
    private array    $words;
    private int      $index = 0;
    private int      $value = 0;
    private int $start = 0;
    private int $end = 0;

    public function __construct($resource)
    {
        $this->words = explode(' ', trim(fgets($resource)));
    }

    public function yyerror(?Location $loc, string $message): void
    {
        if ($loc === null) {
            printf("%s\n", $message);
        } else {
            printf("%s: %s\n", $loc, $message);
        }
    }

    public function getStartPos(): int {
        return $this->start;
    }

    public function getEndPos(): int {
        return $this->end;
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

        $this->start = $this->index;
        $word = $this->words[$this->index++];
        $this->end = $this->index;

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
