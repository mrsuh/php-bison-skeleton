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



/* "%code imports" blocks.  */
/* "grammar.y":9  */

use PhpParser\Error;
use PhpParser\Node;
use PhpParser\Node\Expr;
use PhpParser\Node\Name;
use PhpParser\Node\Scalar;
use PhpParser\Node\Stmt;

/* "lib/parser-tmp.php":53  */



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
    public const YYerror = 255;
    /** Token "invalid token", to be returned by the scanner.  */
    public const YYUNDEF = 256;
    /** Token T_INCLUDE, to be returned by the scanner.  */
    public const T_INCLUDE = 258;
    /** Token T_INCLUDE_ONCE, to be returned by the scanner.  */
    public const T_INCLUDE_ONCE = 259;
    /** Token T_EVAL, to be returned by the scanner.  */
    public const T_EVAL = 260;
    /** Token T_REQUIRE, to be returned by the scanner.  */
    public const T_REQUIRE = 261;
    /** Token T_REQUIRE_ONCE, to be returned by the scanner.  */
    public const T_REQUIRE_ONCE = 262;
    /** Token T_LOGICAL_OR, to be returned by the scanner.  */
    public const T_LOGICAL_OR = 263;
    /** Token T_LOGICAL_XOR, to be returned by the scanner.  */
    public const T_LOGICAL_XOR = 264;
    /** Token T_LOGICAL_AND, to be returned by the scanner.  */
    public const T_LOGICAL_AND = 265;
    /** Token T_PRINT, to be returned by the scanner.  */
    public const T_PRINT = 266;
    /** Token T_YIELD, to be returned by the scanner.  */
    public const T_YIELD = 267;
    /** Token T_DOUBLE_ARROW, to be returned by the scanner.  */
    public const T_DOUBLE_ARROW = 268;
    /** Token T_YIELD_FROM, to be returned by the scanner.  */
    public const T_YIELD_FROM = 269;
    /** Token T_PLUS_EQUAL, to be returned by the scanner.  */
    public const T_PLUS_EQUAL = 270;
    /** Token T_MINUS_EQUAL, to be returned by the scanner.  */
    public const T_MINUS_EQUAL = 271;
    /** Token T_MUL_EQUAL, to be returned by the scanner.  */
    public const T_MUL_EQUAL = 272;
    /** Token T_DIV_EQUAL, to be returned by the scanner.  */
    public const T_DIV_EQUAL = 273;
    /** Token T_CONCAT_EQUAL, to be returned by the scanner.  */
    public const T_CONCAT_EQUAL = 274;
    /** Token T_MOD_EQUAL, to be returned by the scanner.  */
    public const T_MOD_EQUAL = 275;
    /** Token T_AND_EQUAL, to be returned by the scanner.  */
    public const T_AND_EQUAL = 276;
    /** Token T_OR_EQUAL, to be returned by the scanner.  */
    public const T_OR_EQUAL = 277;
    /** Token T_XOR_EQUAL, to be returned by the scanner.  */
    public const T_XOR_EQUAL = 278;
    /** Token T_SL_EQUAL, to be returned by the scanner.  */
    public const T_SL_EQUAL = 279;
    /** Token T_SR_EQUAL, to be returned by the scanner.  */
    public const T_SR_EQUAL = 280;
    /** Token T_POW_EQUAL, to be returned by the scanner.  */
    public const T_POW_EQUAL = 281;
    /** Token T_COALESCE_EQUAL, to be returned by the scanner.  */
    public const T_COALESCE_EQUAL = 282;
    /** Token T_COALESCE, to be returned by the scanner.  */
    public const T_COALESCE = 283;
    /** Token T_BOOLEAN_OR, to be returned by the scanner.  */
    public const T_BOOLEAN_OR = 284;
    /** Token T_BOOLEAN_AND, to be returned by the scanner.  */
    public const T_BOOLEAN_AND = 285;
    /** Token T_AMPERSAND_NOT_FOLLOWED_BY_VAR_OR_VARARG, to be returned by the scanner.  */
    public const T_AMPERSAND_NOT_FOLLOWED_BY_VAR_OR_VARARG = 286;
    /** Token T_AMPERSAND_FOLLOWED_BY_VAR_OR_VARARG, to be returned by the scanner.  */
    public const T_AMPERSAND_FOLLOWED_BY_VAR_OR_VARARG = 287;
    /** Token T_IS_EQUAL, to be returned by the scanner.  */
    public const T_IS_EQUAL = 288;
    /** Token T_IS_NOT_EQUAL, to be returned by the scanner.  */
    public const T_IS_NOT_EQUAL = 289;
    /** Token T_IS_IDENTICAL, to be returned by the scanner.  */
    public const T_IS_IDENTICAL = 290;
    /** Token T_IS_NOT_IDENTICAL, to be returned by the scanner.  */
    public const T_IS_NOT_IDENTICAL = 291;
    /** Token T_SPACESHIP, to be returned by the scanner.  */
    public const T_SPACESHIP = 292;
    /** Token T_IS_SMALLER_OR_EQUAL, to be returned by the scanner.  */
    public const T_IS_SMALLER_OR_EQUAL = 293;
    /** Token T_IS_GREATER_OR_EQUAL, to be returned by the scanner.  */
    public const T_IS_GREATER_OR_EQUAL = 294;
    /** Token T_SL, to be returned by the scanner.  */
    public const T_SL = 295;
    /** Token T_SR, to be returned by the scanner.  */
    public const T_SR = 296;
    /** Token T_INSTANCEOF, to be returned by the scanner.  */
    public const T_INSTANCEOF = 297;
    /** Token T_INC, to be returned by the scanner.  */
    public const T_INC = 298;
    /** Token T_DEC, to be returned by the scanner.  */
    public const T_DEC = 299;
    /** Token T_INT_CAST, to be returned by the scanner.  */
    public const T_INT_CAST = 300;
    /** Token T_DOUBLE_CAST, to be returned by the scanner.  */
    public const T_DOUBLE_CAST = 301;
    /** Token T_STRING_CAST, to be returned by the scanner.  */
    public const T_STRING_CAST = 302;
    /** Token T_ARRAY_CAST, to be returned by the scanner.  */
    public const T_ARRAY_CAST = 303;
    /** Token T_OBJECT_CAST, to be returned by the scanner.  */
    public const T_OBJECT_CAST = 304;
    /** Token T_BOOL_CAST, to be returned by the scanner.  */
    public const T_BOOL_CAST = 305;
    /** Token T_UNSET_CAST, to be returned by the scanner.  */
    public const T_UNSET_CAST = 306;
    /** Token T_POW, to be returned by the scanner.  */
    public const T_POW = 307;
    /** Token T_NEW, to be returned by the scanner.  */
    public const T_NEW = 308;
    /** Token T_CLONE, to be returned by the scanner.  */
    public const T_CLONE = 309;
    /** Token T_EXIT, to be returned by the scanner.  */
    public const T_EXIT = 310;
    /** Token T_IF, to be returned by the scanner.  */
    public const T_IF = 311;
    /** Token T_ELSEIF, to be returned by the scanner.  */
    public const T_ELSEIF = 312;
    /** Token T_ELSE, to be returned by the scanner.  */
    public const T_ELSE = 313;
    /** Token T_ENDIF, to be returned by the scanner.  */
    public const T_ENDIF = 314;
    /** Token T_LNUMBER, to be returned by the scanner.  */
    public const T_LNUMBER = 315;
    /** Token T_DNUMBER, to be returned by the scanner.  */
    public const T_DNUMBER = 316;
    /** Token T_STRING, to be returned by the scanner.  */
    public const T_STRING = 317;
    /** Token T_STRING_VARNAME, to be returned by the scanner.  */
    public const T_STRING_VARNAME = 318;
    /** Token T_VARIABLE, to be returned by the scanner.  */
    public const T_VARIABLE = 319;
    /** Token T_NUM_STRING, to be returned by the scanner.  */
    public const T_NUM_STRING = 320;
    /** Token T_INLINE_HTML, to be returned by the scanner.  */
    public const T_INLINE_HTML = 321;
    /** Token T_ENCAPSED_AND_WHITESPACE, to be returned by the scanner.  */
    public const T_ENCAPSED_AND_WHITESPACE = 322;
    /** Token T_CONSTANT_ENCAPSED_STRING, to be returned by the scanner.  */
    public const T_CONSTANT_ENCAPSED_STRING = 323;
    /** Token T_ECHO, to be returned by the scanner.  */
    public const T_ECHO = 324;
    /** Token T_DO, to be returned by the scanner.  */
    public const T_DO = 325;
    /** Token T_WHILE, to be returned by the scanner.  */
    public const T_WHILE = 326;
    /** Token T_ENDWHILE, to be returned by the scanner.  */
    public const T_ENDWHILE = 327;
    /** Token T_FOR, to be returned by the scanner.  */
    public const T_FOR = 328;
    /** Token T_ENDFOR, to be returned by the scanner.  */
    public const T_ENDFOR = 329;
    /** Token T_FOREACH, to be returned by the scanner.  */
    public const T_FOREACH = 330;
    /** Token T_ENDFOREACH, to be returned by the scanner.  */
    public const T_ENDFOREACH = 331;
    /** Token T_DECLARE, to be returned by the scanner.  */
    public const T_DECLARE = 332;
    /** Token T_ENDDECLARE, to be returned by the scanner.  */
    public const T_ENDDECLARE = 333;
    /** Token T_AS, to be returned by the scanner.  */
    public const T_AS = 334;
    /** Token T_SWITCH, to be returned by the scanner.  */
    public const T_SWITCH = 335;
    /** Token T_MATCH, to be returned by the scanner.  */
    public const T_MATCH = 336;
    /** Token T_ENDSWITCH, to be returned by the scanner.  */
    public const T_ENDSWITCH = 337;
    /** Token T_CASE, to be returned by the scanner.  */
    public const T_CASE = 338;
    /** Token T_DEFAULT, to be returned by the scanner.  */
    public const T_DEFAULT = 339;
    /** Token T_BREAK, to be returned by the scanner.  */
    public const T_BREAK = 340;
    /** Token T_CONTINUE, to be returned by the scanner.  */
    public const T_CONTINUE = 341;
    /** Token T_GOTO, to be returned by the scanner.  */
    public const T_GOTO = 342;
    /** Token T_FUNCTION, to be returned by the scanner.  */
    public const T_FUNCTION = 343;
    /** Token T_FN, to be returned by the scanner.  */
    public const T_FN = 344;
    /** Token T_CONST, to be returned by the scanner.  */
    public const T_CONST = 345;
    /** Token T_RETURN, to be returned by the scanner.  */
    public const T_RETURN = 346;
    /** Token T_TRY, to be returned by the scanner.  */
    public const T_TRY = 347;
    /** Token T_CATCH, to be returned by the scanner.  */
    public const T_CATCH = 348;
    /** Token T_FINALLY, to be returned by the scanner.  */
    public const T_FINALLY = 349;
    /** Token T_THROW, to be returned by the scanner.  */
    public const T_THROW = 257;
    /** Token T_USE, to be returned by the scanner.  */
    public const T_USE = 350;
    /** Token T_INSTEADOF, to be returned by the scanner.  */
    public const T_INSTEADOF = 351;
    /** Token T_GLOBAL, to be returned by the scanner.  */
    public const T_GLOBAL = 352;
    /** Token T_STATIC, to be returned by the scanner.  */
    public const T_STATIC = 353;
    /** Token T_ABSTRACT, to be returned by the scanner.  */
    public const T_ABSTRACT = 354;
    /** Token T_FINAL, to be returned by the scanner.  */
    public const T_FINAL = 355;
    /** Token T_PRIVATE, to be returned by the scanner.  */
    public const T_PRIVATE = 356;
    /** Token T_PROTECTED, to be returned by the scanner.  */
    public const T_PROTECTED = 357;
    /** Token T_PUBLIC, to be returned by the scanner.  */
    public const T_PUBLIC = 358;
    /** Token T_READONLY, to be returned by the scanner.  */
    public const T_READONLY = 359;
    /** Token T_VAR, to be returned by the scanner.  */
    public const T_VAR = 360;
    /** Token T_UNSET, to be returned by the scanner.  */
    public const T_UNSET = 361;
    /** Token T_ISSET, to be returned by the scanner.  */
    public const T_ISSET = 362;
    /** Token T_EMPTY, to be returned by the scanner.  */
    public const T_EMPTY = 363;
    /** Token T_HALT_COMPILER, to be returned by the scanner.  */
    public const T_HALT_COMPILER = 364;
    /** Token T_CLASS, to be returned by the scanner.  */
    public const T_CLASS = 365;
    /** Token T_TRAIT, to be returned by the scanner.  */
    public const T_TRAIT = 366;
    /** Token T_INTERFACE, to be returned by the scanner.  */
    public const T_INTERFACE = 367;
    /** Token T_ENUM, to be returned by the scanner.  */
    public const T_ENUM = 368;
    /** Token T_EXTENDS, to be returned by the scanner.  */
    public const T_EXTENDS = 369;
    /** Token T_IMPLEMENTS, to be returned by the scanner.  */
    public const T_IMPLEMENTS = 370;
    /** Token T_OBJECT_OPERATOR, to be returned by the scanner.  */
    public const T_OBJECT_OPERATOR = 371;
    /** Token T_NULLSAFE_OBJECT_OPERATOR, to be returned by the scanner.  */
    public const T_NULLSAFE_OBJECT_OPERATOR = 372;
    /** Token T_LIST, to be returned by the scanner.  */
    public const T_LIST = 373;
    /** Token T_ARRAY, to be returned by the scanner.  */
    public const T_ARRAY = 374;
    /** Token T_CALLABLE, to be returned by the scanner.  */
    public const T_CALLABLE = 375;
    /** Token T_CLASS_C, to be returned by the scanner.  */
    public const T_CLASS_C = 376;
    /** Token T_TRAIT_C, to be returned by the scanner.  */
    public const T_TRAIT_C = 377;
    /** Token T_METHOD_C, to be returned by the scanner.  */
    public const T_METHOD_C = 378;
    /** Token T_FUNC_C, to be returned by the scanner.  */
    public const T_FUNC_C = 379;
    /** Token T_LINE, to be returned by the scanner.  */
    public const T_LINE = 380;
    /** Token T_FILE, to be returned by the scanner.  */
    public const T_FILE = 381;
    /** Token T_START_HEREDOC, to be returned by the scanner.  */
    public const T_START_HEREDOC = 382;
    /** Token T_END_HEREDOC, to be returned by the scanner.  */
    public const T_END_HEREDOC = 383;
    /** Token T_DOLLAR_OPEN_CURLY_BRACES, to be returned by the scanner.  */
    public const T_DOLLAR_OPEN_CURLY_BRACES = 384;
    /** Token T_CURLY_OPEN, to be returned by the scanner.  */
    public const T_CURLY_OPEN = 385;
    /** Token T_PAAMAYIM_NEKUDOTAYIM, to be returned by the scanner.  */
    public const T_PAAMAYIM_NEKUDOTAYIM = 386;
    /** Token T_NAMESPACE, to be returned by the scanner.  */
    public const T_NAMESPACE = 387;
    /** Token T_NS_C, to be returned by the scanner.  */
    public const T_NS_C = 388;
    /** Token T_DIR, to be returned by the scanner.  */
    public const T_DIR = 389;
    /** Token T_NS_SEPARATOR, to be returned by the scanner.  */
    public const T_NS_SEPARATOR = 390;
    /** Token T_ELLIPSIS, to be returned by the scanner.  */
    public const T_ELLIPSIS = 391;
    /** Token T_NAME_FULLY_QUALIFIED, to be returned by the scanner.  */
    public const T_NAME_FULLY_QUALIFIED = 392;
    /** Token T_NAME_QUALIFIED, to be returned by the scanner.  */
    public const T_NAME_QUALIFIED = 393;
    /** Token T_NAME_RELATIVE, to be returned by the scanner.  */
    public const T_NAME_RELATIVE = 394;
    /** Token T_ATTRIBUTE, to be returned by the scanner.  */
    public const T_ATTRIBUTE = 395;



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
    public const S_T_INCLUDE = 3;  /* T_INCLUDE  */
    public const S_T_INCLUDE_ONCE = 4; /* T_INCLUDE_ONCE  */
    public const S_T_EVAL = 5;     /* T_EVAL  */
    public const S_T_REQUIRE = 6;  /* T_REQUIRE  */
    public const S_T_REQUIRE_ONCE = 7; /* T_REQUIRE_ONCE  */
    public const S_8_ = 8;         /* ','  */
    public const S_T_LOGICAL_OR = 9; /* T_LOGICAL_OR  */
    public const S_T_LOGICAL_XOR = 10; /* T_LOGICAL_XOR  */
    public const S_T_LOGICAL_AND = 11; /* T_LOGICAL_AND  */
    public const S_T_PRINT = 12;   /* T_PRINT  */
    public const S_T_YIELD = 13;   /* T_YIELD  */
    public const S_T_DOUBLE_ARROW = 14; /* T_DOUBLE_ARROW  */
    public const S_T_YIELD_FROM = 15; /* T_YIELD_FROM  */
    public const S_16_ = 16;       /* '='  */
    public const S_T_PLUS_EQUAL = 17; /* T_PLUS_EQUAL  */
    public const S_T_MINUS_EQUAL = 18; /* T_MINUS_EQUAL  */
    public const S_T_MUL_EQUAL = 19; /* T_MUL_EQUAL  */
    public const S_T_DIV_EQUAL = 20; /* T_DIV_EQUAL  */
    public const S_T_CONCAT_EQUAL = 21; /* T_CONCAT_EQUAL  */
    public const S_T_MOD_EQUAL = 22; /* T_MOD_EQUAL  */
    public const S_T_AND_EQUAL = 23; /* T_AND_EQUAL  */
    public const S_T_OR_EQUAL = 24; /* T_OR_EQUAL  */
    public const S_T_XOR_EQUAL = 25; /* T_XOR_EQUAL  */
    public const S_T_SL_EQUAL = 26; /* T_SL_EQUAL  */
    public const S_T_SR_EQUAL = 27; /* T_SR_EQUAL  */
    public const S_T_POW_EQUAL = 28; /* T_POW_EQUAL  */
    public const S_T_COALESCE_EQUAL = 29; /* T_COALESCE_EQUAL  */
    public const S_30_ = 30;       /* '?'  */
    public const S_31_ = 31;       /* ':'  */
    public const S_T_COALESCE = 32; /* T_COALESCE  */
    public const S_T_BOOLEAN_OR = 33; /* T_BOOLEAN_OR  */
    public const S_T_BOOLEAN_AND = 34; /* T_BOOLEAN_AND  */
    public const S_35_ = 35;       /* '|'  */
    public const S_36_ = 36;       /* '^'  */
    public const S_T_AMPERSAND_NOT_FOLLOWED_BY_VAR_OR_VARARG = 37; /* T_AMPERSAND_NOT_FOLLOWED_BY_VAR_OR_VARARG  */
    public const S_T_AMPERSAND_FOLLOWED_BY_VAR_OR_VARARG = 38; /* T_AMPERSAND_FOLLOWED_BY_VAR_OR_VARARG  */
    public const S_T_IS_EQUAL = 39; /* T_IS_EQUAL  */
    public const S_T_IS_NOT_EQUAL = 40; /* T_IS_NOT_EQUAL  */
    public const S_T_IS_IDENTICAL = 41; /* T_IS_IDENTICAL  */
    public const S_T_IS_NOT_IDENTICAL = 42; /* T_IS_NOT_IDENTICAL  */
    public const S_T_SPACESHIP = 43; /* T_SPACESHIP  */
    public const S_44_ = 44;       /* '<'  */
    public const S_T_IS_SMALLER_OR_EQUAL = 45; /* T_IS_SMALLER_OR_EQUAL  */
    public const S_46_ = 46;       /* '>'  */
    public const S_T_IS_GREATER_OR_EQUAL = 47; /* T_IS_GREATER_OR_EQUAL  */
    public const S_T_SL = 48;      /* T_SL  */
    public const S_T_SR = 49;      /* T_SR  */
    public const S_50_ = 50;       /* '+'  */
    public const S_51_ = 51;       /* '-'  */
    public const S_52_ = 52;       /* '.'  */
    public const S_53_ = 53;       /* '*'  */
    public const S_54_ = 54;       /* '/'  */
    public const S_55_ = 55;       /* '%'  */
    public const S_56_ = 56;       /* '!'  */
    public const S_T_INSTANCEOF = 57; /* T_INSTANCEOF  */
    public const S_58_ = 58;       /* '~'  */
    public const S_T_INC = 59;     /* T_INC  */
    public const S_T_DEC = 60;     /* T_DEC  */
    public const S_T_INT_CAST = 61; /* T_INT_CAST  */
    public const S_T_DOUBLE_CAST = 62; /* T_DOUBLE_CAST  */
    public const S_T_STRING_CAST = 63; /* T_STRING_CAST  */
    public const S_T_ARRAY_CAST = 64; /* T_ARRAY_CAST  */
    public const S_T_OBJECT_CAST = 65; /* T_OBJECT_CAST  */
    public const S_T_BOOL_CAST = 66; /* T_BOOL_CAST  */
    public const S_T_UNSET_CAST = 67; /* T_UNSET_CAST  */
    public const S_68_ = 68;       /* '@'  */
    public const S_T_POW = 69;     /* T_POW  */
    public const S_70_ = 70;       /* '['  */
    public const S_T_NEW = 71;     /* T_NEW  */
    public const S_T_CLONE = 72;   /* T_CLONE  */
    public const S_T_EXIT = 73;    /* T_EXIT  */
    public const S_T_IF = 74;      /* T_IF  */
    public const S_T_ELSEIF = 75;  /* T_ELSEIF  */
    public const S_T_ELSE = 76;    /* T_ELSE  */
    public const S_T_ENDIF = 77;   /* T_ENDIF  */
    public const S_T_LNUMBER = 78; /* T_LNUMBER  */
    public const S_T_DNUMBER = 79; /* T_DNUMBER  */
    public const S_T_STRING = 80;  /* T_STRING  */
    public const S_T_STRING_VARNAME = 81; /* T_STRING_VARNAME  */
    public const S_T_VARIABLE = 82; /* T_VARIABLE  */
    public const S_T_NUM_STRING = 83; /* T_NUM_STRING  */
    public const S_T_INLINE_HTML = 84; /* T_INLINE_HTML  */
    public const S_T_ENCAPSED_AND_WHITESPACE = 85; /* T_ENCAPSED_AND_WHITESPACE  */
    public const S_T_CONSTANT_ENCAPSED_STRING = 86; /* T_CONSTANT_ENCAPSED_STRING  */
    public const S_T_ECHO = 87;    /* T_ECHO  */
    public const S_T_DO = 88;      /* T_DO  */
    public const S_T_WHILE = 89;   /* T_WHILE  */
    public const S_T_ENDWHILE = 90; /* T_ENDWHILE  */
    public const S_T_FOR = 91;     /* T_FOR  */
    public const S_T_ENDFOR = 92;  /* T_ENDFOR  */
    public const S_T_FOREACH = 93; /* T_FOREACH  */
    public const S_T_ENDFOREACH = 94; /* T_ENDFOREACH  */
    public const S_T_DECLARE = 95; /* T_DECLARE  */
    public const S_T_ENDDECLARE = 96; /* T_ENDDECLARE  */
    public const S_T_AS = 97;      /* T_AS  */
    public const S_T_SWITCH = 98;  /* T_SWITCH  */
    public const S_T_MATCH = 99;   /* T_MATCH  */
    public const S_T_ENDSWITCH = 100; /* T_ENDSWITCH  */
    public const S_T_CASE = 101;   /* T_CASE  */
    public const S_T_DEFAULT = 102; /* T_DEFAULT  */
    public const S_T_BREAK = 103;  /* T_BREAK  */
    public const S_T_CONTINUE = 104; /* T_CONTINUE  */
    public const S_T_GOTO = 105;   /* T_GOTO  */
    public const S_T_FUNCTION = 106; /* T_FUNCTION  */
    public const S_T_FN = 107;     /* T_FN  */
    public const S_T_CONST = 108;  /* T_CONST  */
    public const S_T_RETURN = 109; /* T_RETURN  */
    public const S_T_TRY = 110;    /* T_TRY  */
    public const S_T_CATCH = 111;  /* T_CATCH  */
    public const S_T_FINALLY = 112; /* T_FINALLY  */
    public const S_T_THROW = 113;  /* T_THROW  */
    public const S_T_USE = 114;    /* T_USE  */
    public const S_T_INSTEADOF = 115; /* T_INSTEADOF  */
    public const S_T_GLOBAL = 116; /* T_GLOBAL  */
    public const S_T_STATIC = 117; /* T_STATIC  */
    public const S_T_ABSTRACT = 118; /* T_ABSTRACT  */
    public const S_T_FINAL = 119;  /* T_FINAL  */
    public const S_T_PRIVATE = 120; /* T_PRIVATE  */
    public const S_T_PROTECTED = 121; /* T_PROTECTED  */
    public const S_T_PUBLIC = 122; /* T_PUBLIC  */
    public const S_T_READONLY = 123; /* T_READONLY  */
    public const S_T_VAR = 124;    /* T_VAR  */
    public const S_T_UNSET = 125;  /* T_UNSET  */
    public const S_T_ISSET = 126;  /* T_ISSET  */
    public const S_T_EMPTY = 127;  /* T_EMPTY  */
    public const S_T_HALT_COMPILER = 128; /* T_HALT_COMPILER  */
    public const S_T_CLASS = 129;  /* T_CLASS  */
    public const S_T_TRAIT = 130;  /* T_TRAIT  */
    public const S_T_INTERFACE = 131; /* T_INTERFACE  */
    public const S_T_ENUM = 132;   /* T_ENUM  */
    public const S_T_EXTENDS = 133; /* T_EXTENDS  */
    public const S_T_IMPLEMENTS = 134; /* T_IMPLEMENTS  */
    public const S_T_OBJECT_OPERATOR = 135; /* T_OBJECT_OPERATOR  */
    public const S_T_NULLSAFE_OBJECT_OPERATOR = 136; /* T_NULLSAFE_OBJECT_OPERATOR  */
    public const S_T_LIST = 137;   /* T_LIST  */
    public const S_T_ARRAY = 138;  /* T_ARRAY  */
    public const S_T_CALLABLE = 139; /* T_CALLABLE  */
    public const S_T_CLASS_C = 140; /* T_CLASS_C  */
    public const S_T_TRAIT_C = 141; /* T_TRAIT_C  */
    public const S_T_METHOD_C = 142; /* T_METHOD_C  */
    public const S_T_FUNC_C = 143; /* T_FUNC_C  */
    public const S_T_LINE = 144;   /* T_LINE  */
    public const S_T_FILE = 145;   /* T_FILE  */
    public const S_T_START_HEREDOC = 146; /* T_START_HEREDOC  */
    public const S_T_END_HEREDOC = 147; /* T_END_HEREDOC  */
    public const S_T_DOLLAR_OPEN_CURLY_BRACES = 148; /* T_DOLLAR_OPEN_CURLY_BRACES  */
    public const S_T_CURLY_OPEN = 149; /* T_CURLY_OPEN  */
    public const S_T_PAAMAYIM_NEKUDOTAYIM = 150; /* T_PAAMAYIM_NEKUDOTAYIM  */
    public const S_T_NAMESPACE = 151; /* T_NAMESPACE  */
    public const S_T_NS_C = 152;   /* T_NS_C  */
    public const S_T_DIR = 153;    /* T_DIR  */
    public const S_T_NS_SEPARATOR = 154; /* T_NS_SEPARATOR  */
    public const S_T_ELLIPSIS = 155; /* T_ELLIPSIS  */
    public const S_T_NAME_FULLY_QUALIFIED = 156; /* T_NAME_FULLY_QUALIFIED  */
    public const S_T_NAME_QUALIFIED = 157; /* T_NAME_QUALIFIED  */
    public const S_T_NAME_RELATIVE = 158; /* T_NAME_RELATIVE  */
    public const S_T_ATTRIBUTE = 159; /* T_ATTRIBUTE  */
    public const S_160_ = 160;     /* ';'  */
    public const S_161_ = 161;     /* ']'  */
    public const S_162_ = 162;     /* '{'  */
    public const S_163_ = 163;     /* '}'  */
    public const S_164_ = 164;     /* '('  */
    public const S_165_ = 165;     /* ')'  */
    public const S_166_ = 166;     /* '`'  */
    public const S_167_ = 167;     /* '"'  */
    public const S_168_ = 168;     /* '$'  */
    public const S_YYACCEPT = 169; /* $accept  */
    public const S_start = 170;    /* start  */
    public const S_top_statement_list_ex = 171; /* top_statement_list_ex  */
    public const S_top_statement_list = 172; /* top_statement_list  */
    public const S_ampersand = 173; /* ampersand  */
    public const S_reserved_non_modifiers = 174; /* reserved_non_modifiers  */
    public const S_semi_reserved = 175; /* semi_reserved  */
    public const S_identifier_maybe_reserved = 176; /* identifier_maybe_reserved  */
    public const S_identifier_not_reserved = 177; /* identifier_not_reserved  */
    public const S_reserved_non_modifiers_identifier = 178; /* reserved_non_modifiers_identifier  */
    public const S_namespace_declaration_name = 179; /* namespace_declaration_name  */
    public const S_namespace_name = 180; /* namespace_name  */
    public const S_legacy_namespace_name = 181; /* legacy_namespace_name  */
    public const S_plain_variable = 182; /* plain_variable  */
    public const S_semi = 183;     /* semi  */
    public const S_no_comma = 184; /* no_comma  */
    public const S_optional_comma = 185; /* optional_comma  */
    public const S_attribute_decl = 186; /* attribute_decl  */
    public const S_attribute_group = 187; /* attribute_group  */
    public const S_attribute = 188; /* attribute  */
    public const S_attributes = 189; /* attributes  */
    public const S_optional_attributes = 190; /* optional_attributes  */
    public const S_top_statement = 191; /* top_statement  */
    public const S_use_type = 192; /* use_type  */
    public const S_group_use_declaration = 193; /* group_use_declaration  */
    public const S_unprefixed_use_declarations = 194; /* unprefixed_use_declarations  */
    public const S_non_empty_unprefixed_use_declarations = 195; /* non_empty_unprefixed_use_declarations  */
    public const S_use_declarations = 196; /* use_declarations  */
    public const S_non_empty_use_declarations = 197; /* non_empty_use_declarations  */
    public const S_inline_use_declarations = 198; /* inline_use_declarations  */
    public const S_non_empty_inline_use_declarations = 199; /* non_empty_inline_use_declarations  */
    public const S_unprefixed_use_declaration = 200; /* unprefixed_use_declaration  */
    public const S_use_declaration = 201; /* use_declaration  */
    public const S_inline_use_declaration = 202; /* inline_use_declaration  */
    public const S_constant_declaration_list = 203; /* constant_declaration_list  */
    public const S_non_empty_constant_declaration_list = 204; /* non_empty_constant_declaration_list  */
    public const S_constant_declaration = 205; /* constant_declaration  */
    public const S_class_const_list = 206; /* class_const_list  */
    public const S_non_empty_class_const_list = 207; /* non_empty_class_const_list  */
    public const S_class_const = 208; /* class_const  */
    public const S_inner_statement_list_ex = 209; /* inner_statement_list_ex  */
    public const S_inner_statement_list = 210; /* inner_statement_list  */
    public const S_inner_statement = 211; /* inner_statement  */
    public const S_non_empty_statement = 212; /* non_empty_statement  */
    public const S_statement = 213; /* statement  */
    public const S_catches = 214;  /* catches  */
    public const S_name_union = 215; /* name_union  */
    public const S_catch = 216;    /* catch  */
    public const S_optional_finally = 217; /* optional_finally  */
    public const S_variables_list = 218; /* variables_list  */
    public const S_non_empty_variables_list = 219; /* non_empty_variables_list  */
    public const S_optional_ref = 220; /* optional_ref  */
    public const S_optional_arg_ref = 221; /* optional_arg_ref  */
    public const S_optional_ellipsis = 222; /* optional_ellipsis  */
    public const S_block_or_error = 223; /* block_or_error  */
    public const S_identifier_maybe_readonly = 224; /* identifier_maybe_readonly  */
    public const S_function_declaration_statement = 225; /* function_declaration_statement  */
    public const S_class_declaration_statement = 226; /* class_declaration_statement  */
    public const S_enum_scalar_type = 227; /* enum_scalar_type  */
    public const S_enum_case_expr = 228; /* enum_case_expr  */
    public const S_class_entry_type = 229; /* class_entry_type  */
    public const S_class_modifiers = 230; /* class_modifiers  */
    public const S_class_modifier = 231; /* class_modifier  */
    public const S_extends_from = 232; /* extends_from  */
    public const S_interface_extends_list = 233; /* interface_extends_list  */
    public const S_implements_list = 234; /* implements_list  */
    public const S_class_name_list = 235; /* class_name_list  */
    public const S_non_empty_class_name_list = 236; /* non_empty_class_name_list  */
    public const S_for_statement = 237; /* for_statement  */
    public const S_foreach_statement = 238; /* foreach_statement  */
    public const S_declare_statement = 239; /* declare_statement  */
    public const S_declare_list = 240; /* declare_list  */
    public const S_non_empty_declare_list = 241; /* non_empty_declare_list  */
    public const S_declare_list_element = 242; /* declare_list_element  */
    public const S_switch_case_list = 243; /* switch_case_list  */
    public const S_case_list = 244; /* case_list  */
    public const S_case = 245;     /* case  */
    public const S_case_separator = 246; /* case_separator  */
    public const S_match = 247;    /* match  */
    public const S_match_arm_list = 248; /* match_arm_list  */
    public const S_non_empty_match_arm_list = 249; /* non_empty_match_arm_list  */
    public const S_match_arm = 250; /* match_arm  */
    public const S_while_statement = 251; /* while_statement  */
    public const S_elseif_list = 252; /* elseif_list  */
    public const S_elseif = 253;   /* elseif  */
    public const S_new_elseif_list = 254; /* new_elseif_list  */
    public const S_new_elseif = 255; /* new_elseif  */
    public const S_else_single = 256; /* else_single  */
    public const S_new_else_single = 257; /* new_else_single  */
    public const S_foreach_variable = 258; /* foreach_variable  */
    public const S_parameter_list = 259; /* parameter_list  */
    public const S_non_empty_parameter_list = 260; /* non_empty_parameter_list  */
    public const S_optional_property_modifiers = 261; /* optional_property_modifiers  */
    public const S_property_modifier = 262; /* property_modifier  */
    public const S_parameter = 263; /* parameter  */
    public const S_type_expr = 264; /* type_expr  */
    public const S_type = 265;     /* type  */
    public const S_type_without_static = 266; /* type_without_static  */
    public const S_union_type_element = 267; /* union_type_element  */
    public const S_union_type = 268; /* union_type  */
    public const S_union_type_without_static_element = 269; /* union_type_without_static_element  */
    public const S_union_type_without_static = 270; /* union_type_without_static  */
    public const S_intersection_type_list = 271; /* intersection_type_list  */
    public const S_intersection_type = 272; /* intersection_type  */
    public const S_intersection_type_without_static_list = 273; /* intersection_type_without_static_list  */
    public const S_intersection_type_without_static = 274; /* intersection_type_without_static  */
    public const S_type_expr_without_static = 275; /* type_expr_without_static  */
    public const S_optional_type_without_static = 276; /* optional_type_without_static  */
    public const S_optional_return_type = 277; /* optional_return_type  */
    public const S_argument_list = 278; /* argument_list  */
    public const S_variadic_placeholder = 279; /* variadic_placeholder  */
    public const S_non_empty_argument_list = 280; /* non_empty_argument_list  */
    public const S_argument = 281; /* argument  */
    public const S_global_var_list = 282; /* global_var_list  */
    public const S_non_empty_global_var_list = 283; /* non_empty_global_var_list  */
    public const S_global_var = 284; /* global_var  */
    public const S_static_var_list = 285; /* static_var_list  */
    public const S_non_empty_static_var_list = 286; /* non_empty_static_var_list  */
    public const S_static_var = 287; /* static_var  */
    public const S_class_statement_list_ex = 288; /* class_statement_list_ex  */
    public const S_class_statement_list = 289; /* class_statement_list  */
    public const S_class_statement = 290; /* class_statement  */
    public const S_trait_adaptations = 291; /* trait_adaptations  */
    public const S_trait_adaptation_list = 292; /* trait_adaptation_list  */
    public const S_trait_adaptation = 293; /* trait_adaptation  */
    public const S_trait_method_reference_fully_qualified = 294; /* trait_method_reference_fully_qualified  */
    public const S_trait_method_reference = 295; /* trait_method_reference  */
    public const S_method_body = 296; /* method_body  */
    public const S_variable_modifiers = 297; /* variable_modifiers  */
    public const S_method_modifiers = 298; /* method_modifiers  */
    public const S_non_empty_member_modifiers = 299; /* non_empty_member_modifiers  */
    public const S_member_modifier = 300; /* member_modifier  */
    public const S_property_declaration_list = 301; /* property_declaration_list  */
    public const S_non_empty_property_declaration_list = 302; /* non_empty_property_declaration_list  */
    public const S_property_decl_name = 303; /* property_decl_name  */
    public const S_property_declaration = 304; /* property_declaration  */
    public const S_expr_list_forbid_comma = 305; /* expr_list_forbid_comma  */
    public const S_expr_list_allow_comma = 306; /* expr_list_allow_comma  */
    public const S_non_empty_expr_list = 307; /* non_empty_expr_list  */
    public const S_for_expr = 308; /* for_expr  */
    public const S_expr = 309;     /* expr  */
    public const S_anonymous_class = 310; /* anonymous_class  */
    public const S_new_expr = 311; /* new_expr  */
    public const S_lexical_vars = 312; /* lexical_vars  */
    public const S_lexical_var_list = 313; /* lexical_var_list  */
    public const S_non_empty_lexical_var_list = 314; /* non_empty_lexical_var_list  */
    public const S_lexical_var = 315; /* lexical_var  */
    public const S_name_readonly = 316; /* name_readonly  */
    public const S_function_call = 317; /* function_call  */
    public const S_class_name = 318; /* class_name  */
    public const S_name = 319;     /* name  */
    public const S_class_name_reference = 320; /* class_name_reference  */
    public const S_class_name_or_var = 321; /* class_name_or_var  */
    public const S_exit_expr = 322; /* exit_expr  */
    public const S_backticks_expr = 323; /* backticks_expr  */
    public const S_ctor_arguments = 324; /* ctor_arguments  */
    public const S_constant = 325; /* constant  */
    public const S_class_constant = 326; /* class_constant  */
    public const S_array_short_syntax = 327; /* array_short_syntax  */
    public const S_dereferencable_scalar = 328; /* dereferencable_scalar  */
    public const S_scalar = 329;   /* scalar  */
    public const S_optional_expr = 330; /* optional_expr  */
    public const S_fully_dereferencable = 331; /* fully_dereferencable  */
    public const S_array_object_dereferencable = 332; /* array_object_dereferencable  */
    public const S_callable_expr = 333; /* callable_expr  */
    public const S_callable_variable = 334; /* callable_variable  */
    public const S_optional_plain_variable = 335; /* optional_plain_variable  */
    public const S_variable = 336; /* variable  */
    public const S_simple_variable = 337; /* simple_variable  */
    public const S_static_member_prop_name = 338; /* static_member_prop_name  */
    public const S_static_member = 339; /* static_member  */
    public const S_new_variable = 340; /* new_variable  */
    public const S_member_name = 341; /* member_name  */
    public const S_property_name = 342; /* property_name  */
    public const S_list_expr = 343; /* list_expr  */
    public const S_array_pair_list = 344; /* array_pair_list  */
    public const S_comma_or_error = 345; /* comma_or_error  */
    public const S_inner_array_pair_list = 346; /* inner_array_pair_list  */
    public const S_array_pair = 347; /* array_pair  */
    public const S_encaps_list = 348; /* encaps_list  */
    public const S_encaps_string_part = 349; /* encaps_string_part  */
    public const S_encaps_str_varname = 350; /* encaps_str_varname  */
    public const S_encaps_var = 351; /* encaps_var  */
    public const S_encaps_var_offset = 352; /* encaps_var_offset  */


    private int $yycode;

    public function __construct(int $yycode) {
      $this->yycode = $yycode;
    }

    public function getCode(): int {
        return $this->yycode;
    }


    private const NAMES = array("\"end of file\"", "error", "\"invalid token\"", "T_INCLUDE",
  "T_INCLUDE_ONCE", "T_EVAL", "T_REQUIRE", "T_REQUIRE_ONCE", "','",
  "T_LOGICAL_OR", "T_LOGICAL_XOR", "T_LOGICAL_AND", "T_PRINT", "T_YIELD",
  "T_DOUBLE_ARROW", "T_YIELD_FROM", "'='", "T_PLUS_EQUAL", "T_MINUS_EQUAL",
  "T_MUL_EQUAL", "T_DIV_EQUAL", "T_CONCAT_EQUAL", "T_MOD_EQUAL",
  "T_AND_EQUAL", "T_OR_EQUAL", "T_XOR_EQUAL", "T_SL_EQUAL", "T_SR_EQUAL",
  "T_POW_EQUAL", "T_COALESCE_EQUAL", "'?'", "':'", "T_COALESCE",
  "T_BOOLEAN_OR", "T_BOOLEAN_AND", "'|'", "'^'",
  "T_AMPERSAND_NOT_FOLLOWED_BY_VAR_OR_VARARG",
  "T_AMPERSAND_FOLLOWED_BY_VAR_OR_VARARG", "T_IS_EQUAL", "T_IS_NOT_EQUAL",
  "T_IS_IDENTICAL", "T_IS_NOT_IDENTICAL", "T_SPACESHIP", "'<'",
  "T_IS_SMALLER_OR_EQUAL", "'>'", "T_IS_GREATER_OR_EQUAL", "T_SL", "T_SR",
  "'+'", "'-'", "'.'", "'*'", "'/'", "'%'", "'!'", "T_INSTANCEOF", "'~'",
  "T_INC", "T_DEC", "T_INT_CAST", "T_DOUBLE_CAST", "T_STRING_CAST",
  "T_ARRAY_CAST", "T_OBJECT_CAST", "T_BOOL_CAST", "T_UNSET_CAST", "'@'",
  "T_POW", "'['", "T_NEW", "T_CLONE", "T_EXIT", "T_IF", "T_ELSEIF",
  "T_ELSE", "T_ENDIF", "T_LNUMBER", "T_DNUMBER", "T_STRING",
  "T_STRING_VARNAME", "T_VARIABLE", "T_NUM_STRING", "T_INLINE_HTML",
  "T_ENCAPSED_AND_WHITESPACE", "T_CONSTANT_ENCAPSED_STRING", "T_ECHO",
  "T_DO", "T_WHILE", "T_ENDWHILE", "T_FOR", "T_ENDFOR", "T_FOREACH",
  "T_ENDFOREACH", "T_DECLARE", "T_ENDDECLARE", "T_AS", "T_SWITCH",
  "T_MATCH", "T_ENDSWITCH", "T_CASE", "T_DEFAULT", "T_BREAK", "T_CONTINUE",
  "T_GOTO", "T_FUNCTION", "T_FN", "T_CONST", "T_RETURN", "T_TRY",
  "T_CATCH", "T_FINALLY", "T_THROW", "T_USE", "T_INSTEADOF", "T_GLOBAL",
  "T_STATIC", "T_ABSTRACT", "T_FINAL", "T_PRIVATE", "T_PROTECTED",
  "T_PUBLIC", "T_READONLY", "T_VAR", "T_UNSET", "T_ISSET", "T_EMPTY",
  "T_HALT_COMPILER", "T_CLASS", "T_TRAIT", "T_INTERFACE", "T_ENUM",
  "T_EXTENDS", "T_IMPLEMENTS", "T_OBJECT_OPERATOR",
  "T_NULLSAFE_OBJECT_OPERATOR", "T_LIST", "T_ARRAY", "T_CALLABLE",
  "T_CLASS_C", "T_TRAIT_C", "T_METHOD_C", "T_FUNC_C", "T_LINE", "T_FILE",
  "T_START_HEREDOC", "T_END_HEREDOC", "T_DOLLAR_OPEN_CURLY_BRACES",
  "T_CURLY_OPEN", "T_PAAMAYIM_NEKUDOTAYIM", "T_NAMESPACE", "T_NS_C",
  "T_DIR", "T_NS_SEPARATOR", "T_ELLIPSIS", "T_NAME_FULLY_QUALIFIED",
  "T_NAME_QUALIFIED", "T_NAME_RELATIVE", "T_ATTRIBUTE", "';'", "']'",
  "'{'", "'}'", "'('", "')'", "'`'", "'\"'", "'\$'", "\$accept", "start",
  "top_statement_list_ex", "top_statement_list", "ampersand",
  "reserved_non_modifiers", "semi_reserved", "identifier_maybe_reserved",
  "identifier_not_reserved", "reserved_non_modifiers_identifier",
  "namespace_declaration_name", "namespace_name", "legacy_namespace_name",
  "plain_variable", "semi", "no_comma", "optional_comma", "attribute_decl",
  "attribute_group", "attribute", "attributes", "optional_attributes",
  "top_statement", "use_type", "group_use_declaration",
  "unprefixed_use_declarations", "non_empty_unprefixed_use_declarations",
  "use_declarations", "non_empty_use_declarations",
  "inline_use_declarations", "non_empty_inline_use_declarations",
  "unprefixed_use_declaration", "use_declaration",
  "inline_use_declaration", "constant_declaration_list",
  "non_empty_constant_declaration_list", "constant_declaration",
  "class_const_list", "non_empty_class_const_list", "class_const",
  "inner_statement_list_ex", "inner_statement_list", "inner_statement",
  "non_empty_statement", "statement", "catches", "name_union", "catch",
  "optional_finally", "variables_list", "non_empty_variables_list",
  "optional_ref", "optional_arg_ref", "optional_ellipsis",
  "block_or_error", "identifier_maybe_readonly",
  "function_declaration_statement", "class_declaration_statement",
  "enum_scalar_type", "enum_case_expr", "class_entry_type",
  "class_modifiers", "class_modifier", "extends_from",
  "interface_extends_list", "implements_list", "class_name_list",
  "non_empty_class_name_list", "for_statement", "foreach_statement",
  "declare_statement", "declare_list", "non_empty_declare_list",
  "declare_list_element", "switch_case_list", "case_list", "case",
  "case_separator", "match", "match_arm_list", "non_empty_match_arm_list",
  "match_arm", "while_statement", "elseif_list", "elseif",
  "new_elseif_list", "new_elseif", "else_single", "new_else_single",
  "foreach_variable", "parameter_list", "non_empty_parameter_list",
  "optional_property_modifiers", "property_modifier", "parameter",
  "type_expr", "type", "type_without_static", "union_type_element",
  "union_type", "union_type_without_static_element",
  "union_type_without_static", "intersection_type_list",
  "intersection_type", "intersection_type_without_static_list",
  "intersection_type_without_static", "type_expr_without_static",
  "optional_type_without_static", "optional_return_type", "argument_list",
  "variadic_placeholder", "non_empty_argument_list", "argument",
  "global_var_list", "non_empty_global_var_list", "global_var",
  "static_var_list", "non_empty_static_var_list", "static_var",
  "class_statement_list_ex", "class_statement_list", "class_statement",
  "trait_adaptations", "trait_adaptation_list", "trait_adaptation",
  "trait_method_reference_fully_qualified", "trait_method_reference",
  "method_body", "variable_modifiers", "method_modifiers",
  "non_empty_member_modifiers", "member_modifier",
  "property_declaration_list", "non_empty_property_declaration_list",
  "property_decl_name", "property_declaration", "expr_list_forbid_comma",
  "expr_list_allow_comma", "non_empty_expr_list", "for_expr", "expr",
  "anonymous_class", "new_expr", "lexical_vars", "lexical_var_list",
  "non_empty_lexical_var_list", "lexical_var", "name_readonly",
  "function_call", "class_name", "name", "class_name_reference",
  "class_name_or_var", "exit_expr", "backticks_expr", "ctor_arguments",
  "constant", "class_constant", "array_short_syntax",
  "dereferencable_scalar", "scalar", "optional_expr",
  "fully_dereferencable", "array_object_dereferencable", "callable_expr",
  "callable_variable", "optional_plain_variable", "variable",
  "simple_variable", "static_member_prop_name", "static_member",
  "new_variable", "member_name", "property_name", "list_expr",
  "array_pair_list", "comma_or_error", "inner_array_pair_list",
  "array_pair", "encaps_list", "encaps_string_part", "encaps_str_varname",
  "encaps_var", "encaps_var_offset", null);

    public function getName(): string {
        return trim(self::NAMES[$this->yycode], '"\'');
    }

  }




