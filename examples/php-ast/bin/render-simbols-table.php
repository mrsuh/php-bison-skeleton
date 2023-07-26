<?php

require_once __DIR__ . '/../vendor/autoload.php';

$bison = [];
foreach ((new ReflectionClass (\App\LexerInterface::class))->getConstants() as $name => $value) {
    $bison[$name] = $value;
}

$nikic = [];
foreach ((new ReflectionClass (\PhpParser\Parser\Tokens::class))->getConstants() as $name => $value) {
    $nikic[$name] = $value;
}

$tableBuilder = new \MaddHatter\MarkdownTable\Builder();

$tableBuilder->headers(['token', 'bison', 'nikic', 'match']);

foreach($bison as $name => $value) {
    $nValue = $nikic[$name] ?? 'unknown';
    $tableBuilder->row([
        $name,
        $value,
        $nValue,
        $value === $nValue ? '+' : ''
    ]);
}

foreach($nikic as $name => $value) {
    if(isset($bison[$name])) {
        continue;
    }
    $tableBuilder->row([
        $name,
        'unknown',
        $value
    ]);

}

echo $tableBuilder->render();

