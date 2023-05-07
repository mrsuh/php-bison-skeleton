<?php

require_once __DIR__ . '/../vendor/autoload.php';

use \App\Parser;
use \App\Lexer;
use PhpParser\NodeDumper;

$code = file_get_contents($argv[1]);

$lexer  = new Lexer($code);
$parser = new Parser($lexer);
try {
    $status = Parser::YYPUSH_MORE;
    do {
        $token  = $lexer->yylex();
        $value  = $lexer->getLVal();
        $status = $parser->push_parse($token, $value);
    } while ($status === Parser::YYPUSH_MORE);
    if ($status !== Parser::YYACCEPT) {
        throw new \RuntimeException('Status error');
    }
} catch (\Throwable $exception) {
    echo "Parse error: {$exception->getMessage()}\n";
    exit(1);
}

$dumper = new NodeDumper();
echo $dumper->dump($parser->getAst()) . "\n";
