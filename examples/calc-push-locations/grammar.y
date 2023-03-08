%define api.parser.class {Parser}
%define api.position.type {Position}
%define api.location.type {Location}
%define api.push-pull push
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
class Position
{
    private int $line;
    private int $column;

    public function __construct(int $line = 1, int $column = 0)
    {
        $this->line   = $line;
        $this->column = $column;
    }

    public function __toString(): string
    {
        return sprintf('[%d.%d]', $this->line, $this->column);
    }
}

class Lexer implements LexerInterface
{
    private array    $words;
    private int      $index = 0;
    private int      $value = 0;
    private Position $start;
    private Position $end;

    public function __construct($resource)
    {
        $this->words = explode(' ', trim(fgets($resource)));
        $this->start = new Position();
        $this->end   = new Position();
    }

    public function yyerror(?Location $loc, string $message): void
    {
        if ($loc === null) {
            printf("%s\n", $message);
        } else {
            printf("%s: %s\n", $loc, $message);
        }
    }

    public function getStartPos(): Position {
        return $this->start;
    }

    public function getEndPos(): Position {
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

        $this->start = new Position(1, $this->index);
        $word = $this->words[$this->index++];
        $this->end = new Position(1, $this->index);

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
