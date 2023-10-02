<?php
/* A Bison parser, made by GNU Bison 3.8.2.  */

/* Skeleton implementation for Bison LALR(1) parsers in PHP

   Copyright (C) 2007-2015, 2018-2021 Free Software Foundation, Inc.

   This program is free software: you can redistribute it and/or modify
   it under the terms of the GNU General Public License as published by
   the Free Software Foundation, either version 3 of the License, or
   (at your option) any later version.

   This program is distributed in the hope that it will be useful,
   but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   GNU General Public License for more details.

   You should have received a copy of the GNU General Public License
   along with this program.  If not, see <https://www.gnu.org/licenses/>.  */

/* As a special exception, you may create a larger work that contains
   part or all of the Bison parser skeleton and distribute that work
   under terms of your choice, so long as that work isn't itself a
   parser generator using the skeleton or a modified version thereof
   as a parser skeleton.  Alternatively, if you modify or redistribute
   the parser skeleton itself, you may (at your option) remove this
   special exception, which will cause the skeleton and the resulting
   Bison output files to be licensed under the GNU General Public
   License without this special exception.

   This special exception was added by the Free Software Foundation in
   version 2.2 of Bison.  */

/* DO NOT RELY ON FEATURES THAT ARE NOT DOCUMENTED in the manual,
   especially those whose name start with YY_ or yy_.  They are
   private implementation details that can be changed or removed.  */

namespace App;






/**
 * A Bison parser, automatically generated from <tt>grammar.y</tt>.
 *
 * @author LALR (1) parser skeleton written by Paolo Bonzini.
 * Port to PHP language was done by Anton Sukhachev <mrsuh6@gmail.com>.
 */

 /**
   * Communication interface between the scanner and the Bison-generated
   * parser <tt>Parser</tt>.
   */
interface LexerInterface {
    /* Token kinds.  */
    /** Token "end of file", to be returned by the scanner.  */
    public const YYEOF = 0;
    /** Token error, to be returned by the scanner.  */
    public const YYerror = 256;
    /** Token "invalid token", to be returned by the scanner.  */
    public const YYUNDEF = 257;
    /** Token T_SERVER, to be returned by the scanner.  */
    public const T_SERVER = 258;
    /** Token T_SERVER_NAME, to be returned by the scanner.  */
    public const T_SERVER_NAME = 259;
    /** Token T_SERVER_NAME_VALUE, to be returned by the scanner.  */
    public const T_SERVER_NAME_VALUE = 260;
    /** Token T_SERVER_ROOT, to be returned by the scanner.  */
    public const T_SERVER_ROOT = 261;
    /** Token T_SERVER_ROOT_PATH, to be returned by the scanner.  */
    public const T_SERVER_ROOT_PATH = 262;
    /** Token T_LOCATION, to be returned by the scanner.  */
    public const T_LOCATION = 263;
    /** Token T_LOCATION_PATH, to be returned by the scanner.  */
    public const T_LOCATION_PATH = 264;
    /** Token T_LOCATION_PATH_REGEXP, to be returned by the scanner.  */
    public const T_LOCATION_PATH_REGEXP = 265;
    /** Token T_RETURN, to be returned by the scanner.  */
    public const T_RETURN = 266;
    /** Token T_RETURN_CODE, to be returned by the scanner.  */
    public const T_RETURN_CODE = 267;
    /** Token T_RETURN_BODY, to be returned by the scanner.  */
    public const T_RETURN_BODY = 268;
    /** Token T_ERROR_LOG, to be returned by the scanner.  */
    public const T_ERROR_LOG = 269;
    /** Token T_ERROR_LOG_PATH, to be returned by the scanner.  */
    public const T_ERROR_LOG_PATH = 270;
    /** Token T_ACCESS_LOG, to be returned by the scanner.  */
    public const T_ACCESS_LOG = 271;
    /** Token T_ACCESS_LOG_PATH, to be returned by the scanner.  */
    public const T_ACCESS_LOG_PATH = 272;
    /** Token T_FAST_CGI_PATH, to be returned by the scanner.  */
    public const T_FAST_CGI_PATH = 273;
    /** Token T_FAST_CGI_PATH_PATH, to be returned by the scanner.  */
    public const T_FAST_CGI_PATH_PATH = 274;
    /** Token T_FAST_CGI_SPLIT_PATH_INFO, to be returned by the scanner.  */
    public const T_FAST_CGI_SPLIT_PATH_INFO = 275;
    /** Token T_FAST_CGI_SPLIT_PATH_INFO_PATH, to be returned by the scanner.  */
    public const T_FAST_CGI_SPLIT_PATH_INFO_PATH = 276;
    /** Token T_FAST_CGI_PARAM, to be returned by the scanner.  */
    public const T_FAST_CGI_PARAM = 277;
    /** Token T_FAST_CGI_PARAM_KEY, to be returned by the scanner.  */
    public const T_FAST_CGI_PARAM_KEY = 278;
    /** Token T_FAST_CGI_PARAM_VALUE, to be returned by the scanner.  */
    public const T_FAST_CGI_PARAM_VALUE = 279;
    /** Token T_INCLUDE, to be returned by the scanner.  */
    public const T_INCLUDE = 280;
    /** Token T_INCLUDE_PATH, to be returned by the scanner.  */
    public const T_INCLUDE_PATH = 281;
    /** Token T_INTERNAL, to be returned by the scanner.  */
    public const T_INTERNAL = 282;
    /** Token T_TRY_FILES, to be returned by the scanner.  */
    public const T_TRY_FILES = 283;
    /** Token T_TRY_FILES_PATH, to be returned by the scanner.  */
    public const T_TRY_FILES_PATH = 284;




