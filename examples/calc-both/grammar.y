%define api.parser.class {Parser}
%define api.push-pull both

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
class Lexer implements LexerInterface {

    private array $words;
    private int   $index = 0;
    private int   $value = 0;

    public function __construct($resource)
    {
        $this->words = explode(' ', trim(fgets($resource)));
    }

    public function reset(): void
    {
        $this->index = 0;
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

$lexer->reset();
do {
    $token  = $lexer->yylex();
    $value   = $lexer->getLVal();
    $status = $parser->push_parse($token, $value);
} while ($status === Parser::YYPUSH_MORE);

if ($status !== Parser::YYACCEPT) {
    exit(1);
}