class Parser extends \PhpParser\ParserAbstract
{
  /** Version number for the Bison executable that generated this parser.  */
  public const BISON_VERSION = "3.8.2";

  /** Name of the skeleton that generated this parser.  */
  public const BISON_SKELETON = "../../src/php-skel.m4";

/* "%code parser" blocks.  */
/* "grammar.y":18  */

    private array $ast;

    public function setAst(array $ast): void { $this->ast = $ast; }
    public function getAst(): array { return $this->ast; }

    protected function initReduceCallbacks() {}

/* "lib/parser-tmp.php":968  */






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
/* "%code init" blocks.  */
/* "grammar.y":27  */

    $this->startAttributeStack      = new Stack();
    $this->endAttributeStack        = new Stack();
    $this->endAttributes            = [];
    $this->lookaheadStartAttributes = [];

/* "lib/parser-tmp.php":997  */

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
          case 2: /* start: top_statement_list  */
    /* "grammar.y":151  */
                                                            { $yyval = $this->handleNamespaces($yystack->valueAt(0)); self::setAst($yyval); };
  break;


  case 3: /* top_statement_list_ex: top_statement_list_ex top_statement  */
    /* "grammar.y":155  */
                                                            { if (is_array($yystack->valueAt(0))) { $yyval = array_merge($yystack->valueAt(1), $yystack->valueAt(0)); } else { $yystack->valueAt(1)[] = $yystack->valueAt(0); $yyval = $yystack->valueAt(1); }; };
  break;


  case 4: /* top_statement_list_ex: %empty  */
    /* "grammar.y":156  */
                                                            { $yyval = array(); };
  break;


  case 5: /* top_statement_list: top_statement_list_ex  */
    /* "grammar.y":161  */
          { $startAttributes = $this->lookaheadStartAttributes; if (isset($startAttributes['comments'])) { $nop = new Stmt\Nop($this->createCommentNopAttributes($startAttributes['comments'])); } else { $nop = null; };
            if ($nop !== null) { $yystack->valueAt(0)[] = $nop; } $yyval = $yystack->valueAt(0); };
  break;


