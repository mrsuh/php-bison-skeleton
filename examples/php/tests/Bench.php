<?php

namespace Tests;

use App\Lexer;
use App\Parser;
use PhpParser\Lexer\Emulative;
use PhpParser\Parser\Php7;

/**
 * @BeforeMethods("setUp")
 */
class Bench
{
    private string $littleContent = '';
    private string $midContent    = '';
    private string $bigContent    = '';

    public function setUp()
    {
        // 684B
        $this->littleContent = file_get_contents(__DIR__ . '/../bin/parse-bison.php');

        // 8.8K
        $this->midContent = file_get_contents(__DIR__ . '/../vendor/nikic/php-parser/lib/PhpParser/Lexer/Emulative.php');

        // 329KB
        $this->bigContent = file_get_contents(__DIR__ . '/../lib/parser.php');
    }

    /**
     * @BeforeMethods("setUp")
     * @Revs(100)
     * @Iterations(10)
     * @RetryThreshold(1.0)
     */
    public function benchBisonLittle()
    {
        $this->bisonParse($this->littleContent);
    }

    /**
     * @BeforeMethods("setUp")
     * @Revs(100)
     * @Iterations(10)
     * @RetryThreshold(1.0)
     */
    public function benchNikicLittle()
    {
        $this->nikicParse($this->littleContent);
    }

    /**
     * @BeforeMethods("setUp")
     * @Revs(100)
     * @Iterations(10)
     * @RetryThreshold(1.0)
     */
    public function benchBisonMid()
    {
        $this->bisonParse($this->midContent);
    }

    /**
     * @BeforeMethods("setUp")
     * @Revs(100)
     * @Iterations(10)
     * @RetryThreshold(1.0)
     */
    public function benchNikicMid()
    {
        $this->nikicParse($this->midContent);
    }

    /**
     * @BeforeMethods("setUp")
     * @Revs(10)
     * @Iterations(10)
     * @RetryThreshold(2.0)
     */
    public function benchBisonBig()
    {
        $this->bisonParse($this->bigContent);
    }

    /**
     * @BeforeMethods("setUp")
     * @Revs(10)
     * @Iterations(10)
     * @RetryThreshold(2.0)
     */
    public function benchNikicBig()
    {
        $this->nikicParse($this->bigContent);
    }

    private function nikicParse(string $code): void
    {
        $lexer  = new Emulative();
        $parser = new Php7($lexer);
        $parser->parse($code);
    }

    private function bisonParse(string $code): void
    {
        $lexer  = new Lexer($code);
        $parser = new Parser($lexer);

        $status = Parser::YYPUSH_MORE;
        do {
            $token  = $lexer->yylex();
            $value  = $lexer->getLVal();
            $status = $parser->push_parse($token, $value);
        } while ($status === Parser::YYPUSH_MORE);

        if ($status !== Parser::YYACCEPT) {
            throw new \RuntimeException('Status error');
        }
    }
}
