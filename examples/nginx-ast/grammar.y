%define api.parser.class {Parser}
%define api.namespace {App}
%code parser {
    private Node $ast;
    public function setAst(Node $ast): void { $this->ast = $ast; }
    public function getAst(): Node { return $this>ast; }
}

%token T_SERVER
%token T_SERVER_NAME
%token T_SERVER_NAME_VALUE
%token T_SERVER_ROOT
%token T_SERVER_ROOT_PATH
%token T_LOCATION
%token T_LOCATION_PATH
%token T_LOCATION_PATH_REGEXP
%token T_RETURN
%token T_RETURN_CODE
%token T_RETURN_BODY
%token T_ERROR_LOG
%token T_ERROR_LOG_PATH
%token T_ACCESS_LOG
%token T_ACCESS_LOG_PATH
%token T_FAST_CGI_PATH
%token T_FAST_CGI_PATH_PATH
%token T_FAST_CGI_SPLIT_PATH_INFO
%token T_FAST_CGI_SPLIT_PATH_INFO_PATH
%token T_FAST_CGI_PARAM
%token T_FAST_CGI_PARAM_KEY
%token T_FAST_CGI_PARAM_VALUE
%token T_INCLUDE
%token T_INCLUDE_PATH
%token T_INTERNAL
%token T_TRY_FILES
%token T_TRY_FILES_PATH

%%
server:
  T_SERVER '{' server_body_list '}' { self::setAst(new Node('T_SERVER', [], $3)); }
;

server_name_values:
  T_SERVER_NAME_VALUE                     { $$ = [$1]; }
| server_name_values T_SERVER_NAME_VALUE  { $$ = $1; $$[] = $2; }
;

location_optional_regexp_path:
    %empty                    { $$ = ''; }
|     T_LOCATION_PATH_REGEXP  { $$ = $1; }
;

server_body:
  T_SERVER_NAME server_name_values ';'  { $$ = new Node('T_SERVER_NAME', ['names' => $2]); }
| T_SERVER_ROOT T_SERVER_ROOT_PATH ';'  { $$ = new Node('T_SERVER_ROOT', ['path' => $2]); }
| T_ERROR_LOG T_ERROR_LOG_PATH ';'      { $$ = new Node('T_ERROR_LOG', ['path' => $2]); }
| T_ACCESS_LOG T_ACCESS_LOG_PATH ';'    { $$ = new Node('T_ACCESS_LOG', ['path' => $2]); }
| T_LOCATION location_optional_regexp_path T_LOCATION_PATH '{' location_body_list '}' { $$ = new  Node('T_LOCATION', ['regexp' => $2, 'path' => $3], $5); }
;

server_body_list:
  server_body_list server_body  { $$[] = $2; }
| %empty                        { $$ = []; }
;

optional_return_body:
  %empty         { $$ = '';}
| T_RETURN_BODY  { $$ = $1; }
;

try_files_path_list:
  T_TRY_FILES_PATH                      { $$ = [$1]; }
| try_files_path_list T_TRY_FILES_PATH  { $$ = $1; $$[] = $2; }
;

location_body:
  T_RETURN T_RETURN_CODE optional_return_body ';'                  { $$ = new Node('T_RETURN', ['code' => $2, 'body' => $3]); }
| T_FAST_CGI_PATH T_FAST_CGI_PATH_PATH ';'                         { $$ = new Node('T_FAST_CGI_PATH', ['path' => $2]); }
| T_FAST_CGI_SPLIT_PATH_INFO T_FAST_CGI_SPLIT_PATH_INFO_PATH ';'   { $$ = new Node('T_FAST_CGI_SPLIT_PATH_INFO', ['path' => $2]); }
| T_FAST_CGI_PARAM T_FAST_CGI_PARAM_KEY T_FAST_CGI_PARAM_VALUE ';' { $$ = new Node('T_FAST_CGI_PARAM', [$2 => $3]); }
| T_INCLUDE T_INCLUDE_PATH ';'                                     { $$ = new Node('T_INCLUDE', ['path' => $2]); }
| T_INTERNAL ';'                                                   { $$ = new Node('T_INTERNAL'); }
| T_TRY_FILES try_files_path_list ';'                              { $$ = new Node('T_TRY_FILES', [ 'paths' => $2 ]); }
;

location_body_list:
  location_body_list location_body  { $$[] = $2; }
| %empty                            { $$ = []; }
;
