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







/**
 * A Bison parser, automatically generated from <tt>/Users/newuser/web/home/php-bison-skeleton/bin/../examples/calc-push-locations-int/grammar.y</tt>.
 *
 * @author LALR (1) parser skeleton written by Paolo Bonzini.
 * Port to PHP language was done by Anton Sukhachev.
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
    /** Token T_NUMBER, to be returned by the scanner.  */
    public const T_NUMBER = 258;



    /**
     * Emit an error referring to the given locationin a user-defined way.
     *
     * @param Location $location The location of the element to which the
     *                error message is related.
     * @param string $message The string for the error message.
     */
     public function yyerror(?Location $location, string $message): void;


  }




  /**
   * Information needed to get the list of expected tokens and to forge
   * a syntax error diagnostic.
   */
  class Context {
    public function __construct(Parser $parser, YYStack $stack, SymbolKind $token, Location $loc) {
      $this->yyparser = $parser;
      $this->yystack = $stack;
      $this->yytoken = $token;
      $this->yylocation = $loc;
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

    /**
     * The location of the lookahead.
     */
    public function getLocation(): Location {
      return $this->yylocation;
    }

    private Location $yylocation;
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
    /** @var Location[] */
    private array $locStack = [];
    private array $valueStack = [];

    public int $height = -1;

    /**
     * @param mixed $value
     */
    public function push(int $state, $value, Location $loc): void {
      $this->height++;

      $this->stateStack[$this->height] = $state;
      $this->locStack[$this->height] = $loc;
      $this->valueStack[$this->height] = $value;
    }

    public function pop(int $num = 1): void {
      $this->height -= $num;
    }

    public function stateAt(int $i): int {
      return $this->stateStack[$this->height - $i];
    }


    public function locationAt(int $i): Location {
      return $this->locStack[$this->height - $i];
    }

    /**
     * @return mixed
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


  class SymbolKind
  {
    public const S_YYEOF = 0;      /* "end of file"  */
    public const S_YYerror = 1;    /* error  */
    public const S_YYUNDEF = 2;    /* "invalid token"  */
    public const S_T_NUMBER = 3;   /* T_NUMBER  */
    public const S_4_ = 4;         /* '-'  */
    public const S_5_ = 5;         /* '+'  */
    public const S_YYACCEPT = 6;   /* $accept  */
    public const S_input = 7;      /* input  */
    public const S_expression = 8; /* expression  */


    private int $yycode;

    public function __construct(int $yycode) {
      $this->yycode = $yycode;
    }

    public function getCode(): int {
        return $this->yycode;
    }


    private const NAMES = array("\"end of file\"", "error", "\"invalid token\"", "T_NUMBER", "'-'",
  "'+'", "\$accept", "input", "expression", null);

    public function getName(): string {
        return trim(self::NAMES[$this->yycode], '"\'');
    }

  }



  /**
   * A class defining a pair of positions.  Positions, defined by the
   * <code>int</code> class, denote a point in the input.
   * Locations represent a part of the input through the beginning
   * and ending positions.
   */
  class Location {
    /**
     * The first, inclusive, position in the range.
     */
    public ?int $begin = null;

    /**
     * The first position beyond the range.
     */
    public ?int $end = null;

    /**
     * Create a <code>Location</code> from the endpoints of the range.
     * @param int $begin The first position included in the range.
     * @param int $end   The first position beyond the range.
     */
    public function __construct(?int $begin = null, ?int $end = null) {
      $this->begin = $begin;
      $this->end = $end;
    }

    /**
     * Print a representation of the location.  For this to be correct,
     * <code>int</code> should override the <code>equals</code>
     * method.
     */
    public function __toString(): string {
       return sprintf('%s-%s', $this->begin, $this->end);
    }
  }


class Parser
{
  /** Version number for the Bison executable that generated this parser.  */
  public const BISON_VERSION = "3.8.2";

  /** Name of the skeleton that generated this parser.  */
  public const BISON_SKELETON = "/Users/newuser/web/home/php-bison-skeleton/bin/../src/php-skel.m4";





  private function yylloc(YYStack $rhs, int $n): Location
  {
    if (0 < $n)
      return new Location($rhs->locationAt($n - 1)->begin, $rhs->locationAt(0)->end);
    else
      return new Location($rhs->locationAt(0)->end, $rhs->locationAt(0)->end);
  }

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
    
    $this->yylloc           = new Location();

  }




  private int $yynerrs = 0;

  /**
   * The number of syntax errors so far.
   */
  public function getNumberOfErrors(): int { return $this->yynerrs; }

  /**
   * Print an error message via the lexer.
   * Use a <code>null</code> location.
   * @param msg The error message.
   */
  public function yyerror(?Location $location, string $msg): void {
      $this->yylexer->yyerror($location, $msg);
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
   * Returned by a Bison action in order to request a new token.
   */
  public const YYPUSH_MORE = 4;

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
  private const YYGETTOKEN = 9; /* Signify that a new token is expected when doing push-parsing.  */

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


    /* The location where the error started.  */
    private ?Location $yyerrloc = null;

    /* Location. */
    private Location $yylloc;

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
     /** @var Location */
     $yyloc = $this->yylloc($yystack, $yylen);

    switch ($yyn)
      {
          case 2: /* input: expression  */
    /* "/Users/newuser/web/home/php-bison-skeleton/bin/../examples/calc-push-locations-int/grammar.y":13  */
                                   { printf("%d\n", $yystack->valueAt(0)); };
  break;


  case 3: /* expression: T_NUMBER  */
    /* "/Users/newuser/web/home/php-bison-skeleton/bin/../examples/calc-push-locations-int/grammar.y":17  */
                                   { $yyval = $yystack->valueAt(0); };
  break;


  case 4: /* expression: expression '+' expression  */
    /* "/Users/newuser/web/home/php-bison-skeleton/bin/../examples/calc-push-locations-int/grammar.y":18  */
                                   { $yyval = $yystack->valueAt(2) + $yystack->valueAt(0);  };
  break;


  case 5: /* expression: expression '-' expression  */
    /* "/Users/newuser/web/home/php-bison-skeleton/bin/../examples/calc-push-locations-int/grammar.y":19  */
                                   { $yyval = $yystack->valueAt(2) - $yystack->valueAt(0);  };
  break;



/* "/Users/newuser/web/home/php-bison-skeleton/bin/../examples/calc-push-locations-int/parser.php":472  */

        default: break;
      }

    $yystack->pop($yylen);
    $yylen = 0;
    /* Shift the result of the reduction.  */
    $yystate = $this->yyLRGotoState($yystack->stateAt(0), $this->yyr1[$yyn]);
    $yystack->push($yystate, $yyval, $yyloc);
    return Parser::YYNEWSTATE;
  }





  /**
   * Push Parse input from external lexer
   *
   * @param $yylextoken int current token
   * @param $yylexval mixed current lval
   * @param $yylexloc Location current position
   *
   * @return int <tt>YYACCEPT, YYABORT, YYPUSH_MORE</tt>
   */
  public function push_parse(int $yylextoken, $yylexval, Location $yylexloc): int
  {


    if (!$this->push_parse_initialized)
      {
        $this->push_parse_initialize();

        $this->yyerrstatus = 0;
      } else
        $this->label = Parser::YYGETTOKEN;

    $push_token_consumed = true;

    for (;;)
      switch ($this->label)
      {
        /* New state.  Unlike in the C/C++ skeletons, the state is already
           pushed when we come here.  */
      case Parser::YYNEWSTATE:

        /* Accept?  */
        if ($this->yystate === Parser::YYFINAL) {
          $this->label = Parser::YYACCEPT; break;
        }

        /* Take a decision.  First try without lookahead.  */
        $this->yyn = $this->yypact[$this->yystate];
        if ($this->yyPactValueIsDefault($this->yyn))
          {
            $this->label = Parser::YYDEFAULT;
            break;
          }
        /* Fall Through */

      case Parser::YYGETTOKEN:
        /* Read a lookahead token.  */
        if ($this->yychar === Parser::YYEMPTY)
          {

            if (!$push_token_consumed) {
              return Parser::YYPUSH_MORE;}
            $this->yychar = $yylextoken;
            $this->yylval = $yylexval;
            $this->yylloc = $yylexloc;
            $push_token_consumed = false;
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
            $this->yyerrloc = $this->yylloc;
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
                $this->yystack->push($this->yystate, $this->yylval, $this->yylloc);
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
            $this->yyreportSyntaxError(new Context($this, $this->yystack, $this->yytoken, $this->yylloc));
          }

        $this->yyerrloc = $this->yylloc;
        if ($this->yyerrstatus === 3)
          {
            /* If just tried and failed to reuse lookahead token after an
               error, discard it.  */

            if ($this->yychar <= LexerInterface::YYEOF)
              {
                /* Return failure if at end of input.  */
                if ($this->yychar === LexerInterface::YYEOF) {
                  $this->label = Parser::YYABORT; break;
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
        $this->yyerrloc = $this->yystack->locationAt ($this->yylen - 1);
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
              $this->label = Parser::YYABORT; break;
            }


            $this->yyerrloc = $this->yystack->locationAt(0);
            $this->yystack->pop();
            $this->yystate = $this->yystack->stateAt(0);
          }

        if ($this->label === Parser::YYABORT)
          /* Leave the switch.  */
          break;


        /* Muck with the stack to setup for yylloc.  */
        $this->yystack->push (0, null, $this->yylloc);
        $this->yystack->push (0, null, $this->yyerrloc);
        $this->yyloc = $this->yylloc ($this->yystack, 2);
        $this->yystack->pop(2);

        /* Shift the error token.  */

        $this->yystate = $this->yyn;
        $this->yystack->push($this->yyn, $this->yylval, $this->yyloc);
        $this->label = Parser::YYNEWSTATE;
        break;

        /* Accept.  */
      case Parser::YYACCEPT:
        $this->push_parse_initialized = false; return Parser::YYACCEPT;

        /* Abort.  */
      case Parser::YYABORT:
        $this->push_parse_initialized = false; return Parser::YYABORT;
      }
}

  private $push_parse_initialized = false;

    /**
     * (Re-)Initialize the state of the push parser.
     */
  public function push_parse_initialize(): void
  {
    /* Lookahead and lookahead in internal form.  */
    $this->yychar = Parser::YYEMPTY;
    $this->yytoken = null;

    /* State.  */
    $this->yyn = 0;
    $this->yylen = 0;
    $this->yystate = 0;
    $this->yystack = new YYStack();
    $this->label = Parser::YYNEWSTATE;

    /* Error handling.  */
    $this->yynerrs = 0;
    /* The location where the error started.  */
    $this->yyerrloc = null;
    $this->yylloc = new Location(null, null);

    /* Semantic value of the lookahead.  */
    $this->yylval = null;

    $this->yystack->push($this->yystate, $this->yylval, $this->yylloc);

    $this->push_parse_initialized = true;

  }








  /**
   * Build and emit a "syntax error" message in a user-defined way.
   *
   * @param ctx  The context of the error.
   */
  private function yyreportSyntaxError(Context $yyctx): void {
      $this->yyerror($yyctx->getLocation(), "syntax error");
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

  public int $yypact_ninf = -5;
  public int $yytable_ninf = -1;

/* YYPACT[STATE-NUM] -- Index in YYTABLE of the portion describing
   STATE-NUM.  */
  
  /** @var int[] */
  public array $yypact = array(     1,    -5,     5,    -4,    -5,     1,     1,    -5,    -5);
  

/* YYDEFACT[STATE-NUM] -- Default reduction number in state STATE-NUM.
   Performed when YYTABLE does not specify something else to do.  Zero
   means the default is an error.  */
  
  /** @var int[] */
  public array $yydefact = array(     0,     3,     0,     2,     1,     0,     0,     5,     4);
  

/* YYPGOTO[NTERM-NUM].  */
  
  /** @var int[] */
  public array $yypgoto = array(    -5,    -5,    -3);
  

/* YYDEFGOTO[NTERM-NUM].  */
  
  /** @var int[] */
  public array $yydefgoto = array(     0,     2,     3);
  

/* YYTABLE[YYPACT[STATE-NUM]] -- What to do in state STATE-NUM.  If
   positive, shift that token.  If negative, reduce the rule whose
   number is the opposite.  If YYTABLE_NINF, syntax error.  */
  
  /** @var int[] */
  public array $yytable = array(     5,     6,     7,     8,     1,     4);
  


  /** @var int[] */
  public array $yycheck = array(     4,     5,     5,     6,     3,     0);
  

/* YYSTOS[STATE-NUM] -- The symbol kind of the accessing symbol of
   state STATE-NUM.  */
  
  /** @var int[] */
  public array $yystos = array(     0,     3,     7,     8,     0,     4,     5,     8,     8);
  

/* YYR1[RULE-NUM] -- Symbol kind of the left-hand side of rule RULE-NUM.  */
  
  /** @var int[] */
  public array $yyr1 = array(     0,     6,     7,     8,     8,     8);
  

/* YYR2[RULE-NUM] -- Number of symbols on the right-hand side of rule RULE-NUM.  */
  
  /** @var int[] */
  public array $yyr2 = array(     0,     2,     1,     1,     3,     3);
  




  /* YYTRANSLATE(TOKEN-NUM) -- Symbol number corresponding to TOKEN-NUM
     as returned by yylex, with out-of-bounds checking.  */
  private function yytranslate(int $t): SymbolKind
  {
    // Last valid token kind.
    $code_max = 258;
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
       2,     2,     2,     5,     2,     4,     2,     2,     2,     2,
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
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     1,     2,     3);
  


  public const YYLAST = 5;
  public const YYEMPTY = -2;
  public const YYFINAL = 4;
  public const YYNTOKENS = 6;


}
/* "/Users/newuser/web/home/php-bison-skeleton/bin/../examples/calc-push-locations-int/grammar.y":22  */

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