    /**
     * Method to retrieve the semantic value of the last scanned token.
     * @return mixed the semantic value of the last scanned token.
     */
     public function getLVal();

    /**
     * Entry point for the scanner.  Returns the token identifier corresponding
     * to the next token and prepares to return the semantic value
     * of the token.
     * @return int the token identifier corresponding to the next token.
     */
    public function yylex(): int;

    /**
     * Emit an errorin a user-defined way.
     *
     *
     * @param string $message The string for the error message.
     */
     public function yyerror(string $message): void;


  }




  /**
   * Information needed to get the list of expected tokens and to forge
   * a syntax error diagnostic.
   */
  class Context {
    public function __construct(Parser $parser, YYStack $stack, SymbolKind $token) {
      $this->yyparser = $parser;
      $this->yystack = $stack;
      $this->yytoken = $token;
    }

    private Parser $yyparser;
    private YYStack $yystack;


    /**
     * The symbol kind of the lookahead token.
     */
    public function getToken(): SymbolKind {
      return $this->yytoken;
    }

    private SymbolKind $yytoken;
    public const NTOKENS = Parser::YYNTOKENS;

    /**
     * Put in YYARG at most YYARGN of the expected tokens given the
     * current YYCTX, and return the number of tokens stored in YYARG.  If
     * YYARG is null, return the number of expected tokens (guaranteed to
     * be less than YYNTOKENS).
     * @param SymbolKind[] $yyarg
     */
    public function getExpectedTokens(array &$yyarg, int $yyoffset, int $yyargn): int {
      $yycount = $yyoffset;
      $yyn = $this->yyparser->yypact[$this->yystack->stateAt(0)];
      if (!$this->yyparser->yyPactValueIsDefault($yyn))
        {
          /* Start YYX at -YYN if negative to avoid negative
             indexes in YYCHECK.  In other words, skip the first
             -YYN actions for this state because they are default
             actions.  */
          $yyxbegin = $yyn < 0 ? -$yyn : 0;
          /* Stay within bounds of both yycheck and yytname.  */
          $yychecklim = Parser::YYLAST - $yyn + 1;
          $yyxend = $yychecklim < self::NTOKENS ? $yychecklim : self::NTOKENS;
          for ($yyx = $yyxbegin; $yyx < $yyxend; ++$yyx)
            if ($this->yyparser->yycheck[$yyx + $yyn] === $yyx && $yyx !== SymbolKind::S_YYerror
                && !$this->yyparser->yyTableValueIsError($this->yyparser->yytable[$yyx + $yyn]))
              {
                if ($yyarg === null)
                  $yycount += 1;
                else if ($yycount === $yyargn)
                  return 0; // FIXME: this is incorrect.
                else
                  $yyarg[$yycount++] = new SymbolKind($yyx);
              }
        }
      if ($yyarg !== null && $yycount === $yyoffset && $yyoffset < $yyargn)
        $yyarg[$yycount] = null;
      return $yycount - $yyoffset;
    }
  }

  class YYStack {
    private array $stateStack = [];
    private array $valueStack = [];

    public int $height = -1;

    /**
     * @param mixed $value
     */
    public function push(int $state, $value): void {
      $this->height++;

      $this->stateStack[$this->height] = $state;
      $this->valueStack[$this->height] = $value;
    }

    public function pop(int $num = 1): void {
      $this->height -= $num;
    }

    public function &stateAt(int $i): int {
      return $this->stateStack[$this->height - $i];
    }

    /**
     * @return mixed
     */
    public function &valueAt(int $i) {
      return $this->valueStack[$this->height - $i];
    }

    // Print the state stack on the debug stream.
    public function print($resource): void {
      fputs($resource,"Stack now");
      for ($i = 0; $i <= $this->height; $i++) {
        fputs($resource, ' ' . $this->stateStack[$i]);
      }
      fputs($resource, PHP_EOL);
    }
  }


  class SymbolKind
  {
    public const S_YYEOF = 0;      /* "end of file"  */
    public const S_YYerror = 1;    /* error  */
    public const S_YYUNDEF = 2;    /* "invalid token"  */
    public const S_T_SERVER = 3;   /* T_SERVER  */
    public const S_T_SERVER_NAME = 4; /* T_SERVER_NAME  */
    public const S_T_SERVER_NAME_VALUE = 5; /* T_SERVER_NAME_VALUE  */
    public const S_T_SERVER_ROOT = 6; /* T_SERVER_ROOT  */
    public const S_T_SERVER_ROOT_PATH = 7; /* T_SERVER_ROOT_PATH  */
    public const S_T_LOCATION = 8; /* T_LOCATION  */
    public const S_T_LOCATION_PATH = 9; /* T_LOCATION_PATH  */
    public const S_T_LOCATION_PATH_REGEXP = 10; /* T_LOCATION_PATH_REGEXP  */
    public const S_T_RETURN = 11;  /* T_RETURN  */
    public const S_T_RETURN_CODE = 12; /* T_RETURN_CODE  */
    public const S_T_RETURN_BODY = 13; /* T_RETURN_BODY  */
    public const S_T_ERROR_LOG = 14; /* T_ERROR_LOG  */
    public const S_T_ERROR_LOG_PATH = 15; /* T_ERROR_LOG_PATH  */
    public const S_T_ACCESS_LOG = 16; /* T_ACCESS_LOG  */
    public const S_T_ACCESS_LOG_PATH = 17; /* T_ACCESS_LOG_PATH  */
    public const S_T_FAST_CGI_PATH = 18; /* T_FAST_CGI_PATH  */
    public const S_T_FAST_CGI_PATH_PATH = 19; /* T_FAST_CGI_PATH_PATH  */
    public const S_T_FAST_CGI_SPLIT_PATH_INFO = 20; /* T_FAST_CGI_SPLIT_PATH_INFO  */
    public const S_T_FAST_CGI_SPLIT_PATH_INFO_PATH = 21; /* T_FAST_CGI_SPLIT_PATH_INFO_PATH  */
    public const S_T_FAST_CGI_PARAM = 22; /* T_FAST_CGI_PARAM  */
    public const S_T_FAST_CGI_PARAM_KEY = 23; /* T_FAST_CGI_PARAM_KEY  */
    public const S_T_FAST_CGI_PARAM_VALUE = 24; /* T_FAST_CGI_PARAM_VALUE  */
    public const S_T_INCLUDE = 25; /* T_INCLUDE  */
    public const S_T_INCLUDE_PATH = 26; /* T_INCLUDE_PATH  */
    public const S_T_INTERNAL = 27; /* T_INTERNAL  */
    public const S_T_TRY_FILES = 28; /* T_TRY_FILES  */
    public const S_T_TRY_FILES_PATH = 29; /* T_TRY_FILES_PATH  */
    public const S_30_ = 30;       /* '{'  */
    public const S_31_ = 31;       /* '}'  */
    public const S_32_ = 32;       /* ';'  */
    public const S_YYACCEPT = 33;  /* $accept  */
    public const S_server = 34;    /* server  */
    public const S_server_name_values = 35; /* server_name_values  */
    public const S_location_optional_regexp_path = 36; /* location_optional_regexp_path  */
    public const S_server_body = 37; /* server_body  */
    public const S_server_body_list = 38; /* server_body_list  */
    public const S_optional_return_body = 39; /* optional_return_body  */
    public const S_try_files_path_list = 40; /* try_files_path_list  */
    public const S_location_body = 41; /* location_body  */
    public const S_location_body_list = 42; /* location_body_list  */


    private int $yycode;

    public function __construct(int $yycode) {
      $this->yycode = $yycode;
    }

    public function getCode(): int {
        return $this->yycode;
    }


    private const NAMES = array("\"end of file\"", "error", "\"invalid token\"", "T_SERVER",
  "T_SERVER_NAME", "T_SERVER_NAME_VALUE", "T_SERVER_ROOT",
  "T_SERVER_ROOT_PATH", "T_LOCATION", "T_LOCATION_PATH",
  "T_LOCATION_PATH_REGEXP", "T_RETURN", "T_RETURN_CODE", "T_RETURN_BODY",
  "T_ERROR_LOG", "T_ERROR_LOG_PATH", "T_ACCESS_LOG", "T_ACCESS_LOG_PATH",
  "T_FAST_CGI_PATH", "T_FAST_CGI_PATH_PATH", "T_FAST_CGI_SPLIT_PATH_INFO",
  "T_FAST_CGI_SPLIT_PATH_INFO_PATH", "T_FAST_CGI_PARAM",
  "T_FAST_CGI_PARAM_KEY", "T_FAST_CGI_PARAM_VALUE", "T_INCLUDE",
  "T_INCLUDE_PATH", "T_INTERNAL", "T_TRY_FILES", "T_TRY_FILES_PATH", "'{'",
  "'}'", "';'", "\$accept", "server", "server_name_values",
  "location_optional_regexp_path", "server_body", "server_body_list",
  "optional_return_body", "try_files_path_list", "location_body",
  "location_body_list", null);

    public function getName(): string {
        return trim(self::NAMES[$this->yycode], '"\'');
    }

  }




