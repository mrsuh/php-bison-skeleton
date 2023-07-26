%require "3.0"

%expect 2
%define api.push-pull push
%define api.namespace {App}
%define api.parser.class {Parser}
%define api.parser.extends {\PhpParser\ParserAbstract}

%code imports {
use PhpParser\Error;
use PhpParser\Node;
use PhpParser\Node\Expr;
use PhpParser\Node\Name;
use PhpParser\Node\Scalar;
use PhpParser\Node\Stmt;
}

%code parser {
    private array $ast;

    public function setAst(array $ast): void { $this->ast = $ast; }
    public function getAst(): array { return $this->ast; }

    protected function initReduceCallbacks() {}
}

%code init {
    $this->startAttributeStack      = new Stack();
    $this->endAttributeStack        = new Stack();
    $this->endAttributes            = [];
    $this->lookaheadStartAttributes = [];
}

%token YYerror 255
%token YYUNDEF 256
%right T_THROW 257
%left T_INCLUDE T_INCLUDE_ONCE T_EVAL T_REQUIRE T_REQUIRE_ONCE
%left ','
%left T_LOGICAL_OR
%left T_LOGICAL_XOR
%left T_LOGICAL_AND
%right T_PRINT
%right T_YIELD
%right T_DOUBLE_ARROW
%right T_YIELD_FROM
%left '=' T_PLUS_EQUAL T_MINUS_EQUAL T_MUL_EQUAL T_DIV_EQUAL T_CONCAT_EQUAL T_MOD_EQUAL T_AND_EQUAL T_OR_EQUAL T_XOR_EQUAL T_SL_EQUAL T_SR_EQUAL T_POW_EQUAL T_COALESCE_EQUAL
%left '?' ':'
%right T_COALESCE
%left T_BOOLEAN_OR
%left T_BOOLEAN_AND
%left '|'
%left '^'
%left T_AMPERSAND_NOT_FOLLOWED_BY_VAR_OR_VARARG T_AMPERSAND_FOLLOWED_BY_VAR_OR_VARARG
%nonassoc T_IS_EQUAL T_IS_NOT_EQUAL T_IS_IDENTICAL T_IS_NOT_IDENTICAL T_SPACESHIP
%nonassoc '<' T_IS_SMALLER_OR_EQUAL '>' T_IS_GREATER_OR_EQUAL
%left T_SL T_SR
%left '+' '-' '.'
%left '*' '/' '%'
%right '!'
%nonassoc T_INSTANCEOF
%right '~' T_INC T_DEC T_INT_CAST T_DOUBLE_CAST T_STRING_CAST T_ARRAY_CAST T_OBJECT_CAST T_BOOL_CAST T_UNSET_CAST '@'
%right T_POW
%right '['
%nonassoc T_NEW T_CLONE
%token T_EXIT
%token T_IF
%left T_ELSEIF
%left T_ELSE
%left T_ENDIF
%token T_LNUMBER
%token T_DNUMBER
%token T_STRING
%token T_STRING_VARNAME
%token T_VARIABLE
%token T_NUM_STRING
%token T_INLINE_HTML
%token T_ENCAPSED_AND_WHITESPACE
%token T_CONSTANT_ENCAPSED_STRING
%token T_ECHO
%token T_DO
%token T_WHILE
%token T_ENDWHILE
%token T_FOR
%token T_ENDFOR
%token T_FOREACH
%token T_ENDFOREACH
%token T_DECLARE
%token T_ENDDECLARE
%token T_AS
%token T_SWITCH
%token T_MATCH
%token T_ENDSWITCH
%token T_CASE
%token T_DEFAULT
%token T_BREAK
%token T_CONTINUE
%token T_GOTO
%token T_FUNCTION
%token T_FN
%token T_CONST
%token T_RETURN
%token T_TRY
%token T_CATCH
%token T_FINALLY
%token T_THROW
%token T_USE
%token T_INSTEADOF
%token T_GLOBAL
%right T_STATIC T_ABSTRACT T_FINAL T_PRIVATE T_PROTECTED T_PUBLIC T_READONLY
%token T_VAR
%token T_UNSET
%token T_ISSET
%token T_EMPTY
%token T_HALT_COMPILER
%token T_CLASS
%token T_TRAIT
%token T_INTERFACE
%token T_ENUM
%token T_EXTENDS
%token T_IMPLEMENTS
%token T_OBJECT_OPERATOR
%token T_NULLSAFE_OBJECT_OPERATOR
%token T_LIST
%token T_ARRAY
%token T_CALLABLE
%token T_CLASS_C
%token T_TRAIT_C
%token T_METHOD_C
%token T_FUNC_C
%token T_LINE
%token T_FILE
%token T_START_HEREDOC
%token T_END_HEREDOC
%token T_DOLLAR_OPEN_CURLY_BRACES
%token T_CURLY_OPEN
%token T_PAAMAYIM_NEKUDOTAYIM
%token T_NAMESPACE
%token T_NS_C
%token T_DIR
%token T_NS_SEPARATOR
%token T_ELLIPSIS
%token T_NAME_FULLY_QUALIFIED
%token T_NAME_QUALIFIED
%token T_NAME_RELATIVE
%token T_ATTRIBUTE


%%

start:
    top_statement_list                                      { $$ = __DOLLAR__this->handleNamespaces($1); self::setAst($$); }
;

top_statement_list_ex:
      top_statement_list_ex top_statement                   { if (is_array($2)) { $$ = array_merge($1, $2); } else { $1[] = $2; $$ = $1; }; }
    | /* empty */                                           { $$ = array(); }
;

top_statement_list:
      top_statement_list_ex
          { __DOLLAR__startAttributes = __DOLLAR__this->lookaheadStartAttributes; if (isset(__DOLLAR__startAttributes['comments'])) { __DOLLAR__nop = new Stmt\Nop(__DOLLAR__this->createCommentNopAttributes(__DOLLAR__startAttributes['comments'])); } else { __DOLLAR__nop = null; };
            if (__DOLLAR__nop !== null) { $1[] = __DOLLAR__nop; } $$ = $1; }
;

ampersand:
      T_AMPERSAND_FOLLOWED_BY_VAR_OR_VARARG
    | T_AMPERSAND_NOT_FOLLOWED_BY_VAR_OR_VARARG
;

reserved_non_modifiers:
      T_INCLUDE | T_INCLUDE_ONCE | T_EVAL | T_REQUIRE | T_REQUIRE_ONCE | T_LOGICAL_OR | T_LOGICAL_XOR | T_LOGICAL_AND
    | T_INSTANCEOF | T_NEW | T_CLONE | T_EXIT | T_IF | T_ELSEIF | T_ELSE | T_ENDIF | T_ECHO | T_DO | T_WHILE
    | T_ENDWHILE | T_FOR | T_ENDFOR | T_FOREACH | T_ENDFOREACH | T_DECLARE | T_ENDDECLARE | T_AS | T_TRY | T_CATCH
    | T_FINALLY | T_THROW | T_USE | T_INSTEADOF | T_GLOBAL | T_VAR | T_UNSET | T_ISSET | T_EMPTY | T_CONTINUE | T_GOTO
    | T_FUNCTION | T_CONST | T_RETURN | T_PRINT | T_YIELD | T_LIST | T_SWITCH | T_ENDSWITCH | T_CASE | T_DEFAULT
    | T_BREAK | T_ARRAY | T_CALLABLE | T_EXTENDS | T_IMPLEMENTS | T_NAMESPACE | T_TRAIT | T_INTERFACE | T_CLASS
    | T_CLASS_C | T_TRAIT_C | T_FUNC_C | T_METHOD_C | T_LINE | T_FILE | T_DIR | T_NS_C | T_HALT_COMPILER | T_FN
    | T_MATCH | T_ENUM
;

semi_reserved:
      reserved_non_modifiers
    | T_STATIC | T_ABSTRACT | T_FINAL | T_PRIVATE | T_PROTECTED | T_PUBLIC | T_READONLY
;

