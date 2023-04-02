%define api.parser.class {Parser}
%define api.namespace {App}
%code parser {
    private Node $ast;
    public function setAst(Node $ast): void { $this->ast = $ast; }
    public function getAst(): Node { return $this->ast; }
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
  T_STRING ':' value  { $$ = new Node('T_STRING', $1, [$3]); }
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
  object   { $$ = new Node('T_OBJECT', '', $1); }
| array    { $$ = new Node('T_ARRAY', '', $1); }
| T_STRING { $$ = new Node('T_STRING', $1); }
| T_NUMBER { $$ = new Node('T_NUMBER', $1); }
| T_BOOL   { $$ = new Node('T_BOOL', $1); }
| T_NULL   { $$ = new Node('T_NULL', $1); }
;

%%