class Parser
{
  /** Version number for the Bison executable that generated this parser.  */
  public const BISON_VERSION = "3.8.2";

  /** Name of the skeleton that generated this parser.  */
  public const BISON_SKELETON = "../../src/php-skel.m4";

/* "%code parser" blocks.  */
/* "grammar.y":3  */

    private Node $ast;
    public function setAst(Node $ast): void { $this->ast = $ast; }
    public function getAst(): Node { return $this->ast; }

/* "lib/parser.php":352  */






  /**
   * The object doing lexical analysis for us.
   */
  private LexerInterface $yylexer;




  /**
   * Instantiates the Bison-generated parser.
   * @param LexerInterface $lexer The scanner that will supply tokens to the parser.
   */
  public function __construct(LexerInterface $lexer)
  {

    $this->yylexer = $lexer;
    $this->yystack          = new YYStack();
    

  }




  private int $yynerrs = 0;

  /**
   * The number of syntax errors so far.
   */
  public function getNumberOfErrors(): int { return $this->yynerrs; }

  /**
   * Print an error message via the lexer.
   *
   * @param msg The error message.
   */
  public function yyerror(string $msg): void {
      $this->yylexer->yyerror($msg);
  }


  /**
   * Returned by a Bison action in order to stop the parsing process and
   * return success (<tt>true</tt>).
   */
  public const YYACCEPT = 0;

