%define api.parser.class {Parser}
%define api.position.type {int}
%define api.location.type {Location}
%define api.push-pull push
%locations

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

    public function getLocation(): Location
    {
        return new Location($this->start, $this->end);
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getToken(): int
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

$lexer = new Lexer(STDIN);
$parser = new Parser($lexer);

do {
    $token  = $lexer->getToken();
    $lval   = $lexer->getValue();
    $yyloc  = $lexer->getLocation();
    $status = $parser->push_parse($token, $lval, $yyloc);
} while ($status === Parser::YYPUSH_MORE);

if ($status !== Parser::YYACCEPT) {
    exit(1);
}
