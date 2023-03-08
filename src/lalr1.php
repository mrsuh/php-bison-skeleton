# PHP skeleton for Bison -*- autoconf -*-

# Copyright (C) 2007-2015, 2018-2023 Free Software Foundation, Inc.

# This program is free software: you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation, either version 3 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program.  If not, see <https://www.gnu.org/licenses/>.

m4_include(b4_skeletonsdir/[php.m4])

b4_header_if([b4_complain([%header/%defines does not make sense in PHP])])

m4_define([b4_symbol_no_destructor_assert],
[b4_symbol_if([$1], [has_destructor],
              [b4_complain_at(m4_unquote(b4_symbol([$1], [destructor_loc])),
                              [%destructor does not make sense in PHP])])])
b4_symbol_foreach([b4_symbol_no_destructor_assert])

## --------------- ##
## api.push-pull.  ##
## --------------- ##

b4_percent_define_default([[api.push-pull]], [[pull]])
b4_percent_define_check_values([[[[api.push-pull]],
                                 [[pull]], [[push]], [[both]]]])

# Define m4 conditional macros that encode the value
# of the api.push-pull flag.
b4_define_flag_if([pull]) m4_define([b4_pull_flag], [[1]])
b4_define_flag_if([push]) m4_define([b4_push_flag], [[1]])
m4_case(b4_percent_define_get([[api.push-pull]]),
        [pull], [m4_define([b4_push_flag], [[0]])],
        [push], [m4_define([b4_pull_flag], [[0]])])

# Define a macro to be true when api.push-pull has the value "both".
m4_define([b4_both_if],[b4_push_if([b4_pull_if([$1],[$2])],[$2])])

# Handle BISON_USE_PUSH_FOR_PULL for the test suite.  So that push parsing
# tests function as written, do not let BISON_USE_PUSH_FOR_PULL modify the
# behavior of Bison at all when push parsing is already requested.
b4_define_flag_if([use_push_for_pull])
b4_use_push_for_pull_if([
  b4_push_if([m4_define([b4_use_push_for_pull_flag], [[0]])],
             [m4_define([b4_push_flag], [[1]])])])

# parse.lac
b4_percent_define_default([[parse.lac]], [[none]])
b4_percent_define_check_values([[[[parse.lac]], [[full]], [[none]]]])
b4_define_flag_if([lac])
m4_define([b4_lac_flag],
          [m4_if(b4_percent_define_get([[parse.lac]]),
                 [none], [[0]], [[1]])])


## ------------- ##
## Parser File.  ##
## ------------- ##

