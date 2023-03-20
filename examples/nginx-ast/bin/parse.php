<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Parser;
use App\Lexer;
use Mrsuh\Tree\Printer;

$lexer  = new Lexer(fopen($argv[1], 'r'));
$parser = new Parser($lexer);
if (!$parser->parse()) {
    exit(1);
}

$printer = new Printer();
$printer->print($parser->getAst());
