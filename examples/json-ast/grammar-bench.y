%define api.parser.class {Parser}
%define api.namespace {App}
%code parser {
    private $ast;
    public function setAst($ast): void { $this->ast = $ast; }
    public function getAst() { return $this->ast; }
}

%token T_STRING
%token T_NUMBER
%token T_BOOL
%token T_NULL

%%
start:
  value  { self::setAst($1); }
;

object:
'{' members '}' { $$ = $2; }
;

members:
  %empty             { $$ = []; }
| member             { $$ = [$1]; }
| members ',' member { $$ = $1; $$[] = $3; }
;

member:
  T_STRING ':' value  { $$ = [$1 => $3]; }
;

array:
'['  elements ']' { $$ = $2; }
;

elements:
  %empty             { $$ = []; }
| value              { $$ = [$1]; }
| elements ',' value { $$ = $1; $$[] = $3; }
;

value:
  object   { $$ = $1; }
| array    { $$ = $1; }
| T_STRING { $$ = $1; }
| T_NUMBER { $$ = $1; }
| T_BOOL   { $$ = $1; }
| T_NULL   { $$ = $1; }
;

%%