b4_output_begin([b4_parser_file_name])[
<?php
]b4_copyright([Skeleton implementation for Bison LALR(1) parsers in PHP],
              [2007-2015, 2018-2021])[
]b4_disclaimer[
]b4_percent_define_ifdef([api.namespace], [namespace b4_percent_define_get([api.namespace]);[
]])[
]b4_user_pre_prologue[
]b4_user_post_prologue[
]b4_percent_code_get([[imports]])[
]b4_percent_code_get([[top]])[

/**
 * A Bison parser, automatically generated from <tt>]m4_bpatsubst(b4_file_name, [^"\(.*\)"$], [\1])[</tt>.
 *
 * @@author LALR (1) parser skeleton written by Paolo Bonzini.
 * Port to PHP language was done by Anton Sukhachev.
 */

 /**
   * Communication interface between the scanner and the Bison-generated
   * parser <tt>]b4_parser_class[</tt>.
   */
interface LexerInterface {
]b4_token_enums[

]b4_pull_if([b4_locations_if([[
    /**
     * Method to retrieve the beginning position of the last scanned token.
     * @@return ]b4_position_type[ the position at which the last scanned token starts.
     */
    public function getStartPos(): ]b4_position_type[;

    /**
     * Method to retrieve the ending position of the last scanned token.
     * @@return ]b4_position_type[ the first position beyond the last scanned token.
     */
    public function getEndPos(): ]b4_position_type[;]])[

    /**
     * Method to retrieve the semantic value of the last scanned token.
     * @@return ]b4_yystype[ the semantic value of the last scanned token.
     */
     public function getLVal();

    /**
     * Entry point for the scanner.  Returns the token identifier corresponding
     * to the next token and prepares to return the semantic value
     * ]b4_locations_if([and beginning/ending positions ])[of the token.
     * @@return int the token identifier corresponding to the next token.
     */
    public function yylex(): int;
]])[
    /**
     * Emit an error]b4_locations_if([ referring to the given location])[in a user-defined way.
     *
     *]b4_locations_if([[ @@param ]b4_location_type[ $location The location of the element to which the
     *                error message is related.]])[
     * @@param string $message The string for the error message.
     */
     public function yyerror(]b4_locations_if([?b4_location_type[ $location, ]])[string $message): void;

]b4_parse_error_bmatch(
           [custom], [[
    /**
     * Build and emit a "syntax error" message in a user-defined way.
     *
     * @@param Context $context  The context of the error.
     */
     public function reportSyntaxError(Context $context): void;
]])[
  }

]b4_lexer_if([[
  class YYLexer implements LexerInterface {
]b4_percent_code_get([[lexer]])[
  }

]])[


  /**
   * Information needed to get the list of expected tokens and to forge
   * a syntax error diagnostic.
   */
  class Context {
    public function __construct(]b4_parser_class[ $parser, YYStack $stack, SymbolKind $token]b4_locations_if([[, ]b4_location_type[ $loc]])[) {
      $this->yyparser = $parser;
      $this->yystack = $stack;
      $this->yytoken = $token;]b4_locations_if([[
      $this->yylocation = $loc;]])[
    }

    private ]b4_parser_class[ $yyparser;
    private YYStack $yystack;


    /**
     * The symbol kind of the lookahead token.
     */
    public function getToken(): SymbolKind {
      return $this->yytoken;
    }

    private SymbolKind $yytoken;]b4_locations_if([[

    /**
     * The location of the lookahead.
     */
    public function getLocation(): ]b4_location_type[ {
      return $this->yylocation;
    }

    private ]b4_location_type[ $yylocation;]])[
    public const NTOKENS = ]b4_parser_class[::YYNTOKENS;

    /**
     * Put in YYARG at most YYARGN of the expected tokens given the
     * current YYCTX, and return the number of tokens stored in YYARG.  If
     * YYARG is null, return the number of expected tokens (guaranteed to
     * be less than YYNTOKENS).
     * @@param SymbolKind[] $yyarg
     */
    public function getExpectedTokens(array &$yyarg, int $yyoffset, int $yyargn): int {
      $yycount = $yyoffset;]b4_lac_if([b4_parse_trace_if([[
      // Execute LAC once. We don't care if it is successful, we
      // only do it for the sake of debugging output.
      if (!$this->yyparser->yylacEstablished) {
        $this->yyparser->yylacCheck($this->yystack, $this->yytoken);
      }
]])[
      for ($yyx = 0; $yyx < ]b4_parser_class[::YYNTOKENS; ++$yyx)
        {
          /** @@var SymbolKind $yysym */
          $yysym = new SymbolKind($yyx);
          if ($yysym->getCode() !== ]b4_symbol(error, kind)[
              && $yysym->getCode() !== ]b4_symbol(undef, kind)[
              && $this->yyparser->yylacCheck($this->yystack, $yysym))
            {
              if ($yyarg === null) {
                $yycount += 1;
              } else if ($yycount === $yyargn) {
                return 0;
              } else {
                $yyarg[$yycount++] = $yysym;
              }
            }
        }]], [[
      $yyn = $this->yyparser->yypact[$this->yystack->stateAt(0)];
      if (!$this->yyparser->yyPactValueIsDefault($yyn))
        {
          /* Start YYX at -YYN if negative to avoid negative
             indexes in YYCHECK.  In other words, skip the first
             -YYN actions for this state because they are default
             actions.  */
          $yyxbegin = $yyn < 0 ? -$yyn : 0;
          /* Stay within bounds of both yycheck and yytname.  */
          $yychecklim = ]b4_parser_class[::YYLAST - $yyn + 1;
          $yyxend = $yychecklim < self::NTOKENS ? $yychecklim : self::NTOKENS;
          for ($yyx = $yyxbegin; $yyx < $yyxend; ++$yyx)
            if ($this->yyparser->yycheck[$yyx + $yyn] === $yyx && $yyx !== ]b4_symbol(error, kind)[
                && !$this->yyparser->yyTableValueIsError($this->yyparser->yytable[$yyx + $yyn]))
              {
                if ($yyarg === null)
                  $yycount += 1;
                else if ($yycount === $yyargn)
                  return 0; // FIXME: this is incorrect.
                else
                  $yyarg[$yycount++] = new SymbolKind($yyx);
              }
        }]])[
      if ($yyarg !== null && $yycount === $yyoffset && $yyoffset < $yyargn)
        $yyarg[$yycount] = null;
      return $yycount - $yyoffset;
    }
  }

  class YYStack {
    private array $stateStack = [];]b4_locations_if([[
    /** @@var ]b4_location_type[[] */
    private array $locStack = [];]])[
    private array $valueStack = [];

    public int $height = -1;

    /**
     * @@param ]b4_yystype[ $value
     */
    public function push(int $state, $value]b4_locations_if([, ]b4_location_type[ $loc])[): void {
      $this->height++;

      $this->stateStack[$this->height] = $state;]b4_locations_if([[
      $this->locStack[$this->height] = $loc;]])[
      $this->valueStack[$this->height] = $value;
    }

    public function pop(int $num = 1): void {
      $this->height -= $num;
    }

    public function stateAt(int $i): int {
      return $this->stateStack[$this->height - $i];
    }
]b4_locations_if([[

    public function locationAt(int $i): ]b4_location_type[ {
      return $this->locStack[$this->height - $i];
    }
]])[
    /**
     * @@return ]b4_yystype[
     */
    public function valueAt(int $i) {
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


]b4_declare_symbol_enum[

]b4_locations_if([[
  /**
   * A class defining a pair of positions.  Positions, defined by the
   * <code>]b4_position_type[</code> class, denote a point in the input.
   * Locations represent a part of the input through the beginning
   * and ending positions.
   */
  class ]b4_location_type[ {
    /**
     * The first, inclusive, position in the range.
     */
    public ?]b4_position_type[ $begin = null;

    /**
     * The first position beyond the range.
     */
    public ?]b4_position_type[ $end = null;

    /**
     * Create a <code>]b4_location_type[</code> from the endpoints of the range.
     * @@param ]b4_position_type[ $begin The first position included in the range.
     * @@param ]b4_position_type[ $end   The first position beyond the range.
     */
    public function __construct(?]b4_position_type[ $begin = null, ?]b4_position_type[ $end = null) {
      $this->begin = $begin;
      $this->end = $end;
    }

    /**
     * Print a representation of the location.  For this to be correct,
     * <code>]b4_position_type[</code> should override the <code>equals</code>
     * method.
     */
    public function __toString(): string {
       return sprintf('%s-%s', $this->begin, $this->end);
    }
  }
]])[

]b4_parser_class_declaration[
{
]b4_identification[
][
]b4_parse_error_bmatch(
           [detailed\|verbose], [[
  /**
   * True if verbose error messages are enabled.
   */
  private bool $yyErrorVerbose = true;

  /**
   * Whether verbose error messages are enabled.
   */
  public function getErrorVerbose(): bool
    {
        return $this->yyErrorVerbose;
    }

  /**
   * Set the verbosity of error messages.
   * @@param verbose True to request verbose error messages.
   */
 public function setErrorVerbose(bool $verbose): void
 {
     $this->yyErrorVerbose = $verbose;
 }
]])[

]b4_locations_if([[
  private function yylloc(YYStack $rhs, int $n): ]b4_location_type[
  {
    if (0 < $n)
      return new ]b4_location_type[($rhs->locationAt($n - 1)->begin, $rhs->locationAt(0)->end);
    else
      return new ]b4_location_type[($rhs->locationAt(0)->end, $rhs->locationAt(0)->end);
  }]])[

  /**
   * The object doing lexical analysis for us.
   */
  private LexerInterface $yylexer;

]b4_parse_param_vars[

]b4_lexer_if([[
  /**
   * Instantiates the Bison-generated parser.
   */
  public function __construct(]b4_parse_param_decl([b4_lex_param_decl])[)
  {
]b4_percent_code_get([[init]])[]b4_lac_if([[
    /** @@var int[] */
    $this->yylacStack = [];
    $this->yylacEstablished = false;]])[
    $this->yylexer = new YYLexer(]b4_lex_param_call[);
    $this->yystack          = new YYStack();
    ]b4_locations_if([[
    $this->yylloc           = new Location();]])[
]b4_parse_param_cons[
  }
]], [[
  /**
   * Instantiates the Bison-generated parser.
   * @@param LexerInterface $lexer The scanner that will supply tokens to the parser.
   */
  public function __construct(]b4_parse_param_decl([[LexerInterface $lexer]])[)
  {
]b4_percent_code_get([[init]])[]b4_lac_if([[
    /** @@var int[] */
    $this->yylacStack = [];
    $this->yylacEstablished = false;]])[
    $this->yylexer = $lexer;
    $this->yystack          = new YYStack();
    ]b4_locations_if([[
    $this->yylloc           = new Location();]])[
]b4_parse_param_cons[
  }
]])[

]b4_parse_trace_if([[
   private $yyDebugStream = STDERR;

  /**
   * The <tt>PrintStream</tt> on which the debugging output is printed.
   */
  public function getDebugStream() { return $this->yyDebugStream; }

  /**
   * Set the <tt>PrintStream</tt> on which the debug output is printed.
   * @@param s The stream that is used for debugging output.
   */
  public function setDebugStream($resource): void { $this->yyDebugStream = $resource; }

  private int $yydebug = 0;

  /**
   * Answer the verbosity of the debugging output; 0 means that all kinds of
   * output from the parser are suppressed.
   */
  public function getDebugLevel(): int { return $this->yydebug; }

  /**
   * Set the verbosity of the debugging output; 0 means that all kinds of
   * output from the parser are suppressed.
   * @@param level The verbosity level for debugging output.
   */
  public function setDebugLevel(int $level): void { $this->yydebug = $level; }
]])[

  private int $yynerrs = 0;

  /**
   * The number of syntax errors so far.
   */
  public function getNumberOfErrors(): int { return $this->yynerrs; }

  /**
   * Print an error message via the lexer.
   *]b4_locations_if([[ Use a <code>null</code> location.]])[
   * @@param msg The error message.
   */
  public function yyerror(]b4_locations_if([?b4_location_type[ $location, ]])[string $msg): void {
      $this->yylexer->yyerror(]b4_locations_if([[$location, ]])[$msg);
  }
]b4_parse_trace_if([[
  protected function yycdebugNnl(string $message): void {
    if (0 < $this->yydebug) {
        fputs($this->yyDebugStream, $message);
    }
  }

  protected function yycdebug(string $message): void {
    if (0 < $this->yydebug) {
      fputs($this->yyDebugStream, $message . PHP_EOL);
    }
  }]])[

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

]b4_push_if([
  /**
   * Returned by a Bison action in order to request a new token.
   */
  public const YYPUSH_MORE = 4;])[

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
]b4_push_if([[  private const YYGETTOKEN = 9; /* Signify that a new token is expected when doing push-parsing.  */]])[

  private int $yyerrstatus = 0;

    /**
     * Lookahead token kind.
     */
    private int $yychar = ]b4_parser_class[::YYEMPTY;
    /**
     * Lookahead symbol kind.
     */
    private ?SymbolKind $yytoken = null;

    /* State.  */
    private int $yyn     = 0;
    private int $yylen   = 0;
    private int $yystate = 0;
    private YYStack $yystack;
    private int $label = ]b4_parser_class[::YYNEWSTATE;

]b4_locations_if([[
    /* The location where the error started.  */
    private ?]b4_location_type[ $yyerrloc = null;

    /* Location. */
    private ]b4_location_type[ $yylloc;]])[

    /**
     * Semantic value of the lookahead.
     * @@var ]b4_yystype[
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
   * @@param yystate   the current state
   * @@param yysym     the nonterminal to push on the stack
   */
  private function yyLRGotoState(int $yystate, int $yysym): int {

    $yyr = $this->yypgoto]b4_quote_value($yysym - b4_parser_class::YYNTOKENS)[ + $yystate;
    if (0 <= $yyr && $yyr <= ]b4_parser_class[::YYLAST && $this->yycheck[$yyr] === $yystate)
      return $this->yytable[$yyr];
    else
      return $this->yydefgoto]b4_quote_value($yysym - b4_parser_class::YYNTOKENS)[;
  }

  private function yyaction(int $yyn, YYStack $yystack, int $yylen): int
  {
    /* If YYLEN is nonzero, implement the default value of the action:
       '$$ = $1'.  Otherwise, use the top of the stack.

       Otherwise, the following line sets YYVAL to garbage.
       This behavior is undocumented and Bison
       users should not rely upon it.  */
     /** @@var ]b4_yystype[ $yyval */
     $yyval = (0 < $yylen) ? $yystack->valueAt($yylen - 1) : $yystack->valueAt(0);]b4_locations_if([[
     /** @@var ]b4_location_type[ */
     $yyloc = $this->yylloc($yystack, $yylen);]])[]b4_parse_trace_if([[

    $this->yyReducePrint($yyn, $yystack);]])[

    switch ($yyn)
      {
        ]b4_user_actions[
        default: break;
      }]b4_parse_trace_if([[

    $this->yySymbolPrint("-> $$ =", new SymbolKind($this->yyr1[$yyn]), $yyval]b4_locations_if([, $yyloc])[);]])[

    $yystack->pop($yylen);
    $yylen = 0;
    /* Shift the result of the reduction.  */
    $yystate = $this->yyLRGotoState($yystack->stateAt(0), $this->yyr1[$yyn]);
    $yystack->push($yystate, $yyval]b4_locations_if([, $yyloc])[);
    return ]b4_parser_class[::YYNEWSTATE;
  }

]b4_parse_trace_if([[
  /*--------------------------------.
  | Print this symbol on YYOUTPUT.  |
  `--------------------------------*/
  /**
   * @@param ]b4_yystype[ $yyvalue
   */
  private function yySymbolPrint(string $s, SymbolKind $yykind, $yyvalue]b4_locations_if([, ]b4_location_type[ $yylocation])[): void {
      if (0 < $this->yydebug) {
          $this->yycdebug($s
                   . ($yykind->getCode() < ]b4_parser_class[::YYNTOKENS ? " token " : " nterm ")
                   . $yykind->getName() . " ("]b4_locations_if([
                   . $yylocation . ": "])[
                   . ($yyvalue === null ? "(null)" : (is_array($yyvalue) ? '[]' : (string)$yyvalue)) . ")");
      }
  }]])[

]b4_push_if([],[[
  /**
   * Parse input from the scanner that was specified at object construction
   * time.  Return whether the end of the input was reached successfully.
   *
   * @@return <tt>true</tt> if the parsing succeeds.  Note that this does not
   *          imply that there were no syntax errors.
   */
  public function parse(): bool ]])[
]b4_push_if([
  /**
   * Push Parse input from external lexer
   *
   * @@param $yylextoken int current token
   * @@param $yylexval ]b4_yystype[ current lval]b4_locations_if([[
   * @@param $yylexloc ]b4_location_type[ current position]])[
   *
   * @@return int <tt>YYACCEPT, YYABORT, YYPUSH_MORE</tt>
   */
  public function push_parse(int $yylextoken, $yylexval[]b4_locations_if([, b4_location_type $yylexloc])): int])[
  {
]b4_push_if([],[[

]b4_lac_if([[
    // Discard the LAC context in case there still is one left from a
    // previous invocation.
    $this->yylacDiscard("init");]])[
]b4_parse_trace_if([[
    $this->yycdebug("Starting parse");]])[
    $this->yyerrstatus = 0;
    $this->yynerrs = 0;

    /* Initialize the stack.  */
    $this->yystack->push($this->yystate, $this->yylval]b4_locations_if([, $this->yylloc])[);
]m4_ifdef([b4_initial_action], [
b4_dollar_pushdef([yylval], [], [], [yylloc])dnl
    b4_user_initial_action
b4_dollar_popdef[]dnl
])[
]])[
]b4_push_if([[
    if (!$this->push_parse_initialized)
      {
        $this->push_parse_initialize();
]m4_ifdef([b4_initial_action], [
b4_dollar_pushdef([yylval], [], [], [yylloc])dnl
    b4_user_initial_action
b4_dollar_popdef[]dnl
])[]b4_parse_trace_if([[
        $this->yycdebug ("Starting parse");]])[
        $this->yyerrstatus = 0;
      } else
        $this->label = ]b4_parser_class[::YYGETTOKEN;

    $push_token_consumed = true;
]])[
    for (;;)
      switch ($this->label)
      {
        /* New state.  Unlike in the C/C++ skeletons, the state is already
           pushed when we come here.  */
      case ]b4_parser_class[::YYNEWSTATE:]b4_parse_trace_if([[
        $this->yycdebug("Entering state " . $this->yystate);
        if (0 < $this->yydebug) {
           $this->yystack->print($this->getDebugStream());
        }]])[

        /* Accept?  */
        if ($this->yystate === ]b4_parser_class[::YYFINAL) {
          ]b4_push_if([$this->label = ]b4_parser_class[::YYACCEPT; break;],
                      [return true;])[
        }

        /* Take a decision.  First try without lookahead.  */
        $this->yyn = $this->yypact[$this->yystate];
        if ($this->yyPactValueIsDefault($this->yyn))
          {
            $this->label = ]b4_parser_class[::YYDEFAULT;
            break;
          }
]b4_push_if([        /* Fall Through */

      case ]b4_parser_class[::YYGETTOKEN:])[
        /* Read a lookahead token.  */
        if ($this->yychar === ]b4_parser_class[::YYEMPTY)
          {
]b4_push_if([[
            if (!$push_token_consumed) {
              return ]b4_parser_class[::YYPUSH_MORE;}]b4_parse_trace_if([[
            $this->yycdebug("Reading a token");]])[
            $this->yychar = $yylextoken;
            $this->yylval = $yylexval;]b4_locations_if([
            $this->yylloc = $yylexloc;])[
            $push_token_consumed = false;]], [b4_parse_trace_if([[
            $this->yycdebug ("Reading a token");]])[
            $this->yychar = $this->yylexer->yylex();
            $this->yylval = $this->yylexer->getLVal();]b4_locations_if([[
            $this->yylloc = new ]b4_location_type[($this->yylexer->getStartPos(),$this->yylexer->getEndPos());]])[
]])[
          }

        /* Convert token to internal form.  */
        $this->yytoken = $this->yytranslate($this->yychar);]b4_parse_trace_if([[
        $this->yySymbolPrint("Next token is", $this->yytoken,
                      $this->yylval]b4_locations_if([, $this->yylloc])[);]])[

        if ($this->yytoken->getCode() === ]b4_symbol(error, kind)[)
          {
            // The scanner already issued an error message, process directly
            // to error recovery.  But do not keep the error token as
            // lookahead, it is too special and may lead us to an endless
            // loop in error recovery. */
            $this->yychar = LexerInterface::]b4_symbol(undef, id)[;
            $this->yytoken = new SymbolKind(]b4_symbol(undef, kind)[);]b4_locations_if([[
            $this->yyerrloc = $this->yylloc;]])[
            $this->label = ]b4_parser_class[::YYERRLAB1;
          }
        else
          {
            /* If the proper action on seeing token YYTOKEN is to reduce or to
               detect an error, take that action.  */
            $this->yyn += $this->yytoken->getCode();
            if ($this->yyn < 0 || ]b4_parser_class[::YYLAST < $this->yyn || $this->yycheck[$this->yyn] !== $this->yytoken->getCode()) {]b4_lac_if([[
              if (!$this->yylacEstablish($this->yystack, $this->yytoken)) {
                $this->label = ]b4_parser_class[::YYERRLAB;
              } else]])[
              $this->label = ]b4_parser_class[::YYDEFAULT;
            }

            /* <= 0 means reduce or error.  */
            else if (($this->yyn = $this->yytable[$this->yyn]) <= 0)
              {
                if ($this->yyTableValueIsError($this->yyn)) {
                  $this->label = ]b4_parser_class[::YYERRLAB;
                }]b4_lac_if([[ else if (!$this->yylacEstablish($this->yystack, $this->yytoken)) {
                  $this->label = ]b4_parser_class[::YYERRLAB;
                }]])[ else {
                  $this->yyn = -$this->yyn;
                  $this->label = ]b4_parser_class[::YYREDUCE;
                }
              }

            else
              {
                /* Shift the lookahead token.  */]b4_parse_trace_if([[
                $this->yySymbolPrint("Shifting", $this->yytoken, $this->yylval]b4_locations_if([, $this->yylloc])[);
]])[
                /* Discard the token being shifted.  */
                $this->yychar = ]b4_parser_class[::YYEMPTY;

                /* Count tokens shifted since error; after three, turn off error
                   status.  */
                if ($this->yyerrstatus > 0)
                  --$this->yyerrstatus;

                $this->yystate = $this->yyn;
                $this->yystack->push($this->yystate, $this->yylval]b4_locations_if([, $this->yylloc])[);]b4_lac_if([[
                $this->yylacDiscard("shift");]])[
                $this->label = ]b4_parser_class[::YYNEWSTATE;
              }
          }
        break;

      /*-----------------------------------------------------------.
      | yydefault -- do the default action for the current state.  |
      `-----------------------------------------------------------*/
      case ]b4_parser_class[::YYDEFAULT:
        $this->yyn = $this->yydefact[$this->yystate];
        if ($this->yyn === 0)
          $this->label = ]b4_parser_class[::YYERRLAB;
        else
          $this->label = ]b4_parser_class[::YYREDUCE;
        break;

      /*-----------------------------.
      | yyreduce -- Do a reduction.  |
      `-----------------------------*/
      case ]b4_parser_class[::YYREDUCE:
        $this->yylen = $this->yyr2[$this->yyn];
        $this->label = $this->yyaction($this->yyn, $this->yystack, $this->yylen);
        $this->yystate = $this->yystack->stateAt(0);
        break;

      /*------------------------------------.
      | yyerrlab -- here on detecting error |
      `------------------------------------*/
      case ]b4_parser_class[::YYERRLAB:
        /* If not already recovering from an error, report this error.  */
        if ($this->yyerrstatus === 0)
          {
            ++$this->yynerrs;
            if ($this->yychar === ]b4_parser_class[::YYEMPTY) {
              $this->yytoken = null;
            }
            $this->yyreportSyntaxError(new Context($this, $this->yystack, $this->yytoken]b4_locations_if([[, $this->yylloc]])[));
          }
]b4_locations_if([[
        $this->yyerrloc = $this->yylloc;]])[
        if ($this->yyerrstatus === 3)
          {
            /* If just tried and failed to reuse lookahead token after an
               error, discard it.  */

            if ($this->yychar <= LexerInterface::]b4_symbol(eof, id)[)
              {
                /* Return failure if at end of input.  */
                if ($this->yychar === LexerInterface::]b4_symbol(eof, id)[) {
                  ]b4_push_if([$this->label = ]b4_parser_class[::YYABORT; break;], [return false;])[
                }
              }
            else
              $this->yychar = ]b4_parser_class[::YYEMPTY;
          }

        /* Else will try to reuse lookahead token after shifting the error
           token.  */
        $this->label = ]b4_parser_class[::YYERRLAB1;
        break;

      /*-------------------------------------------------.
      | errorlab -- error raised explicitly by YYERROR.  |
      `-------------------------------------------------*/
      case ]b4_parser_class[::YYERROR:]b4_locations_if([[
        $this->yyerrloc = $this->yystack->locationAt ($this->yylen - 1);]])[
        /* Do not reclaim the symbols of the rule which action triggered
           this YYERROR.  */
        $this->yystack->pop($this->yylen);
        $this->yylen = 0;
        $this->yystate = $this->yystack->stateAt(0);
        $this->label = ]b4_parser_class[::YYERRLAB1;
        break;

      /*-------------------------------------------------------------.
      | yyerrlab1 -- common code for both syntax error and YYERROR.  |
      `-------------------------------------------------------------*/
      case ]b4_parser_class[::YYERRLAB1:
        $this->yyerrstatus = 3;       /* Each real token shifted decrements this.  */

        // Pop stack until we find a state that shifts the error token.
        for (;;)
          {
            $this->yyn = $this->yypact[$this->yystate];
            if (!$this->yyPactValueIsDefault($this->yyn))
              {
                $this->yyn += ]b4_symbol(error, kind)[;
                if (0 <= $this->yyn && $this->yyn <= ]b4_parser_class[::YYLAST
                    && $this->yycheck[$this->yyn] === ]b4_symbol(error, kind)[)
                  {
                    $this->yyn = $this->yytable[$this->yyn];
                    if (0 < $this->yyn)
                      break;
                  }
              }

            /* Pop the current state because it cannot handle the
             * error token.  */
            if ($this->yystack->height === 0) {
              ]b4_push_if([$this->label = ]b4_parser_class[::YYABORT; break;],[return false;])[
            }

]b4_locations_if([[
            $this->yyerrloc = $this->yystack->locationAt(0);]])[
            $this->yystack->pop();
            $this->yystate = $this->yystack->stateAt(0);]b4_parse_trace_if([[
            if (0 < $this->yydebug)
              $this->yystack->print($this->getDebugStream());]])[
          }

        if ($this->label === ]b4_parser_class[::YYABORT)
          /* Leave the switch.  */
          break;

]b4_locations_if([[
        /* Muck with the stack to setup for yylloc.  */
        $this->yystack->push (0, null, $this->yylloc);
        $this->yystack->push (0, null, $this->yyerrloc);
        $this->yyloc = $this->yylloc ($this->yystack, 2);
        $this->yystack->pop(2);]])[

        /* Shift the error token.  */]b4_lac_if([[
        $this->yylacDiscard("error recovery");]])[]b4_parse_trace_if([[
        $this->yySymbolPrint("Shifting", new SymbolKind($this->yystos[$this->yyn]),
                      $this->yylval]b4_locations_if([, $this->yyloc])[);]])[

        $this->yystate = $this->yyn;
        $this->yystack->push($this->yyn, $this->yylval]b4_locations_if([, $this->yyloc])[);
        $this->label = ]b4_parser_class[::YYNEWSTATE;
        break;

        /* Accept.  */
      case ]b4_parser_class[::YYACCEPT:
        ]b4_push_if([$this->push_parse_initialized = false; return ]b4_parser_class[::YYACCEPT;],
                    [return true;])[

        /* Abort.  */
      case ]b4_parser_class[::YYABORT:
        ]b4_push_if([$this->push_parse_initialized = false; return ]b4_parser_class[::YYABORT;],
                    [return false;])[
      }
}
]b4_push_if([[
  private $push_parse_initialized = false;

    /**
     * (Re-)Initialize the state of the push parser.
     */
  public function push_parse_initialize(): void
  {
    /* Lookahead and lookahead in internal form.  */
    $this->yychar = ]b4_parser_class[::YYEMPTY;
    $this->yytoken = null;

    /* State.  */
    $this->yyn = 0;
    $this->yylen = 0;
    $this->yystate = 0;
    $this->yystack = new YYStack();]b4_lac_if([[
    $this->yylacStack = [];
    $this->yylacEstablished = false;]])[
    $this->label = ]b4_parser_class[::YYNEWSTATE;

    /* Error handling.  */
    $this->yynerrs = 0;]b4_locations_if([[
    /* The location where the error started.  */
    $this->yyerrloc = null;
    $this->yylloc = new ]b4_location_type[(null, null);]])[

    /* Semantic value of the lookahead.  */
    $this->yylval = null;

    $this->yystack->push($this->yystate, $this->yylval]b4_locations_if([, $this->yylloc])[);

    $this->push_parse_initialized = true;

  }
]])[

]b4_both_if([[
  /**
   * Parse input from the scanner that was specified at object construction
   * time.  Return whether the end of the input was reached successfully.
   * This version of parse() is defined only when api.push-push=both.
   *
   * @@return <tt>true</tt> if the parsing succeeds.  Note that this does not
   *          imply that there were no syntax errors.
   */
  public function parse(): bool {
      if ($this->yylexer === null) {
          throw new \RuntimeException("Null Lexer");
      }

      do {
          $token = $this->yylexer->yylex();
          /** @@var ]b4_yystype[ */
          $lval = $this->yylexer->getLVal();]b4_locations_if([[
          /** @@var ]b4_location_type[ */
          $yyloc = new ]b4_location_type[($this->yylexer->getStartPos(), $this->yylexer->getEndPos());
          $status = $this->push_parse($token, $lval, $yyloc);]], [[
          $status = $this->push_parse($token, $lval);]])[
      } while ($status === ]b4_parser_class[::YYPUSH_MORE);
      return $status === ]b4_parser_class[::YYACCEPT;
  }
]])[

]b4_lac_if([[
    /** Check the lookahead yytoken.
     * \returns  true iff the token will be eventually shifted.
     */
    public function yylacCheck(YYStack $yystack, SymbolKind $yytoken): bool
    {
      // Logically, the yylacStack's lifetime is confined to this function.
      // Clear it, to get rid of potential left-overs from previous call.
      $this->yylacStack = [];
      // Reduce until we encounter a shift and thereby accept the token.
      $this->yycdebugNnl("LAC: checking lookahead " . $yytoken->getName() . ":");
      $lacTop = 0;
      while (true)
        {
          $topState = (empty($this->yylacStack)
                          ? $yystack->stateAt($lacTop)
                          : $this->yylacStack[count($this->yylacStack) - 1]);
          $yyrule = $this->yypact[$topState];
          if ($this->yyPactValueIsDefault($yyrule)
              || ($yyrule += $this->yytoken->getCode()) < 0 || ]b4_parser_class[::YYLAST < $yyrule
              || $this->yycheck[$yyrule] !== $this->yytoken->getCode())
            {
              // Use the default action.
              $yyrule = $this->yydefact[+$topState];
              if ($yyrule === 0) {
                $this->yycdebug(" Err");
                return false;
              }
            }
          else
            {
              // Use the action from yytable.
              $yyrule = $this->yytable[$yyrule];
              if ($this->yyTableValueIsError($yyrule)) {
                $this->yycdebug(" Err");
                return false;
              }
              if (0 < $yyrule) {
                $this->yycdebug(" S" . $yyrule);
                return true;
              }
              $yyrule = -$yyrule;
            }
          // By now we know we have to simulate a reduce.
          $this->yycdebugNnl(" R" . ($yyrule - 1));
          // Pop the corresponding number of values from the stack.
          {
            $yylen = $this->yyr2[$yyrule];
            // First pop from the LAC stack as many tokens as possible.
            $lacSize = count($this->yylacStack);
            if ($yylen < $lacSize) {
              for (/* Nothing */; 0 < $yylen; $yylen -= 1) {
                array_pop($this->yylacStack);
              }
              $yylen = 0;
            } else if ($lacSize !== 0) {
              $this->yylacStack = [];
              $yylen -= $lacSize;
            }
            // Only afterwards look at the main stack.
            // We simulate popping elements by incrementing lacTop.
            $lacTop += $yylen;
          }
          // Keep topState in sync with the updated stack.
          $topState = (empty($this->yylacStack)
                      ? $yystack->stateAt($lacTop)
                      : $this->yylacStack[count($this->yylacStack) - 1]);
          // Push the resulting state of the reduction.
          $state = $this->yyLRGotoState($topState, $this->yyr1[$yyrule]);
          $this->yycdebugNnl(" G" . $state);
          $this->yylacStack[] = $state;
        }
    }

    /** Establish the initial context if no initial context currently exists.
     * \returns  true iff the token will be eventually shifted.
     */
    public function yylacEstablish(YYStack $yystack, SymbolKind $yytoken): bool {
      /* Establish the initial context for the current lookahead if no initial
         context is currently established.

         We define a context as a snapshot of the parser stacks.  We define
         the initial context for a lookahead as the context in which the
         parser initially examines that lookahead in order to select a
         syntactic action.  Thus, if the lookahead eventually proves
         syntactically unacceptable (possibly in a later context reached via a
         series of reductions), the initial context can be used to determine
         the exact set of tokens that would be syntactically acceptable in the
         lookahead's place.  Moreover, it is the context after which any
         further semantic actions would be erroneous because they would be
         determined by a syntactically unacceptable token.

         yylacEstablish should be invoked when a reduction is about to be
         performed in an inconsistent state (which, for the purposes of LAC,
         includes consistent states that don't know they're consistent because
         their default reductions have been disabled).

         For parse.lac=full, the implementation of yylacEstablish is as
         follows.  If no initial context is currently established for the
         current lookahead, then check if that lookahead can eventually be
         shifted if syntactic actions continue from the current context.  */
      if ($this->yylacEstablished) {
        return true;
      } else {
        $this->yycdebug("LAC: initial context established for " . $yytoken->getName());
        $this->yylacEstablished = true;
        return $this->yylacCheck($yystack, $yytoken);
      }
    }

    /** Discard any previous initial lookahead context because of event.
     * \param event  the event which caused the lookahead to be discarded.
     *               Only used for debbuging output.  */
    public function yylacDiscard(string $event): void {
     /* Discard any previous initial lookahead context because of Event,
        which may be a lookahead change or an invalidation of the currently
        established initial context for the current lookahead.

        The most common example of a lookahead change is a shift.  An example
        of both cases is syntax error recovery.  That is, a syntax error
        occurs when the lookahead is syntactically erroneous for the
        currently established initial context, so error recovery manipulates
        the parser stacks to try to find a new initial context in which the
        current lookahead is syntactically acceptable.  If it fails to find
        such a context, it discards the lookahead.  */
      if ($this->yylacEstablished) {
        $this->yycdebug("LAC: initial context discarded due to " . $event);
        $this->yylacEstablished = false;
      }
    }

    /** The stack for LAC.
     * Logically, the yylacStack's lifetime is confined to the function
     * yylacCheck. We just store it as a member of this class to hold
     * on to the memory and to avoid frequent reallocations.
     * @@var int[]
     */
    private array $yylacStack = [];
    /**  Whether an initial LAC context was established. */
    public bool $yylacEstablished = false;
]])[

]b4_parse_error_bmatch(
[detailed\|verbose], [[
  /**
   * @@param SymbolKind[] $yyarg
   */
  private function yysyntaxErrorArguments(Context $yyctx, array &$yyarg, int $yyargn): int {
    /* There are many possibilities here to consider:
       - If this state is a consistent state with a default action,
         then the only way this function was invoked is if the
         default action is an error action.  In that case, don't
         check for expected tokens because there are none.
       - The only way there can be no lookahead present (in tok) is
         if this state is a consistent state with a default action.
         Thus, detecting the absence of a lookahead is sufficient to
         determine that there is no unexpected or expected token to
         report.  In that case, just report a simple "syntax error".
       - Don't assume there isn't a lookahead just because this
         state is a consistent state with a default action.  There
         might have been a previous inconsistent state, consistent
         state with a non-default action, or user semantic action
         that manipulated yychar.  (However, yychar is currently out
         of scope during semantic actions.)
       - Of course, the expected token list depends on states to
         have correct lookahead information, and it depends on the
         parser not to perform extra reductions after fetching a
         lookahead from the scanner and before detecting a syntax
         error.  Thus, state merging (from LALR or IELR) and default
         reductions corrupt the expected token list.  However, the
         list is correct for canonical LR with one exception: it
         will still contain any token that will not be accepted due
         to an error action in a later state.
    */
    $yycount = 0;
    if ($yyctx->getToken() !== null) {
        if ($yyarg !== null) {
          $yyarg[$yycount] = $yyctx->getToken();
        }

        $yycount += 1;
        $yycount += $yyctx->getExpectedTokens($yyarg, 1, $yyargn);
    }

    return $yycount;
  }
]])[

  /**
   * Build and emit a "syntax error" message in a user-defined way.
   *
   * @@param ctx  The context of the error.
   */
  private function yyreportSyntaxError(Context $yyctx): void {]b4_parse_error_bmatch(
[custom], [[
      $this->yylexer->reportSyntaxError($yyctx);]],
[detailed\|verbose], [[
      $message = "syntax error";
      if ($this->yyErrorVerbose) {
          /** @@var SymbolKind[] $yyarg */
          $yyarg = [];
          $yycount = $this->yysyntaxErrorArguments($yyctx, $yyarg, 5);
          $yystr = [];
          for ($yyi = 0; $yyi < $yycount; ++$yyi) {
              $yystr[$yyi] = $yyarg[$yyi]->getName();
          }
          if ($yycount > 1) {
                $unexpected = array_shift($yystr);
                $message .= sprintf(", got %s, but expecting %s", $unexpected, implode(' or ', $yystr));
            } else if ($yycount > 0) {
                $message = sprintf("syntax error, unexpected '%s'", $yystr[0]);
            }
      }
      $this->yyerror(]b4_locations_if([[$yyctx->getLocation(), ]])[$message);
      ]],
[simple], [[
      $this->yyerror(]b4_locations_if([[$yyctx->getLocation(), ]])["syntax error");]])[
  }

  /**
   * Whether the given <code>yypact_</code> value indicates a defaulted state.
   * @@param yyvalue   the value to check
   */
  public function yyPactValueIsDefault(int $yyvalue): bool {
    return $yyvalue === $this->yypact_ninf;
  }

  /**
   * Whether the given <code>yytable_</code>
   * value indicates a syntax error.
   * @@param yyvalue the value to check
   */
  public function yyTableValueIsError(int $yyvalue): bool {
    return $yyvalue === $this->yytable_ninf;
  }

  public int $yypact_ninf = ]b4_pact_ninf[;
  public int $yytable_ninf = ]b4_table_ninf[;

]b4_parser_tables_define[

]b4_parse_trace_if([[
  ]b4_integral_parser_table_define([rline], [b4_rline],
  [[YYRLINE[YYN] -- Source line where rule number YYN was defined.]])[


  // Report on the debug stream that the rule yyrule is going to be reduced.
  private function yyReducePrint(int $yyrule, YYStack $yystack): void
  {
    if ($this->yydebug === 0)
      return;

    $yylno = $this->yyrline[$yyrule];
    $yynrhs = $this->yyr2[$yyrule];
    /* Print the symbols being reduced, and their result.  */
    $this->yycdebug("Reducing stack by rule " . ($yyrule - 1)
              . " (line " . $yylno . "):");

    /* The symbols being reduced.  */
    for ($yyi = 0; $yyi < $yynrhs; $yyi++)
      $this->yySymbolPrint("   $" . ($yyi + 1) . " =",
                    new SymbolKind($this->yystos[$yystack->stateAt($yynrhs - ($yyi + 1))]),
                    ]b4_rhs_data($yynrhs, $yyi + 1)b4_locations_if([,
                    b4_rhs_location($yynrhs, $yyi + 1)])[);
  }]])[

  /* YYTRANSLATE(TOKEN-NUM) -- Symbol number corresponding to TOKEN-NUM
     as returned by yylex, with out-of-bounds checking.  */
  private function yytranslate(int $t): SymbolKind
]b4_api_token_raw_if(dnl
[[  {
    return new SymbolKind($t);
  }
]],
[[  {
    // Last valid token kind.
    $code_max = ]b4_code_max[;
    if ($t <= 0)
      return new SymbolKind(]b4_symbol(eof, kind)[);
    else if ($t <= $code_max)
      return new SymbolKind($this->yytranslate_table[$t]);
    else
      return new SymbolKind(]b4_symbol(undef, kind)[);
  }
  ]b4_integral_parser_table_define([translate_table], [b4_translate])[
]])[

  public const YYLAST = ]b4_last[;
  public const YYEMPTY = -2;
  public const YYFINAL = ]b4_final_state_number[;
  public const YYNTOKENS = ]b4_tokens_number[;

]b4_percent_code_get[
}
]b4_percent_code_get([[epilogue]])[]dnl
b4_epilogue[]dnl
b4_output_end