identifier_maybe_reserved:
      T_STRING                                              { $$ = new Node\Identifier($1, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | semi_reserved                                         { $$ = new Node\Identifier($1, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

identifier_not_reserved:
      T_STRING                                              { $$ = new Node\Identifier($1, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

reserved_non_modifiers_identifier:
      reserved_non_modifiers                                { $$ = new Node\Identifier($1, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

namespace_declaration_name:
      T_STRING                                              { $$ = new Name($1, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | semi_reserved                                         { $$ = new Name($1, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_NAME_QUALIFIED                                      { $$ = new Name($1, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

namespace_name:
      T_STRING                                              { $$ = new Name($1, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_NAME_QUALIFIED                                      { $$ = new Name($1, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

legacy_namespace_name:
      namespace_name                                        { $$ = $1; }
    | T_NAME_FULLY_QUALIFIED                                { $$ = new Name(substr($1, 1), __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

plain_variable:
      T_VARIABLE                                            { $$ = new Expr\Variable(substr($1, 1), __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

semi:
      ';'                                                   { /* nothing */ }
    | error                                                 { /* nothing */ }
;

no_comma:
      /* empty */ { /* nothing */ }
    | ',' { __DOLLAR__this->emitError(new Error('A trailing comma is not allowed here', __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes)); }
;

optional_comma:
      /* empty */
    | ','
;

attribute_decl:
      class_name                                            { $$ = new Node\Attribute($1, [], __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | class_name argument_list                              { $$ = new Node\Attribute($1, $2, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

attribute_group:
      attribute_decl                                        { $$ = array($1); }
    | attribute_group ',' attribute_decl                    { $1[] = $3; $$ = $1; }
;

attribute:
      T_ATTRIBUTE attribute_group optional_comma ']'        { $$ = new Node\AttributeGroup($2, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

attributes:
      attribute                                             { $$ = array($1); }
    | attributes attribute                                  { $1[] = $2; $$ = $1; }
;

optional_attributes:
      /* empty */                                           { $$ = []; }
    | attributes                                            { $$ = $1; }
;

top_statement:
      statement                                             { $$ = $1; }
    | function_declaration_statement                        { $$ = $1; }
    | class_declaration_statement                           { $$ = $1; }
    | T_HALT_COMPILER
          { $$ = new Stmt\HaltCompiler(__DOLLAR__this->lexer->handleHaltCompiler(), __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_NAMESPACE namespace_declaration_name semi
          { $$ = new Stmt\Namespace_($2, null, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes);
            $$->setAttribute('kind', Stmt\Namespace_::KIND_SEMICOLON);
            __DOLLAR__this->checkNamespace($$); }
    | T_NAMESPACE namespace_declaration_name '{' top_statement_list '}'
          { $$ = new Stmt\Namespace_($2, $4, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes);
            $$->setAttribute('kind', Stmt\Namespace_::KIND_BRACED);
            __DOLLAR__this->checkNamespace($$); }
    | T_NAMESPACE '{' top_statement_list '}'
          { $$ = new Stmt\Namespace_(null, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes);
            $$->setAttribute('kind', Stmt\Namespace_::KIND_BRACED);
            __DOLLAR__this->checkNamespace($$); }
    | T_USE use_declarations semi                           { $$ = new Stmt\Use_($2, Stmt\Use_::TYPE_NORMAL, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_USE use_type use_declarations semi                  { $$ = new Stmt\Use_($3, $2, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | group_use_declaration semi                            { $$ = $1; }
    | T_CONST constant_declaration_list semi                { $$ = new Stmt\Const_($2, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

use_type:
      T_FUNCTION                                            { $$ = Stmt\Use_::TYPE_FUNCTION; }
    | T_CONST                                               { $$ = Stmt\Use_::TYPE_CONSTANT; }
;

group_use_declaration:
      T_USE use_type legacy_namespace_name T_NS_SEPARATOR '{' unprefixed_use_declarations '}'
          { $$ = new Stmt\GroupUse($3, $6, $2, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_USE legacy_namespace_name T_NS_SEPARATOR '{' inline_use_declarations '}'
          { $$ = new Stmt\GroupUse($2, $5, Stmt\Use_::TYPE_UNKNOWN, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

unprefixed_use_declarations:
      non_empty_unprefixed_use_declarations optional_comma  { $$ = $1; }
;

non_empty_unprefixed_use_declarations:
      non_empty_unprefixed_use_declarations ',' unprefixed_use_declaration
          { $1[] = $3; $$ = $1; }
    | unprefixed_use_declaration                            { $$ = array($1); }
;

use_declarations:
      non_empty_use_declarations no_comma                   { $$ = $1; }
;

non_empty_use_declarations:
      non_empty_use_declarations ',' use_declaration        { $1[] = $3; $$ = $1; }
    | use_declaration                                       { $$ = array($1); }
;

inline_use_declarations:
      non_empty_inline_use_declarations optional_comma      { $$ = $1; }
;

non_empty_inline_use_declarations:
      non_empty_inline_use_declarations ',' inline_use_declaration
          { $1[] = $3; $$ = $1; }
    | inline_use_declaration                                { $$ = array($1); }
;

unprefixed_use_declaration:
      namespace_name
          { $$ = new Stmt\UseUse($1, null, Stmt\Use_::TYPE_UNKNOWN, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); __DOLLAR__this->checkUseUse($$, $1); }
    | namespace_name T_AS identifier_not_reserved
          { $$ = new Stmt\UseUse($1, $3, Stmt\Use_::TYPE_UNKNOWN, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); __DOLLAR__this->checkUseUse($$, $3); }
;

use_declaration:
      legacy_namespace_name
          { $$ = new Stmt\UseUse($1, null, Stmt\Use_::TYPE_UNKNOWN, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); __DOLLAR__this->checkUseUse($$, $1); }
    | legacy_namespace_name T_AS identifier_not_reserved
          { $$ = new Stmt\UseUse($1, $3, Stmt\Use_::TYPE_UNKNOWN, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); __DOLLAR__this->checkUseUse($$, $3); }
;

inline_use_declaration:
      unprefixed_use_declaration                            { $$ = $1; $$->type = Stmt\Use_::TYPE_NORMAL; }
    | use_type unprefixed_use_declaration                   { $$ = $2; $$->type = $1; }
;

constant_declaration_list:
      non_empty_constant_declaration_list no_comma          { $$ = $1; }
;

non_empty_constant_declaration_list:
      non_empty_constant_declaration_list ',' constant_declaration
          { $1[] = $3; $$ = $1; }
    | constant_declaration                                  { $$ = array($1); }
;

constant_declaration:
    identifier_not_reserved '=' expr                        { $$ = new Node\Const_($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

class_const_list:
      non_empty_class_const_list no_comma                   { $$ = $1; }
;

non_empty_class_const_list:
      non_empty_class_const_list ',' class_const            { $1[] = $3; $$ = $1; }
    | class_const                                           { $$ = array($1); }
;

class_const:
    identifier_maybe_reserved '=' expr                      { $$ = new Node\Const_($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

inner_statement_list_ex:
      inner_statement_list_ex inner_statement               { if (is_array($2)) { $$ = array_merge($1, $2); } else { $1[] = $2; $$ = $1; }; }
    | /* empty */                                           { $$ = array(); }
;

inner_statement_list:
      inner_statement_list_ex
          { __DOLLAR__startAttributes = __DOLLAR__this->lookaheadStartAttributes; if (isset(__DOLLAR__startAttributes['comments'])) { __DOLLAR__nop = new Stmt\Nop(__DOLLAR__this->createCommentNopAttributes(__DOLLAR__startAttributes['comments'])); } else { __DOLLAR__nop = null; };
            if (__DOLLAR__nop !== null) { $1[] = __DOLLAR__nop; } $$ = $1; }
;

inner_statement:
      statement                                             { $$ = $1; }
    | function_declaration_statement                        { $$ = $1; }
    | class_declaration_statement                           { $$ = $1; }
    | T_HALT_COMPILER
          { throw new Error('__HALT_COMPILER() can only be used from the outermost scope', __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

non_empty_statement:
      '{' inner_statement_list '}'
    {
        if ($2) {
            $$ = $2; __DOLLAR__attrs = __DOLLAR__this->startAttributeStack[$1]; __DOLLAR__stmts = $$; if (!empty(__DOLLAR__attrs['comments'])) {__DOLLAR__stmts[0]->setAttribute('comments', array_merge(__DOLLAR__attrs['comments'], __DOLLAR__stmts[0]->getAttribute('comments', []))); };
        } else {
            __DOLLAR__startAttributes = __DOLLAR__this->startAttributeStack[$1]; if (isset(__DOLLAR__startAttributes['comments'])) { $$ = new Stmt\Nop(__DOLLAR__startAttributes + __DOLLAR__this->endAttributes); } else { $$ = null; };
            if (null === $$) { $$ = array(); }
        }
    }
    | T_IF '(' expr ')' statement elseif_list else_single
          { $$ = new Stmt\If_($3, ['stmts' => is_array($5) ? $5 : array($5), 'elseifs' => $6, 'else' => $7], __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_IF '(' expr ')' ':' inner_statement_list new_elseif_list new_else_single T_ENDIF ';'
          { $$ = new Stmt\If_($3, ['stmts' => $6, 'elseifs' => $7, 'else' => $8], __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_WHILE '(' expr ')' while_statement                  { $$ = new Stmt\While_($3, $5, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_DO statement T_WHILE '(' expr ')' ';'               { $$ = new Stmt\Do_($5, is_array($2) ? $2 : array($2), __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_FOR '(' for_expr ';'  for_expr ';' for_expr ')' for_statement
          { $$ = new Stmt\For_(['init' => $3, 'cond' => $5, 'loop' => $7, 'stmts' => $9], __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_SWITCH '(' expr ')' switch_case_list                { $$ = new Stmt\Switch_($3, $5, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_BREAK optional_expr semi                            { $$ = new Stmt\Break_($2, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_CONTINUE optional_expr semi                         { $$ = new Stmt\Continue_($2, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_RETURN optional_expr semi                           { $$ = new Stmt\Return_($2, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_GLOBAL global_var_list semi                         { $$ = new Stmt\Global_($2, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_STATIC static_var_list semi                         { $$ = new Stmt\Static_($2, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_ECHO expr_list_forbid_comma semi                    { $$ = new Stmt\Echo_($2, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_INLINE_HTML                                         { $$ = new Stmt\InlineHTML($1, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | expr semi {
        __DOLLAR__e = $1;
        if (__DOLLAR__e instanceof Expr\Throw_) {
            // For backwards-compatibility reasons, convert throw in statement position into
            // Stmt\Throw_ rather than Stmt\Expression(Expr\Throw_).
            $$ = new Stmt\Throw_(__DOLLAR__e->expr, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes);
        } else {
            $$ = new Stmt\Expression(__DOLLAR__e, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes);
        }
    }
    | T_UNSET '(' variables_list ')' semi                   { $$ = new Stmt\Unset_($3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_FOREACH '(' expr T_AS foreach_variable ')' foreach_statement
          { $$ = new Stmt\Foreach_($3, $5[0], ['keyVar' => null, 'byRef' => $5[1], 'stmts' => $7], __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_FOREACH '(' expr T_AS variable T_DOUBLE_ARROW foreach_variable ')' foreach_statement
          { $$ = new Stmt\Foreach_($3, $7[0], ['keyVar' => $5, 'byRef' => $7[1], 'stmts' => $9], __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_FOREACH '(' expr error ')' foreach_statement
          { $$ = new Stmt\Foreach_($3, new Expr\Error(__DOLLAR__this->startAttributeStack[$4] + __DOLLAR__this->endAttributeStack[$4]), ['stmts' => $6], __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_DECLARE '(' declare_list ')' declare_statement      { $$ = new Stmt\Declare_($3, $5, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_TRY '{' inner_statement_list '}' catches optional_finally
          { $$ = new Stmt\TryCatch($3, $5, $6, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); __DOLLAR__this->checkTryCatch($$); }
    | T_GOTO identifier_not_reserved semi                   { $$ = new Stmt\Goto_($2, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | identifier_not_reserved ':'                           { $$ = new Stmt\Label($1, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | error                                                 { $$ = array(); /* means: no statement */ }
;

statement:
      non_empty_statement                                   { $$ = $1; }
    | ';'
          { __DOLLAR__startAttributes = __DOLLAR__this->startAttributeStack[$1]; if (isset(__DOLLAR__startAttributes['comments'])) { $$ = new Stmt\Nop(__DOLLAR__startAttributes + __DOLLAR__this->endAttributes); } else { $$ = null; };
            if ($$ === null) $$ = array(); /* means: no statement */ }
;

catches:
      /* empty */                                           { $$ = array(); }
    | catches catch                                         { $1[] = $2; $$ = $1; }
;

name_union:
      name                                                  { $$ = array($1); }
    | name_union '|' name                                   { $1[] = $3; $$ = $1; }
;

catch:
    T_CATCH '(' name_union optional_plain_variable ')' '{' inner_statement_list '}'
        { $$ = new Stmt\Catch_($3, $4, $7, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

optional_finally:
      /* empty */                                           { $$ = null; }
    | T_FINALLY '{' inner_statement_list '}'                { $$ = new Stmt\Finally_($3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

variables_list:
      non_empty_variables_list optional_comma               { $$ = $1; }
;

non_empty_variables_list:
      variable                                              { $$ = array($1); }
    | non_empty_variables_list ',' variable                 { $1[] = $3; $$ = $1; }
;

optional_ref:
      /* empty */                                           { $$ = false; }
    | ampersand                                             { $$ = true; }
;

optional_arg_ref:
      /* empty */                                           { $$ = false; }
    | T_AMPERSAND_FOLLOWED_BY_VAR_OR_VARARG                 { $$ = true; }
;

optional_ellipsis:
      /* empty */                                           { $$ = false; }
    | T_ELLIPSIS                                            { $$ = true; }
;

block_or_error:
      '{' inner_statement_list '}'                          { $$ = $2; }
    | error                                                 { $$ = []; }
;

identifier_maybe_readonly:
      identifier_not_reserved                               { $$ = $1; }
    | T_READONLY                                            { $$ = new Node\Identifier($1, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

function_declaration_statement:
      T_FUNCTION optional_ref identifier_maybe_readonly '(' parameter_list ')' optional_return_type block_or_error
          { $$ = new Stmt\Function_($3, ['byRef' => $2, 'params' => $5, 'returnType' => $7, 'stmts' => $8, 'attrGroups' => []], __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | attributes T_FUNCTION optional_ref identifier_maybe_readonly '(' parameter_list ')' optional_return_type block_or_error
          { $$ = new Stmt\Function_($4, ['byRef' => $3, 'params' => $6, 'returnType' => $8, 'stmts' => $9, 'attrGroups' => $1], __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

class_declaration_statement:
      class_entry_type identifier_not_reserved extends_from implements_list '{' class_statement_list '}'
          { $$ = new Stmt\Class_($2, ['type' => $1, 'extends' => $3, 'implements' => $4, 'stmts' => $6, 'attrGroups' => []], __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes);
            __DOLLAR__this->checkClass($$, $2); }
    | attributes class_entry_type identifier_not_reserved extends_from implements_list '{' class_statement_list '}'
          { $$ = new Stmt\Class_($3, ['type' => $2, 'extends' => $4, 'implements' => $5, 'stmts' => $7, 'attrGroups' => $1], __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes);
            __DOLLAR__this->checkClass($$, $3); }
    | optional_attributes T_INTERFACE identifier_not_reserved interface_extends_list '{' class_statement_list '}'
          { $$ = new Stmt\Interface_($3, ['extends' => $4, 'stmts' => $6, 'attrGroups' => $1], __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes);
            __DOLLAR__this->checkInterface($$, $3); }
    | optional_attributes T_TRAIT identifier_not_reserved '{' class_statement_list '}'
          { $$ = new Stmt\Trait_($3, ['stmts' => $5, 'attrGroups' => $1], __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | optional_attributes T_ENUM identifier_not_reserved enum_scalar_type implements_list '{' class_statement_list '}'
          { $$ = new Stmt\Enum_($3, ['scalarType' => $4, 'implements' => $5, 'stmts' => $7, 'attrGroups' => $1], __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes);
            __DOLLAR__this->checkEnum($$, $3); }
;

enum_scalar_type:
      /* empty */                                           { $$ = null; }
    | ':' type                                              { $$ = $2; }

enum_case_expr:
      /* empty */                                           { $$ = null; }
    | '=' expr                                              { $$ = $2; }
;

class_entry_type:
      T_CLASS                                               { $$ = 0; }
    | class_modifiers T_CLASS                               { $$ = $1; }
;

class_modifiers:
      class_modifier                                        { $$ = $1; }
    | class_modifiers class_modifier                        { __DOLLAR__this->checkClassModifier($1, $2, $2); $$ = $1 | $2; }
;

class_modifier:
      T_ABSTRACT                                            { $$ = Stmt\Class_::MODIFIER_ABSTRACT; }
    | T_FINAL                                               { $$ = Stmt\Class_::MODIFIER_FINAL; }
    | T_READONLY                                            { $$ = Stmt\Class_::MODIFIER_READONLY; }
;

extends_from:
      /* empty */                                           { $$ = null; }
    | T_EXTENDS class_name                                  { $$ = $2; }
;

interface_extends_list:
      /* empty */                                           { $$ = array(); }
    | T_EXTENDS class_name_list                             { $$ = $2; }
;

implements_list:
      /* empty */                                           { $$ = array(); }
    | T_IMPLEMENTS class_name_list                          { $$ = $2; }
;

class_name_list:
      non_empty_class_name_list no_comma                    { $$ = $1; }
;

non_empty_class_name_list:
      class_name                                            { $$ = array($1); }
    | non_empty_class_name_list ',' class_name              { $1[] = $3; $$ = $1; }
;

for_statement:
      statement                                             { $$ = is_array($1) ? $1 : array($1); }
    | ':' inner_statement_list T_ENDFOR ';'                 { $$ = $2; }
;

foreach_statement:
      statement                                             { $$ = is_array($1) ? $1 : array($1); }
    | ':' inner_statement_list T_ENDFOREACH ';'             { $$ = $2; }
;

declare_statement:
      non_empty_statement                                   { $$ = is_array($1) ? $1 : array($1); }
    | ';'                                                   { $$ = null; }
    | ':' inner_statement_list T_ENDDECLARE ';'             { $$ = $2; }
;

declare_list:
      non_empty_declare_list no_comma                       { $$ = $1; }
;

non_empty_declare_list:
      declare_list_element                                  { $$ = array($1); }
    | non_empty_declare_list ',' declare_list_element       { $1[] = $3; $$ = $1; }
;

declare_list_element:
      identifier_not_reserved '=' expr                      { $$ = new Stmt\DeclareDeclare($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

switch_case_list:
      '{' case_list '}'                                     { $$ = $2; }
    | '{' ';' case_list '}'                                 { $$ = $3; }
    | ':' case_list T_ENDSWITCH ';'                         { $$ = $2; }
    | ':' ';' case_list T_ENDSWITCH ';'                     { $$ = $3; }
;

case_list:
      /* empty */                                           { $$ = array(); }
    | case_list case                                        { $1[] = $2; $$ = $1; }
;

case:
      T_CASE expr case_separator inner_statement_list_ex    { $$ = new Stmt\Case_($2, $4, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_DEFAULT case_separator inner_statement_list_ex      { $$ = new Stmt\Case_(null, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

case_separator:
      ':'
    | ';'
;

match:
      T_MATCH '(' expr ')' '{' match_arm_list '}'           { $$ = new Expr\Match_($3, $6, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

match_arm_list:
      /* empty */                                           { $$ = []; }
    | non_empty_match_arm_list optional_comma               { $$ = $1; }
;

non_empty_match_arm_list:
      match_arm                                             { $$ = array($1); }
    | non_empty_match_arm_list ',' match_arm                { $1[] = $3; $$ = $1; }
;

match_arm:
      expr_list_allow_comma T_DOUBLE_ARROW expr             { $$ = new Node\MatchArm($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_DEFAULT optional_comma T_DOUBLE_ARROW expr          { $$ = new Node\MatchArm(null, $4, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

while_statement:
      statement                                             { $$ = is_array($1) ? $1 : array($1); }
    | ':' inner_statement_list T_ENDWHILE ';'               { $$ = $2; }
;

elseif_list:
      /* empty */                                           { $$ = array(); }
    | elseif_list elseif                                    { $1[] = $2; $$ = $1; }
;

elseif:
      T_ELSEIF '(' expr ')' statement                       { $$ = new Stmt\ElseIf_($3, is_array($5) ? $5 : array($5), __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

new_elseif_list:
      /* empty */                                           { $$ = array(); }
    | new_elseif_list new_elseif                            { $1[] = $2; $$ = $1; }
;

new_elseif:
     T_ELSEIF '(' expr ')' ':' inner_statement_list
         { $$ = new Stmt\ElseIf_($3, $6, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); __DOLLAR__this->fixupAlternativeElse($$); }
;

else_single:
      /* empty */                                           { $$ = null; }
    | T_ELSE statement                                      { $$ = new Stmt\Else_(is_array($2) ? $2 : array($2), __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

new_else_single:
      /* empty */                                           { $$ = null; }
    | T_ELSE ':' inner_statement_list
          { $$ = new Stmt\Else_($3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); __DOLLAR__this->fixupAlternativeElse($$); }
;

foreach_variable:
      variable                                              { $$ = array($1, false); }
    | ampersand variable                                    { $$ = array($2, true); }
    | list_expr                                             { $$ = array($1, false); }
    | array_short_syntax                                    { $$ = array($1, false); }
;

parameter_list:
      non_empty_parameter_list optional_comma               { $$ = $1; }
    | /* empty */                                           { $$ = array(); }
;

non_empty_parameter_list:
      parameter                                             { $$ = array($1); }
    | non_empty_parameter_list ',' parameter                { $1[] = $3; $$ = $1; }
;

optional_property_modifiers:
      /* empty */               { $$ = 0; }
    | optional_property_modifiers property_modifier
          { __DOLLAR__this->checkModifier($1, $2, $2); $$ = $1 | $2; }
;

property_modifier:
      T_PUBLIC                  { $$ = Stmt\Class_::MODIFIER_PUBLIC; }
    | T_PROTECTED               { $$ = Stmt\Class_::MODIFIER_PROTECTED; }
    | T_PRIVATE                 { $$ = Stmt\Class_::MODIFIER_PRIVATE; }
    | T_READONLY                { $$ = Stmt\Class_::MODIFIER_READONLY; }
;

parameter:
      optional_attributes optional_property_modifiers optional_type_without_static
      optional_arg_ref optional_ellipsis plain_variable
          { $$ = new Node\Param($6, null, $3, $4, $5, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes, $2, $1);
            __DOLLAR__this->checkParam($$); }
    | optional_attributes optional_property_modifiers optional_type_without_static
      optional_arg_ref optional_ellipsis plain_variable '=' expr
          { $$ = new Node\Param($6, $8, $3, $4, $5, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes, $2, $1);
            __DOLLAR__this->checkParam($$); }
    | optional_attributes optional_property_modifiers optional_type_without_static
      optional_arg_ref optional_ellipsis error
          { $$ = new Node\Param(new Expr\Error(__DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes), null, $3, $4, $5, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes, $2, $1); }
;

type_expr:
      type                                                  { $$ = $1; }
    | '?' type                                              { $$ = new Node\NullableType($2, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | union_type                                            { $$ = new Node\UnionType($1, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | intersection_type                                     { $$ = $1; }
;

type:
      type_without_static                                   { $$ = $1; }
    | T_STATIC                                              { $$ = new Node\Name('static', __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

type_without_static:
      name                                                  { $$ = __DOLLAR__this->handleBuiltinTypes($1); }
    | T_ARRAY                                               { $$ = new Node\Identifier('array', __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_CALLABLE                                            { $$ = new Node\Identifier('callable', __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

union_type_element:
                type { $$ = $1; }
        |        '(' intersection_type ')' { $$ = $2; }
;

union_type:
      union_type_element '|' union_type_element             { $$ = array($1, $3); }
    | union_type '|' union_type_element                     { $1[] = $3; $$ = $1; }
;

union_type_without_static_element:
                type_without_static { $$ = $1; }
        |        '(' intersection_type_without_static ')' { $$ = $2; }
;

union_type_without_static:
      union_type_without_static_element '|' union_type_without_static_element   { $$ = array($1, $3); }
    | union_type_without_static '|' union_type_without_static_element           { $1[] = $3; $$ = $1; }
;

intersection_type_list:
      type T_AMPERSAND_NOT_FOLLOWED_BY_VAR_OR_VARARG type   { $$ = array($1, $3); }
    | intersection_type_list T_AMPERSAND_NOT_FOLLOWED_BY_VAR_OR_VARARG type
          { $1[] = $3; $$ = $1; }
;

intersection_type:
      intersection_type_list { $$ = new Node\IntersectionType($1, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

intersection_type_without_static_list:
      type_without_static T_AMPERSAND_NOT_FOLLOWED_BY_VAR_OR_VARARG type_without_static
          { $$ = array($1, $3); }
    | intersection_type_without_static_list T_AMPERSAND_NOT_FOLLOWED_BY_VAR_OR_VARARG type_without_static
          { $1[] = $3; $$ = $1; }
;

intersection_type_without_static:
      intersection_type_without_static_list { $$ = new Node\IntersectionType($1, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

type_expr_without_static:
      type_without_static                                   { $$ = $1; }
    | '?' type_without_static                               { $$ = new Node\NullableType($2, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | union_type_without_static                             { $$ = new Node\UnionType($1, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | intersection_type_without_static                      { $$ = $1; }
;

optional_type_without_static:
      /* empty */                                           { $$ = null; }
    | type_expr_without_static                              { $$ = $1; }
;

optional_return_type:
      /* empty */                                           { $$ = null; }
    | ':' type_expr                                         { $$ = $2; }
    | ':' error                                             { $$ = null; }
;

argument_list:
      '(' ')'                                               { $$ = array(); }
    | '(' non_empty_argument_list optional_comma ')'        { $$ = $2; }
    | '(' variadic_placeholder ')'                          { $$ = array($2); }
;

variadic_placeholder:
      T_ELLIPSIS                                            { $$ = new Node\VariadicPlaceholder(__DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

non_empty_argument_list:
      argument                                              { $$ = array($1); }
    | non_empty_argument_list ',' argument                  { $1[] = $3; $$ = $1; }
;

argument:
      expr                                                  { $$ = new Node\Arg($1, false, false, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | ampersand variable                                    { $$ = new Node\Arg($2, true, false, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_ELLIPSIS expr                                       { $$ = new Node\Arg($2, false, true, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | identifier_maybe_reserved ':' expr
          { $$ = new Node\Arg($3, false, false, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes, $1); }
;

global_var_list:
      non_empty_global_var_list no_comma                    { $$ = $1; }
;

non_empty_global_var_list:
      non_empty_global_var_list ',' global_var              { $1[] = $3; $$ = $1; }
    | global_var                                            { $$ = array($1); }
;

global_var:
      simple_variable                                       { $$ = $1; }
;

static_var_list:
      non_empty_static_var_list no_comma                    { $$ = $1; }
;

non_empty_static_var_list:
      non_empty_static_var_list ',' static_var              { $1[] = $3; $$ = $1; }
    | static_var                                            { $$ = array($1); }
;

static_var:
      plain_variable                                        { $$ = new Stmt\StaticVar($1, null, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | plain_variable '=' expr                               { $$ = new Stmt\StaticVar($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

class_statement_list_ex:
      class_statement_list_ex class_statement               { if ($2 !== null) { $1[] = $2; $$ = $1; } }
    | /* empty */                                           { $$ = array(); }
;

class_statement_list:
      class_statement_list_ex
          { __DOLLAR__startAttributes = __DOLLAR__this->lookaheadStartAttributes; if (isset(__DOLLAR__startAttributes['comments'])) { __DOLLAR__nop = new Stmt\Nop(__DOLLAR__this->createCommentNopAttributes(__DOLLAR__startAttributes['comments'])); } else { __DOLLAR__nop = null; };
            if (__DOLLAR__nop !== null) { $1[] = __DOLLAR__nop; } $$ = $1; }
;

class_statement:
      optional_attributes variable_modifiers optional_type_without_static property_declaration_list semi
          { $$ = new Stmt\Property($2, $4, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes, $3, $1);
            __DOLLAR__this->checkProperty($$, $2); }
    | optional_attributes method_modifiers T_CONST class_const_list semi
          { $$ = new Stmt\ClassConst($4, $2, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes, $1);
            __DOLLAR__this->checkClassConst($$, $2); }
    | optional_attributes method_modifiers T_FUNCTION optional_ref identifier_maybe_reserved '(' parameter_list ')'
      optional_return_type method_body
          { $$ = new Stmt\ClassMethod($5, ['type' => $2, 'byRef' => $4, 'params' => $7, 'returnType' => $9, 'stmts' => $10, 'attrGroups' => $1], __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes);
            __DOLLAR__this->checkClassMethod($$, $2); }
    | T_USE class_name_list trait_adaptations               { $$ = new Stmt\TraitUse($2, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | optional_attributes T_CASE identifier_maybe_reserved enum_case_expr semi
         { $$ = new Stmt\EnumCase($3, $4, $1, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | error                                                 { $$ = null; /* will be skipped */ }
;

trait_adaptations:
      ';'                                                   { $$ = array(); }
    | '{' trait_adaptation_list '}'                         { $$ = $2; }
;

trait_adaptation_list:
      /* empty */                                           { $$ = array(); }
    | trait_adaptation_list trait_adaptation                { $1[] = $2; $$ = $1; }
;

trait_adaptation:
      trait_method_reference_fully_qualified T_INSTEADOF class_name_list ';'
          { $$ = new Stmt\TraitUseAdaptation\Precedence($1[0], $1[1], $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | trait_method_reference T_AS member_modifier identifier_maybe_reserved ';'
          { $$ = new Stmt\TraitUseAdaptation\Alias($1[0], $1[1], $3, $4, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | trait_method_reference T_AS member_modifier ';'
          { $$ = new Stmt\TraitUseAdaptation\Alias($1[0], $1[1], $3, null, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | trait_method_reference T_AS identifier_not_reserved ';'
          { $$ = new Stmt\TraitUseAdaptation\Alias($1[0], $1[1], null, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | trait_method_reference T_AS reserved_non_modifiers_identifier ';'
          { $$ = new Stmt\TraitUseAdaptation\Alias($1[0], $1[1], null, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

trait_method_reference_fully_qualified:
      name T_PAAMAYIM_NEKUDOTAYIM identifier_maybe_reserved { $$ = array($1, $3); }
;
trait_method_reference:
      trait_method_reference_fully_qualified                { $$ = $1; }
    | identifier_maybe_reserved                             { $$ = array(null, $1); }
;

method_body:
      ';' /* abstract method */                             { $$ = null; }
    | block_or_error                                        { $$ = $1; }
;

variable_modifiers:
      non_empty_member_modifiers                            { $$ = $1; }
    | T_VAR                                                 { $$ = 0; }
;

method_modifiers:
      /* empty */                                           { $$ = 0; }
    | non_empty_member_modifiers                            { $$ = $1; }
;

non_empty_member_modifiers:
      member_modifier                                       { $$ = $1; }
    | non_empty_member_modifiers member_modifier            { __DOLLAR__this->checkModifier($1, $2, $2); $$ = $1 | $2; }
;

member_modifier:
      T_PUBLIC                                              { $$ = Stmt\Class_::MODIFIER_PUBLIC; }
    | T_PROTECTED                                           { $$ = Stmt\Class_::MODIFIER_PROTECTED; }
    | T_PRIVATE                                             { $$ = Stmt\Class_::MODIFIER_PRIVATE; }
    | T_STATIC                                              { $$ = Stmt\Class_::MODIFIER_STATIC; }
    | T_ABSTRACT                                            { $$ = Stmt\Class_::MODIFIER_ABSTRACT; }
    | T_FINAL                                               { $$ = Stmt\Class_::MODIFIER_FINAL; }
    | T_READONLY                                            { $$ = Stmt\Class_::MODIFIER_READONLY; }
;

property_declaration_list:
      non_empty_property_declaration_list no_comma          { $$ = $1; }
;

non_empty_property_declaration_list:
      property_declaration                                  { $$ = array($1); }
    | non_empty_property_declaration_list ',' property_declaration
          { $1[] = $3; $$ = $1; }
;

property_decl_name:
      T_VARIABLE                                            { $$ = new Node\VarLikeIdentifier(substr($1, 1), __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

property_declaration:
      property_decl_name                                    { $$ = new Stmt\PropertyProperty($1, null, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | property_decl_name '=' expr                           { $$ = new Stmt\PropertyProperty($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

expr_list_forbid_comma:
      non_empty_expr_list no_comma                          { $$ = $1; }
;

expr_list_allow_comma:
      non_empty_expr_list optional_comma                    { $$ = $1; }
;

non_empty_expr_list:
      non_empty_expr_list ',' expr                          { $1[] = $3; $$ = $1; }
    | expr                                                  { $$ = array($1); }
;

for_expr:
      /* empty */                                           { $$ = array(); }
    | expr_list_forbid_comma                                { $$ = $1; }
;

expr:
      variable                                              { $$ = $1; }
    | list_expr '=' expr                                    { $$ = new Expr\Assign($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | array_short_syntax '=' expr                           { $$ = new Expr\Assign($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | variable '=' expr                                     { $$ = new Expr\Assign($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | variable '=' ampersand variable                       { $$ = new Expr\AssignRef($1, $4, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | new_expr                                              { $$ = $1; }
    | match                                                 { $$ = $1; }
    | T_CLONE expr                                          { $$ = new Expr\Clone_($2, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | variable T_PLUS_EQUAL expr                            { $$ = new Expr\AssignOp\Plus($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | variable T_MINUS_EQUAL expr                           { $$ = new Expr\AssignOp\Minus($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | variable T_MUL_EQUAL expr                             { $$ = new Expr\AssignOp\Mul($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | variable T_DIV_EQUAL expr                             { $$ = new Expr\AssignOp\Div($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | variable T_CONCAT_EQUAL expr                          { $$ = new Expr\AssignOp\Concat($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | variable T_MOD_EQUAL expr                             { $$ = new Expr\AssignOp\Mod($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | variable T_AND_EQUAL expr                             { $$ = new Expr\AssignOp\BitwiseAnd($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | variable T_OR_EQUAL expr                              { $$ = new Expr\AssignOp\BitwiseOr($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | variable T_XOR_EQUAL expr                             { $$ = new Expr\AssignOp\BitwiseXor($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | variable T_SL_EQUAL expr                              { $$ = new Expr\AssignOp\ShiftLeft($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | variable T_SR_EQUAL expr                              { $$ = new Expr\AssignOp\ShiftRight($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | variable T_POW_EQUAL expr                             { $$ = new Expr\AssignOp\Pow($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | variable T_COALESCE_EQUAL expr                        { $$ = new Expr\AssignOp\Coalesce($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | variable T_INC                                        { $$ = new Expr\PostInc($1, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_INC variable                                        { $$ = new Expr\PreInc($2, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | variable T_DEC                                        { $$ = new Expr\PostDec($1, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_DEC variable                                        { $$ = new Expr\PreDec($2, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | expr T_BOOLEAN_OR expr                                { $$ = new Expr\BinaryOp\BooleanOr($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | expr T_BOOLEAN_AND expr                               { $$ = new Expr\BinaryOp\BooleanAnd($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | expr T_LOGICAL_OR expr                                { $$ = new Expr\BinaryOp\LogicalOr($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | expr T_LOGICAL_AND expr                               { $$ = new Expr\BinaryOp\LogicalAnd($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | expr T_LOGICAL_XOR expr                               { $$ = new Expr\BinaryOp\LogicalXor($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | expr '|' expr                                         { $$ = new Expr\BinaryOp\BitwiseOr($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | expr T_AMPERSAND_NOT_FOLLOWED_BY_VAR_OR_VARARG expr   { $$ = new Expr\BinaryOp\BitwiseAnd($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | expr T_AMPERSAND_FOLLOWED_BY_VAR_OR_VARARG expr       { $$ = new Expr\BinaryOp\BitwiseAnd($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | expr '^' expr                                         { $$ = new Expr\BinaryOp\BitwiseXor($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | expr '.' expr                                         { $$ = new Expr\BinaryOp\Concat($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | expr '+' expr                                         { $$ = new Expr\BinaryOp\Plus($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | expr '-' expr                                         { $$ = new Expr\BinaryOp\Minus($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | expr '*' expr                                         { $$ = new Expr\BinaryOp\Mul($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | expr '/' expr                                         { $$ = new Expr\BinaryOp\Div($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | expr '%' expr                                         { $$ = new Expr\BinaryOp\Mod($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | expr T_SL expr                                        { $$ = new Expr\BinaryOp\ShiftLeft($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | expr T_SR expr                                        { $$ = new Expr\BinaryOp\ShiftRight($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | expr T_POW expr                                       { $$ = new Expr\BinaryOp\Pow($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | '+' expr %prec T_INC                                  { $$ = new Expr\UnaryPlus($2, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | '-' expr %prec T_INC                                  { $$ = new Expr\UnaryMinus($2, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | '!' expr                                              { $$ = new Expr\BooleanNot($2, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | '~' expr                                              { $$ = new Expr\BitwiseNot($2, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | expr T_IS_IDENTICAL expr                              { $$ = new Expr\BinaryOp\Identical($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | expr T_IS_NOT_IDENTICAL expr                          { $$ = new Expr\BinaryOp\NotIdentical($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | expr T_IS_EQUAL expr                                  { $$ = new Expr\BinaryOp\Equal($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | expr T_IS_NOT_EQUAL expr                              { $$ = new Expr\BinaryOp\NotEqual($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | expr T_SPACESHIP expr                                 { $$ = new Expr\BinaryOp\Spaceship($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | expr '<' expr                                         { $$ = new Expr\BinaryOp\Smaller($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | expr T_IS_SMALLER_OR_EQUAL expr                       { $$ = new Expr\BinaryOp\SmallerOrEqual($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | expr '>' expr                                         { $$ = new Expr\BinaryOp\Greater($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | expr T_IS_GREATER_OR_EQUAL expr                       { $$ = new Expr\BinaryOp\GreaterOrEqual($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | expr T_INSTANCEOF class_name_reference                { $$ = new Expr\Instanceof_($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | '(' expr ')'                                          { $$ = $2; }
    | expr '?' expr ':' expr                                { $$ = new Expr\Ternary($1, $3, $5, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | expr '?' ':' expr                                     { $$ = new Expr\Ternary($1, null, $4, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | expr T_COALESCE expr                                  { $$ = new Expr\BinaryOp\Coalesce($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_ISSET '(' expr_list_allow_comma ')'                 { $$ = new Expr\Isset_($3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_EMPTY '(' expr ')'                                  { $$ = new Expr\Empty_($3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_INCLUDE expr                                        { $$ = new Expr\Include_($2, Expr\Include_::TYPE_INCLUDE, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_INCLUDE_ONCE expr                                   { $$ = new Expr\Include_($2, Expr\Include_::TYPE_INCLUDE_ONCE, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_EVAL '(' expr ')'                                   { $$ = new Expr\Eval_($3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_REQUIRE expr                                        { $$ = new Expr\Include_($2, Expr\Include_::TYPE_REQUIRE, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_REQUIRE_ONCE expr                                   { $$ = new Expr\Include_($2, Expr\Include_::TYPE_REQUIRE_ONCE, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_INT_CAST expr                                       { $$ = new Expr\Cast\Int_($2, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_DOUBLE_CAST expr
          { __DOLLAR__attrs = __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes;
            __DOLLAR__attrs['kind'] = __DOLLAR__this->getFloatCastKind($1);
            $$ = new Expr\Cast\Double($2, __DOLLAR__attrs); }
    | T_STRING_CAST expr                                    { $$ = new Expr\Cast\String_($2, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_ARRAY_CAST expr                                     { $$ = new Expr\Cast\Array_($2, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_OBJECT_CAST expr                                    { $$ = new Expr\Cast\Object_($2, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_BOOL_CAST expr                                      { $$ = new Expr\Cast\Bool_($2, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_UNSET_CAST expr                                     { $$ = new Expr\Cast\Unset_($2, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_EXIT exit_expr
          { __DOLLAR__attrs = __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes;
            __DOLLAR__attrs['kind'] = strtolower($1) === 'exit' ? Expr\Exit_::KIND_EXIT : Expr\Exit_::KIND_DIE;
            $$ = new Expr\Exit_($2, __DOLLAR__attrs); }
    | '@' expr                                              { $$ = new Expr\ErrorSuppress($2, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | scalar                                                { $$ = $1; }
    | '`' backticks_expr '`'                                { $$ = new Expr\ShellExec($2, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_PRINT expr                                          { $$ = new Expr\Print_($2, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_YIELD                                               { $$ = new Expr\Yield_(null, null, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_YIELD expr                                          { $$ = new Expr\Yield_($2, null, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_YIELD expr T_DOUBLE_ARROW expr                      { $$ = new Expr\Yield_($4, $2, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_YIELD_FROM expr                                     { $$ = new Expr\YieldFrom($2, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_THROW expr                                          { $$ = new Expr\Throw_($2, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }

    | T_FN optional_ref '(' parameter_list ')' optional_return_type T_DOUBLE_ARROW expr %prec T_THROW
          { $$ = new Expr\ArrowFunction(['static' => false, 'byRef' => $2, 'params' => $4, 'returnType' => $6, 'expr' => $8, 'attrGroups' => []], __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_STATIC T_FN optional_ref '(' parameter_list ')' optional_return_type T_DOUBLE_ARROW expr %prec T_THROW
          { $$ = new Expr\ArrowFunction(['static' => true, 'byRef' => $3, 'params' => $5, 'returnType' => $7, 'expr' => $9, 'attrGroups' => []], __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_FUNCTION optional_ref '(' parameter_list ')' lexical_vars optional_return_type block_or_error
          { $$ = new Expr\Closure(['static' => false, 'byRef' => $2, 'params' => $4, 'uses' => $6, 'returnType' => $7, 'stmts' => $8, 'attrGroups' => []], __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_STATIC T_FUNCTION optional_ref '(' parameter_list ')' lexical_vars optional_return_type       block_or_error
          { $$ = new Expr\Closure(['static' => true, 'byRef' => $3, 'params' => $5, 'uses' => $7, 'returnType' => $8, 'stmts' => $9, 'attrGroups' => []], __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }

    | attributes T_FN optional_ref '(' parameter_list ')' optional_return_type T_DOUBLE_ARROW expr %prec T_THROW
          { $$ = new Expr\ArrowFunction(['static' => false, 'byRef' => $3, 'params' => $5, 'returnType' => $7, 'expr' => $9, 'attrGroups' => $1], __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | attributes T_STATIC T_FN optional_ref '(' parameter_list ')' optional_return_type T_DOUBLE_ARROW expr %prec T_THROW
          { $$ = new Expr\ArrowFunction(['static' => true, 'byRef' => $4, 'params' => $6, 'returnType' => $8, 'expr' => $10, 'attrGroups' => $1], __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | attributes T_FUNCTION optional_ref '(' parameter_list ')' lexical_vars optional_return_type block_or_error
          { $$ = new Expr\Closure(['static' => false, 'byRef' => $3, 'params' => $5, 'uses' => $7, 'returnType' => $8, 'stmts' => $9, 'attrGroups' => $1], __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | attributes T_STATIC T_FUNCTION optional_ref '(' parameter_list ')' lexical_vars optional_return_type       block_or_error
          { $$ = new Expr\Closure(['static' => true, 'byRef' => $4, 'params' => $6, 'uses' => $8, 'returnType' => $9, 'stmts' => $10, 'attrGroups' => $1], __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

anonymous_class:
      optional_attributes T_CLASS ctor_arguments extends_from implements_list '{' class_statement_list '}'
          { $$ = array(new Stmt\Class_(null, ['type' => 0, 'extends' => $4, 'implements' => $5, 'stmts' => $7, 'attrGroups' => $1], __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes), $3);
            __DOLLAR__this->checkClass($$[0], -1); }
;

new_expr:
      T_NEW class_name_reference ctor_arguments             { $$ = new Expr\New_($2, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_NEW anonymous_class
          { list(__DOLLAR__class, __DOLLAR__ctorArgs) = $2; $$ = new Expr\New_(__DOLLAR__class, __DOLLAR__ctorArgs, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

lexical_vars:
      /* empty */                                           { $$ = array(); }
    | T_USE '(' lexical_var_list ')'                        { $$ = $3; }
;

lexical_var_list:
      non_empty_lexical_var_list optional_comma             { $$ = $1; }
;

non_empty_lexical_var_list:
      lexical_var                                           { $$ = array($1); }
    | non_empty_lexical_var_list ',' lexical_var            { $1[] = $3; $$ = $1; }
;

lexical_var:
      optional_ref plain_variable                           { $$ = new Expr\ClosureUse($2, $1, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

name_readonly:
      T_READONLY                                            { $$ = new Name($1, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

function_call:
      name argument_list                                    { $$ = new Expr\FuncCall($1, $2, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | name_readonly argument_list                           { $$ = new Expr\FuncCall($1, $2, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | callable_expr argument_list                           { $$ = new Expr\FuncCall($1, $2, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | class_name_or_var T_PAAMAYIM_NEKUDOTAYIM member_name argument_list
          { $$ = new Expr\StaticCall($1, $3, $4, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

class_name:
      T_STATIC                                              { $$ = new Name($1, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | name                                                  { $$ = $1; }
;

name:
      T_STRING                                              { $$ = new Name($1, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_NAME_QUALIFIED                                      { $$ = new Name($1, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_NAME_FULLY_QUALIFIED                                { $$ = new Name\FullyQualified(substr($1, 1), __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_NAME_RELATIVE                                       { $$ = new Name\Relative(substr($1, 10), __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

class_name_reference:
      class_name                                            { $$ = $1; }
    | new_variable                                          { $$ = $1; }
    | '(' expr ')'                                          { $$ = $2; }
    | error                                                 { $$ = new Expr\Error(__DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); __DOLLAR__this->errorState = 2; }
;

class_name_or_var:
      class_name                                            { $$ = $1; }
    | fully_dereferencable                                  { $$ = $1; }
;

exit_expr:
      /* empty */                                           { $$ = null; }
    | '(' optional_expr ')'                                 { $$ = $2; }
;

backticks_expr:
      /* empty */                                           { $$ = array(); }
    | T_ENCAPSED_AND_WHITESPACE
          { $$ = array(new Scalar\EncapsedStringPart(Scalar\String_::parseEscapeSequences($1, '`'), __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes)); }
    | encaps_list                                           { foreach ($1 as __DOLLAR__s) { if (__DOLLAR__s instanceof Node\Scalar\EncapsedStringPart) { __DOLLAR__s->value = Node\Scalar\String_::parseEscapeSequences(__DOLLAR__s->value, '`', true); } }; $$ = $1; }
;

ctor_arguments:
      /* empty */                                           { $$ = array(); }
    | argument_list                                         { $$ = $1; }
;

constant:
      name                                                  { $$ = new Expr\ConstFetch($1, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_LINE                                                { $$ = new Scalar\MagicConst\Line(__DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_FILE                                                { $$ = new Scalar\MagicConst\File(__DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_DIR                                                 { $$ = new Scalar\MagicConst\Dir(__DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_CLASS_C                                             { $$ = new Scalar\MagicConst\Class_(__DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_TRAIT_C                                             { $$ = new Scalar\MagicConst\Trait_(__DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_METHOD_C                                            { $$ = new Scalar\MagicConst\Method(__DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_FUNC_C                                              { $$ = new Scalar\MagicConst\Function_(__DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_NS_C                                                { $$ = new Scalar\MagicConst\Namespace_(__DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

class_constant:
      class_name_or_var T_PAAMAYIM_NEKUDOTAYIM identifier_maybe_reserved
          { $$ = new Expr\ClassConstFetch($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    /* We interpret an isolated FOO:: as an unfinished class constant fetch. It could also be
       an unfinished static property fetch or unfinished scoped call. */
    | class_name_or_var T_PAAMAYIM_NEKUDOTAYIM error
          { $$ = new Expr\ClassConstFetch($1, new Expr\Error(__DOLLAR__this->startAttributeStack[$3] + __DOLLAR__this->endAttributeStack[$3]), __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); __DOLLAR__this->errorState = 2; }
;

array_short_syntax:
      '[' array_pair_list ']'
          { __DOLLAR__attrs = __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes; __DOLLAR__attrs['kind'] = Expr\Array_::KIND_SHORT;
            $$ = new Expr\Array_($2, __DOLLAR__attrs); }
;

dereferencable_scalar:
      T_ARRAY '(' array_pair_list ')'
          { __DOLLAR__attrs = __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes; __DOLLAR__attrs['kind'] = Expr\Array_::KIND_LONG;
            $$ = new Expr\Array_($3, __DOLLAR__attrs); }
    | array_short_syntax                                    { $$ = $1; }
    | T_CONSTANT_ENCAPSED_STRING                            { $$ = Scalar\String_::fromString($1, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | '"' encaps_list '"'
          { __DOLLAR__attrs = __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes; __DOLLAR__attrs['kind'] = Scalar\String_::KIND_DOUBLE_QUOTED;
            foreach ($2 as __DOLLAR__s) { if (__DOLLAR__s instanceof Node\Scalar\EncapsedStringPart) { __DOLLAR__s->value = Node\Scalar\String_::parseEscapeSequences(__DOLLAR__s->value, '"', true); } }; $$ = new Scalar\Encapsed($2, __DOLLAR__attrs); }
;

scalar:
      T_LNUMBER                                             { $$ = __DOLLAR__this->parseLNumber($1, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_DNUMBER                                             { $$ = Scalar\DNumber::fromString($1, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | dereferencable_scalar                                 { $$ = $1; }
    | constant                                              { $$ = $1; }
    | class_constant                                        { $$ = $1; }
    | T_START_HEREDOC T_ENCAPSED_AND_WHITESPACE T_END_HEREDOC
          { $$ = __DOLLAR__this->parseDocString($1, $2, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes, __DOLLAR__this->startAttributeStack[$3] + __DOLLAR__this->endAttributeStack[$3], true); }
    | T_START_HEREDOC T_END_HEREDOC
          { $$ = __DOLLAR__this->parseDocString($1, '', $2, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes, __DOLLAR__this->startAttributeStack[$2] + __DOLLAR__this->endAttributeStack[$2], true); }
    | T_START_HEREDOC encaps_list T_END_HEREDOC
          { $$ = __DOLLAR__this->parseDocString($1, $2, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes, __DOLLAR__this->startAttributeStack[$3] + __DOLLAR__this->endAttributeStack[$3], true); }
;

optional_expr:
      /* empty */                                           { $$ = null; }
    | expr                                                  { $$ = $1; }
;

fully_dereferencable:
      variable                                              { $$ = $1; }
    | '(' expr ')'                                          { $$ = $2; }
    | dereferencable_scalar                                 { $$ = $1; }
    | class_constant                                        { $$ = $1; }
;

array_object_dereferencable:
      fully_dereferencable                                  { $$ = $1; }
    | constant                                              { $$ = $1; }
;

callable_expr:
      callable_variable                                     { $$ = $1; }
    | '(' expr ')'                                          { $$ = $2; }
    | dereferencable_scalar                                 { $$ = $1; }
;

callable_variable:
      simple_variable                                       { $$ = $1; }
    | array_object_dereferencable '[' optional_expr ']'     { $$ = new Expr\ArrayDimFetch($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | array_object_dereferencable '{' expr '}'              { $$ = new Expr\ArrayDimFetch($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | function_call                                         { $$ = $1; }
    | array_object_dereferencable T_OBJECT_OPERATOR property_name argument_list
          { $$ = new Expr\MethodCall($1, $3, $4, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | array_object_dereferencable T_NULLSAFE_OBJECT_OPERATOR property_name argument_list
          { $$ = new Expr\NullsafeMethodCall($1, $3, $4, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

optional_plain_variable:
      /* empty */                                           { $$ = null; }
    | plain_variable                                        { $$ = $1; }
;

variable:
      callable_variable                                     { $$ = $1; }
    | static_member                                         { $$ = $1; }
    | array_object_dereferencable T_OBJECT_OPERATOR property_name
          { $$ = new Expr\PropertyFetch($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | array_object_dereferencable T_NULLSAFE_OBJECT_OPERATOR property_name
          { $$ = new Expr\NullsafePropertyFetch($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

simple_variable:
      plain_variable                                        { $$ = $1; }
    | '$' '{' expr '}'                                      { $$ = new Expr\Variable($3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | '$' simple_variable                                   { $$ = new Expr\Variable($2, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | '$' error                                             { $$ = new Expr\Variable(new Expr\Error(__DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes), __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); __DOLLAR__this->errorState = 2; }
;

static_member_prop_name:
      simple_variable
          { __DOLLAR__var = $1->name; $$ = \is_string(__DOLLAR__var) ? new Node\VarLikeIdentifier(__DOLLAR__var, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes) : __DOLLAR__var; }
;

static_member:
      class_name_or_var T_PAAMAYIM_NEKUDOTAYIM static_member_prop_name
          { $$ = new Expr\StaticPropertyFetch($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

new_variable:
      simple_variable                                       { $$ = $1; }
    | new_variable '[' optional_expr ']'                    { $$ = new Expr\ArrayDimFetch($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | new_variable '{' expr '}'                             { $$ = new Expr\ArrayDimFetch($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | new_variable T_OBJECT_OPERATOR property_name          { $$ = new Expr\PropertyFetch($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | new_variable T_NULLSAFE_OBJECT_OPERATOR property_name { $$ = new Expr\NullsafePropertyFetch($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | class_name T_PAAMAYIM_NEKUDOTAYIM static_member_prop_name
          { $$ = new Expr\StaticPropertyFetch($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | new_variable T_PAAMAYIM_NEKUDOTAYIM static_member_prop_name
          { $$ = new Expr\StaticPropertyFetch($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

member_name:
      identifier_maybe_reserved                             { $$ = $1; }
    | '{' expr '}'                                          { $$ = $2; }
    | simple_variable                                       { $$ = $1; }
;

property_name:
      identifier_not_reserved                               { $$ = $1; }
    | '{' expr '}'                                          { $$ = $2; }
    | simple_variable                                       { $$ = $1; }
    | error                                                 { $$ = new Expr\Error(__DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); __DOLLAR__this->errorState = 2; }
;

list_expr:
      T_LIST '(' inner_array_pair_list ')'                  { $$ = new Expr\List_($3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

array_pair_list:
      inner_array_pair_list
          { $$ = $1; __DOLLAR__end = count($$)-1; if ($$[__DOLLAR__end] === null) array_pop($$); }
;

comma_or_error:
      ','
    | error
          { /* do nothing -- prevent default action of $$=$1. See $551. */ }
;

inner_array_pair_list:
      inner_array_pair_list comma_or_error array_pair       { $1[] = $3; $$ = $1; }
    | array_pair                                            { $$ = array($1); }
;

array_pair:
      expr                                                  { $$ = new Expr\ArrayItem($1, null, false, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | ampersand variable                                    { $$ = new Expr\ArrayItem($2, null, true, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | list_expr                                             { $$ = new Expr\ArrayItem($1, null, false, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | expr T_DOUBLE_ARROW expr                              { $$ = new Expr\ArrayItem($3, $1, false, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | expr T_DOUBLE_ARROW ampersand variable                { $$ = new Expr\ArrayItem($4, $1, true, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | expr T_DOUBLE_ARROW list_expr                         { $$ = new Expr\ArrayItem($3, $1, false, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_ELLIPSIS expr                                       { $$ = new Expr\ArrayItem($2, null, false, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes, true, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | /* empty */                                           { $$ = null; }
;

encaps_list:
      encaps_list encaps_var                                { $1[] = $2; $$ = $1; }
    | encaps_list encaps_string_part                        { $1[] = $2; $$ = $1; }
    | encaps_var                                            { $$ = array($1); }
    | encaps_string_part encaps_var                         { $$ = array($1, $2); }
;

encaps_string_part:
      T_ENCAPSED_AND_WHITESPACE                             { $$ = new Scalar\EncapsedStringPart($1, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

encaps_str_varname:
      T_STRING_VARNAME                                      { $$ = new Expr\Variable($1, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
;

encaps_var:
      plain_variable                                        { $$ = $1; }
    | plain_variable '[' encaps_var_offset ']'              { $$ = new Expr\ArrayDimFetch($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | plain_variable T_OBJECT_OPERATOR identifier_not_reserved
          { $$ = new Expr\PropertyFetch($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | plain_variable T_NULLSAFE_OBJECT_OPERATOR identifier_not_reserved
          { $$ = new Expr\NullsafePropertyFetch($1, $3, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_DOLLAR_OPEN_CURLY_BRACES expr '}'                   { $$ = new Expr\Variable($2, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_DOLLAR_OPEN_CURLY_BRACES T_STRING_VARNAME '}'       { $$ = new Expr\Variable($2, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_DOLLAR_OPEN_CURLY_BRACES encaps_str_varname '[' expr ']' '}'
          { $$ = new Expr\ArrayDimFetch($2, $4, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_CURLY_OPEN variable '}'                             { $$ = $2; }
;

encaps_var_offset:
      T_STRING                                              { $$ = new Scalar\String_($1, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | T_NUM_STRING                                          { $$ = __DOLLAR__this->parseNumString($1, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | '-' T_NUM_STRING                                      { $$ = __DOLLAR__this->parseNumString('-' . $2, __DOLLAR__this->startAttributeStack[$1] + __DOLLAR__this->endAttributes); }
    | plain_variable                                        { $$ = $1; }
;

%%