  case 87: /* identifier_maybe_reserved: T_STRING  */
    /* "grammar.y":187  */
                                                            { $yyval = new Node\Identifier($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 88: /* identifier_maybe_reserved: semi_reserved  */
    /* "grammar.y":188  */
                                                            { $yyval = new Node\Identifier($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 89: /* identifier_not_reserved: T_STRING  */
    /* "grammar.y":192  */
                                                            { $yyval = new Node\Identifier($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 90: /* reserved_non_modifiers_identifier: reserved_non_modifiers  */
    /* "grammar.y":196  */
                                                            { $yyval = new Node\Identifier($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 91: /* namespace_declaration_name: T_STRING  */
    /* "grammar.y":200  */
                                                            { $yyval = new Name($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 92: /* namespace_declaration_name: semi_reserved  */
    /* "grammar.y":201  */
                                                            { $yyval = new Name($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 93: /* namespace_declaration_name: T_NAME_QUALIFIED  */
    /* "grammar.y":202  */
                                                            { $yyval = new Name($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 94: /* namespace_name: T_STRING  */
    /* "grammar.y":206  */
                                                            { $yyval = new Name($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 95: /* namespace_name: T_NAME_QUALIFIED  */
    /* "grammar.y":207  */
                                                            { $yyval = new Name($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 96: /* legacy_namespace_name: namespace_name  */
    /* "grammar.y":211  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 97: /* legacy_namespace_name: T_NAME_FULLY_QUALIFIED  */
    /* "grammar.y":212  */
                                                            { $yyval = new Name(substr($yystack->valueAt(0), 1), $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 98: /* plain_variable: T_VARIABLE  */
    /* "grammar.y":216  */
                                                            { $yyval = new Expr\Variable(substr($yystack->valueAt(0), 1), $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 99: /* semi: ';'  */
    /* "grammar.y":220  */
                                                            { /* nothing */ };
  break;


  case 100: /* semi: error  */
    /* "grammar.y":221  */
                                                            { /* nothing */ };
  break;


  case 101: /* no_comma: %empty  */
    /* "grammar.y":225  */
                  { /* nothing */ };
  break;


  case 102: /* no_comma: ','  */
    /* "grammar.y":226  */
          { $this->emitError(new Error('A trailing comma is not allowed here', $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes)); };
  break;


  case 105: /* attribute_decl: class_name  */
    /* "grammar.y":235  */
                                                            { $yyval = new Node\Attribute($yystack->valueAt(0), [], $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 106: /* attribute_decl: class_name argument_list  */
    /* "grammar.y":236  */
                                                            { $yyval = new Node\Attribute($yystack->valueAt(1), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes); };
  break;


  case 107: /* attribute_group: attribute_decl  */
    /* "grammar.y":240  */
                                                            { $yyval = array($yystack->valueAt(0)); };
  break;


  case 108: /* attribute_group: attribute_group ',' attribute_decl  */
    /* "grammar.y":241  */
                                                            { $yystack->valueAt(2)[] = $yystack->valueAt(0); $yyval = $yystack->valueAt(2); };
  break;


  case 109: /* attribute: T_ATTRIBUTE attribute_group optional_comma ']'  */
    /* "grammar.y":245  */
                                                            { $yyval = new Node\AttributeGroup($yystack->valueAt(2), $this->startAttributeStack[$yystack->valueAt(3)] + $this->endAttributes); };
  break;


  case 110: /* attributes: attribute  */
    /* "grammar.y":249  */
                                                            { $yyval = array($yystack->valueAt(0)); };
  break;


  case 111: /* attributes: attributes attribute  */
    /* "grammar.y":250  */
                                                            { $yystack->valueAt(1)[] = $yystack->valueAt(0); $yyval = $yystack->valueAt(1); };
  break;


  case 112: /* optional_attributes: %empty  */
    /* "grammar.y":254  */
                                                            { $yyval = []; };
  break;


  case 113: /* optional_attributes: attributes  */
    /* "grammar.y":255  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 114: /* top_statement: statement  */
    /* "grammar.y":259  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 115: /* top_statement: function_declaration_statement  */
    /* "grammar.y":260  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 116: /* top_statement: class_declaration_statement  */
    /* "grammar.y":261  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 117: /* top_statement: T_HALT_COMPILER  */
    /* "grammar.y":263  */
          { $yyval = new Stmt\HaltCompiler($this->lexer->handleHaltCompiler(), $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 118: /* top_statement: T_NAMESPACE namespace_declaration_name semi  */
    /* "grammar.y":265  */
          { $yyval = new Stmt\Namespace_($yystack->valueAt(1), null, $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes);
            $yyval->setAttribute('kind', Stmt\Namespace_::KIND_SEMICOLON);
            $this->checkNamespace($yyval); };
  break;


  case 119: /* top_statement: T_NAMESPACE namespace_declaration_name '{' top_statement_list '}'  */
    /* "grammar.y":269  */
          { $yyval = new Stmt\Namespace_($yystack->valueAt(3), $yystack->valueAt(1), $this->startAttributeStack[$yystack->valueAt(4)] + $this->endAttributes);
            $yyval->setAttribute('kind', Stmt\Namespace_::KIND_BRACED);
            $this->checkNamespace($yyval); };
  break;


  case 120: /* top_statement: T_NAMESPACE '{' top_statement_list '}'  */
    /* "grammar.y":273  */
          { $yyval = new Stmt\Namespace_(null, $yystack->valueAt(1), $this->startAttributeStack[$yystack->valueAt(3)] + $this->endAttributes);
            $yyval->setAttribute('kind', Stmt\Namespace_::KIND_BRACED);
            $this->checkNamespace($yyval); };
  break;


  case 121: /* top_statement: T_USE use_declarations semi  */
    /* "grammar.y":276  */
                                                            { $yyval = new Stmt\Use_($yystack->valueAt(1), Stmt\Use_::TYPE_NORMAL, $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 122: /* top_statement: T_USE use_type use_declarations semi  */
    /* "grammar.y":277  */
                                                            { $yyval = new Stmt\Use_($yystack->valueAt(1), $yystack->valueAt(2), $this->startAttributeStack[$yystack->valueAt(3)] + $this->endAttributes); };
  break;


  case 123: /* top_statement: group_use_declaration semi  */
    /* "grammar.y":278  */
                                                            { $yyval = $yystack->valueAt(1); };
  break;


  case 124: /* top_statement: T_CONST constant_declaration_list semi  */
    /* "grammar.y":279  */
                                                            { $yyval = new Stmt\Const_($yystack->valueAt(1), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 125: /* use_type: T_FUNCTION  */
    /* "grammar.y":283  */
                                                            { $yyval = Stmt\Use_::TYPE_FUNCTION; };
  break;


  case 126: /* use_type: T_CONST  */
    /* "grammar.y":284  */
                                                            { $yyval = Stmt\Use_::TYPE_CONSTANT; };
  break;


  case 127: /* group_use_declaration: T_USE use_type legacy_namespace_name T_NS_SEPARATOR '{' unprefixed_use_declarations '}'  */
    /* "grammar.y":289  */
          { $yyval = new Stmt\GroupUse($yystack->valueAt(4), $yystack->valueAt(1), $yystack->valueAt(5), $this->startAttributeStack[$yystack->valueAt(6)] + $this->endAttributes); };
  break;


  case 128: /* group_use_declaration: T_USE legacy_namespace_name T_NS_SEPARATOR '{' inline_use_declarations '}'  */
    /* "grammar.y":291  */
          { $yyval = new Stmt\GroupUse($yystack->valueAt(4), $yystack->valueAt(1), Stmt\Use_::TYPE_UNKNOWN, $this->startAttributeStack[$yystack->valueAt(5)] + $this->endAttributes); };
  break;


  case 129: /* unprefixed_use_declarations: non_empty_unprefixed_use_declarations optional_comma  */
    /* "grammar.y":295  */
                                                            { $yyval = $yystack->valueAt(1); };
  break;


  case 130: /* non_empty_unprefixed_use_declarations: non_empty_unprefixed_use_declarations ',' unprefixed_use_declaration  */
    /* "grammar.y":300  */
          { $yystack->valueAt(2)[] = $yystack->valueAt(0); $yyval = $yystack->valueAt(2); };
  break;


  case 131: /* non_empty_unprefixed_use_declarations: unprefixed_use_declaration  */
    /* "grammar.y":301  */
                                                            { $yyval = array($yystack->valueAt(0)); };
  break;


  case 132: /* use_declarations: non_empty_use_declarations no_comma  */
    /* "grammar.y":305  */
                                                            { $yyval = $yystack->valueAt(1); };
  break;


  case 133: /* non_empty_use_declarations: non_empty_use_declarations ',' use_declaration  */
    /* "grammar.y":309  */
                                                            { $yystack->valueAt(2)[] = $yystack->valueAt(0); $yyval = $yystack->valueAt(2); };
  break;


  case 134: /* non_empty_use_declarations: use_declaration  */
    /* "grammar.y":310  */
                                                            { $yyval = array($yystack->valueAt(0)); };
  break;


  case 135: /* inline_use_declarations: non_empty_inline_use_declarations optional_comma  */
    /* "grammar.y":314  */
                                                            { $yyval = $yystack->valueAt(1); };
  break;


  case 136: /* non_empty_inline_use_declarations: non_empty_inline_use_declarations ',' inline_use_declaration  */
    /* "grammar.y":319  */
          { $yystack->valueAt(2)[] = $yystack->valueAt(0); $yyval = $yystack->valueAt(2); };
  break;


  case 137: /* non_empty_inline_use_declarations: inline_use_declaration  */
    /* "grammar.y":320  */
                                                            { $yyval = array($yystack->valueAt(0)); };
  break;


  case 138: /* unprefixed_use_declaration: namespace_name  */
    /* "grammar.y":325  */
          { $yyval = new Stmt\UseUse($yystack->valueAt(0), null, Stmt\Use_::TYPE_UNKNOWN, $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); $this->checkUseUse($yyval, $yystack->valueAt(0)); };
  break;


  case 139: /* unprefixed_use_declaration: namespace_name T_AS identifier_not_reserved  */
    /* "grammar.y":327  */
          { $yyval = new Stmt\UseUse($yystack->valueAt(2), $yystack->valueAt(0), Stmt\Use_::TYPE_UNKNOWN, $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); $this->checkUseUse($yyval, $yystack->valueAt(0)); };
  break;


  case 140: /* use_declaration: legacy_namespace_name  */
    /* "grammar.y":332  */
          { $yyval = new Stmt\UseUse($yystack->valueAt(0), null, Stmt\Use_::TYPE_UNKNOWN, $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); $this->checkUseUse($yyval, $yystack->valueAt(0)); };
  break;


  case 141: /* use_declaration: legacy_namespace_name T_AS identifier_not_reserved  */
    /* "grammar.y":334  */
          { $yyval = new Stmt\UseUse($yystack->valueAt(2), $yystack->valueAt(0), Stmt\Use_::TYPE_UNKNOWN, $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); $this->checkUseUse($yyval, $yystack->valueAt(0)); };
  break;


  case 142: /* inline_use_declaration: unprefixed_use_declaration  */
    /* "grammar.y":338  */
                                                            { $yyval = $yystack->valueAt(0); $yyval->type = Stmt\Use_::TYPE_NORMAL; };
  break;


  case 143: /* inline_use_declaration: use_type unprefixed_use_declaration  */
    /* "grammar.y":339  */
                                                            { $yyval = $yystack->valueAt(0); $yyval->type = $yystack->valueAt(1); };
  break;


  case 144: /* constant_declaration_list: non_empty_constant_declaration_list no_comma  */
    /* "grammar.y":343  */
                                                            { $yyval = $yystack->valueAt(1); };
  break;


  case 145: /* non_empty_constant_declaration_list: non_empty_constant_declaration_list ',' constant_declaration  */
    /* "grammar.y":348  */
          { $yystack->valueAt(2)[] = $yystack->valueAt(0); $yyval = $yystack->valueAt(2); };
  break;


  case 146: /* non_empty_constant_declaration_list: constant_declaration  */
    /* "grammar.y":349  */
                                                            { $yyval = array($yystack->valueAt(0)); };
  break;


  case 147: /* constant_declaration: identifier_not_reserved '=' expr  */
    /* "grammar.y":353  */
                                                            { $yyval = new Node\Const_($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 148: /* class_const_list: non_empty_class_const_list no_comma  */
    /* "grammar.y":357  */
                                                            { $yyval = $yystack->valueAt(1); };
  break;


  case 149: /* non_empty_class_const_list: non_empty_class_const_list ',' class_const  */
    /* "grammar.y":361  */
                                                            { $yystack->valueAt(2)[] = $yystack->valueAt(0); $yyval = $yystack->valueAt(2); };
  break;


  case 150: /* non_empty_class_const_list: class_const  */
    /* "grammar.y":362  */
                                                            { $yyval = array($yystack->valueAt(0)); };
  break;


  case 151: /* class_const: identifier_maybe_reserved '=' expr  */
    /* "grammar.y":366  */
                                                            { $yyval = new Node\Const_($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 152: /* inner_statement_list_ex: inner_statement_list_ex inner_statement  */
    /* "grammar.y":370  */
                                                            { if (is_array($yystack->valueAt(0))) { $yyval = array_merge($yystack->valueAt(1), $yystack->valueAt(0)); } else { $yystack->valueAt(1)[] = $yystack->valueAt(0); $yyval = $yystack->valueAt(1); }; };
  break;


  case 153: /* inner_statement_list_ex: %empty  */
    /* "grammar.y":371  */
                                                            { $yyval = array(); };
  break;


  case 154: /* inner_statement_list: inner_statement_list_ex  */
    /* "grammar.y":376  */
          { $startAttributes = $this->lookaheadStartAttributes; if (isset($startAttributes['comments'])) { $nop = new Stmt\Nop($this->createCommentNopAttributes($startAttributes['comments'])); } else { $nop = null; };
            if ($nop !== null) { $yystack->valueAt(0)[] = $nop; } $yyval = $yystack->valueAt(0); };
  break;


  case 155: /* inner_statement: statement  */
    /* "grammar.y":381  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 156: /* inner_statement: function_declaration_statement  */
    /* "grammar.y":382  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 157: /* inner_statement: class_declaration_statement  */
    /* "grammar.y":383  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 158: /* inner_statement: T_HALT_COMPILER  */
    /* "grammar.y":385  */
          { throw new Error('__HALT_COMPILER() can only be used from the outermost scope', $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 159: /* non_empty_statement: '{' inner_statement_list '}'  */
    /* "grammar.y":390  */
    {
        if ($yystack->valueAt(1)) {
            $yyval = $yystack->valueAt(1); $attrs = $this->startAttributeStack[$yystack->valueAt(2)]; $stmts = $yyval; if (!empty($attrs['comments'])) {$stmts[0]->setAttribute('comments', array_merge($attrs['comments'], $stmts[0]->getAttribute('comments', []))); };
        } else {
            $startAttributes = $this->startAttributeStack[$yystack->valueAt(2)]; if (isset($startAttributes['comments'])) { $yyval = new Stmt\Nop($startAttributes + $this->endAttributes); } else { $yyval = null; };
            if (null === $yyval) { $yyval = array(); }
        }
    };
  break;


  case 160: /* non_empty_statement: T_IF '(' expr ')' statement elseif_list else_single  */
    /* "grammar.y":399  */
          { $yyval = new Stmt\If_($yystack->valueAt(4), ['stmts' => is_array($yystack->valueAt(2)) ? $yystack->valueAt(2) : array($yystack->valueAt(2)), 'elseifs' => $yystack->valueAt(1), 'else' => $yystack->valueAt(0)], $this->startAttributeStack[$yystack->valueAt(6)] + $this->endAttributes); };
  break;


  case 161: /* non_empty_statement: T_IF '(' expr ')' ':' inner_statement_list new_elseif_list new_else_single T_ENDIF ';'  */
    /* "grammar.y":401  */
          { $yyval = new Stmt\If_($yystack->valueAt(7), ['stmts' => $yystack->valueAt(4), 'elseifs' => $yystack->valueAt(3), 'else' => $yystack->valueAt(2)], $this->startAttributeStack[$yystack->valueAt(9)] + $this->endAttributes); };
  break;


  case 162: /* non_empty_statement: T_WHILE '(' expr ')' while_statement  */
    /* "grammar.y":402  */
                                                            { $yyval = new Stmt\While_($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(4)] + $this->endAttributes); };
  break;


  case 163: /* non_empty_statement: T_DO statement T_WHILE '(' expr ')' ';'  */
    /* "grammar.y":403  */
                                                            { $yyval = new Stmt\Do_($yystack->valueAt(2), is_array($yystack->valueAt(5)) ? $yystack->valueAt(5) : array($yystack->valueAt(5)), $this->startAttributeStack[$yystack->valueAt(6)] + $this->endAttributes); };
  break;


  case 164: /* non_empty_statement: T_FOR '(' for_expr ';' for_expr ';' for_expr ')' for_statement  */
    /* "grammar.y":405  */
          { $yyval = new Stmt\For_(['init' => $yystack->valueAt(6), 'cond' => $yystack->valueAt(4), 'loop' => $yystack->valueAt(2), 'stmts' => $yystack->valueAt(0)], $this->startAttributeStack[$yystack->valueAt(8)] + $this->endAttributes); };
  break;


  case 165: /* non_empty_statement: T_SWITCH '(' expr ')' switch_case_list  */
    /* "grammar.y":406  */
                                                            { $yyval = new Stmt\Switch_($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(4)] + $this->endAttributes); };
  break;


  case 166: /* non_empty_statement: T_BREAK optional_expr semi  */
    /* "grammar.y":407  */
                                                            { $yyval = new Stmt\Break_($yystack->valueAt(1), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 167: /* non_empty_statement: T_CONTINUE optional_expr semi  */
    /* "grammar.y":408  */
                                                            { $yyval = new Stmt\Continue_($yystack->valueAt(1), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 168: /* non_empty_statement: T_RETURN optional_expr semi  */
    /* "grammar.y":409  */
                                                            { $yyval = new Stmt\Return_($yystack->valueAt(1), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 169: /* non_empty_statement: T_GLOBAL global_var_list semi  */
    /* "grammar.y":410  */
                                                            { $yyval = new Stmt\Global_($yystack->valueAt(1), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 170: /* non_empty_statement: T_STATIC static_var_list semi  */
    /* "grammar.y":411  */
                                                            { $yyval = new Stmt\Static_($yystack->valueAt(1), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 171: /* non_empty_statement: T_ECHO expr_list_forbid_comma semi  */
    /* "grammar.y":412  */
                                                            { $yyval = new Stmt\Echo_($yystack->valueAt(1), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 172: /* non_empty_statement: T_INLINE_HTML  */
    /* "grammar.y":413  */
                                                            { $yyval = new Stmt\InlineHTML($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 173: /* non_empty_statement: expr semi  */
    /* "grammar.y":414  */
                {
        $e = $yystack->valueAt(1);
        if ($e instanceof Expr\Throw_) {
            // For backwards-compatibility reasons, convert throw in statement position into
            // Stmt\Throw_ rather than Stmt\Expression(Expr\Throw_).
            $yyval = new Stmt\Throw_($e->expr, $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes);
        } else {
            $yyval = new Stmt\Expression($e, $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes);
        }
    };
  break;


  case 174: /* non_empty_statement: T_UNSET '(' variables_list ')' semi  */
    /* "grammar.y":424  */
                                                            { $yyval = new Stmt\Unset_($yystack->valueAt(2), $this->startAttributeStack[$yystack->valueAt(4)] + $this->endAttributes); };
  break;


  case 175: /* non_empty_statement: T_FOREACH '(' expr T_AS foreach_variable ')' foreach_statement  */
    /* "grammar.y":426  */
          { $yyval = new Stmt\Foreach_($yystack->valueAt(4), $yystack->valueAt(2)[0], ['keyVar' => null, 'byRef' => $yystack->valueAt(2)[1], 'stmts' => $yystack->valueAt(0)], $this->startAttributeStack[$yystack->valueAt(6)] + $this->endAttributes); };
  break;


  case 176: /* non_empty_statement: T_FOREACH '(' expr T_AS variable T_DOUBLE_ARROW foreach_variable ')' foreach_statement  */
    /* "grammar.y":428  */
          { $yyval = new Stmt\Foreach_($yystack->valueAt(6), $yystack->valueAt(2)[0], ['keyVar' => $yystack->valueAt(4), 'byRef' => $yystack->valueAt(2)[1], 'stmts' => $yystack->valueAt(0)], $this->startAttributeStack[$yystack->valueAt(8)] + $this->endAttributes); };
  break;


  case 177: /* non_empty_statement: T_FOREACH '(' expr error ')' foreach_statement  */
    /* "grammar.y":430  */
          { $yyval = new Stmt\Foreach_($yystack->valueAt(3), new Expr\Error($this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributeStack[$yystack->valueAt(2)]), ['stmts' => $yystack->valueAt(0)], $this->startAttributeStack[$yystack->valueAt(5)] + $this->endAttributes); };
  break;


  case 178: /* non_empty_statement: T_DECLARE '(' declare_list ')' declare_statement  */
    /* "grammar.y":431  */
                                                            { $yyval = new Stmt\Declare_($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(4)] + $this->endAttributes); };
  break;


  case 179: /* non_empty_statement: T_TRY '{' inner_statement_list '}' catches optional_finally  */
    /* "grammar.y":433  */
          { $yyval = new Stmt\TryCatch($yystack->valueAt(3), $yystack->valueAt(1), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(5)] + $this->endAttributes); $this->checkTryCatch($yyval); };
  break;


  case 180: /* non_empty_statement: T_GOTO identifier_not_reserved semi  */
    /* "grammar.y":434  */
                                                            { $yyval = new Stmt\Goto_($yystack->valueAt(1), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 181: /* non_empty_statement: identifier_not_reserved ':'  */
    /* "grammar.y":435  */
                                                            { $yyval = new Stmt\Label($yystack->valueAt(1), $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes); };
  break;


  case 182: /* non_empty_statement: error  */
    /* "grammar.y":436  */
                                                            { $yyval = array(); /* means: no statement */ };
  break;


  case 183: /* statement: non_empty_statement  */
    /* "grammar.y":440  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 184: /* statement: ';'  */
    /* "grammar.y":442  */
          { $startAttributes = $this->startAttributeStack[$yystack->valueAt(0)]; if (isset($startAttributes['comments'])) { $yyval = new Stmt\Nop($startAttributes + $this->endAttributes); } else { $yyval = null; };
            if ($yyval === null) $yyval = array(); /* means: no statement */ };
  break;


  case 185: /* catches: %empty  */
    /* "grammar.y":447  */
                                                            { $yyval = array(); };
  break;


  case 186: /* catches: catches catch  */
    /* "grammar.y":448  */
                                                            { $yystack->valueAt(1)[] = $yystack->valueAt(0); $yyval = $yystack->valueAt(1); };
  break;


  case 187: /* name_union: name  */
    /* "grammar.y":452  */
                                                            { $yyval = array($yystack->valueAt(0)); };
  break;


  case 188: /* name_union: name_union '|' name  */
    /* "grammar.y":453  */
                                                            { $yystack->valueAt(2)[] = $yystack->valueAt(0); $yyval = $yystack->valueAt(2); };
  break;


  case 189: /* catch: T_CATCH '(' name_union optional_plain_variable ')' '{' inner_statement_list '}'  */
    /* "grammar.y":458  */
        { $yyval = new Stmt\Catch_($yystack->valueAt(5), $yystack->valueAt(4), $yystack->valueAt(1), $this->startAttributeStack[$yystack->valueAt(7)] + $this->endAttributes); };
  break;


  case 190: /* optional_finally: %empty  */
    /* "grammar.y":462  */
                                                            { $yyval = null; };
  break;


  case 191: /* optional_finally: T_FINALLY '{' inner_statement_list '}'  */
    /* "grammar.y":463  */
                                                            { $yyval = new Stmt\Finally_($yystack->valueAt(1), $this->startAttributeStack[$yystack->valueAt(3)] + $this->endAttributes); };
  break;


  case 192: /* variables_list: non_empty_variables_list optional_comma  */
    /* "grammar.y":467  */
                                                            { $yyval = $yystack->valueAt(1); };
  break;


  case 193: /* non_empty_variables_list: variable  */
    /* "grammar.y":471  */
                                                            { $yyval = array($yystack->valueAt(0)); };
  break;


  case 194: /* non_empty_variables_list: non_empty_variables_list ',' variable  */
    /* "grammar.y":472  */
                                                            { $yystack->valueAt(2)[] = $yystack->valueAt(0); $yyval = $yystack->valueAt(2); };
  break;


  case 195: /* optional_ref: %empty  */
    /* "grammar.y":476  */
                                                            { $yyval = false; };
  break;


  case 196: /* optional_ref: ampersand  */
    /* "grammar.y":477  */
                                                            { $yyval = true; };
  break;


  case 197: /* optional_arg_ref: %empty  */
    /* "grammar.y":481  */
                                                            { $yyval = false; };
  break;


  case 198: /* optional_arg_ref: T_AMPERSAND_FOLLOWED_BY_VAR_OR_VARARG  */
    /* "grammar.y":482  */
                                                            { $yyval = true; };
  break;


  case 199: /* optional_ellipsis: %empty  */
    /* "grammar.y":486  */
                                                            { $yyval = false; };
  break;


  case 200: /* optional_ellipsis: T_ELLIPSIS  */
    /* "grammar.y":487  */
                                                            { $yyval = true; };
  break;


  case 201: /* block_or_error: '{' inner_statement_list '}'  */
    /* "grammar.y":491  */
                                                            { $yyval = $yystack->valueAt(1); };
  break;


  case 202: /* block_or_error: error  */
    /* "grammar.y":492  */
                                                            { $yyval = []; };
  break;


  case 203: /* identifier_maybe_readonly: identifier_not_reserved  */
    /* "grammar.y":496  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 204: /* identifier_maybe_readonly: T_READONLY  */
    /* "grammar.y":497  */
                                                            { $yyval = new Node\Identifier($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 205: /* function_declaration_statement: T_FUNCTION optional_ref identifier_maybe_readonly '(' parameter_list ')' optional_return_type block_or_error  */
    /* "grammar.y":502  */
          { $yyval = new Stmt\Function_($yystack->valueAt(5), ['byRef' => $yystack->valueAt(6), 'params' => $yystack->valueAt(3), 'returnType' => $yystack->valueAt(1), 'stmts' => $yystack->valueAt(0), 'attrGroups' => []], $this->startAttributeStack[$yystack->valueAt(7)] + $this->endAttributes); };
  break;


  case 206: /* function_declaration_statement: attributes T_FUNCTION optional_ref identifier_maybe_readonly '(' parameter_list ')' optional_return_type block_or_error  */
    /* "grammar.y":504  */
          { $yyval = new Stmt\Function_($yystack->valueAt(5), ['byRef' => $yystack->valueAt(6), 'params' => $yystack->valueAt(3), 'returnType' => $yystack->valueAt(1), 'stmts' => $yystack->valueAt(0), 'attrGroups' => $yystack->valueAt(8)], $this->startAttributeStack[$yystack->valueAt(8)] + $this->endAttributes); };
  break;


  case 207: /* class_declaration_statement: class_entry_type identifier_not_reserved extends_from implements_list '{' class_statement_list '}'  */
    /* "grammar.y":509  */
          { $yyval = new Stmt\Class_($yystack->valueAt(5), ['type' => $yystack->valueAt(6), 'extends' => $yystack->valueAt(4), 'implements' => $yystack->valueAt(3), 'stmts' => $yystack->valueAt(1), 'attrGroups' => []], $this->startAttributeStack[$yystack->valueAt(6)] + $this->endAttributes);
            $this->checkClass($yyval, $yystack->valueAt(5)); };
  break;


  case 208: /* class_declaration_statement: attributes class_entry_type identifier_not_reserved extends_from implements_list '{' class_statement_list '}'  */
    /* "grammar.y":512  */
          { $yyval = new Stmt\Class_($yystack->valueAt(5), ['type' => $yystack->valueAt(6), 'extends' => $yystack->valueAt(4), 'implements' => $yystack->valueAt(3), 'stmts' => $yystack->valueAt(1), 'attrGroups' => $yystack->valueAt(7)], $this->startAttributeStack[$yystack->valueAt(7)] + $this->endAttributes);
            $this->checkClass($yyval, $yystack->valueAt(5)); };
  break;


  case 209: /* class_declaration_statement: optional_attributes T_INTERFACE identifier_not_reserved interface_extends_list '{' class_statement_list '}'  */
    /* "grammar.y":515  */
          { $yyval = new Stmt\Interface_($yystack->valueAt(4), ['extends' => $yystack->valueAt(3), 'stmts' => $yystack->valueAt(1), 'attrGroups' => $yystack->valueAt(6)], $this->startAttributeStack[$yystack->valueAt(6)] + $this->endAttributes);
            $this->checkInterface($yyval, $yystack->valueAt(4)); };
  break;


  case 210: /* class_declaration_statement: optional_attributes T_TRAIT identifier_not_reserved '{' class_statement_list '}'  */
    /* "grammar.y":518  */
          { $yyval = new Stmt\Trait_($yystack->valueAt(3), ['stmts' => $yystack->valueAt(1), 'attrGroups' => $yystack->valueAt(5)], $this->startAttributeStack[$yystack->valueAt(5)] + $this->endAttributes); };
  break;


  case 211: /* class_declaration_statement: optional_attributes T_ENUM identifier_not_reserved enum_scalar_type implements_list '{' class_statement_list '}'  */
    /* "grammar.y":520  */
          { $yyval = new Stmt\Enum_($yystack->valueAt(5), ['scalarType' => $yystack->valueAt(4), 'implements' => $yystack->valueAt(3), 'stmts' => $yystack->valueAt(1), 'attrGroups' => $yystack->valueAt(7)], $this->startAttributeStack[$yystack->valueAt(7)] + $this->endAttributes);
            $this->checkEnum($yyval, $yystack->valueAt(5)); };
  break;


  case 212: /* enum_scalar_type: %empty  */
    /* "grammar.y":525  */
                                                            { $yyval = null; };
  break;


  case 213: /* enum_scalar_type: ':' type  */
    /* "grammar.y":526  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 214: /* enum_case_expr: %empty  */
    /* "grammar.y":529  */
                                                            { $yyval = null; };
  break;


  case 215: /* enum_case_expr: '=' expr  */
    /* "grammar.y":530  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 216: /* class_entry_type: T_CLASS  */
    /* "grammar.y":534  */
                                                            { $yyval = 0; };
  break;


  case 217: /* class_entry_type: class_modifiers T_CLASS  */
    /* "grammar.y":535  */
                                                            { $yyval = $yystack->valueAt(1); };
  break;


  case 218: /* class_modifiers: class_modifier  */
    /* "grammar.y":539  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 219: /* class_modifiers: class_modifiers class_modifier  */
    /* "grammar.y":540  */
                                                            { $this->checkClassModifier($yystack->valueAt(1), $yystack->valueAt(0), $yystack->valueAt(0)); $yyval = $yystack->valueAt(1) | $yystack->valueAt(0); };
  break;


  case 220: /* class_modifier: T_ABSTRACT  */
    /* "grammar.y":544  */
                                                            { $yyval = Stmt\Class_::MODIFIER_ABSTRACT; };
  break;


  case 221: /* class_modifier: T_FINAL  */
    /* "grammar.y":545  */
                                                            { $yyval = Stmt\Class_::MODIFIER_FINAL; };
  break;


  case 222: /* class_modifier: T_READONLY  */
    /* "grammar.y":546  */
                                                            { $yyval = Stmt\Class_::MODIFIER_READONLY; };
  break;


  case 223: /* extends_from: %empty  */
    /* "grammar.y":550  */
                                                            { $yyval = null; };
  break;


  case 224: /* extends_from: T_EXTENDS class_name  */
    /* "grammar.y":551  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 225: /* interface_extends_list: %empty  */
    /* "grammar.y":555  */
                                                            { $yyval = array(); };
  break;


  case 226: /* interface_extends_list: T_EXTENDS class_name_list  */
    /* "grammar.y":556  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 227: /* implements_list: %empty  */
    /* "grammar.y":560  */
                                                            { $yyval = array(); };
  break;


  case 228: /* implements_list: T_IMPLEMENTS class_name_list  */
    /* "grammar.y":561  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 229: /* class_name_list: non_empty_class_name_list no_comma  */
    /* "grammar.y":565  */
                                                            { $yyval = $yystack->valueAt(1); };
  break;


  case 230: /* non_empty_class_name_list: class_name  */
    /* "grammar.y":569  */
                                                            { $yyval = array($yystack->valueAt(0)); };
  break;


  case 231: /* non_empty_class_name_list: non_empty_class_name_list ',' class_name  */
    /* "grammar.y":570  */
                                                            { $yystack->valueAt(2)[] = $yystack->valueAt(0); $yyval = $yystack->valueAt(2); };
  break;


  case 232: /* for_statement: statement  */
    /* "grammar.y":574  */
                                                            { $yyval = is_array($yystack->valueAt(0)) ? $yystack->valueAt(0) : array($yystack->valueAt(0)); };
  break;


  case 233: /* for_statement: ':' inner_statement_list T_ENDFOR ';'  */
    /* "grammar.y":575  */
                                                            { $yyval = $yystack->valueAt(2); };
  break;


  case 234: /* foreach_statement: statement  */
    /* "grammar.y":579  */
                                                            { $yyval = is_array($yystack->valueAt(0)) ? $yystack->valueAt(0) : array($yystack->valueAt(0)); };
  break;


  case 235: /* foreach_statement: ':' inner_statement_list T_ENDFOREACH ';'  */
    /* "grammar.y":580  */
                                                            { $yyval = $yystack->valueAt(2); };
  break;


  case 236: /* declare_statement: non_empty_statement  */
    /* "grammar.y":584  */
                                                            { $yyval = is_array($yystack->valueAt(0)) ? $yystack->valueAt(0) : array($yystack->valueAt(0)); };
  break;


  case 237: /* declare_statement: ';'  */
    /* "grammar.y":585  */
                                                            { $yyval = null; };
  break;


  case 238: /* declare_statement: ':' inner_statement_list T_ENDDECLARE ';'  */
    /* "grammar.y":586  */
                                                            { $yyval = $yystack->valueAt(2); };
  break;


  case 239: /* declare_list: non_empty_declare_list no_comma  */
    /* "grammar.y":590  */
                                                            { $yyval = $yystack->valueAt(1); };
  break;


  case 240: /* non_empty_declare_list: declare_list_element  */
    /* "grammar.y":594  */
                                                            { $yyval = array($yystack->valueAt(0)); };
  break;


  case 241: /* non_empty_declare_list: non_empty_declare_list ',' declare_list_element  */
    /* "grammar.y":595  */
                                                            { $yystack->valueAt(2)[] = $yystack->valueAt(0); $yyval = $yystack->valueAt(2); };
  break;


  case 242: /* declare_list_element: identifier_not_reserved '=' expr  */
    /* "grammar.y":599  */
                                                            { $yyval = new Stmt\DeclareDeclare($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 243: /* switch_case_list: '{' case_list '}'  */
    /* "grammar.y":603  */
                                                            { $yyval = $yystack->valueAt(1); };
  break;


  case 244: /* switch_case_list: '{' ';' case_list '}'  */
    /* "grammar.y":604  */
                                                            { $yyval = $yystack->valueAt(1); };
  break;


  case 245: /* switch_case_list: ':' case_list T_ENDSWITCH ';'  */
    /* "grammar.y":605  */
                                                            { $yyval = $yystack->valueAt(2); };
  break;


  case 246: /* switch_case_list: ':' ';' case_list T_ENDSWITCH ';'  */
    /* "grammar.y":606  */
                                                            { $yyval = $yystack->valueAt(2); };
  break;


  case 247: /* case_list: %empty  */
    /* "grammar.y":610  */
                                                            { $yyval = array(); };
  break;


  case 248: /* case_list: case_list case  */
    /* "grammar.y":611  */
                                                            { $yystack->valueAt(1)[] = $yystack->valueAt(0); $yyval = $yystack->valueAt(1); };
  break;


  case 249: /* case: T_CASE expr case_separator inner_statement_list_ex  */
    /* "grammar.y":615  */
                                                            { $yyval = new Stmt\Case_($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(3)] + $this->endAttributes); };
  break;


  case 250: /* case: T_DEFAULT case_separator inner_statement_list_ex  */
    /* "grammar.y":616  */
                                                            { $yyval = new Stmt\Case_(null, $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 253: /* match: T_MATCH '(' expr ')' '{' match_arm_list '}'  */
    /* "grammar.y":625  */
                                                            { $yyval = new Expr\Match_($yystack->valueAt(4), $yystack->valueAt(1), $this->startAttributeStack[$yystack->valueAt(6)] + $this->endAttributes); };
  break;


  case 254: /* match_arm_list: %empty  */
    /* "grammar.y":629  */
                                                            { $yyval = []; };
  break;


  case 255: /* match_arm_list: non_empty_match_arm_list optional_comma  */
    /* "grammar.y":630  */
                                                            { $yyval = $yystack->valueAt(1); };
  break;


  case 256: /* non_empty_match_arm_list: match_arm  */
    /* "grammar.y":634  */
                                                            { $yyval = array($yystack->valueAt(0)); };
  break;


  case 257: /* non_empty_match_arm_list: non_empty_match_arm_list ',' match_arm  */
    /* "grammar.y":635  */
                                                            { $yystack->valueAt(2)[] = $yystack->valueAt(0); $yyval = $yystack->valueAt(2); };
  break;


  case 258: /* match_arm: expr_list_allow_comma T_DOUBLE_ARROW expr  */
    /* "grammar.y":639  */
                                                            { $yyval = new Node\MatchArm($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 259: /* match_arm: T_DEFAULT optional_comma T_DOUBLE_ARROW expr  */
    /* "grammar.y":640  */
                                                            { $yyval = new Node\MatchArm(null, $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(3)] + $this->endAttributes); };
  break;


  case 260: /* while_statement: statement  */
    /* "grammar.y":644  */
                                                            { $yyval = is_array($yystack->valueAt(0)) ? $yystack->valueAt(0) : array($yystack->valueAt(0)); };
  break;


  case 261: /* while_statement: ':' inner_statement_list T_ENDWHILE ';'  */
    /* "grammar.y":645  */
                                                            { $yyval = $yystack->valueAt(2); };
  break;


  case 262: /* elseif_list: %empty  */
    /* "grammar.y":649  */
                                                            { $yyval = array(); };
  break;


  case 263: /* elseif_list: elseif_list elseif  */
    /* "grammar.y":650  */
                                                            { $yystack->valueAt(1)[] = $yystack->valueAt(0); $yyval = $yystack->valueAt(1); };
  break;


  case 264: /* elseif: T_ELSEIF '(' expr ')' statement  */
    /* "grammar.y":654  */
                                                            { $yyval = new Stmt\ElseIf_($yystack->valueAt(2), is_array($yystack->valueAt(0)) ? $yystack->valueAt(0) : array($yystack->valueAt(0)), $this->startAttributeStack[$yystack->valueAt(4)] + $this->endAttributes); };
  break;


  case 265: /* new_elseif_list: %empty  */
    /* "grammar.y":658  */
                                                            { $yyval = array(); };
  break;


  case 266: /* new_elseif_list: new_elseif_list new_elseif  */
    /* "grammar.y":659  */
                                                            { $yystack->valueAt(1)[] = $yystack->valueAt(0); $yyval = $yystack->valueAt(1); };
  break;


  case 267: /* new_elseif: T_ELSEIF '(' expr ')' ':' inner_statement_list  */
    /* "grammar.y":664  */
         { $yyval = new Stmt\ElseIf_($yystack->valueAt(3), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(5)] + $this->endAttributes); $this->fixupAlternativeElse($yyval); };
  break;


  case 268: /* else_single: %empty  */
    /* "grammar.y":668  */
                                                            { $yyval = null; };
  break;


  case 269: /* else_single: T_ELSE statement  */
    /* "grammar.y":669  */
                                                            { $yyval = new Stmt\Else_(is_array($yystack->valueAt(0)) ? $yystack->valueAt(0) : array($yystack->valueAt(0)), $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes); };
  break;


  case 270: /* new_else_single: %empty  */
    /* "grammar.y":673  */
                                                            { $yyval = null; };
  break;


  case 271: /* new_else_single: T_ELSE ':' inner_statement_list  */
    /* "grammar.y":675  */
          { $yyval = new Stmt\Else_($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); $this->fixupAlternativeElse($yyval); };
  break;


  case 272: /* foreach_variable: variable  */
    /* "grammar.y":679  */
                                                            { $yyval = array($yystack->valueAt(0), false); };
  break;


  case 273: /* foreach_variable: ampersand variable  */
    /* "grammar.y":680  */
                                                            { $yyval = array($yystack->valueAt(0), true); };
  break;


  case 274: /* foreach_variable: list_expr  */
    /* "grammar.y":681  */
                                                            { $yyval = array($yystack->valueAt(0), false); };
  break;


  case 275: /* foreach_variable: array_short_syntax  */
    /* "grammar.y":682  */
                                                            { $yyval = array($yystack->valueAt(0), false); };
  break;


  case 276: /* parameter_list: non_empty_parameter_list optional_comma  */
    /* "grammar.y":686  */
                                                            { $yyval = $yystack->valueAt(1); };
  break;


  case 277: /* parameter_list: %empty  */
    /* "grammar.y":687  */
                                                            { $yyval = array(); };
  break;


  case 278: /* non_empty_parameter_list: parameter  */
    /* "grammar.y":691  */
                                                            { $yyval = array($yystack->valueAt(0)); };
  break;


  case 279: /* non_empty_parameter_list: non_empty_parameter_list ',' parameter  */
    /* "grammar.y":692  */
                                                            { $yystack->valueAt(2)[] = $yystack->valueAt(0); $yyval = $yystack->valueAt(2); };
  break;


  case 280: /* optional_property_modifiers: %empty  */
    /* "grammar.y":696  */
                                { $yyval = 0; };
  break;


  case 281: /* optional_property_modifiers: optional_property_modifiers property_modifier  */
    /* "grammar.y":698  */
          { $this->checkModifier($yystack->valueAt(1), $yystack->valueAt(0), $yystack->valueAt(0)); $yyval = $yystack->valueAt(1) | $yystack->valueAt(0); };
  break;


  case 282: /* property_modifier: T_PUBLIC  */
    /* "grammar.y":702  */
                                { $yyval = Stmt\Class_::MODIFIER_PUBLIC; };
  break;


  case 283: /* property_modifier: T_PROTECTED  */
    /* "grammar.y":703  */
                                { $yyval = Stmt\Class_::MODIFIER_PROTECTED; };
  break;


  case 284: /* property_modifier: T_PRIVATE  */
    /* "grammar.y":704  */
                                { $yyval = Stmt\Class_::MODIFIER_PRIVATE; };
  break;


  case 285: /* property_modifier: T_READONLY  */
    /* "grammar.y":705  */
                                { $yyval = Stmt\Class_::MODIFIER_READONLY; };
  break;


  case 286: /* parameter: optional_attributes optional_property_modifiers optional_type_without_static optional_arg_ref optional_ellipsis plain_variable  */
    /* "grammar.y":711  */
          { $yyval = new Node\Param($yystack->valueAt(0), null, $yystack->valueAt(3), $yystack->valueAt(2), $yystack->valueAt(1), $this->startAttributeStack[$yystack->valueAt(5)] + $this->endAttributes, $yystack->valueAt(4), $yystack->valueAt(5));
            $this->checkParam($yyval); };
  break;


  case 287: /* parameter: optional_attributes optional_property_modifiers optional_type_without_static optional_arg_ref optional_ellipsis plain_variable '=' expr  */
    /* "grammar.y":715  */
          { $yyval = new Node\Param($yystack->valueAt(2), $yystack->valueAt(0), $yystack->valueAt(5), $yystack->valueAt(4), $yystack->valueAt(3), $this->startAttributeStack[$yystack->valueAt(7)] + $this->endAttributes, $yystack->valueAt(6), $yystack->valueAt(7));
            $this->checkParam($yyval); };
  break;


  case 288: /* parameter: optional_attributes optional_property_modifiers optional_type_without_static optional_arg_ref optional_ellipsis error  */
    /* "grammar.y":719  */
          { $yyval = new Node\Param(new Expr\Error($this->startAttributeStack[$yystack->valueAt(5)] + $this->endAttributes), null, $yystack->valueAt(3), $yystack->valueAt(2), $yystack->valueAt(1), $this->startAttributeStack[$yystack->valueAt(5)] + $this->endAttributes, $yystack->valueAt(4), $yystack->valueAt(5)); };
  break;


  case 289: /* type_expr: type  */
    /* "grammar.y":723  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 290: /* type_expr: '?' type  */
    /* "grammar.y":724  */
                                                            { $yyval = new Node\NullableType($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes); };
  break;


  case 291: /* type_expr: union_type  */
    /* "grammar.y":725  */
                                                            { $yyval = new Node\UnionType($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 292: /* type_expr: intersection_type  */
    /* "grammar.y":726  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 293: /* type: type_without_static  */
    /* "grammar.y":730  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 294: /* type: T_STATIC  */
    /* "grammar.y":731  */
                                                            { $yyval = new Node\Name('static', $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 295: /* type_without_static: name  */
    /* "grammar.y":735  */
                                                            { $yyval = $this->handleBuiltinTypes($yystack->valueAt(0)); };
  break;


  case 296: /* type_without_static: T_ARRAY  */
    /* "grammar.y":736  */
                                                            { $yyval = new Node\Identifier('array', $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 297: /* type_without_static: T_CALLABLE  */
    /* "grammar.y":737  */
                                                            { $yyval = new Node\Identifier('callable', $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 298: /* union_type_element: type  */
    /* "grammar.y":741  */
                     { $yyval = $yystack->valueAt(0); };
  break;


  case 299: /* union_type_element: '(' intersection_type ')'  */
    /* "grammar.y":742  */
                                           { $yyval = $yystack->valueAt(1); };
  break;


  case 300: /* union_type: union_type_element '|' union_type_element  */
    /* "grammar.y":746  */
                                                            { $yyval = array($yystack->valueAt(2), $yystack->valueAt(0)); };
  break;


  case 301: /* union_type: union_type '|' union_type_element  */
    /* "grammar.y":747  */
                                                            { $yystack->valueAt(2)[] = $yystack->valueAt(0); $yyval = $yystack->valueAt(2); };
  break;


  case 302: /* union_type_without_static_element: type_without_static  */
    /* "grammar.y":751  */
                                    { $yyval = $yystack->valueAt(0); };
  break;


  case 303: /* union_type_without_static_element: '(' intersection_type_without_static ')'  */
    /* "grammar.y":752  */
                                                          { $yyval = $yystack->valueAt(1); };
  break;


  case 304: /* union_type_without_static: union_type_without_static_element '|' union_type_without_static_element  */
    /* "grammar.y":756  */
                                                                                { $yyval = array($yystack->valueAt(2), $yystack->valueAt(0)); };
  break;


  case 305: /* union_type_without_static: union_type_without_static '|' union_type_without_static_element  */
    /* "grammar.y":757  */
                                                                                { $yystack->valueAt(2)[] = $yystack->valueAt(0); $yyval = $yystack->valueAt(2); };
  break;


  case 306: /* intersection_type_list: type T_AMPERSAND_NOT_FOLLOWED_BY_VAR_OR_VARARG type  */
    /* "grammar.y":761  */
                                                            { $yyval = array($yystack->valueAt(2), $yystack->valueAt(0)); };
  break;


  case 307: /* intersection_type_list: intersection_type_list T_AMPERSAND_NOT_FOLLOWED_BY_VAR_OR_VARARG type  */
    /* "grammar.y":763  */
          { $yystack->valueAt(2)[] = $yystack->valueAt(0); $yyval = $yystack->valueAt(2); };
  break;


  case 308: /* intersection_type: intersection_type_list  */
    /* "grammar.y":767  */
                             { $yyval = new Node\IntersectionType($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 309: /* intersection_type_without_static_list: type_without_static T_AMPERSAND_NOT_FOLLOWED_BY_VAR_OR_VARARG type_without_static  */
    /* "grammar.y":772  */
          { $yyval = array($yystack->valueAt(2), $yystack->valueAt(0)); };
  break;


  case 310: /* intersection_type_without_static_list: intersection_type_without_static_list T_AMPERSAND_NOT_FOLLOWED_BY_VAR_OR_VARARG type_without_static  */
    /* "grammar.y":774  */
          { $yystack->valueAt(2)[] = $yystack->valueAt(0); $yyval = $yystack->valueAt(2); };
  break;


  case 311: /* intersection_type_without_static: intersection_type_without_static_list  */
    /* "grammar.y":778  */
                                            { $yyval = new Node\IntersectionType($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 312: /* type_expr_without_static: type_without_static  */
    /* "grammar.y":782  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 313: /* type_expr_without_static: '?' type_without_static  */
    /* "grammar.y":783  */
                                                            { $yyval = new Node\NullableType($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes); };
  break;


  case 314: /* type_expr_without_static: union_type_without_static  */
    /* "grammar.y":784  */
                                                            { $yyval = new Node\UnionType($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 315: /* type_expr_without_static: intersection_type_without_static  */
    /* "grammar.y":785  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 316: /* optional_type_without_static: %empty  */
    /* "grammar.y":789  */
                                                            { $yyval = null; };
  break;


  case 317: /* optional_type_without_static: type_expr_without_static  */
    /* "grammar.y":790  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 318: /* optional_return_type: %empty  */
    /* "grammar.y":794  */
                                                            { $yyval = null; };
  break;


  case 319: /* optional_return_type: ':' type_expr  */
    /* "grammar.y":795  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 320: /* optional_return_type: ':' error  */
    /* "grammar.y":796  */
                                                            { $yyval = null; };
  break;


  case 321: /* argument_list: '(' ')'  */
    /* "grammar.y":800  */
                                                            { $yyval = array(); };
  break;


  case 322: /* argument_list: '(' non_empty_argument_list optional_comma ')'  */
    /* "grammar.y":801  */
                                                            { $yyval = $yystack->valueAt(2); };
  break;


  case 323: /* argument_list: '(' variadic_placeholder ')'  */
    /* "grammar.y":802  */
                                                            { $yyval = array($yystack->valueAt(1)); };
  break;


  case 324: /* variadic_placeholder: T_ELLIPSIS  */
    /* "grammar.y":806  */
                                                            { $yyval = new Node\VariadicPlaceholder($this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 325: /* non_empty_argument_list: argument  */
    /* "grammar.y":810  */
                                                            { $yyval = array($yystack->valueAt(0)); };
  break;


  case 326: /* non_empty_argument_list: non_empty_argument_list ',' argument  */
    /* "grammar.y":811  */
                                                            { $yystack->valueAt(2)[] = $yystack->valueAt(0); $yyval = $yystack->valueAt(2); };
  break;


  case 327: /* argument: expr  */
    /* "grammar.y":815  */
                                                            { $yyval = new Node\Arg($yystack->valueAt(0), false, false, $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 328: /* argument: ampersand variable  */
    /* "grammar.y":816  */
                                                            { $yyval = new Node\Arg($yystack->valueAt(0), true, false, $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes); };
  break;


  case 329: /* argument: T_ELLIPSIS expr  */
    /* "grammar.y":817  */
                                                            { $yyval = new Node\Arg($yystack->valueAt(0), false, true, $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes); };
  break;


  case 330: /* argument: identifier_maybe_reserved ':' expr  */
    /* "grammar.y":819  */
          { $yyval = new Node\Arg($yystack->valueAt(0), false, false, $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes, $yystack->valueAt(2)); };
  break;


  case 331: /* global_var_list: non_empty_global_var_list no_comma  */
    /* "grammar.y":823  */
                                                            { $yyval = $yystack->valueAt(1); };
  break;


  case 332: /* non_empty_global_var_list: non_empty_global_var_list ',' global_var  */
    /* "grammar.y":827  */
                                                            { $yystack->valueAt(2)[] = $yystack->valueAt(0); $yyval = $yystack->valueAt(2); };
  break;


  case 333: /* non_empty_global_var_list: global_var  */
    /* "grammar.y":828  */
                                                            { $yyval = array($yystack->valueAt(0)); };
  break;


  case 334: /* global_var: simple_variable  */
    /* "grammar.y":832  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 335: /* static_var_list: non_empty_static_var_list no_comma  */
    /* "grammar.y":836  */
                                                            { $yyval = $yystack->valueAt(1); };
  break;


  case 336: /* non_empty_static_var_list: non_empty_static_var_list ',' static_var  */
    /* "grammar.y":840  */
                                                            { $yystack->valueAt(2)[] = $yystack->valueAt(0); $yyval = $yystack->valueAt(2); };
  break;


  case 337: /* non_empty_static_var_list: static_var  */
    /* "grammar.y":841  */
                                                            { $yyval = array($yystack->valueAt(0)); };
  break;


  case 338: /* static_var: plain_variable  */
    /* "grammar.y":845  */
                                                            { $yyval = new Stmt\StaticVar($yystack->valueAt(0), null, $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 339: /* static_var: plain_variable '=' expr  */
    /* "grammar.y":846  */
                                                            { $yyval = new Stmt\StaticVar($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 340: /* class_statement_list_ex: class_statement_list_ex class_statement  */
    /* "grammar.y":850  */
                                                            { if ($yystack->valueAt(0) !== null) { $yystack->valueAt(1)[] = $yystack->valueAt(0); $yyval = $yystack->valueAt(1); } };
  break;


  case 341: /* class_statement_list_ex: %empty  */
    /* "grammar.y":851  */
                                                            { $yyval = array(); };
  break;


  case 342: /* class_statement_list: class_statement_list_ex  */
    /* "grammar.y":856  */
          { $startAttributes = $this->lookaheadStartAttributes; if (isset($startAttributes['comments'])) { $nop = new Stmt\Nop($this->createCommentNopAttributes($startAttributes['comments'])); } else { $nop = null; };
            if ($nop !== null) { $yystack->valueAt(0)[] = $nop; } $yyval = $yystack->valueAt(0); };
  break;


  case 343: /* class_statement: optional_attributes variable_modifiers optional_type_without_static property_declaration_list semi  */
    /* "grammar.y":862  */
          { $yyval = new Stmt\Property($yystack->valueAt(3), $yystack->valueAt(1), $this->startAttributeStack[$yystack->valueAt(4)] + $this->endAttributes, $yystack->valueAt(2), $yystack->valueAt(4));
            $this->checkProperty($yyval, $yystack->valueAt(3)); };
  break;


  case 344: /* class_statement: optional_attributes method_modifiers T_CONST class_const_list semi  */
    /* "grammar.y":865  */
          { $yyval = new Stmt\ClassConst($yystack->valueAt(1), $yystack->valueAt(3), $this->startAttributeStack[$yystack->valueAt(4)] + $this->endAttributes, $yystack->valueAt(4));
            $this->checkClassConst($yyval, $yystack->valueAt(3)); };
  break;


  case 345: /* class_statement: optional_attributes method_modifiers T_FUNCTION optional_ref identifier_maybe_reserved '(' parameter_list ')' optional_return_type method_body  */
    /* "grammar.y":869  */
          { $yyval = new Stmt\ClassMethod($yystack->valueAt(5), ['type' => $yystack->valueAt(8), 'byRef' => $yystack->valueAt(6), 'params' => $yystack->valueAt(3), 'returnType' => $yystack->valueAt(1), 'stmts' => $yystack->valueAt(0), 'attrGroups' => $yystack->valueAt(9)], $this->startAttributeStack[$yystack->valueAt(9)] + $this->endAttributes);
            $this->checkClassMethod($yyval, $yystack->valueAt(8)); };
  break;


  case 346: /* class_statement: T_USE class_name_list trait_adaptations  */
    /* "grammar.y":871  */
                                                            { $yyval = new Stmt\TraitUse($yystack->valueAt(1), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 347: /* class_statement: optional_attributes T_CASE identifier_maybe_reserved enum_case_expr semi  */
    /* "grammar.y":873  */
         { $yyval = new Stmt\EnumCase($yystack->valueAt(2), $yystack->valueAt(1), $yystack->valueAt(4), $this->startAttributeStack[$yystack->valueAt(4)] + $this->endAttributes); };
  break;


  case 348: /* class_statement: error  */
    /* "grammar.y":874  */
                                                            { $yyval = null; /* will be skipped */ };
  break;


  case 349: /* trait_adaptations: ';'  */
    /* "grammar.y":878  */
                                                            { $yyval = array(); };
  break;


  case 350: /* trait_adaptations: '{' trait_adaptation_list '}'  */
    /* "grammar.y":879  */
                                                            { $yyval = $yystack->valueAt(1); };
  break;


  case 351: /* trait_adaptation_list: %empty  */
    /* "grammar.y":883  */
                                                            { $yyval = array(); };
  break;


  case 352: /* trait_adaptation_list: trait_adaptation_list trait_adaptation  */
    /* "grammar.y":884  */
                                                            { $yystack->valueAt(1)[] = $yystack->valueAt(0); $yyval = $yystack->valueAt(1); };
  break;


  case 353: /* trait_adaptation: trait_method_reference_fully_qualified T_INSTEADOF class_name_list ';'  */
    /* "grammar.y":889  */
          { $yyval = new Stmt\TraitUseAdaptation\Precedence($yystack->valueAt(3)[0], $yystack->valueAt(3)[1], $yystack->valueAt(1), $this->startAttributeStack[$yystack->valueAt(3)] + $this->endAttributes); };
  break;


  case 354: /* trait_adaptation: trait_method_reference T_AS member_modifier identifier_maybe_reserved ';'  */
    /* "grammar.y":891  */
          { $yyval = new Stmt\TraitUseAdaptation\Alias($yystack->valueAt(4)[0], $yystack->valueAt(4)[1], $yystack->valueAt(2), $yystack->valueAt(1), $this->startAttributeStack[$yystack->valueAt(4)] + $this->endAttributes); };
  break;


  case 355: /* trait_adaptation: trait_method_reference T_AS member_modifier ';'  */
    /* "grammar.y":893  */
          { $yyval = new Stmt\TraitUseAdaptation\Alias($yystack->valueAt(3)[0], $yystack->valueAt(3)[1], $yystack->valueAt(1), null, $this->startAttributeStack[$yystack->valueAt(3)] + $this->endAttributes); };
  break;


  case 356: /* trait_adaptation: trait_method_reference T_AS identifier_not_reserved ';'  */
    /* "grammar.y":895  */
          { $yyval = new Stmt\TraitUseAdaptation\Alias($yystack->valueAt(3)[0], $yystack->valueAt(3)[1], null, $yystack->valueAt(1), $this->startAttributeStack[$yystack->valueAt(3)] + $this->endAttributes); };
  break;


  case 357: /* trait_adaptation: trait_method_reference T_AS reserved_non_modifiers_identifier ';'  */
    /* "grammar.y":897  */
          { $yyval = new Stmt\TraitUseAdaptation\Alias($yystack->valueAt(3)[0], $yystack->valueAt(3)[1], null, $yystack->valueAt(1), $this->startAttributeStack[$yystack->valueAt(3)] + $this->endAttributes); };
  break;


  case 358: /* trait_method_reference_fully_qualified: name T_PAAMAYIM_NEKUDOTAYIM identifier_maybe_reserved  */
    /* "grammar.y":901  */
                                                            { $yyval = array($yystack->valueAt(2), $yystack->valueAt(0)); };
  break;


  case 359: /* trait_method_reference: trait_method_reference_fully_qualified  */
    /* "grammar.y":904  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 360: /* trait_method_reference: identifier_maybe_reserved  */
    /* "grammar.y":905  */
                                                            { $yyval = array(null, $yystack->valueAt(0)); };
  break;


  case 361: /* method_body: ';'  */
    /* "grammar.y":909  */
                                                            { $yyval = null; };
  break;


  case 362: /* method_body: block_or_error  */
    /* "grammar.y":910  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 363: /* variable_modifiers: non_empty_member_modifiers  */
    /* "grammar.y":914  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 364: /* variable_modifiers: T_VAR  */
    /* "grammar.y":915  */
                                                            { $yyval = 0; };
  break;


  case 365: /* method_modifiers: %empty  */
    /* "grammar.y":919  */
                                                            { $yyval = 0; };
  break;


  case 366: /* method_modifiers: non_empty_member_modifiers  */
    /* "grammar.y":920  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 367: /* non_empty_member_modifiers: member_modifier  */
    /* "grammar.y":924  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 368: /* non_empty_member_modifiers: non_empty_member_modifiers member_modifier  */
    /* "grammar.y":925  */
                                                            { $this->checkModifier($yystack->valueAt(1), $yystack->valueAt(0), $yystack->valueAt(0)); $yyval = $yystack->valueAt(1) | $yystack->valueAt(0); };
  break;


  case 369: /* member_modifier: T_PUBLIC  */
    /* "grammar.y":929  */
                                                            { $yyval = Stmt\Class_::MODIFIER_PUBLIC; };
  break;


  case 370: /* member_modifier: T_PROTECTED  */
    /* "grammar.y":930  */
                                                            { $yyval = Stmt\Class_::MODIFIER_PROTECTED; };
  break;


  case 371: /* member_modifier: T_PRIVATE  */
    /* "grammar.y":931  */
                                                            { $yyval = Stmt\Class_::MODIFIER_PRIVATE; };
  break;


  case 372: /* member_modifier: T_STATIC  */
    /* "grammar.y":932  */
                                                            { $yyval = Stmt\Class_::MODIFIER_STATIC; };
  break;


  case 373: /* member_modifier: T_ABSTRACT  */
    /* "grammar.y":933  */
                                                            { $yyval = Stmt\Class_::MODIFIER_ABSTRACT; };
  break;


  case 374: /* member_modifier: T_FINAL  */
    /* "grammar.y":934  */
                                                            { $yyval = Stmt\Class_::MODIFIER_FINAL; };
  break;


  case 375: /* member_modifier: T_READONLY  */
    /* "grammar.y":935  */
                                                            { $yyval = Stmt\Class_::MODIFIER_READONLY; };
  break;


  case 376: /* property_declaration_list: non_empty_property_declaration_list no_comma  */
    /* "grammar.y":939  */
                                                            { $yyval = $yystack->valueAt(1); };
  break;


  case 377: /* non_empty_property_declaration_list: property_declaration  */
    /* "grammar.y":943  */
                                                            { $yyval = array($yystack->valueAt(0)); };
  break;


  case 378: /* non_empty_property_declaration_list: non_empty_property_declaration_list ',' property_declaration  */
    /* "grammar.y":945  */
          { $yystack->valueAt(2)[] = $yystack->valueAt(0); $yyval = $yystack->valueAt(2); };
  break;


  case 379: /* property_decl_name: T_VARIABLE  */
    /* "grammar.y":949  */
                                                            { $yyval = new Node\VarLikeIdentifier(substr($yystack->valueAt(0), 1), $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 380: /* property_declaration: property_decl_name  */
    /* "grammar.y":953  */
                                                            { $yyval = new Stmt\PropertyProperty($yystack->valueAt(0), null, $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 381: /* property_declaration: property_decl_name '=' expr  */
    /* "grammar.y":954  */
                                                            { $yyval = new Stmt\PropertyProperty($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 382: /* expr_list_forbid_comma: non_empty_expr_list no_comma  */
    /* "grammar.y":958  */
                                                            { $yyval = $yystack->valueAt(1); };
  break;


  case 383: /* expr_list_allow_comma: non_empty_expr_list optional_comma  */
    /* "grammar.y":962  */
                                                            { $yyval = $yystack->valueAt(1); };
  break;


  case 384: /* non_empty_expr_list: non_empty_expr_list ',' expr  */
    /* "grammar.y":966  */
                                                            { $yystack->valueAt(2)[] = $yystack->valueAt(0); $yyval = $yystack->valueAt(2); };
  break;


  case 385: /* non_empty_expr_list: expr  */
    /* "grammar.y":967  */
                                                            { $yyval = array($yystack->valueAt(0)); };
  break;


  case 386: /* for_expr: %empty  */
    /* "grammar.y":971  */
                                                            { $yyval = array(); };
  break;


  case 387: /* for_expr: expr_list_forbid_comma  */
    /* "grammar.y":972  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 388: /* expr: variable  */
    /* "grammar.y":976  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 389: /* expr: list_expr '=' expr  */
    /* "grammar.y":977  */
                                                            { $yyval = new Expr\Assign($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 390: /* expr: array_short_syntax '=' expr  */
    /* "grammar.y":978  */
                                                            { $yyval = new Expr\Assign($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 391: /* expr: variable '=' expr  */
    /* "grammar.y":979  */
                                                            { $yyval = new Expr\Assign($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 392: /* expr: variable '=' ampersand variable  */
    /* "grammar.y":980  */
                                                            { $yyval = new Expr\AssignRef($yystack->valueAt(3), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(3)] + $this->endAttributes); };
  break;


  case 393: /* expr: new_expr  */
    /* "grammar.y":981  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 394: /* expr: match  */
    /* "grammar.y":982  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 395: /* expr: T_CLONE expr  */
    /* "grammar.y":983  */
                                                            { $yyval = new Expr\Clone_($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes); };
  break;


  case 396: /* expr: variable T_PLUS_EQUAL expr  */
    /* "grammar.y":984  */
                                                            { $yyval = new Expr\AssignOp\Plus($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 397: /* expr: variable T_MINUS_EQUAL expr  */
    /* "grammar.y":985  */
                                                            { $yyval = new Expr\AssignOp\Minus($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 398: /* expr: variable T_MUL_EQUAL expr  */
    /* "grammar.y":986  */
                                                            { $yyval = new Expr\AssignOp\Mul($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 399: /* expr: variable T_DIV_EQUAL expr  */
    /* "grammar.y":987  */
                                                            { $yyval = new Expr\AssignOp\Div($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 400: /* expr: variable T_CONCAT_EQUAL expr  */
    /* "grammar.y":988  */
                                                            { $yyval = new Expr\AssignOp\Concat($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 401: /* expr: variable T_MOD_EQUAL expr  */
    /* "grammar.y":989  */
                                                            { $yyval = new Expr\AssignOp\Mod($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 402: /* expr: variable T_AND_EQUAL expr  */
    /* "grammar.y":990  */
                                                            { $yyval = new Expr\AssignOp\BitwiseAnd($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 403: /* expr: variable T_OR_EQUAL expr  */
    /* "grammar.y":991  */
                                                            { $yyval = new Expr\AssignOp\BitwiseOr($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 404: /* expr: variable T_XOR_EQUAL expr  */
    /* "grammar.y":992  */
                                                            { $yyval = new Expr\AssignOp\BitwiseXor($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 405: /* expr: variable T_SL_EQUAL expr  */
    /* "grammar.y":993  */
                                                            { $yyval = new Expr\AssignOp\ShiftLeft($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 406: /* expr: variable T_SR_EQUAL expr  */
    /* "grammar.y":994  */
                                                            { $yyval = new Expr\AssignOp\ShiftRight($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 407: /* expr: variable T_POW_EQUAL expr  */
    /* "grammar.y":995  */
                                                            { $yyval = new Expr\AssignOp\Pow($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 408: /* expr: variable T_COALESCE_EQUAL expr  */
    /* "grammar.y":996  */
                                                            { $yyval = new Expr\AssignOp\Coalesce($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 409: /* expr: variable T_INC  */
    /* "grammar.y":997  */
                                                            { $yyval = new Expr\PostInc($yystack->valueAt(1), $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes); };
  break;


  case 410: /* expr: T_INC variable  */
    /* "grammar.y":998  */
                                                            { $yyval = new Expr\PreInc($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes); };
  break;


  case 411: /* expr: variable T_DEC  */
    /* "grammar.y":999  */
                                                            { $yyval = new Expr\PostDec($yystack->valueAt(1), $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes); };
  break;


  case 412: /* expr: T_DEC variable  */
    /* "grammar.y":1000  */
                                                            { $yyval = new Expr\PreDec($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes); };
  break;


  case 413: /* expr: expr T_BOOLEAN_OR expr  */
    /* "grammar.y":1001  */
                                                            { $yyval = new Expr\BinaryOp\BooleanOr($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 414: /* expr: expr T_BOOLEAN_AND expr  */
    /* "grammar.y":1002  */
                                                            { $yyval = new Expr\BinaryOp\BooleanAnd($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 415: /* expr: expr T_LOGICAL_OR expr  */
    /* "grammar.y":1003  */
                                                            { $yyval = new Expr\BinaryOp\LogicalOr($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 416: /* expr: expr T_LOGICAL_AND expr  */
    /* "grammar.y":1004  */
                                                            { $yyval = new Expr\BinaryOp\LogicalAnd($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 417: /* expr: expr T_LOGICAL_XOR expr  */
    /* "grammar.y":1005  */
                                                            { $yyval = new Expr\BinaryOp\LogicalXor($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 418: /* expr: expr '|' expr  */
    /* "grammar.y":1006  */
                                                            { $yyval = new Expr\BinaryOp\BitwiseOr($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 419: /* expr: expr T_AMPERSAND_NOT_FOLLOWED_BY_VAR_OR_VARARG expr  */
    /* "grammar.y":1007  */
                                                            { $yyval = new Expr\BinaryOp\BitwiseAnd($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 420: /* expr: expr T_AMPERSAND_FOLLOWED_BY_VAR_OR_VARARG expr  */
    /* "grammar.y":1008  */
                                                            { $yyval = new Expr\BinaryOp\BitwiseAnd($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 421: /* expr: expr '^' expr  */
    /* "grammar.y":1009  */
                                                            { $yyval = new Expr\BinaryOp\BitwiseXor($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 422: /* expr: expr '.' expr  */
    /* "grammar.y":1010  */
                                                            { $yyval = new Expr\BinaryOp\Concat($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 423: /* expr: expr '+' expr  */
    /* "grammar.y":1011  */
                                                            { $yyval = new Expr\BinaryOp\Plus($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 424: /* expr: expr '-' expr  */
    /* "grammar.y":1012  */
                                                            { $yyval = new Expr\BinaryOp\Minus($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 425: /* expr: expr '*' expr  */
    /* "grammar.y":1013  */
                                                            { $yyval = new Expr\BinaryOp\Mul($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 426: /* expr: expr '/' expr  */
    /* "grammar.y":1014  */
                                                            { $yyval = new Expr\BinaryOp\Div($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 427: /* expr: expr '%' expr  */
    /* "grammar.y":1015  */
                                                            { $yyval = new Expr\BinaryOp\Mod($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 428: /* expr: expr T_SL expr  */
    /* "grammar.y":1016  */
                                                            { $yyval = new Expr\BinaryOp\ShiftLeft($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 429: /* expr: expr T_SR expr  */
    /* "grammar.y":1017  */
                                                            { $yyval = new Expr\BinaryOp\ShiftRight($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 430: /* expr: expr T_POW expr  */
    /* "grammar.y":1018  */
                                                            { $yyval = new Expr\BinaryOp\Pow($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 431: /* expr: '+' expr  */
    /* "grammar.y":1019  */
                                                            { $yyval = new Expr\UnaryPlus($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes); };
  break;


  case 432: /* expr: '-' expr  */
    /* "grammar.y":1020  */
                                                            { $yyval = new Expr\UnaryMinus($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes); };
  break;


  case 433: /* expr: '!' expr  */
    /* "grammar.y":1021  */
                                                            { $yyval = new Expr\BooleanNot($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes); };
  break;


  case 434: /* expr: '~' expr  */
    /* "grammar.y":1022  */
                                                            { $yyval = new Expr\BitwiseNot($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes); };
  break;


  case 435: /* expr: expr T_IS_IDENTICAL expr  */
    /* "grammar.y":1023  */
                                                            { $yyval = new Expr\BinaryOp\Identical($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 436: /* expr: expr T_IS_NOT_IDENTICAL expr  */
    /* "grammar.y":1024  */
                                                            { $yyval = new Expr\BinaryOp\NotIdentical($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 437: /* expr: expr T_IS_EQUAL expr  */
    /* "grammar.y":1025  */
                                                            { $yyval = new Expr\BinaryOp\Equal($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 438: /* expr: expr T_IS_NOT_EQUAL expr  */
    /* "grammar.y":1026  */
                                                            { $yyval = new Expr\BinaryOp\NotEqual($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 439: /* expr: expr T_SPACESHIP expr  */
    /* "grammar.y":1027  */
                                                            { $yyval = new Expr\BinaryOp\Spaceship($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 440: /* expr: expr '<' expr  */
    /* "grammar.y":1028  */
                                                            { $yyval = new Expr\BinaryOp\Smaller($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 441: /* expr: expr T_IS_SMALLER_OR_EQUAL expr  */
    /* "grammar.y":1029  */
                                                            { $yyval = new Expr\BinaryOp\SmallerOrEqual($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 442: /* expr: expr '>' expr  */
    /* "grammar.y":1030  */
                                                            { $yyval = new Expr\BinaryOp\Greater($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 443: /* expr: expr T_IS_GREATER_OR_EQUAL expr  */
    /* "grammar.y":1031  */
                                                            { $yyval = new Expr\BinaryOp\GreaterOrEqual($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 444: /* expr: expr T_INSTANCEOF class_name_reference  */
    /* "grammar.y":1032  */
                                                            { $yyval = new Expr\Instanceof_($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 445: /* expr: '(' expr ')'  */
    /* "grammar.y":1033  */
                                                            { $yyval = $yystack->valueAt(1); };
  break;


  case 446: /* expr: expr '?' expr ':' expr  */
    /* "grammar.y":1034  */
                                                            { $yyval = new Expr\Ternary($yystack->valueAt(4), $yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(4)] + $this->endAttributes); };
  break;


  case 447: /* expr: expr '?' ':' expr  */
    /* "grammar.y":1035  */
                                                            { $yyval = new Expr\Ternary($yystack->valueAt(3), null, $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(3)] + $this->endAttributes); };
  break;


  case 448: /* expr: expr T_COALESCE expr  */
    /* "grammar.y":1036  */
                                                            { $yyval = new Expr\BinaryOp\Coalesce($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 449: /* expr: T_ISSET '(' expr_list_allow_comma ')'  */
    /* "grammar.y":1037  */
                                                            { $yyval = new Expr\Isset_($yystack->valueAt(1), $this->startAttributeStack[$yystack->valueAt(3)] + $this->endAttributes); };
  break;


  case 450: /* expr: T_EMPTY '(' expr ')'  */
    /* "grammar.y":1038  */
                                                            { $yyval = new Expr\Empty_($yystack->valueAt(1), $this->startAttributeStack[$yystack->valueAt(3)] + $this->endAttributes); };
  break;


  case 451: /* expr: T_INCLUDE expr  */
    /* "grammar.y":1039  */
                                                            { $yyval = new Expr\Include_($yystack->valueAt(0), Expr\Include_::TYPE_INCLUDE, $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes); };
  break;


  case 452: /* expr: T_INCLUDE_ONCE expr  */
    /* "grammar.y":1040  */
                                                            { $yyval = new Expr\Include_($yystack->valueAt(0), Expr\Include_::TYPE_INCLUDE_ONCE, $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes); };
  break;


  case 453: /* expr: T_EVAL '(' expr ')'  */
    /* "grammar.y":1041  */
                                                            { $yyval = new Expr\Eval_($yystack->valueAt(1), $this->startAttributeStack[$yystack->valueAt(3)] + $this->endAttributes); };
  break;


  case 454: /* expr: T_REQUIRE expr  */
    /* "grammar.y":1042  */
                                                            { $yyval = new Expr\Include_($yystack->valueAt(0), Expr\Include_::TYPE_REQUIRE, $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes); };
  break;


  case 455: /* expr: T_REQUIRE_ONCE expr  */
    /* "grammar.y":1043  */
                                                            { $yyval = new Expr\Include_($yystack->valueAt(0), Expr\Include_::TYPE_REQUIRE_ONCE, $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes); };
  break;


  case 456: /* expr: T_INT_CAST expr  */
    /* "grammar.y":1044  */
                                                            { $yyval = new Expr\Cast\Int_($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes); };
  break;


  case 457: /* expr: T_DOUBLE_CAST expr  */
    /* "grammar.y":1046  */
          { $attrs = $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes;
            $attrs['kind'] = $this->getFloatCastKind($yystack->valueAt(1));
            $yyval = new Expr\Cast\Double($yystack->valueAt(0), $attrs); };
  break;


  case 458: /* expr: T_STRING_CAST expr  */
    /* "grammar.y":1049  */
                                                            { $yyval = new Expr\Cast\String_($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes); };
  break;


  case 459: /* expr: T_ARRAY_CAST expr  */
    /* "grammar.y":1050  */
                                                            { $yyval = new Expr\Cast\Array_($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes); };
  break;


  case 460: /* expr: T_OBJECT_CAST expr  */
    /* "grammar.y":1051  */
                                                            { $yyval = new Expr\Cast\Object_($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes); };
  break;


  case 461: /* expr: T_BOOL_CAST expr  */
    /* "grammar.y":1052  */
                                                            { $yyval = new Expr\Cast\Bool_($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes); };
  break;


  case 462: /* expr: T_UNSET_CAST expr  */
    /* "grammar.y":1053  */
                                                            { $yyval = new Expr\Cast\Unset_($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes); };
  break;


  case 463: /* expr: T_EXIT exit_expr  */
    /* "grammar.y":1055  */
          { $attrs = $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes;
            $attrs['kind'] = strtolower($yystack->valueAt(1)) === 'exit' ? Expr\Exit_::KIND_EXIT : Expr\Exit_::KIND_DIE;
            $yyval = new Expr\Exit_($yystack->valueAt(0), $attrs); };
  break;


  case 464: /* expr: '@' expr  */
    /* "grammar.y":1058  */
                                                            { $yyval = new Expr\ErrorSuppress($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes); };
  break;


  case 465: /* expr: scalar  */
    /* "grammar.y":1059  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 466: /* expr: '`' backticks_expr '`'  */
    /* "grammar.y":1060  */
                                                            { $yyval = new Expr\ShellExec($yystack->valueAt(1), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 467: /* expr: T_PRINT expr  */
    /* "grammar.y":1061  */
                                                            { $yyval = new Expr\Print_($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes); };
  break;


  case 468: /* expr: T_YIELD  */
    /* "grammar.y":1062  */
                                                            { $yyval = new Expr\Yield_(null, null, $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 469: /* expr: T_YIELD expr  */
    /* "grammar.y":1063  */
                                                            { $yyval = new Expr\Yield_($yystack->valueAt(0), null, $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes); };
  break;


  case 470: /* expr: T_YIELD expr T_DOUBLE_ARROW expr  */
    /* "grammar.y":1064  */
                                                            { $yyval = new Expr\Yield_($yystack->valueAt(0), $yystack->valueAt(2), $this->startAttributeStack[$yystack->valueAt(3)] + $this->endAttributes); };
  break;


  case 471: /* expr: T_YIELD_FROM expr  */
    /* "grammar.y":1065  */
                                                            { $yyval = new Expr\YieldFrom($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes); };
  break;


  case 472: /* expr: T_THROW expr  */
    /* "grammar.y":1066  */
                                                            { $yyval = new Expr\Throw_($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes); };
  break;


  case 473: /* expr: T_FN optional_ref '(' parameter_list ')' optional_return_type T_DOUBLE_ARROW expr  */
    /* "grammar.y":1069  */
          { $yyval = new Expr\ArrowFunction(['static' => false, 'byRef' => $yystack->valueAt(6), 'params' => $yystack->valueAt(4), 'returnType' => $yystack->valueAt(2), 'expr' => $yystack->valueAt(0), 'attrGroups' => []], $this->startAttributeStack[$yystack->valueAt(7)] + $this->endAttributes); };
  break;


  case 474: /* expr: T_STATIC T_FN optional_ref '(' parameter_list ')' optional_return_type T_DOUBLE_ARROW expr  */
    /* "grammar.y":1071  */
          { $yyval = new Expr\ArrowFunction(['static' => true, 'byRef' => $yystack->valueAt(6), 'params' => $yystack->valueAt(4), 'returnType' => $yystack->valueAt(2), 'expr' => $yystack->valueAt(0), 'attrGroups' => []], $this->startAttributeStack[$yystack->valueAt(8)] + $this->endAttributes); };
  break;


  case 475: /* expr: T_FUNCTION optional_ref '(' parameter_list ')' lexical_vars optional_return_type block_or_error  */
    /* "grammar.y":1073  */
          { $yyval = new Expr\Closure(['static' => false, 'byRef' => $yystack->valueAt(6), 'params' => $yystack->valueAt(4), 'uses' => $yystack->valueAt(2), 'returnType' => $yystack->valueAt(1), 'stmts' => $yystack->valueAt(0), 'attrGroups' => []], $this->startAttributeStack[$yystack->valueAt(7)] + $this->endAttributes); };
  break;


  case 476: /* expr: T_STATIC T_FUNCTION optional_ref '(' parameter_list ')' lexical_vars optional_return_type block_or_error  */
    /* "grammar.y":1075  */
          { $yyval = new Expr\Closure(['static' => true, 'byRef' => $yystack->valueAt(6), 'params' => $yystack->valueAt(4), 'uses' => $yystack->valueAt(2), 'returnType' => $yystack->valueAt(1), 'stmts' => $yystack->valueAt(0), 'attrGroups' => []], $this->startAttributeStack[$yystack->valueAt(8)] + $this->endAttributes); };
  break;


  case 477: /* expr: attributes T_FN optional_ref '(' parameter_list ')' optional_return_type T_DOUBLE_ARROW expr  */
    /* "grammar.y":1078  */
          { $yyval = new Expr\ArrowFunction(['static' => false, 'byRef' => $yystack->valueAt(6), 'params' => $yystack->valueAt(4), 'returnType' => $yystack->valueAt(2), 'expr' => $yystack->valueAt(0), 'attrGroups' => $yystack->valueAt(8)], $this->startAttributeStack[$yystack->valueAt(8)] + $this->endAttributes); };
  break;


  case 478: /* expr: attributes T_STATIC T_FN optional_ref '(' parameter_list ')' optional_return_type T_DOUBLE_ARROW expr  */
    /* "grammar.y":1080  */
          { $yyval = new Expr\ArrowFunction(['static' => true, 'byRef' => $yystack->valueAt(6), 'params' => $yystack->valueAt(4), 'returnType' => $yystack->valueAt(2), 'expr' => $yystack->valueAt(0), 'attrGroups' => $yystack->valueAt(9)], $this->startAttributeStack[$yystack->valueAt(9)] + $this->endAttributes); };
  break;


  case 479: /* expr: attributes T_FUNCTION optional_ref '(' parameter_list ')' lexical_vars optional_return_type block_or_error  */
    /* "grammar.y":1082  */
          { $yyval = new Expr\Closure(['static' => false, 'byRef' => $yystack->valueAt(6), 'params' => $yystack->valueAt(4), 'uses' => $yystack->valueAt(2), 'returnType' => $yystack->valueAt(1), 'stmts' => $yystack->valueAt(0), 'attrGroups' => $yystack->valueAt(8)], $this->startAttributeStack[$yystack->valueAt(8)] + $this->endAttributes); };
  break;


  case 480: /* expr: attributes T_STATIC T_FUNCTION optional_ref '(' parameter_list ')' lexical_vars optional_return_type block_or_error  */
    /* "grammar.y":1084  */
          { $yyval = new Expr\Closure(['static' => true, 'byRef' => $yystack->valueAt(6), 'params' => $yystack->valueAt(4), 'uses' => $yystack->valueAt(2), 'returnType' => $yystack->valueAt(1), 'stmts' => $yystack->valueAt(0), 'attrGroups' => $yystack->valueAt(9)], $this->startAttributeStack[$yystack->valueAt(9)] + $this->endAttributes); };
  break;


  case 481: /* anonymous_class: optional_attributes T_CLASS ctor_arguments extends_from implements_list '{' class_statement_list '}'  */
    /* "grammar.y":1089  */
          { $yyval = array(new Stmt\Class_(null, ['type' => 0, 'extends' => $yystack->valueAt(4), 'implements' => $yystack->valueAt(3), 'stmts' => $yystack->valueAt(1), 'attrGroups' => $yystack->valueAt(7)], $this->startAttributeStack[$yystack->valueAt(7)] + $this->endAttributes), $yystack->valueAt(5));
            $this->checkClass($yyval[0], -1); };
  break;


  case 482: /* new_expr: T_NEW class_name_reference ctor_arguments  */
    /* "grammar.y":1094  */
                                                            { $yyval = new Expr\New_($yystack->valueAt(1), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 483: /* new_expr: T_NEW anonymous_class  */
    /* "grammar.y":1096  */
          { list($class, $ctorArgs) = $yystack->valueAt(0); $yyval = new Expr\New_($class, $ctorArgs, $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes); };
  break;


  case 484: /* lexical_vars: %empty  */
    /* "grammar.y":1100  */
                                                            { $yyval = array(); };
  break;


  case 485: /* lexical_vars: T_USE '(' lexical_var_list ')'  */
    /* "grammar.y":1101  */
                                                            { $yyval = $yystack->valueAt(1); };
  break;


  case 486: /* lexical_var_list: non_empty_lexical_var_list optional_comma  */
    /* "grammar.y":1105  */
                                                            { $yyval = $yystack->valueAt(1); };
  break;


  case 487: /* non_empty_lexical_var_list: lexical_var  */
    /* "grammar.y":1109  */
                                                            { $yyval = array($yystack->valueAt(0)); };
  break;


  case 488: /* non_empty_lexical_var_list: non_empty_lexical_var_list ',' lexical_var  */
    /* "grammar.y":1110  */
                                                            { $yystack->valueAt(2)[] = $yystack->valueAt(0); $yyval = $yystack->valueAt(2); };
  break;


  case 489: /* lexical_var: optional_ref plain_variable  */
    /* "grammar.y":1114  */
                                                            { $yyval = new Expr\ClosureUse($yystack->valueAt(0), $yystack->valueAt(1), $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes); };
  break;


  case 490: /* name_readonly: T_READONLY  */
    /* "grammar.y":1118  */
                                                            { $yyval = new Name($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 491: /* function_call: name argument_list  */
    /* "grammar.y":1122  */
                                                            { $yyval = new Expr\FuncCall($yystack->valueAt(1), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes); };
  break;


  case 492: /* function_call: name_readonly argument_list  */
    /* "grammar.y":1123  */
                                                            { $yyval = new Expr\FuncCall($yystack->valueAt(1), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes); };
  break;


  case 493: /* function_call: callable_expr argument_list  */
    /* "grammar.y":1124  */
                                                            { $yyval = new Expr\FuncCall($yystack->valueAt(1), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes); };
  break;


  case 494: /* function_call: class_name_or_var T_PAAMAYIM_NEKUDOTAYIM member_name argument_list  */
    /* "grammar.y":1126  */
          { $yyval = new Expr\StaticCall($yystack->valueAt(3), $yystack->valueAt(1), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(3)] + $this->endAttributes); };
  break;


  case 495: /* class_name: T_STATIC  */
    /* "grammar.y":1130  */
                                                            { $yyval = new Name($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 496: /* class_name: name  */
    /* "grammar.y":1131  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 497: /* name: T_STRING  */
    /* "grammar.y":1135  */
                                                            { $yyval = new Name($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 498: /* name: T_NAME_QUALIFIED  */
    /* "grammar.y":1136  */
                                                            { $yyval = new Name($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 499: /* name: T_NAME_FULLY_QUALIFIED  */
    /* "grammar.y":1137  */
                                                            { $yyval = new Name\FullyQualified(substr($yystack->valueAt(0), 1), $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 500: /* name: T_NAME_RELATIVE  */
    /* "grammar.y":1138  */
                                                            { $yyval = new Name\Relative(substr($yystack->valueAt(0), 10), $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 501: /* class_name_reference: class_name  */
    /* "grammar.y":1142  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 502: /* class_name_reference: new_variable  */
    /* "grammar.y":1143  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 503: /* class_name_reference: '(' expr ')'  */
    /* "grammar.y":1144  */
                                                            { $yyval = $yystack->valueAt(1); };
  break;


  case 504: /* class_name_reference: error  */
    /* "grammar.y":1145  */
                                                            { $yyval = new Expr\Error($this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); $this->errorState = 2; };
  break;


  case 505: /* class_name_or_var: class_name  */
    /* "grammar.y":1149  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 506: /* class_name_or_var: fully_dereferencable  */
    /* "grammar.y":1150  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 507: /* exit_expr: %empty  */
    /* "grammar.y":1154  */
                                                            { $yyval = null; };
  break;


  case 508: /* exit_expr: '(' optional_expr ')'  */
    /* "grammar.y":1155  */
                                                            { $yyval = $yystack->valueAt(1); };
  break;


  case 509: /* backticks_expr: %empty  */
    /* "grammar.y":1159  */
                                                            { $yyval = array(); };
  break;


  case 510: /* backticks_expr: T_ENCAPSED_AND_WHITESPACE  */
    /* "grammar.y":1161  */
          { $yyval = array(new Scalar\EncapsedStringPart(Scalar\String_::parseEscapeSequences($yystack->valueAt(0), '`'), $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes)); };
  break;


  case 511: /* backticks_expr: encaps_list  */
    /* "grammar.y":1162  */
                                                            { foreach ($yystack->valueAt(0) as $s) { if ($s instanceof Node\Scalar\EncapsedStringPart) { $s->value = Node\Scalar\String_::parseEscapeSequences($s->value, '`', true); } }; $yyval = $yystack->valueAt(0); };
  break;


  case 512: /* ctor_arguments: %empty  */
    /* "grammar.y":1166  */
                                                            { $yyval = array(); };
  break;


  case 513: /* ctor_arguments: argument_list  */
    /* "grammar.y":1167  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 514: /* constant: name  */
    /* "grammar.y":1171  */
                                                            { $yyval = new Expr\ConstFetch($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 515: /* constant: T_LINE  */
    /* "grammar.y":1172  */
                                                            { $yyval = new Scalar\MagicConst\Line($this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 516: /* constant: T_FILE  */
    /* "grammar.y":1173  */
                                                            { $yyval = new Scalar\MagicConst\File($this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 517: /* constant: T_DIR  */
    /* "grammar.y":1174  */
                                                            { $yyval = new Scalar\MagicConst\Dir($this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 518: /* constant: T_CLASS_C  */
    /* "grammar.y":1175  */
                                                            { $yyval = new Scalar\MagicConst\Class_($this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 519: /* constant: T_TRAIT_C  */
    /* "grammar.y":1176  */
                                                            { $yyval = new Scalar\MagicConst\Trait_($this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 520: /* constant: T_METHOD_C  */
    /* "grammar.y":1177  */
                                                            { $yyval = new Scalar\MagicConst\Method($this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 521: /* constant: T_FUNC_C  */
    /* "grammar.y":1178  */
                                                            { $yyval = new Scalar\MagicConst\Function_($this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 522: /* constant: T_NS_C  */
    /* "grammar.y":1179  */
                                                            { $yyval = new Scalar\MagicConst\Namespace_($this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 523: /* class_constant: class_name_or_var T_PAAMAYIM_NEKUDOTAYIM identifier_maybe_reserved  */
    /* "grammar.y":1184  */
          { $yyval = new Expr\ClassConstFetch($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 524: /* class_constant: class_name_or_var T_PAAMAYIM_NEKUDOTAYIM error  */
    /* "grammar.y":1188  */
          { $yyval = new Expr\ClassConstFetch($yystack->valueAt(2), new Expr\Error($this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributeStack[$yystack->valueAt(0)]), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); $this->errorState = 2; };
  break;


  case 525: /* array_short_syntax: '[' array_pair_list ']'  */
    /* "grammar.y":1193  */
          { $attrs = $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes; $attrs['kind'] = Expr\Array_::KIND_SHORT;
            $yyval = new Expr\Array_($yystack->valueAt(1), $attrs); };
  break;


  case 526: /* dereferencable_scalar: T_ARRAY '(' array_pair_list ')'  */
    /* "grammar.y":1199  */
          { $attrs = $this->startAttributeStack[$yystack->valueAt(3)] + $this->endAttributes; $attrs['kind'] = Expr\Array_::KIND_LONG;
            $yyval = new Expr\Array_($yystack->valueAt(1), $attrs); };
  break;


  case 527: /* dereferencable_scalar: array_short_syntax  */
    /* "grammar.y":1201  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 528: /* dereferencable_scalar: T_CONSTANT_ENCAPSED_STRING  */
    /* "grammar.y":1202  */
                                                            { $yyval = Scalar\String_::fromString($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 529: /* dereferencable_scalar: '"' encaps_list '"'  */
    /* "grammar.y":1204  */
          { $attrs = $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes; $attrs['kind'] = Scalar\String_::KIND_DOUBLE_QUOTED;
            foreach ($yystack->valueAt(1) as $s) { if ($s instanceof Node\Scalar\EncapsedStringPart) { $s->value = Node\Scalar\String_::parseEscapeSequences($s->value, '"', true); } }; $yyval = new Scalar\Encapsed($yystack->valueAt(1), $attrs); };
  break;


  case 530: /* scalar: T_LNUMBER  */
    /* "grammar.y":1209  */
                                                            { $yyval = $this->parseLNumber($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 531: /* scalar: T_DNUMBER  */
    /* "grammar.y":1210  */
                                                            { $yyval = Scalar\DNumber::fromString($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 532: /* scalar: dereferencable_scalar  */
    /* "grammar.y":1211  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 533: /* scalar: constant  */
    /* "grammar.y":1212  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 534: /* scalar: class_constant  */
    /* "grammar.y":1213  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 535: /* scalar: T_START_HEREDOC T_ENCAPSED_AND_WHITESPACE T_END_HEREDOC  */
    /* "grammar.y":1215  */
          { $yyval = $this->parseDocString($yystack->valueAt(2), $yystack->valueAt(1), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes, $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributeStack[$yystack->valueAt(0)], true); };
  break;


  case 536: /* scalar: T_START_HEREDOC T_END_HEREDOC  */
    /* "grammar.y":1217  */
          { $yyval = $this->parseDocString($yystack->valueAt(1), '', $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes, $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributeStack[$yystack->valueAt(0)], true); };
  break;


  case 537: /* scalar: T_START_HEREDOC encaps_list T_END_HEREDOC  */
    /* "grammar.y":1219  */
          { $yyval = $this->parseDocString($yystack->valueAt(2), $yystack->valueAt(1), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes, $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributeStack[$yystack->valueAt(0)], true); };
  break;


  case 538: /* optional_expr: %empty  */
    /* "grammar.y":1223  */
                                                            { $yyval = null; };
  break;


  case 539: /* optional_expr: expr  */
    /* "grammar.y":1224  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 540: /* fully_dereferencable: variable  */
    /* "grammar.y":1228  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 541: /* fully_dereferencable: '(' expr ')'  */
    /* "grammar.y":1229  */
                                                            { $yyval = $yystack->valueAt(1); };
  break;


  case 542: /* fully_dereferencable: dereferencable_scalar  */
    /* "grammar.y":1230  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 543: /* fully_dereferencable: class_constant  */
    /* "grammar.y":1231  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 544: /* array_object_dereferencable: fully_dereferencable  */
    /* "grammar.y":1235  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 545: /* array_object_dereferencable: constant  */
    /* "grammar.y":1236  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 546: /* callable_expr: callable_variable  */
    /* "grammar.y":1240  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 547: /* callable_expr: '(' expr ')'  */
    /* "grammar.y":1241  */
                                                            { $yyval = $yystack->valueAt(1); };
  break;


  case 548: /* callable_expr: dereferencable_scalar  */
    /* "grammar.y":1242  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 549: /* callable_variable: simple_variable  */
    /* "grammar.y":1246  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 550: /* callable_variable: array_object_dereferencable '[' optional_expr ']'  */
    /* "grammar.y":1247  */
                                                            { $yyval = new Expr\ArrayDimFetch($yystack->valueAt(3), $yystack->valueAt(1), $this->startAttributeStack[$yystack->valueAt(3)] + $this->endAttributes); };
  break;


  case 551: /* callable_variable: array_object_dereferencable '{' expr '}'  */
    /* "grammar.y":1248  */
                                                            { $yyval = new Expr\ArrayDimFetch($yystack->valueAt(3), $yystack->valueAt(1), $this->startAttributeStack[$yystack->valueAt(3)] + $this->endAttributes); };
  break;


  case 552: /* callable_variable: function_call  */
    /* "grammar.y":1249  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 553: /* callable_variable: array_object_dereferencable T_OBJECT_OPERATOR property_name argument_list  */
    /* "grammar.y":1251  */
          { $yyval = new Expr\MethodCall($yystack->valueAt(3), $yystack->valueAt(1), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(3)] + $this->endAttributes); };
  break;


  case 554: /* callable_variable: array_object_dereferencable T_NULLSAFE_OBJECT_OPERATOR property_name argument_list  */
    /* "grammar.y":1253  */
          { $yyval = new Expr\NullsafeMethodCall($yystack->valueAt(3), $yystack->valueAt(1), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(3)] + $this->endAttributes); };
  break;


  case 555: /* optional_plain_variable: %empty  */
    /* "grammar.y":1257  */
                                                            { $yyval = null; };
  break;


  case 556: /* optional_plain_variable: plain_variable  */
    /* "grammar.y":1258  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 557: /* variable: callable_variable  */
    /* "grammar.y":1262  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 558: /* variable: static_member  */
    /* "grammar.y":1263  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 559: /* variable: array_object_dereferencable T_OBJECT_OPERATOR property_name  */
    /* "grammar.y":1265  */
          { $yyval = new Expr\PropertyFetch($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 560: /* variable: array_object_dereferencable T_NULLSAFE_OBJECT_OPERATOR property_name  */
    /* "grammar.y":1267  */
          { $yyval = new Expr\NullsafePropertyFetch($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 561: /* simple_variable: plain_variable  */
    /* "grammar.y":1271  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 562: /* simple_variable: '$' '{' expr '}'  */
    /* "grammar.y":1272  */
                                                            { $yyval = new Expr\Variable($yystack->valueAt(1), $this->startAttributeStack[$yystack->valueAt(3)] + $this->endAttributes); };
  break;


  case 563: /* simple_variable: '$' simple_variable  */
    /* "grammar.y":1273  */
                                                            { $yyval = new Expr\Variable($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes); };
  break;


  case 564: /* simple_variable: '$' error  */
    /* "grammar.y":1274  */
                                                            { $yyval = new Expr\Variable(new Expr\Error($this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes), $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes); $this->errorState = 2; };
  break;


  case 565: /* static_member_prop_name: simple_variable  */
    /* "grammar.y":1279  */
          { $var = $yystack->valueAt(0)->name; $yyval = \is_string($var) ? new Node\VarLikeIdentifier($var, $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes) : $var; };
  break;


  case 566: /* static_member: class_name_or_var T_PAAMAYIM_NEKUDOTAYIM static_member_prop_name  */
    /* "grammar.y":1284  */
          { $yyval = new Expr\StaticPropertyFetch($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 567: /* new_variable: simple_variable  */
    /* "grammar.y":1288  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 568: /* new_variable: new_variable '[' optional_expr ']'  */
    /* "grammar.y":1289  */
                                                            { $yyval = new Expr\ArrayDimFetch($yystack->valueAt(3), $yystack->valueAt(1), $this->startAttributeStack[$yystack->valueAt(3)] + $this->endAttributes); };
  break;


  case 569: /* new_variable: new_variable '{' expr '}'  */
    /* "grammar.y":1290  */
                                                            { $yyval = new Expr\ArrayDimFetch($yystack->valueAt(3), $yystack->valueAt(1), $this->startAttributeStack[$yystack->valueAt(3)] + $this->endAttributes); };
  break;


  case 570: /* new_variable: new_variable T_OBJECT_OPERATOR property_name  */
    /* "grammar.y":1291  */
                                                            { $yyval = new Expr\PropertyFetch($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 571: /* new_variable: new_variable T_NULLSAFE_OBJECT_OPERATOR property_name  */
    /* "grammar.y":1292  */
                                                            { $yyval = new Expr\NullsafePropertyFetch($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 572: /* new_variable: class_name T_PAAMAYIM_NEKUDOTAYIM static_member_prop_name  */
    /* "grammar.y":1294  */
          { $yyval = new Expr\StaticPropertyFetch($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 573: /* new_variable: new_variable T_PAAMAYIM_NEKUDOTAYIM static_member_prop_name  */
    /* "grammar.y":1296  */
          { $yyval = new Expr\StaticPropertyFetch($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 574: /* member_name: identifier_maybe_reserved  */
    /* "grammar.y":1300  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 575: /* member_name: '{' expr '}'  */
    /* "grammar.y":1301  */
                                                            { $yyval = $yystack->valueAt(1); };
  break;


  case 576: /* member_name: simple_variable  */
    /* "grammar.y":1302  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 577: /* property_name: identifier_not_reserved  */
    /* "grammar.y":1306  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 578: /* property_name: '{' expr '}'  */
    /* "grammar.y":1307  */
                                                            { $yyval = $yystack->valueAt(1); };
  break;


  case 579: /* property_name: simple_variable  */
    /* "grammar.y":1308  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 580: /* property_name: error  */
    /* "grammar.y":1309  */
                                                            { $yyval = new Expr\Error($this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); $this->errorState = 2; };
  break;


  case 581: /* list_expr: T_LIST '(' inner_array_pair_list ')'  */
    /* "grammar.y":1313  */
                                                            { $yyval = new Expr\List_($yystack->valueAt(1), $this->startAttributeStack[$yystack->valueAt(3)] + $this->endAttributes); };
  break;


  case 582: /* array_pair_list: inner_array_pair_list  */
    /* "grammar.y":1318  */
          { $yyval = $yystack->valueAt(0); $end = count($yyval)-1; if ($yyval[$end] === null) array_pop($yyval); };
  break;


  case 584: /* comma_or_error: error  */
    /* "grammar.y":1324  */
          { /* do nothing -- prevent default action of $$=$1. See $551. */ };
  break;


  case 585: /* inner_array_pair_list: inner_array_pair_list comma_or_error array_pair  */
    /* "grammar.y":1328  */
                                                            { $yystack->valueAt(2)[] = $yystack->valueAt(0); $yyval = $yystack->valueAt(2); };
  break;


  case 586: /* inner_array_pair_list: array_pair  */
    /* "grammar.y":1329  */
                                                            { $yyval = array($yystack->valueAt(0)); };
  break;


  case 587: /* array_pair: expr  */
    /* "grammar.y":1333  */
                                                            { $yyval = new Expr\ArrayItem($yystack->valueAt(0), null, false, $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 588: /* array_pair: ampersand variable  */
    /* "grammar.y":1334  */
                                                            { $yyval = new Expr\ArrayItem($yystack->valueAt(0), null, true, $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes); };
  break;


  case 589: /* array_pair: list_expr  */
    /* "grammar.y":1335  */
                                                            { $yyval = new Expr\ArrayItem($yystack->valueAt(0), null, false, $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 590: /* array_pair: expr T_DOUBLE_ARROW expr  */
    /* "grammar.y":1336  */
                                                            { $yyval = new Expr\ArrayItem($yystack->valueAt(0), $yystack->valueAt(2), false, $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 591: /* array_pair: expr T_DOUBLE_ARROW ampersand variable  */
    /* "grammar.y":1337  */
                                                            { $yyval = new Expr\ArrayItem($yystack->valueAt(0), $yystack->valueAt(3), true, $this->startAttributeStack[$yystack->valueAt(3)] + $this->endAttributes); };
  break;


  case 592: /* array_pair: expr T_DOUBLE_ARROW list_expr  */
    /* "grammar.y":1338  */
                                                            { $yyval = new Expr\ArrayItem($yystack->valueAt(0), $yystack->valueAt(2), false, $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 593: /* array_pair: T_ELLIPSIS expr  */
    /* "grammar.y":1339  */
                                                            { $yyval = new Expr\ArrayItem($yystack->valueAt(0), null, false, $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes, true, $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes); };
  break;


  case 594: /* array_pair: %empty  */
    /* "grammar.y":1340  */
                                                            { $yyval = null; };
  break;


  case 595: /* encaps_list: encaps_list encaps_var  */
    /* "grammar.y":1344  */
                                                            { $yystack->valueAt(1)[] = $yystack->valueAt(0); $yyval = $yystack->valueAt(1); };
  break;


  case 596: /* encaps_list: encaps_list encaps_string_part  */
    /* "grammar.y":1345  */
                                                            { $yystack->valueAt(1)[] = $yystack->valueAt(0); $yyval = $yystack->valueAt(1); };
  break;


  case 597: /* encaps_list: encaps_var  */
    /* "grammar.y":1346  */
                                                            { $yyval = array($yystack->valueAt(0)); };
  break;


  case 598: /* encaps_list: encaps_string_part encaps_var  */
    /* "grammar.y":1347  */
                                                            { $yyval = array($yystack->valueAt(1), $yystack->valueAt(0)); };
  break;


  case 599: /* encaps_string_part: T_ENCAPSED_AND_WHITESPACE  */
    /* "grammar.y":1351  */
                                                            { $yyval = new Scalar\EncapsedStringPart($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 600: /* encaps_str_varname: T_STRING_VARNAME  */
    /* "grammar.y":1355  */
                                                            { $yyval = new Expr\Variable($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 601: /* encaps_var: plain_variable  */
    /* "grammar.y":1359  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;


  case 602: /* encaps_var: plain_variable '[' encaps_var_offset ']'  */
    /* "grammar.y":1360  */
                                                            { $yyval = new Expr\ArrayDimFetch($yystack->valueAt(3), $yystack->valueAt(1), $this->startAttributeStack[$yystack->valueAt(3)] + $this->endAttributes); };
  break;


  case 603: /* encaps_var: plain_variable T_OBJECT_OPERATOR identifier_not_reserved  */
    /* "grammar.y":1362  */
          { $yyval = new Expr\PropertyFetch($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 604: /* encaps_var: plain_variable T_NULLSAFE_OBJECT_OPERATOR identifier_not_reserved  */
    /* "grammar.y":1364  */
          { $yyval = new Expr\NullsafePropertyFetch($yystack->valueAt(2), $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 605: /* encaps_var: T_DOLLAR_OPEN_CURLY_BRACES expr '}'  */
    /* "grammar.y":1365  */
                                                            { $yyval = new Expr\Variable($yystack->valueAt(1), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 606: /* encaps_var: T_DOLLAR_OPEN_CURLY_BRACES T_STRING_VARNAME '}'  */
    /* "grammar.y":1366  */
                                                            { $yyval = new Expr\Variable($yystack->valueAt(1), $this->startAttributeStack[$yystack->valueAt(2)] + $this->endAttributes); };
  break;


  case 607: /* encaps_var: T_DOLLAR_OPEN_CURLY_BRACES encaps_str_varname '[' expr ']' '}'  */
    /* "grammar.y":1368  */
          { $yyval = new Expr\ArrayDimFetch($yystack->valueAt(4), $yystack->valueAt(2), $this->startAttributeStack[$yystack->valueAt(5)] + $this->endAttributes); };
  break;


  case 608: /* encaps_var: T_CURLY_OPEN variable '}'  */
    /* "grammar.y":1369  */
                                                            { $yyval = $yystack->valueAt(1); };
  break;


  case 609: /* encaps_var_offset: T_STRING  */
    /* "grammar.y":1373  */
                                                            { $yyval = new Scalar\String_($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 610: /* encaps_var_offset: T_NUM_STRING  */
    /* "grammar.y":1374  */
                                                            { $yyval = $this->parseNumString($yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(0)] + $this->endAttributes); };
  break;


  case 611: /* encaps_var_offset: '-' T_NUM_STRING  */
    /* "grammar.y":1375  */
                                                            { $yyval = $this->parseNumString('-' . $yystack->valueAt(0), $this->startAttributeStack[$yystack->valueAt(1)] + $this->endAttributes); };
  break;


  case 612: /* encaps_var_offset: plain_variable  */
    /* "grammar.y":1376  */
                                                            { $yyval = $yystack->valueAt(0); };
  break;



/* "lib/parser-tmp.php":4317  */

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
   * Push Parse input from external lexer
   *
   * @param $yylextoken int current token
   * @param $yylexval mixed current lval
   *
   * @return int <tt>YYACCEPT, YYABORT, YYPUSH_MORE</tt>
   */
  public function push_parse(int $yylextoken, $yylexval): int
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

    /* Semantic value of the lookahead.  */
    $this->yylval = null;

    $this->yystack->push($this->yystate, $this->yylval);

    $this->push_parse_initialized = true;

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

  public int $yypact_ninf = -906;
  public int $yytable_ninf = -592;

/* YYPACT[STATE-NUM] -- Index in YYTABLE of the portion describing
   STATE-NUM.  */
  
  /** @var int[] */
  public array $yypact = array(  -906,    94,  1113,  -906,  -906,  -906,  4273,  4273,   -46,  4273,
    4273,  4273,  4273,  4273,  4273,  4273,  4273,  4273,  3727,  3727,
    4273,  4273,  4273,  4273,  4273,  4273,  4273,  4273,  3277,   344,
    4273,   -31,   126,  -906,  -906,   145,  -906,  -906,  -906,  4273,
    2779,   134,   165,   176,   183,   224,   239,  4273,  4273,   330,
     269,   269,   330,  4273,    92,  4273,   617,   -23,   203,  -906,
    -906,   250,   268,   271,   276,  -906,  -906,   280,   303,  -906,
    -906,  -906,  -906,  -906,  -906,   468,  4600,  -906,  -906,  -906,
    -906,  -906,   574,  -906,  -906,  4273,   373,   546,    71,   394,
    -906,  -906,   829,   638,  -906,    72,  -906,  -906,  -906,  -906,
     330,   673,  -906,  -906,  4745,  -906,   310,  -906,  -906,   -75,
     374,    20,     8,   491,   412,  -906,   376,   245,   310,   364,
    5907,  -906,  -906,   515,  -906,   269,   370,  -906,   177,  6153,
    6153,  4273,  6153,  6153,  1601,  1437,  1601,   464,   464,    78,
     464,  -906,  4273,  -906,  -906,  -906,   372,   182,   182,   464,
     464,   464,   464,   464,   464,   464,   464,  -906,  -906,  4273,
    3727,  6104,   515,   397,   102,  -906,  -906,  4273,   404,   442,
    -906,   425,  -906,   310,  -906,   336,  -906,  4273,  -906,  4273,
      72,   575,  6153,   496,  4273,  4273,  4273,   330,  4273,  4273,
    6153,    72,    72,  -906,    72,  -906,     2,   434,   602,    72,
     612,  -906,    72,  -906,  6153,  -906,  -906,  -906,  -906,  -906,
    -906,     3,   357,    72,   626,  -906,    72,   634,  -906,  -906,
     269,   269,   636,    72,   652,  -906,  3727,  4273,  4273,  3277,
    3277,   518,  -906,  3609,  3727,   345,   597,   174,  -906,  -906,
    -906,  -906,  -906,  -906,  -906,  -906,  -906,  -906,  -906,  -906,
    -906,  -906,  -906,  -906,  -906,  -906,  -906,  -906,  -906,  -906,
    -906,  -906,  -906,  -906,  -906,  -906,  -906,  -906,  -906,  -906,
    -906,  -906,  -906,  -906,  -906,  -906,  -906,  -906,  -906,  -906,
    -906,  -906,  -906,  -906,  -906,  -906,  -906,  -906,  -906,  -906,
    -906,  -906,  -906,  -906,  -906,  -906,  -906,  -906,  -906,  -906,
    -906,  -906,  -906,  -906,  -906,  -906,  -906,  -906,  -906,  -906,
    -906,  -906,  -906,  -906,  -906,  -906,  -906,  -906,  -906,  -906,
    -906,  -906,   119,  -906,   666,   310,  1281,   517,  1097,   509,
     519,   546,  -906,   433,  -906,  4273,  -906,  -906,   269,   269,
     387,  -906,  -906,   330,   330,   330,   330,  -906,  -906,  -906,
     548,  -906,  -906,  4273,  4273,  4273,  3775,  4273,  4273,  4273,
    4273,  4273,  4273,  4273,  4273,  4273,  4273,  4273,  4273,  4273,
    4273,  4273,  4273,  4273,  4273,  4273,  4273,  4273,  4273,  4273,
    4273,   118,  4273,  -906,  2945,  -906,  -906,  1785,  4273,  4273,
      59,    59,  4273,  -906,  3443,  4273,  4273,  4273,  4273,  4273,
    4273,  4273,  4273,  4273,  4273,  4273,  4273,  4273,  -906,  -906,
    4273,   524,   269,  3595,  4273,  4093,  6153,   103,  3443,  -906,
    -906,  -906,  3277,  4259,   310,   -23,  -906,  -906,  4273,    59,
      59,   -23,  4273,   527,  4424,  -906,  4273,  -906,   525,  4808,
    -906,   536,  6038,   682,   538,   702,  -906,  4956,  5005,  -906,
    -906,  -906,  -906,   132,  -906,   537,   132,  4273,  -906,   330,
    -906,  -906,   556,   330,   558,    32,    72,  -906,   357,  -906,
    -906,   -23,  -906,   562,   565,  4273,  -906,   651,  -906,   569,
     728,    73,   578,   731,  5054,   100,   593,  -906,   598,  5250,
     690,   601,   658,   330,   330,  -906,  -906,  -906,  -906,   615,
    -906,  -906,   574,   618,  -906,  -906,  -906,  -906,  -906,  -906,
    -906,   474,  -906,  -906,  5299,    85,   622,   269,   269,   548,
     619,   656,   766,   574,   667,  6201,  1267,  1601,  4273,  5755,
    1767,  2762,  5597,  6235,  2924,  3088,  3088,  3254,  3254,  3254,
    3254,  3254,   986,   986,   986,   986,   807,   807,   694,   694,
     694,    78,    78,    78,  -906,   464,  4273,  4273,   -46,  4273,
    4273,  4273,  3941,   655,  4273,    24,   311,   239,    84,    84,
    4273,   482,   250,   271,   276,   280,   303,   769,   772,   774,
     775,   777,   779,   786,   791,  4273,  -906,  3727,  -906,   793,
     662,   808,  -906,  6153,  -906,  -906,  4273,   665,   671,  -906,
     310,  1601,   670,  -906,  4273,  -906,  -906,   310,   310,  5348,
    3727,  1601,  1601,  1601,  1601,  1601,  1601,  1601,  1601,  1601,
    1601,  1601,  1601,  1601,  1601,  1601,   672,  -906,  1601,   674,
    3727,  6153,   515,  -906,  -906,   548,  -906,  -906,   676,  -906,
    -906,  -906,  5397,  -906,  1939,  6153,  4273,  2107,  4273,   677,
    5867,  4273,  2275,   330,  -906,    40,   678,  -906,   684,   831,
    -906,   132,   688,  6153,  -906,  -906,  -906,   225,   679,  -906,
     755,  -906,  -906,   132,   132,  6153,  -906,    72,  3727,  -906,
    -906,  4273,  -906,  -906,  -906,  -906,  -906,  -906,  4273,  -906,
     771,  -906,  -906,  -906,   705,  -906,  -906,  -906,   692,  -906,
    -906,  -906,   132,   703,   132,   708,   709,   667,  -906,   574,
     707,   512,   667,  -906,   574,   713,  1767,  4273,  6153,    90,
    4273,  -906,  3111,   714,  5446,  -906,  -906,  5495,  -906,  -906,
    -906,   182,   105,   667,  -906,  -906,  -906,  -906,  5103,  -906,
    -906,  -906,   720,  2443,  3727,   717,   718,    52,  -906,  6153,
    -906,  -906,  -906,  -906,  -906,   724,   725,  -906,  4107,   785,
     773,   319,  -906,   721,   857,   405,   794,   219,   727,   890,
    -906,  -906,   219,   734,   735,  -906,   115,  4589,  -906,  -906,
    -906,   737,   132,   739,   132,   132,   751,   849,   752,  -906,
     906,  -906,  -906,  -906,  -906,  -906,  -906,  -906,  -906,   754,
    -906,  -906,  1767,  6153,  4273,  -906,  -906,  -906,  -906,   756,
    -906,   470,   757,   832,  4273,  -906,  -906,  -906,   761,  2443,
    5867,   825,  -906,   675,  -906,   362,   919,   768,   921,  -906,
     920,   163,  -906,  -906,  -906,  -906,   163,  -906,    70,   902,
     903,   896,  -906,  -906,   901,   776,   857,  -906,   857,   455,
     930,   781,   797,  -906,  -906,   330,  -906,  -906,   225,  -906,
     790,   948,  -906,   773,   857,   798,   773,   799,   857,   809,
     810,  -906,  -906,   574,   898,  -906,  -906,   574,  -906,   813,
    -906,   817,  -906,   530,   818,  2779,  -906,  -906,  -906,   802,
     816,   889,  -906,   820,   822,   830,   693,   833,  4273,    36,
    -906,   500,  -906,  -906,   975,  -906,  4107,  -906,  4273,  -906,
     954,   827,   163,   469,   469,   163,  -906,   840,   269,    56,
      56,  -906,   512,   512,  -906,   162,   961,   962,   963,  -906,
    4273,   353,  -906,  -906,  -906,  -906,   219,  -906,   857,   984,
    -906,   857,   857,   987,   773,   857,   844,   -20,  5618,  -906,
    -906,  -906,  -906,  -906,  -906,  -906,  -906,   439,    61,   940,
    -906,  -906,  -906,   846,  -906,   847,   859,   982,  -906,   949,
    4273,  -906,  -906,  2611,   865,  2443,  -906,   867,  -906,  5544,
    -906,  -906,  -906,  -906,  4273,  -906,  6153,  -906,  -906,  -906,
    -906,  -906,  -906,  -906,    82,   651,   864,  1036,  -906,  -906,
    -906,  -906,  -906,  -906,  1010,   884,   512,   687,   687,   512,
    6153,   261,  -906,   887,  -906,    56,  4273,    56,    56,  4273,
     857,  1037,  -906,  -906,  -906,  -906,  1038,   970,   269,  5618,
    -906,  -906,  -906,  4273,  -906,   893,  5152,  -906,  -906,  -906,
    -906,  -906,  -906,  -906,  1449,  6153,  -906,  1049,  -906,  -906,
     585,  -906,   905,  -906,  -906,  -906,  -906,  -906,  -906,   353,
    -906,   904,  -906,  -906,  6153,  -906,  -906,  6153,    56,  4273,
    4439,  4273,    72,  -906,    72,  1062,  1055,  -906,  5618,  1056,
      72,  1065,  -906,  5201,  -906,  -906,  2779,   983,  1617,  4273,
    -906,  -906,  -906,   912,  -906,  6153,  -906,  -906,  -906,   964,
     979,   927,  6153,  -906,  -906,   970,  -906,  4273,   914,  4273,
    -906,  5618,  -906,  1050,  -906,   922,  6153,  -906,   574,  5769,
    5618,  -906,  6153,   132,  6153,  -906,  -906,  -906,   917,   923,
    -906,   928,   931,  4819,  -906,   925,  -906,  -906,  -906,  -906,
    -906,  -906,   932,   857,  -906,   133,  -906,  -906,  -906);
  

/* YYDEFACT[STATE-NUM] -- Default reduction number in state STATE-NUM.
   Performed when YYTABLE does not specify something else to do.  Zero
   means the default is an error.  */
  
  /** @var int[] */
  public array $yydefact = array(     4,     0,     0,     2,     1,   182,     0,     0,     0,     0,
       0,     0,   468,     0,     0,     0,     0,     0,     0,     0,
       0,     0,     0,     0,     0,     0,     0,     0,   594,     0,
       0,   507,     0,   530,   531,   497,    98,   172,   528,     0,
       0,     0,     0,     0,     0,     0,     0,   538,   538,     0,
     195,   195,     0,   538,     0,     0,     0,     0,   495,   220,
     221,   222,     0,     0,     0,   117,   216,     0,     0,   518,
     519,   520,   521,   515,   516,     0,     0,   522,   517,   499,
     498,   500,     0,   184,   153,     0,   509,     0,     0,     0,
     561,   110,   113,     0,     3,     0,   183,   114,   115,   116,
       0,     0,   218,   394,     0,   393,     0,   552,   505,   514,
       0,   533,   534,   527,   532,   465,   544,     0,     0,   557,
     388,   549,   558,     0,   497,   195,   495,   490,     0,   451,
     452,     0,   454,   455,   467,   469,   471,   431,   432,   433,
     434,   495,     0,   545,   543,   527,   542,   410,   412,   456,
     457,   458,   459,   460,   461,   462,   464,     7,     6,     0,
       0,   587,   589,     0,     0,   586,   504,     0,   113,     0,
     483,   501,   496,   512,   567,   502,   395,   538,   463,     0,
       0,   101,   385,     0,     0,   386,     0,     0,     0,     0,
     539,     0,     0,    89,     0,   196,     0,     0,     0,     0,
     101,   146,     0,   153,   472,    94,   125,   126,    97,    95,
      96,   140,     0,     0,   101,   134,     0,   101,   333,   334,
     195,   195,   338,     0,   101,   337,     0,     0,     0,   594,
     594,   599,   536,     0,     0,   601,     0,     0,   597,     8,
       9,    10,    11,    12,    13,    14,    15,    51,    52,    16,
      17,    18,    19,    20,    21,    22,    23,    91,    24,    25,
      26,    27,    28,    29,    30,    31,    32,    33,    34,    54,
      77,    55,    56,    57,    58,    46,    47,    48,    76,    49,
      50,    35,    36,    37,    38,    39,    40,    41,    80,    81,
      82,    83,    84,    85,    86,    42,    43,    44,    45,    75,
      66,    64,    65,    78,    61,    62,    53,    59,    60,    67,
      68,    70,    69,    71,    72,    63,    74,    73,    93,     4,
      79,    92,     0,   107,   103,   105,     0,     0,     0,   599,
       0,   511,   599,     0,   564,     0,   563,   181,   195,   195,
       0,   222,   111,     0,     0,     0,     0,   100,    99,   123,
     223,   217,   219,     0,     0,     0,     0,     0,     0,     0,
       0,     0,     0,     0,     0,     0,     0,     0,     0,     0,
       0,     0,     0,     0,     0,     0,     0,     0,     0,     0,
       0,     0,     0,   173,     0,   492,   491,     0,     0,   538,
       0,     0,     0,   493,     0,     0,     0,     0,     0,     0,
       0,     0,     0,     0,     0,     0,     0,     0,   409,   411,
       0,     0,   195,     0,     0,     0,   593,   540,     0,   525,
     584,   583,   594,     0,   512,     0,   513,   482,   538,     0,
       0,     0,     0,     0,     0,   171,   102,   382,     0,     0,
     387,     0,     0,     0,     0,   101,   240,     0,     0,   166,
     167,   180,   204,   112,   203,     0,   112,     0,   124,   102,
     144,   168,     0,     0,     0,   140,     0,   121,   102,   132,
     169,   102,   331,     0,     0,     0,   170,   102,   335,     0,
     103,   540,     0,   103,     0,     0,     0,   535,   600,     0,
       0,   540,     0,     0,     0,   537,   596,   595,   598,     0,
       4,   118,   104,     0,   106,   158,   152,   155,   156,   157,
     159,   445,   466,   529,     0,     0,     0,   195,   195,   223,
       0,   225,   212,     0,   227,   415,   417,   416,     0,     0,
     448,   413,   414,   418,   421,   419,   420,   437,   438,   435,
     436,   439,   440,   441,   442,   443,   428,   429,   423,   424,
     422,   425,   426,   427,   444,   430,     8,     9,    10,    11,
      12,    51,   468,     0,    18,   507,   497,    77,    48,    76,
      38,    80,    86,    44,    45,    53,    59,   518,   519,   520,
     521,   515,   516,   522,   517,   324,   321,     0,    88,     0,
       0,   103,   325,   327,   524,    87,     0,   523,   565,   566,
       0,   390,     0,   580,     0,   577,   579,   559,   560,     0,
       0,   391,   396,   397,   398,   399,   400,   401,   402,   403,
     404,   405,   406,   407,   408,   389,     0,   453,   470,   541,
       0,   590,   592,   585,   503,   223,   565,   572,     0,   570,
     571,   573,     0,   508,     0,   384,     0,     0,   386,     0,
       0,     0,     0,   102,   239,     0,     0,   280,     0,   103,
     278,   112,     0,   147,   145,   185,   141,     0,     0,   122,
     140,   133,   332,   112,   112,   339,   336,     0,   104,   192,
     449,   104,   383,   450,   581,   526,   606,   605,     0,   608,
       0,   609,   610,   612,     0,   603,   604,   120,     0,   108,
     109,   562,   112,     0,   112,     0,     0,   227,   341,     0,
       0,     0,   227,   224,     0,     0,   447,     0,   329,   540,
       0,   323,   104,     0,     0,   494,   550,     0,   553,   554,
     551,   392,   540,   227,   568,   569,   153,   262,     0,   153,
     260,   162,     0,     0,     0,     0,   527,   540,   274,   242,
     153,   237,   236,   178,   241,   247,   247,   165,   254,   316,
     484,   112,   276,     0,   318,   190,   138,     0,     0,   103,
     142,   137,     0,     0,     0,   174,   540,     0,   611,   602,
     119,     0,   112,     0,   112,   112,     0,     0,     0,   226,
     101,   230,   341,   294,   296,   297,   213,   293,   295,     0,
     228,   341,   446,   330,     0,   326,   322,   575,   578,     0,
     265,   268,     0,     0,   386,   153,   234,   177,   540,     0,
       0,     0,   247,     0,   247,     0,   103,     0,   103,   256,
       0,     0,   284,   283,   282,   285,     0,   281,   312,     0,
     314,   311,   315,   317,   197,     0,   318,   279,   318,     0,
       0,     0,     0,   186,   179,     0,   143,   128,   104,   135,
       0,   103,   131,   484,   318,     0,   484,     0,   318,     0,
       0,   341,   348,     0,   365,   340,   210,   102,   229,     0,
     341,     0,   341,   270,     0,     0,   263,   160,   163,     0,
       0,     0,   175,     0,   540,     0,     0,     0,     0,     0,
     248,     0,   243,   104,     0,   253,   104,   255,     0,   313,
       0,     0,     0,     0,     0,     0,   198,   199,   195,     0,
       0,   320,     0,     0,   319,   289,     0,   291,   308,   292,
       0,     0,   153,   139,   136,   127,   104,   129,   318,     0,
     607,   318,   318,     0,   484,   318,     0,     0,     0,   372,
     373,   374,   371,   370,   369,   375,   364,   316,     0,   363,
     367,   231,   209,     0,   207,     0,     0,     0,   266,     0,
       0,   269,   261,     0,     0,     0,   238,     0,   245,     0,
     251,   252,   153,   244,     0,   257,   258,   303,   309,   302,
     304,   305,   310,   200,     0,     0,     0,   103,   487,   202,
     153,   475,   205,   290,     0,     0,     0,     0,     0,     0,
     473,   555,   187,     0,   130,     0,     0,     0,     0,     0,
     318,     0,   208,   349,   351,   346,   214,     0,   195,     0,
     368,   211,   481,     0,   153,     0,     0,   153,   232,   164,
     235,   176,   246,   153,     0,   259,   288,   286,   489,   485,
     104,   486,     0,   299,   306,   298,   300,   301,   307,     0,
     556,     0,   191,   476,   474,   479,   206,   477,     0,     0,
       0,     0,     0,   379,     0,   101,   380,   377,     0,     0,
       0,   101,   150,     0,   271,   161,     0,     0,     0,     0,
     488,   201,   188,     0,   480,   478,   350,   360,   352,   359,
       0,     0,   215,   347,   343,   102,   376,     0,     0,     0,
     344,   102,   148,     0,   264,     0,   287,   153,     0,     0,
       0,   378,   381,   112,   151,   149,   153,   233,     0,     0,
      90,     0,     0,     0,   358,     0,   267,   189,   353,   356,
     357,   355,     0,   318,   354,     0,   361,   362,   345);
  

/* YYPGOTO[NTERM-NUM].  */
  
  /** @var int[] */
  public array $yypgoto = array(  -906,  -906,  -906,  -270,    28,   -25,  1019,  -313,    75,  -906,
    -906,   -27,  -176,   -17,    13,  -186,  -331,   594,  -906,    10,
      -2,     1,  -906,  1042,  -906,  -906,  -906,   888,  -906,  -906,
    -906,  -720,   631,   243,  -906,  -906,   644,  -906,  -906,    -6,
    -854,  -166,  -906,   457,    11,  -906,  -906,  -906,  -906,  -906,
    -906,   -26,  -906,  -906,  -867,   595,  1109,  1110,  -906,  -906,
    1031,  -906,  1023,  -475,  -906,  -265,  -682,  -906,  -906,  -735,
    -906,  -906,  -906,   502,  -906,  -483,  -906,   178,  -906,  -906,
    -906,   247,  -906,  -906,  -906,  -906,  -906,  -906,  -906,   338,
    -245,  -906,  -906,  -906,   395,  -906,  -672,  -668,  -368,  -906,
    -269,  -906,  -906,   236,  -906,   324,  -906,   204,  -732,   -21,
    -906,  -906,   440,  -906,  -906,   696,  -906,  -906,   691,  -906,
    -339,  -906,  -906,  -906,  -906,  -906,  -906,  -906,  -906,  -906,
    -906,  -905,  -906,  -906,  -906,    60,  1131,   955,  -192,  -583,
      -5,  -906,  -906,  -754,  -906,  -906,   138,  -906,  -906,     4,
      -3,   815,  -906,  -906,  -906,   765,    27,    43,    74,    77,
    -906,    15,  -906,  -906,  -906,  -906,  -906,   112,    58,    65,
    -906,  -906,  -906,  -104,    12,   960,  -906,   969,   783,   561,
    -172,  -906,  -160,  -906);
  

/* YYDEFGOTO[NTERM-NUM].  */
  
  /** @var int[] */
  public array $yydefgoto = array(     0,     1,     2,     3,   195,   320,   588,   589,    89,  1132,
     322,   766,   211,    90,   349,   437,   503,   323,   324,    91,
     128,   657,    94,   767,    95,   860,   861,   213,   214,   768,
     769,   770,   215,   771,   199,   200,   201,  1080,  1081,  1082,
     326,   327,   506,    96,   507,   765,  1011,   853,   854,   479,
     480,   197,   917,   994,  1001,   455,   508,   509,   712,  1072,
     100,   101,   102,   524,   710,   715,   789,   790,  1039,   817,
     753,   444,   445,   446,   757,   823,   900,   982,   103,   827,
     828,   829,   741,   811,   886,   883,   968,   887,   969,   745,
     658,   659,   759,   837,   660,   924,  1055,   797,   926,   927,
     839,   840,   928,   929,   841,   842,   843,   844,   850,   426,
     590,   591,   592,   216,   217,   218,   223,   224,   225,   787,
     788,   875,  1025,  1070,  1098,  1099,  1100,  1148,   957,   958,
     959,   960,  1074,  1075,  1076,  1077,   440,   830,   181,   441,
     104,   170,   105,   846,   996,   997,   998,   106,   107,   108,
     109,   173,   110,   178,   330,   427,   111,   112,   113,   114,
     115,   191,   116,   117,   118,   119,  1061,   120,   121,   599,
     122,   175,   600,   607,   123,   163,   422,   164,   165,   236,
     237,   490,   238,   694);
  

/* YYTABLE[YYPACT[STATE-NUM]] -- What to do in state STATE-NUM.  If
   positive, shift that token.  If negative, reduce the rule whose
   number is the opposite.  If YYTABLE_NINF, syntax error.  */
  
  /** @var int[] */
  public array $yytable = array(    92,   129,   130,    93,   132,   133,   134,   135,   136,   137,
     138,   139,   140,    97,   460,   149,   150,   151,   152,   153,
     154,   155,   156,   161,   196,   176,   172,   168,   469,   210,
     169,   472,   800,   171,   182,   483,   465,   462,   478,   796,
     162,   222,   190,   190,   707,   143,   143,   856,   190,   499,
     204,   183,   862,  1002,  1030,   -19,   160,   999,   235,    36,
     603,   144,   144,   192,   496,   742,   820,   980,   202,   235,
     235,   755,   334,   347,   597,  -496,   497,   498,  -543,   172,
     328,  -193,   193,  1046,   892,   385,   325,   174,   386,   384,
    -545,   838,   145,   145,     4,   146,   146,   393,  -328,   411,
     463,   420,   342,   420,  -588,  -302,  -591,   912,   421,   938,
     421,  -588,   941,  -591,   919,   219,   920,   383,   131,   166,
     347,   157,   158,  -194,   194,   452,   413,   198,  1044,   463,
     147,   148,   939,   177,   999,   381,   943,   415,   342,   193,
    1023,    36,  1024,  -543,  -543,    88,   336,   382,  1063,   679,
    1065,  1066,   682,    36,   416,  -545,  -545,   464,  -543,   496,
     733,   496,   423,   909,    36,   193,   453,  1028,   910,  1029,
    -543,   497,   190,   497,   434,   350,   -89,   925,   342,   439,
     182,   442,  -545,   447,   448,   210,   668,   143,   177,  1088,
    1020,   947,   433,   435,   473,   474,   981,  -298,   124,  1006,
      36,  1094,   756,   144,   449,   450,  1015,   451,   452,  1017,
    1018,   662,   458,  1021,  1133,   461,  1014,  -272,  1000,   235,
     235,   604,   182,   484,   161,   161,   467,    88,   489,   470,
     698,   890,   348,   335,   145,   141,   476,   146,  -193,    88,
    1041,   162,   162,   124,   988,   989,   989,   992,  -195,   702,
    1003,  1004,  -540,   143,   203,  -328,    36,   160,   160,   654,
     723,   143,   443,  -582,  -588,   684,  -591,  -582,  -588,   144,
    -591,   454,   417,   825,    79,    80,    81,   144,  1147,   348,
    -194,   500,   167,   412,   339,    36,    88,   608,  1068,   838,
     179,    82,   670,  1146,   340,  1000,  1059,  -277,   184,   205,
     145,   794,   795,   146,   504,   205,   157,   158,   145,   220,
     221,   146,   515,   516,   235,   389,   235,  -540,  -540,    79,
      80,    81,   233,   234,    92,   639,   640,    93,   762,   185,
     514,   206,  -540,   207,  1054,   501,    82,  1058,   481,   896,
     186,   901,   -87,    36,  -540,   166,   491,   187,   525,   526,
     527,   529,   530,   531,   532,   533,   534,   535,   536,   537,
     538,   539,   540,   541,   542,   543,   544,   545,   546,   547,
     548,   549,   550,   551,   552,   553,   209,   555,   172,   593,
     390,   391,   209,   601,   190,   171,   626,   609,   188,   611,
     612,   613,   614,   615,   616,   617,   618,   619,   620,   621,
     622,   623,   624,   189,   602,   625,   428,   392,   -87,   628,
     193,  1145,   587,   631,  -490,   492,   763,   161,   519,   520,
     521,   522,   610,   190,   124,   337,    36,   642,   773,   774,
     632,   645,   226,   124,   162,   227,  1129,   205,   859,   174,
     228,   210,   786,   638,   229,   598,   630,   799,   606,   606,
     160,   168,   663,   879,   168,    36,   921,   781,   329,   783,
     222,   141,   881,   898,   899,   605,   605,   230,   809,   831,
     675,   429,   430,  -112,   384,   693,   220,   221,    82,   669,
     493,   494,  -542,   636,  -104,   922,   431,   606,   606,   636,
     637,   705,   706,   517,   518,   904,   641,   907,   432,   172,
      79,    80,    81,    82,   605,   605,   325,   388,   167,    79,
      80,    81,    88,   208,   209,    36,   851,   852,   332,   124,
     172,   233,   234,   716,   387,   902,  -506,   713,  -546,   219,
     937,   410,   946,   382,   198,   124,  -548,   867,   666,   869,
     870,   963,   411,   965,  -541,   884,   885,  -542,  -542,   124,
      36,   129,   130,   231,   132,   133,   134,   135,   419,   176,
     172,   168,  -542,    82,   169,   204,   483,   171,   695,   696,
     810,   424,   793,   813,  -542,   425,  -548,   794,   795,   725,
     718,   233,   234,   436,   821,   438,   728,   729,   220,   221,
     454,   724,   124,   794,   795,    79,    80,    81,   456,   727,
     513,   898,   899,   836,   878,   966,   967,   794,   795,  -541,
    -541,    79,    80,    81,   143,   232,   233,   234,   457,   923,
     459,   174,   157,   158,  -541,    79,    80,    81,    36,   793,
     144,   332,  -495,   836,   468,  1026,  -541,   143,  -547,  1056,
    1057,   738,   471,   182,   990,   991,   749,   331,   333,   891,
     794,   795,   475,   144,   124,   737,   166,   143,   740,   168,
     477,   145,   748,   983,   146,   487,  1051,  -195,    79,    80,
      81,   168,   168,   144,   502,  -510,   645,   143,   744,    36,
     510,   523,   332,   777,   145,   512,   -17,   146,   453,   646,
     775,   141,   643,   144,   233,   234,   648,   205,   651,   719,
     168,   661,   168,   652,   145,   143,   172,   146,   798,   690,
     653,   172,   802,   791,   483,   803,  1079,   593,   791,   665,
     667,   144,   731,   206,   746,   207,   673,   146,   443,   674,
      79,    80,    81,    36,   677,   124,   678,    36,   691,   681,
      36,   692,   732,   680,   495,   233,   234,   378,   379,   380,
     587,   381,   145,   182,   816,   146,   798,  1097,   685,   168,
     688,   686,   747,   382,   689,  1108,  1013,   124,   344,   345,
     346,   143,   141,   208,   209,   897,   898,   899,   697,   700,
     168,   708,   168,   168,  -112,   168,   704,   144,   874,   709,
     776,    59,    60,   977,   898,   899,   341,   711,  1079,   718,
     -67,   714,   351,   -68,   793,   -70,   -69,  1134,   -71,   182,
     -72,    79,    80,    81,    82,   831,   722,   -74,   145,   167,
    1142,   146,   -73,    88,   720,   794,   795,   721,   798,  -574,
     816,   726,   748,   798,  1052,  -576,   702,   734,  -547,   761,
     758,   772,   743,    79,    80,    81,   798,   143,   744,   760,
     872,   923,   463,   764,   778,   780,   818,   375,   376,   377,
     378,   379,   380,   144,   381,   124,   779,   782,  1084,   792,
     172,  1087,   784,   785,   172,   801,   382,   791,  1135,   806,
     814,   961,   819,  -275,   822,   824,   848,   845,   849,  1106,
     857,   855,   995,   979,   746,  1112,   971,   146,   858,   863,
     864,   182,   866,   986,   868,   832,   833,   834,   835,   798,
     798,   798,   798,   871,   877,   876,   880,   888,   882,   798,
     798,   895,   889,   794,   795,  1010,  -273,   903,  1012,   906,
     933,   905,   894,   915,   908,   338,   339,   913,   914,   916,
     918,    79,    80,    81,   930,   931,   340,    59,    60,   836,
    -112,  1128,   341,   935,   798,  -112,   936,  -112,    66,   932,
    1136,   940,   972,   873,   942,  1036,  -112,  -112,  -112,  -112,
    -112,  -112,  -112,  -112,   944,   945,   962,  1047,  1048,  1045,
     964,   973,   970,   974,  1038,   975,   816,  -272,    82,   984,
     976,   912,   987,   978,  1060,   993,  1007,  1008,  1016,   948,
    1009,  1019,  1078,   798,   798,   798,   798,  1022,    82,  1031,
    1032,  1064,  -342,  1034,  1067,   949,   950,   951,   952,   953,
     954,   955,   956,  1033,   995,  1040,  1035,  1042,  1083,  1049,
    -592,  -592,  -592,  -592,   373,   374,   375,   376,   377,   378,
     379,   380,    92,   381,  1050,    93,  -366,  1006,  -366,  1053,
    1062,  1069,  1073,  1085,  1071,   382,  1092,   949,   950,   951,
     952,   953,   954,   955,  1095,  1089,  1102,  1101,  1091,  1093,
    1105,  1107,  1109,  1111,  1117,  1115,  1119,  1120,  1123,  1118,
    1137,  1126,  1127,  1138,  1116,  1103,    92,  1104,  1139,    93,
    1143,  1140,  1144,  1110,  1130,   321,   699,  1114,   212,   671,
     466,   934,  1122,   664,  1124,  1125,   353,   354,   355,   752,
     703,    98,    99,    -5,     5,   172,     6,     7,     8,     9,
      10,   168,   791,   343,   352,    11,    12,   356,    13,   357,
     358,   359,   360,   361,   362,   363,   364,   365,   366,   367,
     368,   369,   370,   371,   372,   373,   374,   375,   376,   377,
     378,   379,   380,   985,   381,   754,   847,  1043,   893,  1005,
     911,  1027,   805,    14,    15,  1121,   382,   672,   676,    16,
     180,    17,    18,    19,    20,    21,    22,    23,    24,    25,
      26,    27,   482,    28,    29,    30,    31,    32,  1090,   635,
     486,    33,    34,    35,  1131,    36,   554,    37,   485,    38,
      39,    40,    41,     0,    42,   633,    43,     0,    44,     0,
       0,    45,    46,     0,     0,     0,    47,    48,    49,    50,
      51,    52,    53,    54,     0,     0,    55,    56,     0,    57,
      58,    59,    60,     0,     0,     0,    61,     0,    62,    63,
      64,    65,    66,  -112,  -112,  -112,     0,     0,     0,     0,
      67,    68,     0,    69,    70,    71,    72,    73,    74,    75,
       0,     0,   511,     0,    76,    77,    78,     0,     0,    79,
      80,    81,    82,    83,     0,    84,    -5,    85,   355,    86,
      87,    88,     5,     0,     6,     7,     8,     9,    10,     0,
       0,     0,     0,    11,    12,     0,    13,   356,     0,   357,
     358,   359,   360,   361,   362,   363,   364,   365,   366,   367,
     368,   369,   370,   371,   372,   373,   374,   375,   376,   377,
     378,   379,   380,     0,   381,     0,     0,     0,     0,     0,
       0,    14,    15,     0,     0,     0,   382,    16,     0,    17,
      18,    19,    20,    21,    22,    23,    24,    25,    26,    27,
       0,    28,    29,    30,    31,    32,  -154,  -154,  -154,    33,
      34,    35,     0,    36,     0,    37,     0,    38,    39,    40,
      41,  -154,    42,  -154,    43,  -154,    44,  -154,     0,    45,
      46,     0,     0,     0,    47,    48,    49,    50,    51,     0,
      53,    54,     0,     0,    55,     0,     0,    57,    58,    59,
      60,     0,     0,     0,    61,     0,    62,    63,    64,   505,
      66,  -112,  -112,  -112,     0,     0,     0,     0,    67,    68,
       0,    69,    70,    71,    72,    73,    74,    75,     0,     0,
       0,     0,     0,    77,    78,     0,     0,    79,    80,    81,
      82,    83,     0,    84,  -154,    85,     0,    86,    87,    88,
       5,   414,     6,     7,     8,     9,    10,     0,     0,     0,
       0,    11,    12,     0,    13,     0,     0,   356,     0,   357,
     358,   359,   360,   361,   362,   363,   364,   365,   366,   367,
     368,   369,   370,   371,   372,   373,   374,   375,   376,   377,
     378,   379,   380,     0,   381,     0,     0,     0,     0,    14,
      15,     0,     0,     0,     0,    16,   382,    17,    18,    19,
      20,    21,    22,    23,    24,    25,    26,    27,     0,    28,
      29,    30,    31,    32,     0,     0,     0,    33,    34,    35,
       0,    36,     0,    37,     0,    38,    39,    40,    41,     0,
      42,     0,    43,     0,    44,     0,     0,    45,    46,  -250,
    -250,  -250,    47,    48,    49,    50,    51,     0,    53,    54,
       0,     0,    55,     0,     0,    57,    58,    59,    60,     0,
       0,     0,    61,     0,    62,    63,    64,   505,    66,  -112,
    -112,  -112,     0,     0,     0,     0,    67,    68,     0,    69,
      70,    71,    72,    73,    74,    75,     0,     0,     0,     0,
       0,    77,    78,     0,     0,    79,    80,    81,    82,    83,
       0,    84,  -250,    85,     0,    86,    87,    88,     5,     0,
       6,     7,     8,     9,    10,     0,     0,     0,     0,    11,
      12,   356,    13,   357,   358,   359,   360,   361,   362,   363,
     364,   365,   366,   367,   368,   369,   370,   371,   372,   373,
     374,   375,   376,   377,   378,   379,   380,     0,   381,     0,
       0,     0,     0,     0,     0,     0,     0,    14,    15,     0,
     382,     0,     0,    16,     0,    17,    18,    19,    20,    21,
      22,    23,    24,    25,    26,    27,     0,    28,    29,    30,
      31,    32,     0,     0,     0,    33,    34,    35,     0,    36,
       0,    37,     0,    38,    39,    40,    41,     0,    42,     0,
      43,     0,    44,     0,     0,    45,    46,  -249,  -249,  -249,
      47,    48,    49,    50,    51,     0,    53,    54,     0,     0,
      55,     0,     0,    57,    58,    59,    60,     0,     0,     0,
      61,     0,    62,    63,    64,   505,    66,  -112,  -112,  -112,
       0,     0,     0,     0,    67,    68,     0,    69,    70,    71,
      72,    73,    74,    75,     0,     0,     0,     0,     0,    77,
      78,     0,     0,    79,    80,    81,    82,    83,     0,    84,
    -249,    85,     0,    86,    87,    88,   594,     0,   239,   240,
     241,   242,   243,     0,   244,   245,   246,   247,   248,   357,
     358,   359,   360,   361,   362,   363,   364,   365,   366,   367,
     368,   369,   370,   371,   372,   373,   374,   375,   376,   377,
     378,   379,   380,     0,   381,     0,     0,     0,     0,     0,
       0,     0,     0,     0,     0,     0,   382,     0,     0,     0,
       0,     0,   249,     0,     0,     0,     0,     0,     0,     0,
       0,     0,     0,     0,     0,     0,   250,   251,   252,   253,
     254,   255,   256,     0,     0,   595,     0,    36,     0,     0,
       0,     0,   258,   259,   260,   261,   262,   263,   264,   265,
     266,   267,   268,   269,   270,   271,   272,   273,   274,   275,
     276,   277,   278,   279,   280,   281,   282,   283,   284,   285,
     286,   287,   288,   289,   290,   291,   292,   293,   294,   295,
     296,   297,   298,   299,   300,   301,   302,   303,   304,   305,
       0,     0,   306,   307,   308,   309,   310,   311,   312,   313,
     314,     0,     0,     0,     0,     0,   315,   316,   317,     0,
       5,     0,     6,     7,     8,     9,    10,   596,     0,     0,
       0,    11,    12,    88,    13,     0,     0,     0,     0,     0,
       0,     0,     0,     0,     0,     0,     0,     0,     0,     0,
     736,     0,     0,     0,     0,     0,     0,     0,     0,     0,
       0,     0,     0,     0,     0,     0,     0,     0,     0,    14,
      15,     0,     0,     0,     0,    16,     0,    17,    18,    19,
      20,    21,    22,    23,    24,    25,    26,    27,     0,    28,
      29,    30,    31,    32,     0,     0,     0,    33,    34,    35,
       0,    36,     0,    37,     0,    38,    39,    40,    41,     0,
      42,     0,    43,     0,    44,     0,     0,    45,    46,     0,
       0,     0,    47,    48,    49,   125,    51,     0,    53,    54,
       0,     0,    55,     0,     0,    57,    58,     0,     0,     0,
       0,     0,   127,     0,    62,    63,    64,     0,     0,     0,
       0,     0,     0,     0,     0,     0,    67,    68,     0,    69,
      70,    71,    72,    73,    74,    75,     0,     0,     0,     0,
       0,    77,    78,     0,     0,    79,    80,    81,    82,    83,
       0,    84,     0,    85,     0,    86,    87,    88,     5,     0,
       6,     7,     8,     9,    10,     0,     0,     0,     0,    11,
      12,     0,    13,     0,     0,     0,     0,     0,     0,     0,
       0,     0,     0,     0,     0,     0,     0,     0,   739,     0,
       0,     0,     0,     0,     0,     0,     0,     0,     0,     0,
       0,     0,     0,     0,     0,     0,     0,    14,    15,     0,
       0,     0,     0,    16,     0,    17,    18,    19,    20,    21,
      22,    23,    24,    25,    26,    27,     0,    28,    29,    30,
      31,    32,     0,     0,     0,    33,    34,    35,     0,    36,
       0,    37,     0,    38,    39,    40,    41,     0,    42,     0,
      43,     0,    44,     0,     0,    45,    46,     0,     0,     0,
      47,    48,    49,   125,    51,     0,    53,    54,     0,     0,
      55,     0,     0,    57,    58,     0,     0,     0,     0,     0,
     127,     0,    62,    63,    64,     0,     0,     0,     0,     0,
       0,     0,     0,     0,    67,    68,     0,    69,    70,    71,
      72,    73,    74,    75,     0,     0,     0,     0,     0,    77,
      78,     0,     0,    79,    80,    81,    82,    83,     0,    84,
       0,    85,     0,    86,    87,    88,     5,     0,     6,     7,
       8,     9,    10,     0,     0,     0,     0,    11,    12,     0,
      13,     0,     0,     0,     0,     0,     0,     0,     0,     0,
       0,     0,     0,     0,     0,     0,   750,     0,     0,     0,
       0,     0,     0,     0,     0,     0,     0,     0,     0,     0,
       0,     0,     0,     0,     0,    14,    15,     0,     0,     0,
       0,    16,     0,    17,    18,    19,    20,    21,    22,    23,
      24,    25,    26,    27,     0,    28,    29,    30,    31,    32,
       0,     0,     0,    33,    34,    35,     0,    36,     0,    37,
       0,    38,    39,    40,    41,     0,    42,     0,    43,     0,
      44,     0,     0,    45,    46,     0,     0,     0,    47,    48,
      49,   125,    51,     0,    53,    54,     0,     0,    55,     0,
       0,    57,    58,     0,     0,     0,     0,     0,   127,     0,
      62,    63,    64,     0,     0,     0,     0,     0,     0,     0,
       0,     0,    67,    68,     0,    69,    70,    71,    72,    73,
      74,    75,     0,     0,     0,     0,     0,    77,    78,     0,
       0,    79,    80,    81,    82,   751,     0,    84,     0,    85,
       0,    86,    87,    88,     5,     0,     6,     7,     8,     9,
      10,     0,     0,     0,     0,    11,    12,     0,    13,     0,
       0,     0,     0,     0,     0,     0,     0,     0,     0,     0,
       0,     0,     0,     0,   815,     0,     0,     0,     0,     0,
       0,     0,     0,     0,     0,     0,     0,     0,     0,     0,
       0,     0,     0,    14,    15,     0,     0,     0,     0,    16,
       0,    17,    18,    19,    20,    21,    22,    23,    24,    25,
      26,    27,     0,    28,    29,    30,    31,    32,     0,     0,
       0,    33,    34,    35,     0,    36,     0,    37,     0,    38,
      39,    40,    41,     0,    42,     0,    43,     0,    44,     0,
       0,    45,    46,     0,     0,     0,    47,    48,    49,   125,
      51,     0,    53,    54,     0,     0,    55,     0,     0,    57,
      58,     0,     0,     0,     0,     0,   127,     0,    62,    63,
      64,     0,     0,     0,     0,     0,     0,     0,     0,     0,
      67,    68,     0,    69,    70,    71,    72,    73,    74,    75,
       0,     0,     0,     0,     0,    77,    78,     0,     0,    79,
      80,    81,    82,    83,     0,    84,     0,    85,     0,    86,
      87,    88,     5,     0,     6,     7,     8,     9,    10,     0,
       0,     0,     0,    11,    12,     0,    13,     0,     0,     0,
       0,     0,     0,     0,     0,     0,     0,     0,     0,     0,
       0,     0,  1037,     0,     0,     0,     0,     0,     0,     0,
       0,     0,     0,     0,     0,     0,     0,     0,     0,     0,
       0,    14,    15,     0,     0,     0,     0,    16,     0,    17,
      18,    19,    20,    21,    22,    23,    24,    25,    26,    27,
       0,    28,    29,    30,    31,    32,     0,     0,     0,    33,
      34,    35,     0,    36,     0,    37,     0,    38,    39,    40,
      41,     0,    42,     0,    43,     0,    44,     0,     0,    45,
      46,     0,     0,     0,    47,    48,    49,   125,    51,     0,
      53,    54,     0,     0,    55,     0,     0,    57,    58,     0,
       0,     0,     0,     0,   127,     0,    62,    63,    64,     0,
       0,     0,     0,     0,     0,     0,     0,     0,    67,    68,
       0,    69,    70,    71,    72,    73,    74,    75,     0,     0,
       0,     0,     0,    77,    78,     0,     0,    79,    80,    81,
      82,    83,     0,    84,     0,    85,     0,    86,    87,    88,
       5,     0,     6,     7,     8,     9,    10,     0,     0,     0,
       0,    11,    12,     0,    13,     0,   359,   360,   361,   362,
     363,   364,   365,   366,   367,   368,   369,   370,   371,   372,
     373,   374,   375,   376,   377,   378,   379,   380,     0,   381,
       0,     0,     0,     0,     0,     0,     0,     0,     0,    14,
      15,   382,     0,     0,     0,    16,     0,    17,    18,    19,
      20,    21,    22,    23,    24,    25,    26,    27,     0,    28,
      29,    30,    31,    32,     0,     0,     0,    33,    34,    35,
       0,    36,     0,    37,     0,    38,    39,    40,    41,     0,
      42,     0,    43,     0,    44,     0,     0,    45,    46,     0,
       0,     0,    47,    48,    49,   125,    51,     0,    53,    54,
       0,     0,    55,     0,     0,    57,    58,     0,     0,     0,
       0,     0,   127,     0,    62,    63,    64,     0,     0,     0,
       0,     0,     0,     0,     0,     0,    67,    68,     0,    69,
      70,    71,    72,    73,    74,    75,     0,     0,     0,     0,
       0,    77,    78,     0,     0,    79,    80,    81,    82,    83,
       0,    84,     0,    85,     0,    86,    87,    88,   556,   557,
     558,   559,   560,     0,   244,   245,   246,   561,   562,     0,
      13,   362,   363,   364,   365,   366,   367,   368,   369,   370,
     371,   372,   373,   374,   375,   376,   377,   378,   379,   380,
       0,   381,   157,   158,     0,     0,     0,     0,     0,     0,
       0,     0,     0,   382,     0,    14,    15,     0,     0,     0,
       0,    16,   249,    17,    18,    19,    20,    21,    22,    23,
      24,    25,    26,    27,     0,    28,   563,   564,   565,   253,
     254,   255,   256,    33,    34,   566,     0,    36,     0,     0,
       0,    38,   258,   259,   260,   261,   262,   263,   264,   265,
     266,   267,   268,   269,   567,   271,   272,   273,   274,   275,
     276,   568,   569,   279,   280,   281,   282,   283,   570,   285,
     286,   287,   571,   289,   290,   291,   292,   293,   572,   295,
     296,   573,   574,   299,   300,   301,   302,   303,   304,   305,
       0,     0,   575,   576,   308,   577,   578,   579,   580,   581,
     582,    75,     0,     0,     0,     0,   315,   583,   584,     0,
     585,    79,    80,    81,    82,     0,     0,     0,     0,    85,
     586,    86,    87,    88,   556,   557,   558,   559,   560,     0,
     244,   245,   246,   561,   562,     0,    13,   364,   365,   366,
     367,   368,   369,   370,   371,   372,   373,   374,   375,   376,
     377,   378,   379,   380,     0,   381,     0,     0,   157,   158,
       0,     0,     0,     0,     0,     0,     0,   382,     0,     0,
       0,    14,    15,     0,     0,     0,     0,    16,   249,    17,
      18,    19,    20,    21,    22,    23,    24,    25,    26,    27,
       0,    28,   563,   564,   565,   253,   254,   255,   256,    33,
      34,   566,     0,    36,     0,     0,     0,    38,   258,   259,
     260,   261,   262,   263,   264,   265,   266,   267,   268,   269,
     567,   271,   272,   273,   274,   275,   276,   568,   569,   279,
     280,   281,   282,   283,   570,   285,   286,   287,   571,   289,
     290,   291,   292,   293,   572,   295,   296,   573,   574,   299,
     300,   301,   302,   303,   304,   305,     0,     0,   575,   576,
     308,   577,   578,   579,   580,   581,   582,    75,     0,     0,
       0,     0,   315,   583,   584,     0,   804,    79,    80,    81,
      82,     0,     0,     0,     0,    85,     0,    86,    87,    88,
       6,     7,     8,     9,    10,     0,     0,     0,     0,    11,
      12,     0,    13,  -592,  -592,  -592,  -592,  -592,   369,   370,
     371,   372,   373,   374,   375,   376,   377,   378,   379,   380,
       0,   381,     0,     0,   157,   158,     0,     0,     0,     0,
       0,     0,     0,   382,     0,     0,     0,    14,    15,     0,
       0,     0,     0,    16,     0,    17,    18,    19,    20,    21,
      22,    23,    24,    25,    26,    27,     0,    28,    29,    30,
      31,     0,     0,     0,     0,    33,    34,   124,     0,    36,
       0,     0,     0,    38,     0,     0,     0,     0,     0,     0,
       0,     0,     0,     0,     0,     0,    46,     0,     0,     0,
       0,     0,     0,   125,    51,     0,     0,     0,     0,     0,
      55,     0,     0,     0,   126,     0,     0,     0,     0,     0,
     127,     0,     0,    63,    64,     0,     0,     0,     0,     0,
       0,     0,     0,     0,    67,    68,     0,    69,    70,    71,
      72,    73,    74,    75,     0,     0,     0,     0,     0,    77,
      78,     0,   159,    79,    80,    81,    82,     0,     0,     0,
       0,    85,     0,    86,    87,    88,     6,     7,     8,     9,
      10,     0,     0,     0,     0,    11,    12,     0,    13,     0,
       0,     0,     0,     0,     0,     0,     0,     0,     0,     0,
       0,     0,     0,     0,     0,     0,     0,     0,     0,     0,
     157,   158,     0,     0,     0,     0,     0,     0,     0,     0,
       0,     0,     0,    14,    15,     0,     0,     0,     0,    16,
       0,    17,    18,    19,    20,    21,    22,    23,    24,    25,
      26,    27,     0,    28,    29,    30,    31,     0,     0,     0,
       0,    33,    34,   124,     0,    36,     0,     0,     0,    38,
       0,     0,     0,     0,     0,     0,     0,     0,     0,     0,
       0,     0,    46,     0,     0,     0,     0,     0,     0,   125,
      51,     0,     0,     0,     0,     0,    55,     0,     0,     0,
     126,     0,     0,     0,     0,     0,   127,     0,     0,    63,
      64,     0,     0,     0,     0,     0,     0,     0,     0,     0,
      67,    68,     0,    69,    70,    71,    72,    73,    74,    75,
       0,     0,     0,     0,     0,    77,    78,     0,     0,    79,
      80,    81,    82,     0,   353,   354,   355,    85,     0,    86,
      87,    88,     6,     7,     8,     9,    10,     0,     0,     0,
       0,    11,    12,     0,    13,   356,     0,   357,   358,   359,
     360,   361,   362,   363,   364,   365,   366,   367,   368,   369,
     370,   371,   372,   373,   374,   375,   376,   377,   378,   379,
     380,     0,   381,     0,     0,     0,     0,     0,     0,    14,
      15,     0,     0,     0,   382,    16,     0,    17,    18,    19,
      20,    21,    22,    23,    24,    25,    26,    27,     0,    28,
      29,    30,    31,     0,     0,     0,     0,    33,    34,   124,
     488,    36,     0,     0,     0,    38,     0,     0,     0,     0,
       0,     0,     0,     0,     0,     0,     0,     0,    46,     0,
       0,     0,     0,     0,     0,   125,    51,     0,     0,     0,
       0,     0,    55,     0,     0,     0,   126,     0,     0,     0,
       0,     0,   127,     0,     0,    63,    64,     0,     0,     0,
       0,     0,     0,     0,     0,     0,    67,    68,     0,    69,
      70,    71,    72,    73,    74,    75,     0,     0,     0,     0,
     627,    77,    78,     0,     0,    79,    80,    81,    82,     0,
       0,     0,     0,    85,     0,    86,    87,    88,     6,     7,
       8,     9,    10,     0,     0,     0,     0,    11,    12,     0,
      13,     0,     0,     0,     0,     0,     0,    28,     0,     0,
       0,     0,     0,     0,     0,     0,   528,   124,     0,    36,
       0,     0,     0,    38,     0,     0,     0,     0,     0,     0,
       0,     0,     0,     0,     0,    14,    15,     0,     0,     0,
       0,    16,     0,    17,    18,    19,    20,    21,    22,    23,
      24,    25,    26,    27,   141,    28,    29,    30,    31,     0,
     127,     0,     0,    33,    34,   124,     0,    36,     0,     0,
       0,    38,     0,     0,     0,    68,     0,    69,    70,    71,
      72,    73,    74,     0,    46,     0,     0,     0,     0,    77,
      78,   125,    51,    79,    80,    81,     0,     0,    55,     0,
       0,   142,   126,     0,    87,    88,     0,     0,   127,     0,
       0,    63,    64,     0,     0,     0,     0,     0,     0,     0,
       0,     0,    67,    68,     0,    69,    70,    71,    72,    73,
      74,    75,     0,     0,     0,     0,     0,    77,    78,     0,
       0,    79,    80,    81,    82,     0,     0,     0,     0,    85,
       0,    86,    87,    88,     6,     7,     8,     9,    10,     0,
       0,     0,     0,    11,    12,     0,    13,     0,     0,     0,
       0,     0,     0,     0,     0,     0,     0,     0,     0,     0,
       0,     0,   -52,     0,     0,     0,     0,     0,     0,     0,
       0,     0,     0,     0,     0,     0,     0,     0,     0,     0,
       0,    14,    15,     0,     0,     0,     0,    16,     0,    17,
      18,    19,    20,    21,    22,    23,    24,    25,    26,    27,
       0,    28,    29,    30,    31,     0,     0,     0,     0,    33,
      34,   124,     0,    36,     0,     0,     0,    38,     0,     0,
       0,     0,     0,     0,     0,     0,     0,     0,     0,     0,
      46,     0,     0,     0,     0,     0,     0,   125,    51,     0,
       0,     0,     0,     0,    55,     0,     0,     0,   126,     0,
       0,     0,     0,     0,   127,     0,     0,    63,    64,     0,
       0,     0,     0,     0,     0,     0,     0,     0,    67,    68,
       0,    69,    70,    71,    72,    73,    74,    75,     0,     0,
       0,     0,     0,    77,    78,     0,     0,    79,    80,    81,
      82,     0,   353,   354,   355,    85,     0,    86,    87,    88,
       6,     7,     8,     9,    10,     0,     0,     0,     0,    11,
      12,     0,    13,   356,     0,   357,   358,   359,   360,   361,
     362,   363,   364,   365,   366,   367,   368,   369,   370,   371,
     372,   373,   374,   375,   376,   377,   378,   379,   380,     0,
     381,     0,     0,     0,     0,     0,     0,    14,    15,     0,
       0,     0,   382,    16,     0,    17,    18,    19,    20,    21,
      22,    23,    24,    25,    26,    27,     0,    28,    29,    30,
      31,     0,     0,     0,     0,    33,    34,   124,     0,    36,
       0,     0,     0,    38,     0,     0,     0,     0,     0,     0,
       0,     0,     0,     0,     0,     0,    46,     0,     0,   826,
       0,     0,     0,   125,    51,     0,     0,     0,     0,     0,
      55,     0,     0,     0,   126,     0,     0,     0,     0,     0,
     127,     0,     0,    63,    64,     0,     0,     0,     0,     0,
       0,     0,     0,     0,    67,    68,     0,    69,    70,    71,
      72,    73,    74,    75,     0,     0,     0,     0,   629,    77,
      78,     0,     0,    79,    80,    81,    82,     0,   353,   354,
     355,    85,     0,    86,    87,    88,     6,     7,     8,     9,
      10,     0,     0,     0,     0,    11,    12,     0,    13,   356,
       0,   357,   358,   359,   360,   361,   362,   363,   364,   365,
     366,   367,   368,   369,   370,   371,   372,   373,   374,   375,
     376,   377,   378,   379,   380,     0,   381,     0,     0,     0,
       0,     0,     0,    14,    15,     0,     0,     0,   382,    16,
       0,    17,    18,    19,    20,    21,    22,    23,    24,    25,
      26,    27,     0,    28,    29,    30,    31,     0,     0,     0,
       0,    33,    34,   124,     0,    36,     0,     0,     0,    38,
       0,     0,     0,     0,     0,     0,     0,     0,     0,     0,
       0,     0,    46,     0,     0,     0,     0,     0,     0,   125,
      51,     0,     0,     0,     0,     0,    55,     0,     0,     0,
     126,     0,     0,     0,     0,     0,   127,     0,     0,    63,
      64,     0,     0,     0,     0,     0,     0,     0,     0,     0,
      67,    68,     0,    69,    70,    71,    72,    73,    74,    75,
       0,     0,     0,     0,   634,    77,    78,     0,     0,    79,
      80,    81,    82,   353,   354,   355,     0,    85,     0,    86,
      87,    88,   239,   240,   241,   242,   243,     0,   244,   245,
     246,   247,   248,     0,   356,     0,   357,   358,   359,   360,
     361,   362,   363,   364,   365,   366,   367,   368,   369,   370,
     371,   372,   373,   374,   375,   376,   377,   378,   379,   380,
       0,   381,     0,     0,     0,     0,     0,     0,     0,     0,
       0,     0,     0,   382,     0,     0,   249,     0,     0,     0,
       0,     0,     0,     0,     0,     0,     0,     0,     0,     0,
     250,   251,   252,   253,   254,   255,   256,     0,     0,   566,
       0,     0,     0,     0,     0,     0,   258,   259,   260,   261,
     262,   263,   264,   265,   266,   267,   268,   269,   270,   271,
     272,   273,   274,   275,   276,   277,   278,   279,   280,   281,
     282,   283,   284,   285,   286,   287,   288,   289,   290,   291,
     292,   293,   294,   295,   296,   297,   298,   299,   300,   301,
     302,   303,   304,   305,     0,     0,   306,   307,   308,   309,
     310,   311,   312,   313,   314,     0,     0,     0,     0,   644,
     315,   316,   317,     0,     0,    79,    80,    81,   353,   354,
     355,     0,  1096,   239,   240,   241,   242,   243,     0,   244,
     245,   246,   247,   248,     0,     0,     0,     0,     0,   356,
       0,   357,   358,   359,   360,   361,   362,   363,   364,   365,
     366,   367,   368,   369,   370,   371,   372,   373,   374,   375,
     376,   377,   378,   379,   380,     0,   381,     0,     0,     0,
       0,     0,     0,     0,     0,     0,     0,   249,   382,     0,
       0,     0,     0,     0,     0,     0,     0,     0,     0,     0,
       0,   250,   251,   252,   253,   254,   255,   256,     0,     0,
     257,     0,     0,     0,     0,     0,     0,   258,   259,   260,
     261,   262,   263,   264,   265,   266,   267,   268,   269,   270,
     271,   272,   273,   274,   275,   276,   277,   278,   279,   280,
     281,   282,   283,   284,   285,   286,   287,   288,   289,   290,
     291,   292,   293,   294,   295,   296,   297,   298,   299,   300,
     301,   302,   303,   304,   305,     0,     0,   306,   307,   308,
     309,   310,   311,   312,   313,   314,   347,     0,     0,     0,
     865,   315,   316,   317,   353,   354,   355,   318,     0,     0,
       0,     0,   319,     0,     0,     0,     0,     0,     0,     0,
       0,     0,     0,     0,     0,   356,     0,   357,   358,   359,
     360,   361,   362,   363,   364,   365,   366,   367,   368,   369,
     370,   371,   372,   373,   374,   375,   376,   377,   378,   379,
     380,     0,   381,     0,     0,     0,     0,     0,     0,     0,
       0,     0,     0,     0,   382,     0,     0,   353,   354,   355,
       0,     0,   239,   240,   241,   242,   243,     0,   244,   245,
     246,   247,   248,     0,     0,     0,     0,     0,   356,     0,
     357,   358,   359,   360,   361,   362,   363,   364,   365,   366,
     367,   368,   369,   370,   371,   372,   373,   374,   375,   376,
     377,   378,   379,   380,     0,   381,     0,     0,     0,     0,
       0,     0,     0,     0,     0,     0,   249,   382,     0,     0,
       0,     0,     0,     0,     0,     0,     0,     0,     0,     0,
     250,   251,   252,   253,   254,   255,   256,     0,     0,   595,
       0,     0,     0,     0,     0,   348,   258,   259,   260,   261,
     262,   263,   264,   265,   266,   267,   268,   269,   270,   271,
     272,   273,   274,   275,   276,   277,   278,   279,   280,   281,
     282,   283,   284,   285,   286,   287,   288,   289,   290,   291,
     292,   293,   294,   295,   296,   297,   298,   299,   300,   301,
     302,   303,   304,   305,     0,     0,   306,   307,   308,   309,
     310,   311,   312,   313,   314,   353,   354,   355,     0,     0,
     315,   316,   317,   647,     0,     0,     0,     0,     0,  1141,
       0,     0,     0,     0,     0,     0,   356,     0,   357,   358,
     359,   360,   361,   362,   363,   364,   365,   366,   367,   368,
     369,   370,   371,   372,   373,   374,   375,   376,   377,   378,
     379,   380,     0,   381,   353,   354,   355,     0,     0,     0,
       0,     0,     0,     0,     0,   382,     0,     0,     0,     0,
       0,     0,     0,     0,     0,   356,     0,   357,   358,   359,
     360,   361,   362,   363,   364,   365,   366,   367,   368,   369,
     370,   371,   372,   373,   374,   375,   376,   377,   378,   379,
     380,     0,   381,   353,   354,   355,     0,     0,     0,     0,
       0,     0,     0,     0,   382,     0,     0,     0,     0,     0,
       0,     0,     0,     0,   356,     0,   357,   358,   359,   360,
     361,   362,   363,   364,   365,   366,   367,   368,   369,   370,
     371,   372,   373,   374,   375,   376,   377,   378,   379,   380,
       0,   381,   353,   354,   355,     0,     0,     0,     0,     0,
       0,   655,     0,   382,     0,     0,     0,     0,     0,     0,
       0,     0,     0,   356,     0,   357,   358,   359,   360,   361,
     362,   363,   364,   365,   366,   367,   368,   369,   370,   371,
     372,   373,   374,   375,   376,   377,   378,   379,   380,     0,
     381,   353,   354,   355,     0,     0,     0,     0,     0,     0,
     656,     0,   382,     0,     0,     0,     0,     0,     0,     0,
       0,     0,   356,     0,   357,   358,   359,   360,   361,   362,
     363,   364,   365,   366,   367,   368,   369,   370,   371,   372,
     373,   374,   375,   376,   377,   378,   379,   380,     0,   381,
     353,   354,   355,     0,     0,     0,     0,     0,     0,   683,
       0,   382,     0,     0,     0,     0,     0,     0,     0,     0,
       0,   356,     0,   357,   358,   359,   360,   361,   362,   363,
     364,   365,   366,   367,   368,   369,   370,   371,   372,   373,
     374,   375,   376,   377,   378,   379,   380,     0,   381,   353,
     354,   355,     0,     0,     0,     0,     0,     0,   812,     0,
     382,     0,     0,     0,     0,     0,     0,     0,     0,     0,
     356,     0,   357,   358,   359,   360,   361,   362,   363,   364,
     365,   366,   367,   368,   369,   370,   371,   372,   373,   374,
     375,   376,   377,   378,   379,   380,     0,   381,   353,   354,
     355,     0,     0,     0,     0,     0,     0,  1086,     0,   382,
       0,     0,     0,     0,     0,     0,     0,     0,     0,   356,
       0,   357,   358,   359,   360,   361,   362,   363,   364,   365,
     366,   367,   368,   369,   370,   371,   372,   373,   374,   375,
     376,   377,   378,   379,   380,     0,   381,   353,   354,   355,
       0,     0,     0,     0,     0,     0,  1113,     0,   382,     0,
       0,     0,     0,     0,     0,     0,     0,     0,   356,     0,
     357,   358,   359,   360,   361,   362,   363,   364,   365,   366,
     367,   368,   369,   370,   371,   372,   373,   374,   375,   376,
     377,   378,   379,   380,     0,   381,   353,   354,   355,     0,
       0,     0,     0,   687,     0,     0,     0,   382,     0,     0,
       0,     0,     0,     0,     0,     0,     0,   356,     0,   357,
     358,   359,   360,   361,   362,   363,   364,   365,   366,   367,
     368,   369,   370,   371,   372,   373,   374,   375,   376,   377,
     378,   379,   380,     0,   381,   353,   354,   355,     0,     0,
       0,     0,   701,     0,     0,     0,   382,     0,     0,     0,
       0,     0,     0,     0,     0,     0,   356,     0,   357,   358,
     359,   360,   361,   362,   363,   364,   365,   366,   367,   368,
     369,   370,   371,   372,   373,   374,   375,   376,   377,   378,
     379,   380,     0,   381,   353,   354,   355,     0,     0,     0,
       0,   730,     0,     0,     0,   382,     0,     0,     0,     0,
       0,     0,     0,     0,     0,   356,     0,   357,   358,   359,
     360,   361,   362,   363,   364,   365,   366,   367,   368,   369,
     370,   371,   372,   373,   374,   375,   376,   377,   378,   379,
     380,     0,   381,   353,   354,   355,     0,     0,     0,     0,
     735,     0,     0,     0,   382,     0,     0,     0,     0,     0,
       0,     0,     0,     0,   356,   980,   357,   358,   359,   360,
     361,   362,   363,   364,   365,   366,   367,   368,   369,   370,
     371,   372,   373,   374,   375,   376,   377,   378,   379,   380,
       0,   381,     0,     0,     0,     0,     0,     0,     0,   807,
       0,     0,     0,   382,     0,     0,     0,     0,     0,     0,
       0,   239,   240,   241,   242,   243,     0,   244,   245,   246,
     247,   248,   360,   361,   362,   363,   364,   365,   366,   367,
     368,   369,   370,   371,   372,   373,   374,   375,   376,   377,
     378,   379,   380,     0,   381,     0,     0,     0,   808,     0,
       0,     0,     0,     0,     0,     0,   382,     0,     0,     0,
       0,     0,     0,     0,     0,   249,     0,     0,     0,     0,
       0,     0,     0,     0,     0,     0,     0,     0,     0,   250,
     251,   252,   253,   254,   255,   256,     0,     0,   595,     0,
       0,     0,     0,     0,   981,   258,   259,   260,   261,   262,
     263,   264,   265,   266,   267,   268,   269,   270,   271,   272,
     273,   274,   275,   276,   277,   278,   279,   280,   281,   282,
     283,   284,   285,   286,   287,   288,   289,   290,   291,   292,
     293,   294,   295,   296,   297,   298,   299,   300,   301,   302,
     303,   304,   305,     0,     0,   306,   307,   308,   309,   310,
     311,   312,   313,   314,   353,   354,   355,     0,     0,   315,
     316,   317,   239,   240,   241,   242,   243,     0,   244,   245,
     246,   247,   248,     0,     0,   356,   717,   357,   358,   359,
     360,   361,   362,   363,   364,   365,   366,   367,   368,   369,
     370,   371,   372,   373,   374,   375,   376,   377,   378,   379,
     380,     0,   381,     0,     0,     0,     0,     0,     0,     0,
       0,     0,     0,     0,   382,     0,   249,     0,     0,     0,
       0,     0,     0,     0,     0,     0,     0,     0,     0,     0,
     250,   251,   252,   253,   254,   255,   256,     0,     0,   193,
       0,     0,     0,     0,     0,     0,   258,   259,   260,   261,
     262,   263,   264,   265,   266,   267,   268,   269,   270,   271,
     272,   273,   274,   275,   276,   277,   278,   279,   280,   281,
     282,   283,   284,   285,   286,   287,   949,   950,   951,   952,
     953,   954,   955,   295,   296,   297,   298,   299,   300,   301,
     302,   303,   304,   305,   157,   158,   306,   307,   308,   309,
     310,   311,   312,   313,   314,     0,     0,     0,     0,     0,
     315,   316,   317,   394,   395,   396,   397,   398,   399,   400,
     401,   402,   403,   404,   405,   406,   407,    28,     0,     0,
       0,     0,     0,     0,     0,     0,     0,   124,     0,    36,
       0,     0,     0,    38,     0,     0,     0,     0,     0,     0,
       0,     0,     0,     0,     0,     0,   408,   409,     0,     0,
       0,     0,     0,     0,     0,     0,     0,  -540,     0,     0,
       0,     0,     0,     0,   141,     0,     0,     0,     0,     0,
     127,     0,     0,     0,     0,     0,     0,     0,     0,     0,
       0,     0,     0,     0,    67,    68,     0,    69,    70,    71,
      72,    73,    74,     0,     0,     0,     0,     0,     0,    77,
      78,     0,     0,    79,    80,    81,     0,     0,     0,     0,
       0,   142,     0,     0,    87,    88,     0,     0,     0,   649,
       0,     0,  -540,  -540,     0,     0,     0,   353,   354,   355,
       0,     0,     0,     0,     0,     0,     0,  -540,     0,     0,
       0,     0,     0,     0,     0,     0,     0,     0,   356,  -540,
     357,   358,   359,   360,   361,   362,   363,   364,   365,   366,
     367,   368,   369,   370,   371,   372,   373,   374,   375,   376,
     377,   378,   379,   380,     0,   381,     0,     0,     0,     0,
       0,     0,     0,     0,     0,     0,     0,   382,     0,     0,
       0,     0,     0,   353,   354,   355,     0,     0,   418,     0,
       0,     0,     0,     0,     0,     0,     0,     0,     0,     0,
       0,     0,     0,     0,   356,   650,   357,   358,   359,   360,
     361,   362,   363,   364,   365,   366,   367,   368,   369,   370,
     371,   372,   373,   374,   375,   376,   377,   378,   379,   380,
       0,   381,   353,   354,   355,     0,     0,     0,     0,     0,
       0,     0,     0,   382,     0,     0,     0,     0,     0,     0,
       0,     0,     0,   356,     0,   357,   358,   359,   360,   361,
     362,   363,   364,   365,   366,   367,   368,   369,   370,   371,
     372,   373,   374,   375,   376,   377,   378,   379,   380,     0,
     381,   354,   355,     0,     0,     0,     0,     0,     0,     0,
       0,     0,   382,     0,     0,     0,     0,     0,     0,     0,
       0,   356,     0,   357,   358,   359,   360,   361,   362,   363,
     364,   365,   366,   367,   368,   369,   370,   371,   372,   373,
     374,   375,   376,   377,   378,   379,   380,     0,   381,     0,
       0,     0,     0,     0,     0,     0,     0,     0,     0,     0,
     382,   361,   362,   363,   364,   365,   366,   367,   368,   369,
     370,   371,   372,   373,   374,   375,   376,   377,   378,   379,
     380,     0,   381,     0,     0,     0,     0,     0,     0,     0,
       0,     0,     0,     0,   382);
  


  /** @var int[] */
  public array $yycheck = array(     2,     6,     7,     2,     9,    10,    11,    12,    13,    14,
      15,    16,    17,     2,   200,    20,    21,    22,    23,    24,
      25,    26,    27,    28,    50,    30,    29,    29,   214,    56,
      29,   217,   714,    29,    39,   227,   212,   203,   224,   711,
      28,    58,    47,    48,   519,    18,    19,   767,    53,   319,
      55,    40,   772,   920,   959,    31,    28,     1,    75,    82,
       1,    18,    19,    48,   236,   648,    14,    31,    53,    86,
      87,    31,     1,     1,   387,   150,   236,   237,    70,    82,
      85,     8,    80,     1,   819,   106,    82,    29,   109,   164,
      70,   759,    18,    19,     0,    18,    19,   118,     8,   125,
      97,     1,    92,     1,     1,    35,     1,    37,     8,   863,
       8,     8,   866,     8,   846,    57,   848,   104,   164,     1,
       1,    37,    38,     8,    49,   123,   131,    52,   982,    97,
      18,    19,   864,   164,     1,    57,   868,   142,   128,    80,
     160,    82,   162,   135,   136,   168,    88,    69,  1015,   480,
    1017,  1018,   483,    82,   159,   135,   136,   154,   150,   331,
     635,   333,   167,   831,    82,    80,   164,   106,   836,   108,
     162,   331,   177,   333,   179,   100,    31,   849,   168,   184,
     185,   186,   162,   188,   189,   212,   154,   160,   164,  1043,
     944,   873,   177,   180,   220,   221,   160,    35,    80,    37,
      82,  1068,   162,   160,   191,   192,   938,   194,   123,   941,
     942,   456,   199,   945,  1119,   202,   936,   165,   162,   236,
     237,   162,   227,   228,   229,   230,   213,   168,   233,   216,
     500,   814,   160,   162,   160,   117,   223,   160,   165,   168,
     975,   229,   230,    80,   912,   913,   914,   915,   164,   164,
     922,   923,    70,   226,   162,   165,    82,   229,   230,   445,
     591,   234,   187,   161,   161,   165,   161,   165,   165,   226,
     165,   196,   160,   756,   156,   157,   158,   234,  1145,   160,
     165,   162,   164,   106,   107,    82,   168,   391,  1020,   957,
     164,   159,   468,   160,   117,   162,    35,   165,   164,    80,
     226,   138,   139,   226,   325,    80,    37,    38,   234,   106,
     107,   234,   338,   339,   331,    70,   333,   135,   136,   156,
     157,   158,   148,   149,   326,   429,   430,   326,   659,   164,
     335,   106,   150,   108,  1006,   322,   159,  1009,   226,   822,
     164,   824,    31,    82,   162,     1,   234,   164,   353,   354,
     355,   356,   357,   358,   359,   360,   361,   362,   363,   364,
     365,   366,   367,   368,   369,   370,   371,   372,   373,   374,
     375,   376,   377,   378,   379,   380,   157,   382,   381,   384,
     135,   136,   157,   388,   389,   381,   412,   392,   164,   394,
     395,   396,   397,   398,   399,   400,   401,   402,   403,   404,
     405,   406,   407,   164,   389,   410,    70,   162,    97,   414,
      80,  1143,   384,   418,   164,    70,   661,   422,   343,   344,
     345,   346,   394,   428,    80,    31,    82,   432,   673,   674,
     418,   436,   164,    80,   422,   164,  1118,    80,   769,   381,
     164,   468,   707,   428,   164,   387,   418,   712,   390,   391,
     422,   453,   457,   792,   456,    82,     1,   702,    85,   704,
     477,   117,   801,   101,   102,   390,   391,   164,   733,    30,
     475,   135,   136,   129,   164,   492,   106,   107,   159,   466,
     135,   136,    70,   425,   165,    30,   150,   429,   430,   431,
     425,   517,   518,   106,   107,   826,   431,   828,   162,   502,
     156,   157,   158,   159,   429,   430,   502,    16,   164,   156,
     157,   158,   168,   156,   157,    82,   111,   112,    85,    80,
     523,   148,   149,   528,   150,   163,   150,   523,   164,   471,
     861,    16,   871,    69,   459,    80,   164,   782,   463,   784,
     785,   880,   568,   882,    70,    75,    76,   135,   136,    80,
      82,   556,   557,    85,   559,   560,   561,   562,   161,   564,
     563,   563,   150,   159,   563,   570,   758,   563,   493,   494,
     736,   129,   117,   739,   162,   150,   164,   138,   139,   600,
     585,   148,   149,     8,   750,    89,   607,   608,   106,   107,
     515,   596,    80,   138,   139,   156,   157,   158,   164,   604,
     167,   101,   102,   164,   790,    75,    76,   138,   139,   135,
     136,   156,   157,   158,   587,   147,   148,   149,    16,   164,
       8,   563,    37,    38,   150,   156,   157,   158,    82,   117,
     587,    85,   150,   164,     8,   948,   162,   610,   164,  1007,
    1008,   646,     8,   648,   913,   914,   651,    86,    87,   815,
     138,   139,    16,   610,    80,   644,     1,   630,   647,   661,
       8,   587,   650,   163,   587,   147,   997,    82,   156,   157,
     158,   673,   674,   630,     8,   166,   681,   650,   650,    82,
     163,   133,    85,   688,   610,   166,    31,   610,   164,   164,
     677,   117,   165,   650,   148,   149,   160,    80,    16,   587,
     702,   164,   704,   165,   630,   678,   709,   630,   711,    51,
       8,   714,   717,   709,   906,   720,  1029,   722,   714,   163,
     162,   678,   610,   106,   650,   108,   164,   650,   653,   164,
     156,   157,   158,    82,   165,    80,     8,    82,    80,     8,
      82,    83,   630,   165,   147,   148,   149,    53,    54,    55,
     722,    57,   678,   758,   743,   678,   759,  1070,   165,   761,
      70,   163,   650,    69,   163,  1078,   932,    80,   130,   131,
     132,   744,   117,   156,   157,   100,   101,   102,   163,   161,
     782,   162,   784,   785,   129,   787,   164,   744,   787,   133,
     678,   118,   119,   100,   101,   102,   123,    31,  1111,   804,
      31,   134,   129,    31,   117,    31,    31,  1120,    31,   814,
      31,   156,   157,   158,   159,    30,     8,    31,   744,   164,
    1133,   744,    31,   168,    31,   138,   139,   165,   831,   164,
     819,   161,   820,   836,  1000,   164,   164,   161,   164,     8,
     162,   162,   165,   156,   157,   158,   849,   820,   820,   165,
       1,   164,    97,   165,    83,   163,   744,    50,    51,    52,
      53,    54,    55,   820,    57,    80,   161,   164,  1034,   162,
     873,  1037,   164,   164,   877,   162,    69,   873,  1123,   165,
     160,   877,   165,   165,   160,   160,   165,   114,    31,  1075,
     163,    97,   918,   898,   820,  1081,   885,   820,     8,   165,
     165,   906,   165,   908,   165,   120,   121,   122,   123,   912,
     913,   914,   915,   162,     8,   163,   162,   160,   162,   922,
     923,    96,    90,   138,   139,   930,   165,     8,   931,     8,
     855,   163,   820,    37,    14,   106,   107,    35,    35,    38,
     164,   156,   157,   158,    14,   164,   117,   118,   119,   164,
     101,  1117,   123,   163,   957,   106,     8,   108,   129,   162,
    1126,   163,   160,   114,   165,   970,   117,   118,   119,   120,
     121,   122,   123,   124,   165,   165,   163,   994,   995,   984,
     163,   165,   164,    94,   973,   165,   975,   165,   159,    14,
     160,    37,   165,   160,  1011,   155,    35,    35,    14,   101,
      37,    14,  1028,  1006,  1007,  1008,  1009,   163,   159,   163,
     163,  1016,   163,    31,  1019,   117,   118,   119,   120,   121,
     122,   123,   124,   164,  1050,   160,    77,   160,  1033,   165,
      44,    45,    46,    47,    48,    49,    50,    51,    52,    53,
      54,    55,  1044,    57,     8,  1044,   106,    37,   108,   165,
     163,    14,    82,   160,    16,    69,  1059,   117,   118,   119,
     120,   121,   122,   123,  1069,    16,  1071,  1070,   163,   165,
       8,    16,    16,     8,   162,    92,    97,   150,   164,   115,
     163,    31,   160,   160,  1089,  1072,  1088,  1074,   160,  1088,
     165,   160,   160,  1080,  1119,    76,   502,  1086,    56,   468,
     212,   858,  1107,   459,  1109,  1111,     9,    10,    11,   652,
     515,     2,     2,     0,     1,  1118,     3,     4,     5,     6,
       7,  1123,  1118,    92,   101,    12,    13,    30,    15,    32,
      33,    34,    35,    36,    37,    38,    39,    40,    41,    42,
      43,    44,    45,    46,    47,    48,    49,    50,    51,    52,
      53,    54,    55,   906,    57,   653,   761,   979,   820,   923,
     836,   957,   722,    50,    51,  1105,    69,   471,   477,    56,
      39,    58,    59,    60,    61,    62,    63,    64,    65,    66,
      67,    68,   227,    70,    71,    72,    73,    74,  1050,   424,
     230,    78,    79,    80,  1119,    82,   381,    84,   229,    86,
      87,    88,    89,    -1,    91,   422,    93,    -1,    95,    -1,
      -1,    98,    99,    -1,    -1,    -1,   103,   104,   105,   106,
     107,   108,   109,   110,    -1,    -1,   113,   114,    -1,   116,
     117,   118,   119,    -1,    -1,    -1,   123,    -1,   125,   126,
     127,   128,   129,   130,   131,   132,    -1,    -1,    -1,    -1,
     137,   138,    -1,   140,   141,   142,   143,   144,   145,   146,
      -1,    -1,   165,    -1,   151,   152,   153,    -1,    -1,   156,
     157,   158,   159,   160,    -1,   162,   163,   164,    11,   166,
     167,   168,     1,    -1,     3,     4,     5,     6,     7,    -1,
      -1,    -1,    -1,    12,    13,    -1,    15,    30,    -1,    32,
      33,    34,    35,    36,    37,    38,    39,    40,    41,    42,
      43,    44,    45,    46,    47,    48,    49,    50,    51,    52,
      53,    54,    55,    -1,    57,    -1,    -1,    -1,    -1,    -1,
      -1,    50,    51,    -1,    -1,    -1,    69,    56,    -1,    58,
      59,    60,    61,    62,    63,    64,    65,    66,    67,    68,
      -1,    70,    71,    72,    73,    74,    75,    76,    77,    78,
      79,    80,    -1,    82,    -1,    84,    -1,    86,    87,    88,
      89,    90,    91,    92,    93,    94,    95,    96,    -1,    98,
      99,    -1,    -1,    -1,   103,   104,   105,   106,   107,    -1,
     109,   110,    -1,    -1,   113,    -1,    -1,   116,   117,   118,
     119,    -1,    -1,    -1,   123,    -1,   125,   126,   127,   128,
     129,   130,   131,   132,    -1,    -1,    -1,    -1,   137,   138,
      -1,   140,   141,   142,   143,   144,   145,   146,    -1,    -1,
      -1,    -1,    -1,   152,   153,    -1,    -1,   156,   157,   158,
     159,   160,    -1,   162,   163,   164,    -1,   166,   167,   168,
       1,    14,     3,     4,     5,     6,     7,    -1,    -1,    -1,
      -1,    12,    13,    -1,    15,    -1,    -1,    30,    -1,    32,
      33,    34,    35,    36,    37,    38,    39,    40,    41,    42,
      43,    44,    45,    46,    47,    48,    49,    50,    51,    52,
      53,    54,    55,    -1,    57,    -1,    -1,    -1,    -1,    50,
      51,    -1,    -1,    -1,    -1,    56,    69,    58,    59,    60,
      61,    62,    63,    64,    65,    66,    67,    68,    -1,    70,
      71,    72,    73,    74,    -1,    -1,    -1,    78,    79,    80,
      -1,    82,    -1,    84,    -1,    86,    87,    88,    89,    -1,
      91,    -1,    93,    -1,    95,    -1,    -1,    98,    99,   100,
     101,   102,   103,   104,   105,   106,   107,    -1,   109,   110,
      -1,    -1,   113,    -1,    -1,   116,   117,   118,   119,    -1,
      -1,    -1,   123,    -1,   125,   126,   127,   128,   129,   130,
     131,   132,    -1,    -1,    -1,    -1,   137,   138,    -1,   140,
     141,   142,   143,   144,   145,   146,    -1,    -1,    -1,    -1,
      -1,   152,   153,    -1,    -1,   156,   157,   158,   159,   160,
      -1,   162,   163,   164,    -1,   166,   167,   168,     1,    -1,
       3,     4,     5,     6,     7,    -1,    -1,    -1,    -1,    12,
      13,    30,    15,    32,    33,    34,    35,    36,    37,    38,
      39,    40,    41,    42,    43,    44,    45,    46,    47,    48,
      49,    50,    51,    52,    53,    54,    55,    -1,    57,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,    -1,    50,    51,    -1,
      69,    -1,    -1,    56,    -1,    58,    59,    60,    61,    62,
      63,    64,    65,    66,    67,    68,    -1,    70,    71,    72,
      73,    74,    -1,    -1,    -1,    78,    79,    80,    -1,    82,
      -1,    84,    -1,    86,    87,    88,    89,    -1,    91,    -1,
      93,    -1,    95,    -1,    -1,    98,    99,   100,   101,   102,
     103,   104,   105,   106,   107,    -1,   109,   110,    -1,    -1,
     113,    -1,    -1,   116,   117,   118,   119,    -1,    -1,    -1,
     123,    -1,   125,   126,   127,   128,   129,   130,   131,   132,
      -1,    -1,    -1,    -1,   137,   138,    -1,   140,   141,   142,
     143,   144,   145,   146,    -1,    -1,    -1,    -1,    -1,   152,
     153,    -1,    -1,   156,   157,   158,   159,   160,    -1,   162,
     163,   164,    -1,   166,   167,   168,     1,    -1,     3,     4,
       5,     6,     7,    -1,     9,    10,    11,    12,    13,    32,
      33,    34,    35,    36,    37,    38,    39,    40,    41,    42,
      43,    44,    45,    46,    47,    48,    49,    50,    51,    52,
      53,    54,    55,    -1,    57,    -1,    -1,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,    69,    -1,    -1,    -1,
      -1,    -1,    57,    -1,    -1,    -1,    -1,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,    71,    72,    73,    74,
      75,    76,    77,    -1,    -1,    80,    -1,    82,    -1,    -1,
      -1,    -1,    87,    88,    89,    90,    91,    92,    93,    94,
      95,    96,    97,    98,    99,   100,   101,   102,   103,   104,
     105,   106,   107,   108,   109,   110,   111,   112,   113,   114,
     115,   116,   117,   118,   119,   120,   121,   122,   123,   124,
     125,   126,   127,   128,   129,   130,   131,   132,   133,   134,
      -1,    -1,   137,   138,   139,   140,   141,   142,   143,   144,
     145,    -1,    -1,    -1,    -1,    -1,   151,   152,   153,    -1,
       1,    -1,     3,     4,     5,     6,     7,   162,    -1,    -1,
      -1,    12,    13,   168,    15,    -1,    -1,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,
      31,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    50,
      51,    -1,    -1,    -1,    -1,    56,    -1,    58,    59,    60,
      61,    62,    63,    64,    65,    66,    67,    68,    -1,    70,
      71,    72,    73,    74,    -1,    -1,    -1,    78,    79,    80,
      -1,    82,    -1,    84,    -1,    86,    87,    88,    89,    -1,
      91,    -1,    93,    -1,    95,    -1,    -1,    98,    99,    -1,
      -1,    -1,   103,   104,   105,   106,   107,    -1,   109,   110,
      -1,    -1,   113,    -1,    -1,   116,   117,    -1,    -1,    -1,
      -1,    -1,   123,    -1,   125,   126,   127,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,   137,   138,    -1,   140,
     141,   142,   143,   144,   145,   146,    -1,    -1,    -1,    -1,
      -1,   152,   153,    -1,    -1,   156,   157,   158,   159,   160,
      -1,   162,    -1,   164,    -1,   166,   167,   168,     1,    -1,
       3,     4,     5,     6,     7,    -1,    -1,    -1,    -1,    12,
      13,    -1,    15,    -1,    -1,    -1,    -1,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    31,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,    -1,    50,    51,    -1,
      -1,    -1,    -1,    56,    -1,    58,    59,    60,    61,    62,
      63,    64,    65,    66,    67,    68,    -1,    70,    71,    72,
      73,    74,    -1,    -1,    -1,    78,    79,    80,    -1,    82,
      -1,    84,    -1,    86,    87,    88,    89,    -1,    91,    -1,
      93,    -1,    95,    -1,    -1,    98,    99,    -1,    -1,    -1,
     103,   104,   105,   106,   107,    -1,   109,   110,    -1,    -1,
     113,    -1,    -1,   116,   117,    -1,    -1,    -1,    -1,    -1,
     123,    -1,   125,   126,   127,    -1,    -1,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,   137,   138,    -1,   140,   141,   142,
     143,   144,   145,   146,    -1,    -1,    -1,    -1,    -1,   152,
     153,    -1,    -1,   156,   157,   158,   159,   160,    -1,   162,
      -1,   164,    -1,   166,   167,   168,     1,    -1,     3,     4,
       5,     6,     7,    -1,    -1,    -1,    -1,    12,    13,    -1,
      15,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,    31,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,    -1,    50,    51,    -1,    -1,    -1,
      -1,    56,    -1,    58,    59,    60,    61,    62,    63,    64,
      65,    66,    67,    68,    -1,    70,    71,    72,    73,    74,
      -1,    -1,    -1,    78,    79,    80,    -1,    82,    -1,    84,
      -1,    86,    87,    88,    89,    -1,    91,    -1,    93,    -1,
      95,    -1,    -1,    98,    99,    -1,    -1,    -1,   103,   104,
     105,   106,   107,    -1,   109,   110,    -1,    -1,   113,    -1,
      -1,   116,   117,    -1,    -1,    -1,    -1,    -1,   123,    -1,
     125,   126,   127,    -1,    -1,    -1,    -1,    -1,    -1,    -1,
      -1,    -1,   137,   138,    -1,   140,   141,   142,   143,   144,
     145,   146,    -1,    -1,    -1,    -1,    -1,   152,   153,    -1,
      -1,   156,   157,   158,   159,   160,    -1,   162,    -1,   164,
      -1,   166,   167,   168,     1,    -1,     3,     4,     5,     6,
       7,    -1,    -1,    -1,    -1,    12,    13,    -1,    15,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,    31,    -1,    -1,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,
      -1,    -1,    -1,    50,    51,    -1,    -1,    -1,    -1,    56,
      -1,    58,    59,    60,    61,    62,    63,    64,    65,    66,
      67,    68,    -1,    70,    71,    72,    73,    74,    -1,    -1,
      -1,    78,    79,    80,    -1,    82,    -1,    84,    -1,    86,
      87,    88,    89,    -1,    91,    -1,    93,    -1,    95,    -1,
      -1,    98,    99,    -1,    -1,    -1,   103,   104,   105,   106,
     107,    -1,   109,   110,    -1,    -1,   113,    -1,    -1,   116,
     117,    -1,    -1,    -1,    -1,    -1,   123,    -1,   125,   126,
     127,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,
     137,   138,    -1,   140,   141,   142,   143,   144,   145,   146,
      -1,    -1,    -1,    -1,    -1,   152,   153,    -1,    -1,   156,
     157,   158,   159,   160,    -1,   162,    -1,   164,    -1,   166,
     167,   168,     1,    -1,     3,     4,     5,     6,     7,    -1,
      -1,    -1,    -1,    12,    13,    -1,    15,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,
      -1,    -1,    31,    -1,    -1,    -1,    -1,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,
      -1,    50,    51,    -1,    -1,    -1,    -1,    56,    -1,    58,
      59,    60,    61,    62,    63,    64,    65,    66,    67,    68,
      -1,    70,    71,    72,    73,    74,    -1,    -1,    -1,    78,
      79,    80,    -1,    82,    -1,    84,    -1,    86,    87,    88,
      89,    -1,    91,    -1,    93,    -1,    95,    -1,    -1,    98,
      99,    -1,    -1,    -1,   103,   104,   105,   106,   107,    -1,
     109,   110,    -1,    -1,   113,    -1,    -1,   116,   117,    -1,
      -1,    -1,    -1,    -1,   123,    -1,   125,   126,   127,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,   137,   138,
      -1,   140,   141,   142,   143,   144,   145,   146,    -1,    -1,
      -1,    -1,    -1,   152,   153,    -1,    -1,   156,   157,   158,
     159,   160,    -1,   162,    -1,   164,    -1,   166,   167,   168,
       1,    -1,     3,     4,     5,     6,     7,    -1,    -1,    -1,
      -1,    12,    13,    -1,    15,    -1,    34,    35,    36,    37,
      38,    39,    40,    41,    42,    43,    44,    45,    46,    47,
      48,    49,    50,    51,    52,    53,    54,    55,    -1,    57,
      -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    50,
      51,    69,    -1,    -1,    -1,    56,    -1,    58,    59,    60,
      61,    62,    63,    64,    65,    66,    67,    68,    -1,    70,
      71,    72,    73,    74,    -1,    -1,    -1,    78,    79,    80,
      -1,    82,    -1,    84,    -1,    86,    87,    88,    89,    -1,
      91,    -1,    93,    -1,    95,    -1,    -1,    98,    99,    -1,
      -1,    -1,   103,   104,   105,   106,   107,    -1,   109,   110,
      -1,    -1,   113,    -1,    -1,   116,   117,    -1,    -1,    -1,
      -1,    -1,   123,    -1,   125,   126,   127,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,   137,   138,    -1,   140,
     141,   142,   143,   144,   145,   146,    -1,    -1,    -1,    -1,
      -1,   152,   153,    -1,    -1,   156,   157,   158,   159,   160,
      -1,   162,    -1,   164,    -1,   166,   167,   168,     3,     4,
       5,     6,     7,    -1,     9,    10,    11,    12,    13,    -1,
      15,    37,    38,    39,    40,    41,    42,    43,    44,    45,
      46,    47,    48,    49,    50,    51,    52,    53,    54,    55,
      -1,    57,    37,    38,    -1,    -1,    -1,    -1,    -1,    -1,
      -1,    -1,    -1,    69,    -1,    50,    51,    -1,    -1,    -1,
      -1,    56,    57,    58,    59,    60,    61,    62,    63,    64,
      65,    66,    67,    68,    -1,    70,    71,    72,    73,    74,
      75,    76,    77,    78,    79,    80,    -1,    82,    -1,    -1,
      -1,    86,    87,    88,    89,    90,    91,    92,    93,    94,
      95,    96,    97,    98,    99,   100,   101,   102,   103,   104,
     105,   106,   107,   108,   109,   110,   111,   112,   113,   114,
     115,   116,   117,   118,   119,   120,   121,   122,   123,   124,
     125,   126,   127,   128,   129,   130,   131,   132,   133,   134,
      -1,    -1,   137,   138,   139,   140,   141,   142,   143,   144,
     145,   146,    -1,    -1,    -1,    -1,   151,   152,   153,    -1,
     155,   156,   157,   158,   159,    -1,    -1,    -1,    -1,   164,
     165,   166,   167,   168,     3,     4,     5,     6,     7,    -1,
       9,    10,    11,    12,    13,    -1,    15,    39,    40,    41,
      42,    43,    44,    45,    46,    47,    48,    49,    50,    51,
      52,    53,    54,    55,    -1,    57,    -1,    -1,    37,    38,
      -1,    -1,    -1,    -1,    -1,    -1,    -1,    69,    -1,    -1,
      -1,    50,    51,    -1,    -1,    -1,    -1,    56,    57,    58,
      59,    60,    61,    62,    63,    64,    65,    66,    67,    68,
      -1,    70,    71,    72,    73,    74,    75,    76,    77,    78,
      79,    80,    -1,    82,    -1,    -1,    -1,    86,    87,    88,
      89,    90,    91,    92,    93,    94,    95,    96,    97,    98,
      99,   100,   101,   102,   103,   104,   105,   106,   107,   108,
     109,   110,   111,   112,   113,   114,   115,   116,   117,   118,
     119,   120,   121,   122,   123,   124,   125,   126,   127,   128,
     129,   130,   131,   132,   133,   134,    -1,    -1,   137,   138,
     139,   140,   141,   142,   143,   144,   145,   146,    -1,    -1,
      -1,    -1,   151,   152,   153,    -1,   155,   156,   157,   158,
     159,    -1,    -1,    -1,    -1,   164,    -1,   166,   167,   168,
       3,     4,     5,     6,     7,    -1,    -1,    -1,    -1,    12,
      13,    -1,    15,    39,    40,    41,    42,    43,    44,    45,
      46,    47,    48,    49,    50,    51,    52,    53,    54,    55,
      -1,    57,    -1,    -1,    37,    38,    -1,    -1,    -1,    -1,
      -1,    -1,    -1,    69,    -1,    -1,    -1,    50,    51,    -1,
      -1,    -1,    -1,    56,    -1,    58,    59,    60,    61,    62,
      63,    64,    65,    66,    67,    68,    -1,    70,    71,    72,
      73,    -1,    -1,    -1,    -1,    78,    79,    80,    -1,    82,
      -1,    -1,    -1,    86,    -1,    -1,    -1,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,    99,    -1,    -1,    -1,
      -1,    -1,    -1,   106,   107,    -1,    -1,    -1,    -1,    -1,
     113,    -1,    -1,    -1,   117,    -1,    -1,    -1,    -1,    -1,
     123,    -1,    -1,   126,   127,    -1,    -1,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,   137,   138,    -1,   140,   141,   142,
     143,   144,   145,   146,    -1,    -1,    -1,    -1,    -1,   152,
     153,    -1,   155,   156,   157,   158,   159,    -1,    -1,    -1,
      -1,   164,    -1,   166,   167,   168,     3,     4,     5,     6,
       7,    -1,    -1,    -1,    -1,    12,    13,    -1,    15,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,
      37,    38,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,
      -1,    -1,    -1,    50,    51,    -1,    -1,    -1,    -1,    56,
      -1,    58,    59,    60,    61,    62,    63,    64,    65,    66,
      67,    68,    -1,    70,    71,    72,    73,    -1,    -1,    -1,
      -1,    78,    79,    80,    -1,    82,    -1,    -1,    -1,    86,
      -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,
      -1,    -1,    99,    -1,    -1,    -1,    -1,    -1,    -1,   106,
     107,    -1,    -1,    -1,    -1,    -1,   113,    -1,    -1,    -1,
     117,    -1,    -1,    -1,    -1,    -1,   123,    -1,    -1,   126,
     127,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,
     137,   138,    -1,   140,   141,   142,   143,   144,   145,   146,
      -1,    -1,    -1,    -1,    -1,   152,   153,    -1,    -1,   156,
     157,   158,   159,    -1,     9,    10,    11,   164,    -1,   166,
     167,   168,     3,     4,     5,     6,     7,    -1,    -1,    -1,
      -1,    12,    13,    -1,    15,    30,    -1,    32,    33,    34,
      35,    36,    37,    38,    39,    40,    41,    42,    43,    44,
      45,    46,    47,    48,    49,    50,    51,    52,    53,    54,
      55,    -1,    57,    -1,    -1,    -1,    -1,    -1,    -1,    50,
      51,    -1,    -1,    -1,    69,    56,    -1,    58,    59,    60,
      61,    62,    63,    64,    65,    66,    67,    68,    -1,    70,
      71,    72,    73,    -1,    -1,    -1,    -1,    78,    79,    80,
      81,    82,    -1,    -1,    -1,    86,    -1,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    99,    -1,
      -1,    -1,    -1,    -1,    -1,   106,   107,    -1,    -1,    -1,
      -1,    -1,   113,    -1,    -1,    -1,   117,    -1,    -1,    -1,
      -1,    -1,   123,    -1,    -1,   126,   127,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,   137,   138,    -1,   140,
     141,   142,   143,   144,   145,   146,    -1,    -1,    -1,    -1,
     165,   152,   153,    -1,    -1,   156,   157,   158,   159,    -1,
      -1,    -1,    -1,   164,    -1,   166,   167,   168,     3,     4,
       5,     6,     7,    -1,    -1,    -1,    -1,    12,    13,    -1,
      15,    -1,    -1,    -1,    -1,    -1,    -1,    70,    -1,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,    31,    80,    -1,    82,
      -1,    -1,    -1,    86,    -1,    -1,    -1,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,    -1,    50,    51,    -1,    -1,    -1,
      -1,    56,    -1,    58,    59,    60,    61,    62,    63,    64,
      65,    66,    67,    68,   117,    70,    71,    72,    73,    -1,
     123,    -1,    -1,    78,    79,    80,    -1,    82,    -1,    -1,
      -1,    86,    -1,    -1,    -1,   138,    -1,   140,   141,   142,
     143,   144,   145,    -1,    99,    -1,    -1,    -1,    -1,   152,
     153,   106,   107,   156,   157,   158,    -1,    -1,   113,    -1,
      -1,   164,   117,    -1,   167,   168,    -1,    -1,   123,    -1,
      -1,   126,   127,    -1,    -1,    -1,    -1,    -1,    -1,    -1,
      -1,    -1,   137,   138,    -1,   140,   141,   142,   143,   144,
     145,   146,    -1,    -1,    -1,    -1,    -1,   152,   153,    -1,
      -1,   156,   157,   158,   159,    -1,    -1,    -1,    -1,   164,
      -1,   166,   167,   168,     3,     4,     5,     6,     7,    -1,
      -1,    -1,    -1,    12,    13,    -1,    15,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,
      -1,    -1,    31,    -1,    -1,    -1,    -1,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,
      -1,    50,    51,    -1,    -1,    -1,    -1,    56,    -1,    58,
      59,    60,    61,    62,    63,    64,    65,    66,    67,    68,
      -1,    70,    71,    72,    73,    -1,    -1,    -1,    -1,    78,
      79,    80,    -1,    82,    -1,    -1,    -1,    86,    -1,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,
      99,    -1,    -1,    -1,    -1,    -1,    -1,   106,   107,    -1,
      -1,    -1,    -1,    -1,   113,    -1,    -1,    -1,   117,    -1,
      -1,    -1,    -1,    -1,   123,    -1,    -1,   126,   127,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,   137,   138,
      -1,   140,   141,   142,   143,   144,   145,   146,    -1,    -1,
      -1,    -1,    -1,   152,   153,    -1,    -1,   156,   157,   158,
     159,    -1,     9,    10,    11,   164,    -1,   166,   167,   168,
       3,     4,     5,     6,     7,    -1,    -1,    -1,    -1,    12,
      13,    -1,    15,    30,    -1,    32,    33,    34,    35,    36,
      37,    38,    39,    40,    41,    42,    43,    44,    45,    46,
      47,    48,    49,    50,    51,    52,    53,    54,    55,    -1,
      57,    -1,    -1,    -1,    -1,    -1,    -1,    50,    51,    -1,
      -1,    -1,    69,    56,    -1,    58,    59,    60,    61,    62,
      63,    64,    65,    66,    67,    68,    -1,    70,    71,    72,
      73,    -1,    -1,    -1,    -1,    78,    79,    80,    -1,    82,
      -1,    -1,    -1,    86,    -1,    -1,    -1,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,    99,    -1,    -1,   102,
      -1,    -1,    -1,   106,   107,    -1,    -1,    -1,    -1,    -1,
     113,    -1,    -1,    -1,   117,    -1,    -1,    -1,    -1,    -1,
     123,    -1,    -1,   126,   127,    -1,    -1,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,   137,   138,    -1,   140,   141,   142,
     143,   144,   145,   146,    -1,    -1,    -1,    -1,   165,   152,
     153,    -1,    -1,   156,   157,   158,   159,    -1,     9,    10,
      11,   164,    -1,   166,   167,   168,     3,     4,     5,     6,
       7,    -1,    -1,    -1,    -1,    12,    13,    -1,    15,    30,
      -1,    32,    33,    34,    35,    36,    37,    38,    39,    40,
      41,    42,    43,    44,    45,    46,    47,    48,    49,    50,
      51,    52,    53,    54,    55,    -1,    57,    -1,    -1,    -1,
      -1,    -1,    -1,    50,    51,    -1,    -1,    -1,    69,    56,
      -1,    58,    59,    60,    61,    62,    63,    64,    65,    66,
      67,    68,    -1,    70,    71,    72,    73,    -1,    -1,    -1,
      -1,    78,    79,    80,    -1,    82,    -1,    -1,    -1,    86,
      -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,
      -1,    -1,    99,    -1,    -1,    -1,    -1,    -1,    -1,   106,
     107,    -1,    -1,    -1,    -1,    -1,   113,    -1,    -1,    -1,
     117,    -1,    -1,    -1,    -1,    -1,   123,    -1,    -1,   126,
     127,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,
     137,   138,    -1,   140,   141,   142,   143,   144,   145,   146,
      -1,    -1,    -1,    -1,   165,   152,   153,    -1,    -1,   156,
     157,   158,   159,     9,    10,    11,    -1,   164,    -1,   166,
     167,   168,     3,     4,     5,     6,     7,    -1,     9,    10,
      11,    12,    13,    -1,    30,    -1,    32,    33,    34,    35,
      36,    37,    38,    39,    40,    41,    42,    43,    44,    45,
      46,    47,    48,    49,    50,    51,    52,    53,    54,    55,
      -1,    57,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,
      -1,    -1,    -1,    69,    -1,    -1,    57,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,
      71,    72,    73,    74,    75,    76,    77,    -1,    -1,    80,
      -1,    -1,    -1,    -1,    -1,    -1,    87,    88,    89,    90,
      91,    92,    93,    94,    95,    96,    97,    98,    99,   100,
     101,   102,   103,   104,   105,   106,   107,   108,   109,   110,
     111,   112,   113,   114,   115,   116,   117,   118,   119,   120,
     121,   122,   123,   124,   125,   126,   127,   128,   129,   130,
     131,   132,   133,   134,    -1,    -1,   137,   138,   139,   140,
     141,   142,   143,   144,   145,    -1,    -1,    -1,    -1,   165,
     151,   152,   153,    -1,    -1,   156,   157,   158,     9,    10,
      11,    -1,   163,     3,     4,     5,     6,     7,    -1,     9,
      10,    11,    12,    13,    -1,    -1,    -1,    -1,    -1,    30,
      -1,    32,    33,    34,    35,    36,    37,    38,    39,    40,
      41,    42,    43,    44,    45,    46,    47,    48,    49,    50,
      51,    52,    53,    54,    55,    -1,    57,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,    -1,    57,    69,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,
      -1,    71,    72,    73,    74,    75,    76,    77,    -1,    -1,
      80,    -1,    -1,    -1,    -1,    -1,    -1,    87,    88,    89,
      90,    91,    92,    93,    94,    95,    96,    97,    98,    99,
     100,   101,   102,   103,   104,   105,   106,   107,   108,   109,
     110,   111,   112,   113,   114,   115,   116,   117,   118,   119,
     120,   121,   122,   123,   124,   125,   126,   127,   128,   129,
     130,   131,   132,   133,   134,    -1,    -1,   137,   138,   139,
     140,   141,   142,   143,   144,   145,     1,    -1,    -1,    -1,
     161,   151,   152,   153,     9,    10,    11,   157,    -1,    -1,
      -1,    -1,   162,    -1,    -1,    -1,    -1,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,    -1,    30,    -1,    32,    33,    34,
      35,    36,    37,    38,    39,    40,    41,    42,    43,    44,
      45,    46,    47,    48,    49,    50,    51,    52,    53,    54,
      55,    -1,    57,    -1,    -1,    -1,    -1,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,    69,    -1,    -1,     9,    10,    11,
      -1,    -1,     3,     4,     5,     6,     7,    -1,     9,    10,
      11,    12,    13,    -1,    -1,    -1,    -1,    -1,    30,    -1,
      32,    33,    34,    35,    36,    37,    38,    39,    40,    41,
      42,    43,    44,    45,    46,    47,    48,    49,    50,    51,
      52,    53,    54,    55,    -1,    57,    -1,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,    57,    69,    -1,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,
      71,    72,    73,    74,    75,    76,    77,    -1,    -1,    80,
      -1,    -1,    -1,    -1,    -1,   160,    87,    88,    89,    90,
      91,    92,    93,    94,    95,    96,    97,    98,    99,   100,
     101,   102,   103,   104,   105,   106,   107,   108,   109,   110,
     111,   112,   113,   114,   115,   116,   117,   118,   119,   120,
     121,   122,   123,   124,   125,   126,   127,   128,   129,   130,
     131,   132,   133,   134,    -1,    -1,   137,   138,   139,   140,
     141,   142,   143,   144,   145,     9,    10,    11,    -1,    -1,
     151,   152,   153,   165,    -1,    -1,    -1,    -1,    -1,   160,
      -1,    -1,    -1,    -1,    -1,    -1,    30,    -1,    32,    33,
      34,    35,    36,    37,    38,    39,    40,    41,    42,    43,
      44,    45,    46,    47,    48,    49,    50,    51,    52,    53,
      54,    55,    -1,    57,     9,    10,    11,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,    -1,    69,    -1,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,    -1,    30,    -1,    32,    33,    34,
      35,    36,    37,    38,    39,    40,    41,    42,    43,    44,
      45,    46,    47,    48,    49,    50,    51,    52,    53,    54,
      55,    -1,    57,     9,    10,    11,    -1,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,    69,    -1,    -1,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,    30,    -1,    32,    33,    34,    35,
      36,    37,    38,    39,    40,    41,    42,    43,    44,    45,
      46,    47,    48,    49,    50,    51,    52,    53,    54,    55,
      -1,    57,     9,    10,    11,    -1,    -1,    -1,    -1,    -1,
      -1,   165,    -1,    69,    -1,    -1,    -1,    -1,    -1,    -1,
      -1,    -1,    -1,    30,    -1,    32,    33,    34,    35,    36,
      37,    38,    39,    40,    41,    42,    43,    44,    45,    46,
      47,    48,    49,    50,    51,    52,    53,    54,    55,    -1,
      57,     9,    10,    11,    -1,    -1,    -1,    -1,    -1,    -1,
     165,    -1,    69,    -1,    -1,    -1,    -1,    -1,    -1,    -1,
      -1,    -1,    30,    -1,    32,    33,    34,    35,    36,    37,
      38,    39,    40,    41,    42,    43,    44,    45,    46,    47,
      48,    49,    50,    51,    52,    53,    54,    55,    -1,    57,
       9,    10,    11,    -1,    -1,    -1,    -1,    -1,    -1,   165,
      -1,    69,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,
      -1,    30,    -1,    32,    33,    34,    35,    36,    37,    38,
      39,    40,    41,    42,    43,    44,    45,    46,    47,    48,
      49,    50,    51,    52,    53,    54,    55,    -1,    57,     9,
      10,    11,    -1,    -1,    -1,    -1,    -1,    -1,   165,    -1,
      69,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,
      30,    -1,    32,    33,    34,    35,    36,    37,    38,    39,
      40,    41,    42,    43,    44,    45,    46,    47,    48,    49,
      50,    51,    52,    53,    54,    55,    -1,    57,     9,    10,
      11,    -1,    -1,    -1,    -1,    -1,    -1,   165,    -1,    69,
      -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    30,
      -1,    32,    33,    34,    35,    36,    37,    38,    39,    40,
      41,    42,    43,    44,    45,    46,    47,    48,    49,    50,
      51,    52,    53,    54,    55,    -1,    57,     9,    10,    11,
      -1,    -1,    -1,    -1,    -1,    -1,   165,    -1,    69,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    30,    -1,
      32,    33,    34,    35,    36,    37,    38,    39,    40,    41,
      42,    43,    44,    45,    46,    47,    48,    49,    50,    51,
      52,    53,    54,    55,    -1,    57,     9,    10,    11,    -1,
      -1,    -1,    -1,   163,    -1,    -1,    -1,    69,    -1,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,    -1,    30,    -1,    32,
      33,    34,    35,    36,    37,    38,    39,    40,    41,    42,
      43,    44,    45,    46,    47,    48,    49,    50,    51,    52,
      53,    54,    55,    -1,    57,     9,    10,    11,    -1,    -1,
      -1,    -1,   163,    -1,    -1,    -1,    69,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,    30,    -1,    32,    33,
      34,    35,    36,    37,    38,    39,    40,    41,    42,    43,
      44,    45,    46,    47,    48,    49,    50,    51,    52,    53,
      54,    55,    -1,    57,     9,    10,    11,    -1,    -1,    -1,
      -1,   163,    -1,    -1,    -1,    69,    -1,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,    -1,    30,    -1,    32,    33,    34,
      35,    36,    37,    38,    39,    40,    41,    42,    43,    44,
      45,    46,    47,    48,    49,    50,    51,    52,    53,    54,
      55,    -1,    57,     9,    10,    11,    -1,    -1,    -1,    -1,
     163,    -1,    -1,    -1,    69,    -1,    -1,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,    30,    31,    32,    33,    34,    35,
      36,    37,    38,    39,    40,    41,    42,    43,    44,    45,
      46,    47,    48,    49,    50,    51,    52,    53,    54,    55,
      -1,    57,    -1,    -1,    -1,    -1,    -1,    -1,    -1,   163,
      -1,    -1,    -1,    69,    -1,    -1,    -1,    -1,    -1,    -1,
      -1,     3,     4,     5,     6,     7,    -1,     9,    10,    11,
      12,    13,    35,    36,    37,    38,    39,    40,    41,    42,
      43,    44,    45,    46,    47,    48,    49,    50,    51,    52,
      53,    54,    55,    -1,    57,    -1,    -1,    -1,   163,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,    69,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,    -1,    57,    -1,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    71,
      72,    73,    74,    75,    76,    77,    -1,    -1,    80,    -1,
      -1,    -1,    -1,    -1,   160,    87,    88,    89,    90,    91,
      92,    93,    94,    95,    96,    97,    98,    99,   100,   101,
     102,   103,   104,   105,   106,   107,   108,   109,   110,   111,
     112,   113,   114,   115,   116,   117,   118,   119,   120,   121,
     122,   123,   124,   125,   126,   127,   128,   129,   130,   131,
     132,   133,   134,    -1,    -1,   137,   138,   139,   140,   141,
     142,   143,   144,   145,     9,    10,    11,    -1,    -1,   151,
     152,   153,     3,     4,     5,     6,     7,    -1,     9,    10,
      11,    12,    13,    -1,    -1,    30,    31,    32,    33,    34,
      35,    36,    37,    38,    39,    40,    41,    42,    43,    44,
      45,    46,    47,    48,    49,    50,    51,    52,    53,    54,
      55,    -1,    57,    -1,    -1,    -1,    -1,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,    69,    -1,    57,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,
      71,    72,    73,    74,    75,    76,    77,    -1,    -1,    80,
      -1,    -1,    -1,    -1,    -1,    -1,    87,    88,    89,    90,
      91,    92,    93,    94,    95,    96,    97,    98,    99,   100,
     101,   102,   103,   104,   105,   106,   107,   108,   109,   110,
     111,   112,   113,   114,   115,   116,   117,   118,   119,   120,
     121,   122,   123,   124,   125,   126,   127,   128,   129,   130,
     131,   132,   133,   134,    37,    38,   137,   138,   139,   140,
     141,   142,   143,   144,   145,    -1,    -1,    -1,    -1,    -1,
     151,   152,   153,    16,    17,    18,    19,    20,    21,    22,
      23,    24,    25,    26,    27,    28,    29,    70,    -1,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,    -1,    80,    -1,    82,
      -1,    -1,    -1,    86,    -1,    -1,    -1,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,    59,    60,    -1,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,    -1,    70,    -1,    -1,
      -1,    -1,    -1,    -1,   117,    -1,    -1,    -1,    -1,    -1,
     123,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,   137,   138,    -1,   140,   141,   142,
     143,   144,   145,    -1,    -1,    -1,    -1,    -1,    -1,   152,
     153,    -1,    -1,   156,   157,   158,    -1,    -1,    -1,    -1,
      -1,   164,    -1,    -1,   167,   168,    -1,    -1,    -1,     1,
      -1,    -1,   135,   136,    -1,    -1,    -1,     9,    10,    11,
      -1,    -1,    -1,    -1,    -1,    -1,    -1,   150,    -1,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    30,   162,
      32,    33,    34,    35,    36,    37,    38,    39,    40,    41,
      42,    43,    44,    45,    46,    47,    48,    49,    50,    51,
      52,    53,    54,    55,    -1,    57,    -1,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,    -1,    69,    -1,    -1,
      -1,    -1,    -1,     9,    10,    11,    -1,    -1,    14,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,    30,    97,    32,    33,    34,    35,
      36,    37,    38,    39,    40,    41,    42,    43,    44,    45,
      46,    47,    48,    49,    50,    51,    52,    53,    54,    55,
      -1,    57,     9,    10,    11,    -1,    -1,    -1,    -1,    -1,
      -1,    -1,    -1,    69,    -1,    -1,    -1,    -1,    -1,    -1,
      -1,    -1,    -1,    30,    -1,    32,    33,    34,    35,    36,
      37,    38,    39,    40,    41,    42,    43,    44,    45,    46,
      47,    48,    49,    50,    51,    52,    53,    54,    55,    -1,
      57,    10,    11,    -1,    -1,    -1,    -1,    -1,    -1,    -1,
      -1,    -1,    69,    -1,    -1,    -1,    -1,    -1,    -1,    -1,
      -1,    30,    -1,    32,    33,    34,    35,    36,    37,    38,
      39,    40,    41,    42,    43,    44,    45,    46,    47,    48,
      49,    50,    51,    52,    53,    54,    55,    -1,    57,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,
      69,    36,    37,    38,    39,    40,    41,    42,    43,    44,
      45,    46,    47,    48,    49,    50,    51,    52,    53,    54,
      55,    -1,    57,    -1,    -1,    -1,    -1,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,    69);
  

/* YYSTOS[STATE-NUM] -- The symbol kind of the accessing symbol of
   state STATE-NUM.  */
  
  /** @var int[] */
  public array $yystos = array(     0,   170,   171,   172,     0,     1,     3,     4,     5,     6,
       7,    12,    13,    15,    50,    51,    56,    58,    59,    60,
      61,    62,    63,    64,    65,    66,    67,    68,    70,    71,
      72,    73,    74,    78,    79,    80,    82,    84,    86,    87,
      88,    89,    91,    93,    95,    98,    99,   103,   104,   105,
     106,   107,   108,   109,   110,   113,   114,   116,   117,   118,
     119,   123,   125,   126,   127,   128,   129,   137,   138,   140,
     141,   142,   143,   144,   145,   146,   151,   152,   153,   156,
     157,   158,   159,   160,   162,   164,   166,   167,   168,   177,
     182,   188,   189,   190,   191,   193,   212,   213,   225,   226,
     229,   230,   231,   247,   309,   311,   316,   317,   318,   319,
     321,   325,   326,   327,   328,   329,   331,   332,   333,   334,
     336,   337,   339,   343,    80,   106,   117,   123,   189,   309,
     309,   164,   309,   309,   309,   309,   309,   309,   309,   309,
     309,   117,   164,   325,   326,   327,   328,   336,   336,   309,
     309,   309,   309,   309,   309,   309,   309,    37,    38,   155,
     173,   309,   343,   344,   346,   347,     1,   164,   189,   190,
     310,   318,   319,   320,   337,   340,   309,   164,   322,   164,
     305,   307,   309,   213,   164,   164,   164,   164,   164,   164,
     309,   330,   330,    80,   177,   173,   220,   220,   177,   203,
     204,   205,   330,   162,   309,    80,   106,   108,   156,   157,
     180,   181,   192,   196,   197,   201,   282,   283,   284,   337,
     106,   107,   182,   285,   286,   287,   164,   164,   164,   164,
     164,    85,   147,   148,   149,   182,   348,   349,   351,     3,
       4,     5,     6,     7,     9,    10,    11,    12,    13,    57,
      71,    72,    73,    74,    75,    76,    77,    80,    87,    88,
      89,    90,    91,    92,    93,    94,    95,    96,    97,    98,
      99,   100,   101,   102,   103,   104,   105,   106,   107,   108,
     109,   110,   111,   112,   113,   114,   115,   116,   117,   118,
     119,   120,   121,   122,   123,   124,   125,   126,   127,   128,
     129,   130,   131,   132,   133,   134,   137,   138,   139,   140,
     141,   142,   143,   144,   145,   151,   152,   153,   157,   162,
     174,   175,   179,   186,   187,   318,   209,   210,   309,    85,
     323,   348,    85,   348,     1,   162,   337,    31,   106,   107,
     117,   123,   188,   229,   130,   131,   132,     1,   160,   183,
     177,   129,   231,     9,    10,    11,    30,    32,    33,    34,
      35,    36,    37,    38,    39,    40,    41,    42,    43,    44,
      45,    46,    47,    48,    49,    50,    51,    52,    53,    54,
      55,    57,    69,   183,   164,   278,   278,   150,    16,    70,
     135,   136,   162,   278,    16,    17,    18,    19,    20,    21,
      22,    23,    24,    25,    26,    27,    28,    29,    59,    60,
      16,   220,   106,   309,    14,   309,   309,   336,    14,   161,
       1,     8,   345,   309,   129,   150,   278,   324,    70,   135,
     136,   150,   162,   330,   309,   183,     8,   184,    89,   309,
     305,   308,   309,   177,   240,   241,   242,   309,   309,   183,
     183,   183,   123,   164,   177,   224,   164,    16,   183,     8,
     184,   183,   210,    97,   154,   181,   196,   183,     8,   184,
     183,     8,   184,   220,   220,    16,   183,     8,   184,   218,
     219,   336,   306,   307,   309,   346,   344,   147,    81,   309,
     350,   336,    70,   135,   136,   147,   349,   351,   351,   172,
     162,   183,     8,   185,   278,   128,   211,   213,   225,   226,
     163,   165,   166,   167,   309,   220,   220,   106,   107,   177,
     177,   177,   177,   133,   232,   309,   309,   309,    31,   309,
     309,   309,   309,   309,   309,   309,   309,   309,   309,   309,
     309,   309,   309,   309,   309,   309,   309,   309,   309,   309,
     309,   309,   309,   309,   320,   309,     3,     4,     5,     6,
       7,    12,    13,    71,    72,    73,    80,    99,   106,   107,
     113,   117,   123,   126,   127,   137,   138,   140,   141,   142,
     143,   144,   145,   152,   153,   155,   165,   173,   175,   176,
     279,   280,   281,   309,     1,    80,   162,   176,   337,   338,
     341,   309,   330,     1,   162,   177,   337,   342,   342,   309,
     173,   309,   309,   309,   309,   309,   309,   309,   309,   309,
     309,   309,   309,   309,   309,   309,   220,   165,   309,   165,
     173,   309,   343,   347,   165,   324,   337,   338,   330,   342,
     342,   338,   309,   165,   165,   309,   164,   165,   160,     1,
      97,    16,   165,     8,   184,   165,   165,   190,   259,   260,
     263,   164,   259,   309,   205,   163,   177,   162,   154,   183,
     181,   201,   284,   164,   164,   309,   287,   165,     8,   185,
     165,     8,   185,   165,   165,   165,   163,   163,    70,   163,
      51,    80,    83,   182,   352,   177,   177,   163,   172,   186,
     161,   163,   164,   224,   164,   220,   220,   232,   162,   133,
     233,    31,   227,   318,   134,   234,   309,    31,   309,   336,
      31,   165,     8,   185,   309,   278,   161,   309,   278,   278,
     163,   336,   336,   232,   161,   163,    31,   213,   309,    31,
     213,   251,   308,   165,   173,   258,   327,   336,   343,   309,
      31,   160,   212,   239,   242,    31,   162,   243,   162,   261,
     165,     8,   185,   259,   165,   214,   180,   192,   198,   199,
     200,   202,   162,   259,   259,   183,   336,   309,    83,   161,
     163,   259,   164,   259,   164,   164,   234,   288,   289,   235,
     236,   318,   162,   117,   138,   139,   265,   266,   319,   234,
     235,   162,   309,   309,   155,   281,   165,   163,   163,   234,
     210,   252,   165,   210,   160,    31,   213,   238,   336,   165,
      14,   210,   160,   244,   160,   244,   102,   248,   249,   250,
     306,    30,   120,   121,   122,   123,   164,   262,   266,   269,
     270,   273,   274,   275,   276,   114,   312,   263,   165,    31,
     277,   111,   112,   216,   217,    97,   200,   163,     8,   185,
     194,   195,   200,   165,   165,   161,   165,   259,   165,   259,
     259,   162,     1,   114,   190,   290,   163,     8,   184,   289,
     162,   289,   162,   254,    75,    76,   253,   256,   160,    90,
     308,   210,   238,   258,   336,    96,   244,   100,   101,   102,
     245,   244,   163,     8,   185,   163,     8,   185,    14,   266,
     266,   274,    37,    35,    35,    37,    38,   221,   164,   277,
     277,     1,    30,   164,   264,   265,   267,   268,   271,   272,
      14,   164,   162,   177,   202,   163,     8,   185,   312,   277,
     163,   312,   165,   277,   165,   165,   289,   235,   101,   117,
     118,   119,   120,   121,   122,   123,   124,   297,   298,   299,
     300,   318,   163,   289,   163,   289,    75,    76,   255,   257,
     164,   213,   160,   165,    94,   165,   160,   100,   160,   309,
      31,   160,   246,   163,    14,   250,   309,   165,   266,   266,
     269,   269,   266,   155,   222,   220,   313,   314,   315,     1,
     162,   223,   223,   265,   265,   272,    37,    35,    35,    37,
     309,   215,   319,   210,   200,   277,    14,   277,   277,    14,
     312,   277,   163,   160,   162,   291,   176,   276,   106,   108,
     300,   163,   163,   164,    31,    77,   309,    31,   213,   237,
     160,   238,   160,   246,   209,   309,     1,   182,   182,   165,
       8,   185,   210,   165,   265,   265,   267,   267,   265,    35,
     182,   335,   163,   223,   309,   223,   223,   309,   277,    14,
     292,    16,   228,    82,   301,   302,   303,   304,   220,   176,
     206,   207,   208,   309,   210,   160,   165,   210,   209,    16,
     315,   163,   319,   165,   223,   309,   163,   176,   293,   294,
     295,   319,   309,   183,   183,     8,   184,    16,   176,    16,
     183,     8,   184,   165,   213,    92,   309,   162,   115,    97,
     150,   304,   309,   164,   309,   208,    31,   160,   210,   235,
     174,   177,   178,   300,   176,   259,   210,   163,   160,   160,
     160,   160,   176,   165,   160,   277,   160,   223,   296);
  

/* YYR1[RULE-NUM] -- Symbol kind of the left-hand side of rule RULE-NUM.  */
  
  /** @var int[] */
  public array $yyr1 = array(     0,   169,   170,   171,   171,   172,   173,   173,   174,   174,
     174,   174,   174,   174,   174,   174,   174,   174,   174,   174,
     174,   174,   174,   174,   174,   174,   174,   174,   174,   174,
     174,   174,   174,   174,   174,   174,   174,   174,   174,   174,
     174,   174,   174,   174,   174,   174,   174,   174,   174,   174,
     174,   174,   174,   174,   174,   174,   174,   174,   174,   174,
     174,   174,   174,   174,   174,   174,   174,   174,   174,   174,
     174,   174,   174,   174,   174,   174,   174,   174,   174,   175,
     175,   175,   175,   175,   175,   175,   175,   176,   176,   177,
     178,   179,   179,   179,   180,   180,   181,   181,   182,   183,
     183,   184,   184,   185,   185,   186,   186,   187,   187,   188,
     189,   189,   190,   190,   191,   191,   191,   191,   191,   191,
     191,   191,   191,   191,   191,   192,   192,   193,   193,   194,
     195,   195,   196,   197,   197,   198,   199,   199,   200,   200,
     201,   201,   202,   202,   203,   204,   204,   205,   206,   207,
     207,   208,   209,   209,   210,   211,   211,   211,   211,   212,
     212,   212,   212,   212,   212,   212,   212,   212,   212,   212,
     212,   212,   212,   212,   212,   212,   212,   212,   212,   212,
     212,   212,   212,   213,   213,   214,   214,   215,   215,   216,
     217,   217,   218,   219,   219,   220,   220,   221,   221,   222,
     222,   223,   223,   224,   224,   225,   225,   226,   226,   226,
     226,   226,   227,   227,   228,   228,   229,   229,   230,   230,
     231,   231,   231,   232,   232,   233,   233,   234,   234,   235,
     236,   236,   237,   237,   238,   238,   239,   239,   239,   240,
     241,   241,   242,   243,   243,   243,   243,   244,   244,   245,
     245,   246,   246,   247,   248,   248,   249,   249,   250,   250,
     251,   251,   252,   252,   253,   254,   254,   255,   256,   256,
     257,   257,   258,   258,   258,   258,   259,   259,   260,   260,
     261,   261,   262,   262,   262,   262,   263,   263,   263,   264,
     264,   264,   264,   265,   265,   266,   266,   266,   267,   267,
     268,   268,   269,   269,   270,   270,   271,   271,   272,   273,
     273,   274,   275,   275,   275,   275,   276,   276,   277,   277,
     277,   278,   278,   278,   279,   280,   280,   281,   281,   281,
     281,   282,   283,   283,   284,   285,   286,   286,   287,   287,
     288,   288,   289,   290,   290,   290,   290,   290,   290,   291,
     291,   292,   292,   293,   293,   293,   293,   293,   294,   295,
     295,   296,   296,   297,   297,   298,   298,   299,   299,   300,
     300,   300,   300,   300,   300,   300,   301,   302,   302,   303,
     304,   304,   305,   306,   307,   307,   308,   308,   309,   309,
     309,   309,   309,   309,   309,   309,   309,   309,   309,   309,
     309,   309,   309,   309,   309,   309,   309,   309,   309,   309,
     309,   309,   309,   309,   309,   309,   309,   309,   309,   309,
     309,   309,   309,   309,   309,   309,   309,   309,   309,   309,
     309,   309,   309,   309,   309,   309,   309,   309,   309,   309,
     309,   309,   309,   309,   309,   309,   309,   309,   309,   309,
     309,   309,   309,   309,   309,   309,   309,   309,   309,   309,
     309,   309,   309,   309,   309,   309,   309,   309,   309,   309,
     309,   309,   309,   309,   309,   309,   309,   309,   309,   309,
     309,   310,   311,   311,   312,   312,   313,   314,   314,   315,
     316,   317,   317,   317,   317,   318,   318,   319,   319,   319,
     319,   320,   320,   320,   320,   321,   321,   322,   322,   323,
     323,   323,   324,   324,   325,   325,   325,   325,   325,   325,
     325,   325,   325,   326,   326,   327,   328,   328,   328,   328,
     329,   329,   329,   329,   329,   329,   329,   329,   330,   330,
     331,   331,   331,   331,   332,   332,   333,   333,   333,   334,
     334,   334,   334,   334,   334,   335,   335,   336,   336,   336,
     336,   337,   337,   337,   337,   338,   339,   340,   340,   340,
     340,   340,   340,   340,   341,   341,   341,   342,   342,   342,
     342,   343,   344,   345,   345,   346,   346,   347,   347,   347,
     347,   347,   347,   347,   347,   348,   348,   348,   348,   349,
     350,   351,   351,   351,   351,   351,   351,   351,   351,   352,
     352,   352,   352);
  

/* YYR2[RULE-NUM] -- Number of symbols on the right-hand side of rule RULE-NUM.  */
  
  /** @var int[] */
  public array $yyr2 = array(     0,     2,     1,     2,     0,     1,     1,     1,     1,     1,
       1,     1,     1,     1,     1,     1,     1,     1,     1,     1,
       1,     1,     1,     1,     1,     1,     1,     1,     1,     1,
       1,     1,     1,     1,     1,     1,     1,     1,     1,     1,
       1,     1,     1,     1,     1,     1,     1,     1,     1,     1,
       1,     1,     1,     1,     1,     1,     1,     1,     1,     1,
       1,     1,     1,     1,     1,     1,     1,     1,     1,     1,
       1,     1,     1,     1,     1,     1,     1,     1,     1,     1,
       1,     1,     1,     1,     1,     1,     1,     1,     1,     1,
       1,     1,     1,     1,     1,     1,     1,     1,     1,     1,
       1,     0,     1,     0,     1,     1,     2,     1,     3,     4,
       1,     2,     0,     1,     1,     1,     1,     1,     3,     5,
       4,     3,     4,     2,     3,     1,     1,     7,     6,     2,
       3,     1,     2,     3,     1,     2,     3,     1,     1,     3,
       1,     3,     1,     2,     2,     3,     1,     3,     2,     3,
       1,     3,     2,     0,     1,     1,     1,     1,     1,     3,
       7,    10,     5,     7,     9,     5,     3,     3,     3,     3,
       3,     3,     1,     2,     5,     7,     9,     6,     5,     6,
       3,     2,     1,     1,     1,     0,     2,     1,     3,     8,
       0,     4,     2,     1,     3,     0,     1,     0,     1,     0,
       1,     3,     1,     1,     1,     8,     9,     7,     8,     7,
       6,     8,     0,     2,     0,     2,     1,     2,     1,     2,
       1,     1,     1,     0,     2,     0,     2,     0,     2,     2,
       1,     3,     1,     4,     1,     4,     1,     1,     4,     2,
       1,     3,     3,     3,     4,     4,     5,     0,     2,     4,
       3,     1,     1,     7,     0,     2,     1,     3,     3,     4,
       1,     4,     0,     2,     5,     0,     2,     6,     0,     2,
       0,     3,     1,     2,     1,     1,     2,     0,     1,     3,
       0,     2,     1,     1,     1,     1,     6,     8,     6,     1,
       2,     1,     1,     1,     1,     1,     1,     1,     1,     3,
       3,     3,     1,     3,     3,     3,     3,     3,     1,     3,
       3,     1,     1,     2,     1,     1,     0,     1,     0,     2,
       2,     2,     4,     3,     1,     1,     3,     1,     2,     2,
       3,     2,     3,     1,     1,     2,     3,     1,     1,     3,
       2,     0,     1,     5,     5,    10,     3,     5,     1,     1,
       3,     0,     2,     4,     5,     4,     4,     4,     3,     1,
       1,     1,     1,     1,     1,     0,     1,     1,     2,     1,
       1,     1,     1,     1,     1,     1,     2,     1,     3,     1,
       1,     3,     2,     2,     3,     1,     0,     1,     1,     3,
       3,     3,     4,     1,     1,     2,     3,     3,     3,     3,
       3,     3,     3,     3,     3,     3,     3,     3,     3,     2,
       2,     2,     2,     3,     3,     3,     3,     3,     3,     3,
       3,     3,     3,     3,     3,     3,     3,     3,     3,     3,
       3,     2,     2,     2,     2,     3,     3,     3,     3,     3,
       3,     3,     3,     3,     3,     3,     5,     4,     3,     4,
       4,     2,     2,     4,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     1,     3,     2,     1,     2,
       4,     2,     2,     8,     9,     8,     9,     9,    10,     9,
      10,     8,     3,     2,     0,     4,     2,     1,     3,     2,
       1,     2,     2,     2,     4,     1,     1,     1,     1,     1,
       1,     1,     1,     3,     1,     1,     1,     0,     3,     0,
       1,     1,     0,     1,     1,     1,     1,     1,     1,     1,
       1,     1,     1,     3,     3,     3,     4,     1,     1,     3,
       1,     1,     1,     1,     1,     3,     2,     3,     0,     1,
       1,     3,     1,     1,     1,     1,     1,     3,     1,     1,
       4,     4,     1,     4,     4,     0,     1,     1,     1,     3,
       3,     1,     4,     2,     2,     1,     3,     1,     4,     4,
       3,     3,     3,     3,     1,     3,     1,     1,     3,     1,
       1,     4,     1,     1,     1,     3,     1,     1,     2,     1,
       3,     4,     3,     2,     0,     2,     2,     1,     2,     1,
       1,     1,     4,     3,     3,     3,     3,     6,     3,     1,
       1,     2,     1);
  




  /* YYTRANSLATE(TOKEN-NUM) -- Symbol number corresponding to TOKEN-NUM
     as returned by yylex, with out-of-bounds checking.  */
  private function yytranslate(int $t): SymbolKind
  {
    // Last valid token kind.
    $code_max = 395;
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
       2,     2,     2,    56,   167,     2,   168,    55,     2,     2,
     164,   165,    53,    50,     8,    51,    52,    54,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,    31,   160,
      44,    16,    46,    30,    68,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,    70,     2,   161,    36,     2,   166,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,   162,    35,   163,    58,     2,     2,     2,
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
       2,     2,     2,     2,     2,     1,     2,   113,     3,     4,
       5,     6,     7,     9,    10,    11,    12,    13,    14,    15,
      17,    18,    19,    20,    21,    22,    23,    24,    25,    26,
      27,    28,    29,    32,    33,    34,    37,    38,    39,    40,
      41,    42,    43,    45,    47,    48,    49,    57,    59,    60,
      61,    62,    63,    64,    65,    66,    67,    69,    71,    72,
      73,    74,    75,    76,    77,    78,    79,    80,    81,    82,
      83,    84,    85,    86,    87,    88,    89,    90,    91,    92,
      93,    94,    95,    96,    97,    98,    99,   100,   101,   102,
     103,   104,   105,   106,   107,   108,   109,   110,   111,   112,
     114,   115,   116,   117,   118,   119,   120,   121,   122,   123,
     124,   125,   126,   127,   128,   129,   130,   131,   132,   133,
     134,   135,   136,   137,   138,   139,   140,   141,   142,   143,
     144,   145,   146,   147,   148,   149,   150,   151,   152,   153,
     154,   155,   156,   157,   158,   159);
  


  public const YYLAST = 6304;
  public const YYEMPTY = -2;
  public const YYFINAL = 4;
  public const YYNTOKENS = 169;


}
/* "grammar.y":1379  */