  /**
   * Returned by a Bison action in order to stop the parsing process and
   * return failure (<tt>false</tt>).
   */
  public const YYABORT = 1;



  /**
   * Returned by a Bison action in order to start error recovery without
   * printing an error message.
   */
  public const YYERROR = 2;

  /**
   * Internal return codes that are not supported for user semantic
   * actions.
   */
  private const YYERRLAB = 3;
  private const YYNEWSTATE = 4;
  private const YYDEFAULT = 5;
  private const YYREDUCE = 6;
  private const YYERRLAB1 = 7;
  private const YYRETURN = 8;


  private int $yyerrstatus = 0;

    /**
     * Lookahead token kind.
     */
    private int $yychar = Parser::YYEMPTY;
    /**
     * Lookahead symbol kind.
     */
    private ?SymbolKind $yytoken = null;

    /* State.  */
    private int $yyn     = 0;
    private int $yylen   = 0;
    private int $yystate = 0;
    private YYStack $yystack;
    private int $label = Parser::YYNEWSTATE;



    /**
     * Semantic value of the lookahead.
     * @var mixed
     */
    private $yylval = null;

  /**
   * Whether error recovery is being done.  In this state, the parser
   * reads token until it reaches a known state, and then restarts normal
   * operation.
   */
  public function recovering(): bool
  {
    return $this->yyerrstatus === 0;
  }

  /** Compute post-reduction state.
   * @param yystate   the current state
   * @param yysym     the nonterminal to push on the stack
   */
  private function yyLRGotoState(int $yystate, int $yysym): int {

    $yyr = $this->yypgoto[$yysym - Parser::YYNTOKENS] + $yystate;
    if (0 <= $yyr && $yyr <= Parser::YYLAST && $this->yycheck[$yyr] === $yystate)
      return $this->yytable[$yyr];
    else
      return $this->yydefgoto[$yysym - Parser::YYNTOKENS];
  }

