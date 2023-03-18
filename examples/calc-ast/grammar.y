%define api.parser.class {Parser}
%define api.namespace {App}
%code parser {
    private Node $ast;
    public function setAst(Node $ast): void { $this->ast = $ast; }
    public function getAst(): Node { return $this->ast; }
}

%token T_NUMBER

%left '-' '+'

%%
start:
  expression                 {  self::setAst($1); }
;

expression:
  T_NUMBER                   { $$ = new Node('NUMBER', $1); }
| expression '+' expression  { $$ = new Node('OPERATION_PLUS', '', [$1, $3]);  }
| expression '-' expression  { $$ = new Node('OPERATION_MINUS', '', [$1, $3]);  }
;
