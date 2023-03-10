<?php

require_once __DIR__ . '/../vendor/autoload.php';

use \Symfony\Component\Process\Process;

$examplesDirectory = __DIR__ . '/../examples';
$skeletonPath = __DIR__ . '/../src/php-skel.m4';

foreach(scandir($examplesDirectory) as $directoryName) {
    $grammarPath = $examplesDirectory . '/' . $directoryName  . '/grammar.y';
    if(!is_file($grammarPath)) {
        continue;
    }

    echo $directoryName . PHP_EOL;

    $parserPath = $examplesDirectory . '/' . $directoryName  . '/parser.php';

    $process = new Process(['bison', '-S', $skeletonPath, '-o', $parserPath, $grammarPath]);
    $process->mustRun();
}