  private function yyaction(int $yyn, YYStack $yystack, int $yylen): int
  {
    /* If YYLEN is nonzero, implement the default value of the action:
       '$$ = $1'.  Otherwise, use the top of the stack.

       Otherwise, the following line sets YYVAL to garbage.
       This behavior is undocumented and Bison
       users should not rely upon it.  */
     /** @var mixed $yyval */
     $yyval = (0 < $yylen) ? $yystack->valueAt($yylen - 1) : $yystack->valueAt(0);

    switch ($yyn)
      {
          case 2: /* server: T_SERVER '{' server_body_list '}'  */
    /* "grammar.y":39  */
                                    { self::setAst(new Node('T_SERVER', [], $yystack->valueAt(1))); };
  break;


  case 3: /* server_name_values: T_SERVER_NAME_VALUE  */
    /* "grammar.y":43  */
                                          { $yyval = [$yystack->valueAt(0)]; };
  break;


  case 4: /* server_name_values: server_name_values T_SERVER_NAME_VALUE  */
    /* "grammar.y":44  */
                                          { $yyval = $yystack->valueAt(1); $yyval[] = $yystack->valueAt(0); };
  break;


  case 5: /* location_optional_regexp_path: %empty  */
    /* "grammar.y":48  */
                              { $yyval = ''; };
  break;


  case 6: /* location_optional_regexp_path: T_LOCATION_PATH_REGEXP  */
    /* "grammar.y":49  */
                              { $yyval = $yystack->valueAt(0); };
  break;


  case 7: /* server_body: T_SERVER_NAME server_name_values ';'  */
    /* "grammar.y":53  */
                                        { $yyval = new Node('T_SERVER_NAME', ['names' => $yystack->valueAt(1)]); };
  break;


  case 8: /* server_body: T_SERVER_ROOT T_SERVER_ROOT_PATH ';'  */
    /* "grammar.y":54  */
                                        { $yyval = new Node('T_SERVER_ROOT', ['path' => $yystack->valueAt(1)]); };
  break;


  case 9: /* server_body: T_ERROR_LOG T_ERROR_LOG_PATH ';'  */
    /* "grammar.y":55  */
                                        { $yyval = new Node('T_ERROR_LOG', ['path' => $yystack->valueAt(1)]); };
  break;


  case 10: /* server_body: T_ACCESS_LOG T_ACCESS_LOG_PATH ';'  */
    /* "grammar.y":56  */
                                        { $yyval = new Node('T_ACCESS_LOG', ['path' => $yystack->valueAt(1)]); };
  break;


  case 11: /* server_body: T_LOCATION location_optional_regexp_path T_LOCATION_PATH '{' location_body_list '}'  */
    /* "grammar.y":57  */
                                                                                      { $yyval = new  Node('T_LOCATION', ['regexp' => $yystack->valueAt(4), 'path' => $yystack->valueAt(3)], $yystack->valueAt(1)); };
  break;


  case 12: /* server_body_list: server_body_list server_body  */
    /* "grammar.y":61  */
                                { $yyval[] = $yystack->valueAt(0); };
  break;


  case 13: /* server_body_list: %empty  */
    /* "grammar.y":62  */
                                { $yyval = []; };
  break;


  case 14: /* optional_return_body: %empty  */
    /* "grammar.y":66  */
                 { $yyval = '';};
  break;


  case 15: /* optional_return_body: T_RETURN_BODY  */
    /* "grammar.y":67  */
                 { $yyval = $yystack->valueAt(0); };
  break;


  case 16: /* try_files_path_list: T_TRY_FILES_PATH  */
    /* "grammar.y":71  */
                                        { $yyval = [$yystack->valueAt(0)]; };
  break;


  case 17: /* try_files_path_list: try_files_path_list T_TRY_FILES_PATH  */
    /* "grammar.y":72  */
                                        { $yyval = $yystack->valueAt(1); $yyval[] = $yystack->valueAt(0); };
  break;


  case 18: /* location_body: T_RETURN T_RETURN_CODE optional_return_body ';'  */
    /* "grammar.y":76  */
                                                                   { $yyval = new Node('T_RETURN', ['code' => $yystack->valueAt(2), 'body' => $yystack->valueAt(1)]); };
  break;


  case 19: /* location_body: T_FAST_CGI_PATH T_FAST_CGI_PATH_PATH ';'  */
    /* "grammar.y":77  */
                                                                   { $yyval = new Node('T_FAST_CGI_PATH', ['path' => $yystack->valueAt(1)]); };
  break;


  case 20: /* location_body: T_FAST_CGI_SPLIT_PATH_INFO T_FAST_CGI_SPLIT_PATH_INFO_PATH ';'  */
    /* "grammar.y":78  */
                                                                   { $yyval = new Node('T_FAST_CGI_SPLIT_PATH_INFO', ['path' => $yystack->valueAt(1)]); };
  break;


  case 21: /* location_body: T_FAST_CGI_PARAM T_FAST_CGI_PARAM_KEY T_FAST_CGI_PARAM_VALUE ';'  */
    /* "grammar.y":79  */
                                                                   { $yyval = new Node('T_FAST_CGI_PARAM', [$yystack->valueAt(2) => $yystack->valueAt(1)]); };
  break;


  case 22: /* location_body: T_INCLUDE T_INCLUDE_PATH ';'  */
    /* "grammar.y":80  */
                                                                   { $yyval = new Node('T_INCLUDE', ['path' => $yystack->valueAt(1)]); };
  break;


  case 23: /* location_body: T_INTERNAL ';'  */
    /* "grammar.y":81  */
                                                                   { $yyval = new Node('T_INTERNAL'); };
  break;


  case 24: /* location_body: T_TRY_FILES try_files_path_list ';'  */
    /* "grammar.y":82  */
                                                                   { $yyval = new Node('T_TRY_FILES', [ 'paths' => $yystack->valueAt(1) ]); };
  break;


  case 25: /* location_body_list: location_body_list location_body  */
    /* "grammar.y":86  */
                                    { $yyval[] = $yystack->valueAt(0); };
  break;


  case 26: /* location_body_list: %empty  */
    /* "grammar.y":87  */
                                    { $yyval = []; };
  break;



/* "lib/parser.php":645  */

        default: break;
      }

    $yystack->pop($yylen);
    $yylen = 0;
    /* Shift the result of the reduction.  */
    $yystate = $this->yyLRGotoState($yystack->stateAt(0), $this->yyr1[$yyn]);
    $yystack->push($yystate, $yyval);
    return Parser::YYNEWSTATE;
  }




