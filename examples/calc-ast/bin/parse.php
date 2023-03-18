<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Parser;
use App\Lexer;
use Mrsuh\Tree\Printer;

$lexer  = new Lexer(STDIN);
$parser = new Parser($lexer);
if (!$parser->parse()) {
    exit(1);
}

$printer = new Printer(STDOUT);
$printer->print($parser->getAst());
