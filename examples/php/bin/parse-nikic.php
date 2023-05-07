<?php

use PhpParser\Lexer\Emulative;
use PhpParser\NodeDumper;
use PhpParser\Parser\Php7;

require_once __DIR__ . '/../vendor/autoload.php';

$code = file_get_contents($argv[1]);

$parser = new Php7(new Emulative());
try {
    $ast = $parser->parse($code);
} catch (Error $error) {
    echo "Parse error: {$error->getMessage()}\n";
    exit(1);
}

$dumper = new NodeDumper();
echo $dumper->dump($ast) . "\n";