  /**
   * Parse input from the scanner that was specified at object construction
   * time.  Return whether the end of the input was reached successfully.
   *
   * @return <tt>true</tt> if the parsing succeeds.  Note that this does not
   *          imply that there were no syntax errors.
   */
  public function parse(): bool 

  {




    $this->yyerrstatus = 0;
    $this->yynerrs = 0;

    /* Initialize the stack.  */
    $this->yystack->push($this->yystate, $this->yylval);



    for (;;)
      switch ($this->label)
      {
        /* New state.  Unlike in the C/C++ skeletons, the state is already
           pushed when we come here.  */
      case Parser::YYNEWSTATE:

        /* Accept?  */
        if ($this->yystate === Parser::YYFINAL) {
          return true;
        }

        /* Take a decision.  First try without lookahead.  */
        $this->yyn = $this->yypact[$this->yystate];
        if ($this->yyPactValueIsDefault($this->yyn))
          {
            $this->label = Parser::YYDEFAULT;
            break;
          }

        /* Read a lookahead token.  */
        if ($this->yychar === Parser::YYEMPTY)
          {

            $this->yychar = $this->yylexer->yylex();
            $this->yylval = $this->yylexer->getLVal();

          }

        /* Convert token to internal form.  */
        $this->yytoken = $this->yytranslate($this->yychar);

        if ($this->yytoken->getCode() === SymbolKind::S_YYerror)
          {
            // The scanner already issued an error message, process directly
            // to error recovery.  But do not keep the error token as
            // lookahead, it is too special and may lead us to an endless
            // loop in error recovery. */
            $this->yychar = LexerInterface::YYUNDEF;
            $this->yytoken = new SymbolKind(SymbolKind::S_YYUNDEF);
            $this->label = Parser::YYERRLAB1;
          }
        else
          {
            /* If the proper action on seeing token YYTOKEN is to reduce or to
               detect an error, take that action.  */
            $this->yyn += $this->yytoken->getCode();
            if ($this->yyn < 0 || Parser::YYLAST < $this->yyn || $this->yycheck[$this->yyn] !== $this->yytoken->getCode()) {
              $this->label = Parser::YYDEFAULT;
            }

            /* <= 0 means reduce or error.  */
            else if (($this->yyn = $this->yytable[$this->yyn]) <= 0)
              {
                if ($this->yyTableValueIsError($this->yyn)) {
                  $this->label = Parser::YYERRLAB;
                } else {
                  $this->yyn = -$this->yyn;
                  $this->label = Parser::YYREDUCE;
                }
              }

            else
              {
                /* Shift the lookahead token.  */
                /* Discard the token being shifted.  */
                $this->yychar = Parser::YYEMPTY;

                /* Count tokens shifted since error; after three, turn off error
                   status.  */
                if ($this->yyerrstatus > 0)
                  --$this->yyerrstatus;

                $this->yystate = $this->yyn;
                $this->yystack->push($this->yystate, $this->yylval);
                $this->label = Parser::YYNEWSTATE;
              }
          }
        break;

      /*-----------------------------------------------------------.
      | yydefault -- do the default action for the current state.  |
      `-----------------------------------------------------------*/
      case Parser::YYDEFAULT:
        $this->yyn = $this->yydefact[$this->yystate];
        if ($this->yyn === 0)
          $this->label = Parser::YYERRLAB;
        else
          $this->label = Parser::YYREDUCE;
        break;

      /*-----------------------------.
      | yyreduce -- Do a reduction.  |
      `-----------------------------*/
      case Parser::YYREDUCE:
        $this->yylen = $this->yyr2[$this->yyn];
        $this->label = $this->yyaction($this->yyn, $this->yystack, $this->yylen);
        $this->yystate = $this->yystack->stateAt(0);
        break;

      /*------------------------------------.
      | yyerrlab -- here on detecting error |
      `------------------------------------*/
      case Parser::YYERRLAB:
        /* If not already recovering from an error, report this error.  */
        if ($this->yyerrstatus === 0)
          {
            ++$this->yynerrs;
            if ($this->yychar === Parser::YYEMPTY) {
              $this->yytoken = null;
            }
            $this->yyreportSyntaxError(new Context($this, $this->yystack, $this->yytoken));
          }

        if ($this->yyerrstatus === 3)
          {
            /* If just tried and failed to reuse lookahead token after an
               error, discard it.  */

            if ($this->yychar <= LexerInterface::YYEOF)
              {
                /* Return failure if at end of input.  */
                if ($this->yychar === LexerInterface::YYEOF) {
                  return false;
                }
              }
            else
              $this->yychar = Parser::YYEMPTY;
          }

        /* Else will try to reuse lookahead token after shifting the error
           token.  */
        $this->label = Parser::YYERRLAB1;
        break;

      /*-------------------------------------------------.
      | errorlab -- error raised explicitly by YYERROR.  |
      `-------------------------------------------------*/
      case Parser::YYERROR:
        /* Do not reclaim the symbols of the rule which action triggered
           this YYERROR.  */
        $this->yystack->pop($this->yylen);
        $this->yylen = 0;
        $this->yystate = $this->yystack->stateAt(0);
        $this->label = Parser::YYERRLAB1;
        break;

      /*-------------------------------------------------------------.
      | yyerrlab1 -- common code for both syntax error and YYERROR.  |
      `-------------------------------------------------------------*/
      case Parser::YYERRLAB1:
        $this->yyerrstatus = 3;       /* Each real token shifted decrements this.  */

        // Pop stack until we find a state that shifts the error token.
        for (;;)
          {
            $this->yyn = $this->yypact[$this->yystate];
            if (!$this->yyPactValueIsDefault($this->yyn))
              {
                $this->yyn += SymbolKind::S_YYerror;
                if (0 <= $this->yyn && $this->yyn <= Parser::YYLAST
                    && $this->yycheck[$this->yyn] === SymbolKind::S_YYerror)
                  {
                    $this->yyn = $this->yytable[$this->yyn];
                    if (0 < $this->yyn)
                      break;
                  }
              }

            /* Pop the current state because it cannot handle the
             * error token.  */
            if ($this->yystack->height === 0) {
              return false;
            }


            $this->yystack->pop();
            $this->yystate = $this->yystack->stateAt(0);
          }

        if ($this->label === Parser::YYABORT)
          /* Leave the switch.  */
          break;



        /* Shift the error token.  */

        $this->yystate = $this->yyn;
        $this->yystack->push($this->yyn, $this->yylval);
        $this->label = Parser::YYNEWSTATE;
        break;

        /* Accept.  */
      case Parser::YYACCEPT:
        return true;

        /* Abort.  */
      case Parser::YYABORT:
        return false;
      }
}








  /**
   * Build and emit a "syntax error" message in a user-defined way.
   *
   * @param ctx  The context of the error.
   */
  private function yyreportSyntaxError(Context $yyctx): void {
      $this->yyerror("syntax error");
  }

  /**
   * Whether the given <code>yypact_</code> value indicates a defaulted state.
   * @param yyvalue   the value to check
   */
  public function yyPactValueIsDefault(int $yyvalue): bool {
    return $yyvalue === $this->yypact_ninf;
  }

  /**
   * Whether the given <code>yytable_</code>
   * value indicates a syntax error.
   * @param yyvalue the value to check
   */
  public function yyTableValueIsError(int $yyvalue): bool {
    return $yyvalue === $this->yytable_ninf;
  }

  public int $yypact_ninf = -30;
  public int $yytable_ninf = -1;

/* YYPACT[STATE-NUM] -- Index in YYTABLE of the portion describing
   STATE-NUM.  */
  
  /** @var int[] */
  public array $yypact = array(     4,   -29,     9,   -30,   -30,    -4,     6,     7,     8,     1,
       2,   -30,   -30,   -30,    -2,   -11,   -30,    15,    -7,    -3,
     -30,   -30,   -30,     3,   -30,   -30,   -30,    -5,    16,    12,
      11,    13,    14,     5,    10,   -30,   -30,    21,    17,    18,
      19,    20,   -30,   -30,   -24,   -30,    22,   -30,   -30,    23,
     -30,   -30,   -30,   -30,   -30);
  

/* YYDEFACT[STATE-NUM] -- Default reduction number in state STATE-NUM.
   Performed when YYTABLE does not specify something else to do.  Zero
   means the default is an error.  */
  
  /** @var int[] */
  public array $yydefact = array(     0,     0,     0,    13,     1,     0,     0,     0,     5,     0,
       0,     2,    12,     3,     0,     0,     6,     0,     0,     0,
       4,     7,     8,     0,     9,    10,    26,     0,     0,     0,
       0,     0,     0,     0,     0,    11,    25,    14,     0,     0,
       0,     0,    23,    16,     0,    15,     0,    19,    20,     0,
      22,    17,    24,    18,    21);
  

/* YYPGOTO[NTERM-NUM].  */
  
  /** @var int[] */
  public array $yypgoto = array(   -30,   -30,   -30,   -30,   -30,   -30,   -30,   -30,   -30,   -30);
  

/* YYDEFGOTO[NTERM-NUM].  */
  
  /** @var int[] */
  public array $yydefgoto = array(     0,     2,    14,    17,    12,     5,    46,    44,    36,    27);
  

/* YYTABLE[YYPACT[STATE-NUM]] -- What to do in state STATE-NUM.  If
   positive, shift that token.  If negative, reduce the rule whose
   number is the opposite.  If YYTABLE_NINF, syntax error.  */
  
  /** @var int[] */
  public array $yytable = array(     6,     3,     7,    20,     8,    51,    28,     1,    52,     4,
       9,    13,    10,    29,    15,    30,    18,    31,    16,    19,
      32,    22,    33,    34,    23,    24,    35,    11,    37,    25,
      21,    38,    39,    26,    45,     0,    40,    42,     0,    43,
      41,     0,     0,    49,     0,     0,     0,     0,     0,    47,
      48,     0,    50,     0,    53,    54);
  


  /** @var int[] */
  public array $yycheck = array(     4,    30,     6,     5,     8,    29,    11,     3,    32,     0,
      14,     5,    16,    18,     7,    20,    15,    22,    10,    17,
      25,    32,    27,    28,     9,    32,    31,    31,    12,    32,
      32,    19,    21,    30,    13,    -1,    23,    32,    -1,    29,
      26,    -1,    -1,    24,    -1,    -1,    -1,    -1,    -1,    32,
      32,    -1,    32,    -1,    32,    32);
  

/* YYSTOS[STATE-NUM] -- The symbol kind of the accessing symbol of
   state STATE-NUM.  */
  
  /** @var int[] */
  public array $yystos = array(     0,     3,    34,    30,     0,    38,     4,     6,     8,    14,
      16,    31,    37,     5,    35,     7,    10,    36,    15,    17,
       5,    32,    32,     9,    32,    32,    30,    42,    11,    18,
      20,    22,    25,    27,    28,    31,    41,    12,    19,    21,
      23,    26,    32,    29,    40,    13,    39,    32,    32,    24,
      32,    29,    32,    32,    32);
  

/* YYR1[RULE-NUM] -- Symbol kind of the left-hand side of rule RULE-NUM.  */
  
  /** @var int[] */
  public array $yyr1 = array(     0,    33,    34,    35,    35,    36,    36,    37,    37,    37,
      37,    37,    38,    38,    39,    39,    40,    40,    41,    41,
      41,    41,    41,    41,    41,    42,    42);
  

/* YYR2[RULE-NUM] -- Number of symbols on the right-hand side of rule RULE-NUM.  */
  
  /** @var int[] */
  public array $yyr2 = array(     0,     2,     4,     1,     2,     0,     1,     3,     3,     3,
       3,     6,     2,     0,     0,     1,     1,     2,     4,     3,
       3,     4,     3,     2,     3,     2,     0);
  




  /* YYTRANSLATE(TOKEN-NUM) -- Symbol number corresponding to TOKEN-NUM
     as returned by yylex, with out-of-bounds checking.  */
  private function yytranslate(int $t): SymbolKind
  {
    // Last valid token kind.
    $code_max = 284;
    if ($t <= 0)
      return new SymbolKind(SymbolKind::S_YYEOF);
    else if ($t <= $code_max)
      return new SymbolKind($this->yytranslate_table[$t]);
    else
      return new SymbolKind(SymbolKind::S_YYUNDEF);
  }
  
  /** @var int[] */
  public array $yytranslate_table = array(     0,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,    32,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,    30,     2,    31,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     1,     2,     3,     4,
       5,     6,     7,     8,     9,    10,    11,    12,    13,    14,
      15,    16,    17,    18,    19,    20,    21,    22,    23,    24,
      25,    26,    27,    28,    29);
  


  public const YYLAST = 55;
  public const YYEMPTY = -2;
  public const YYFINAL = 4;
  public const YYNTOKENS = 33;


}
