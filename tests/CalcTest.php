<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use \Symfony\Component\Process\Process;

class CalcTest extends TestCase
{
    private string $skeletonPath      = __DIR__ . '/../src/php-skel.m4';
    private string $examplesDirectory = __DIR__ . '/../examples/';

    public function successfullyProvider(): array
    {
        return [
            ['calc-both/grammar.y', '1 + 2', "3\n3\n"],
            ['calc-pull/grammar.y', '1 + 2', "3\n"],
            ['calc-pull-lexer/grammar.y', '1 + 2', "3\n"],
            ['calc-pull-locations/grammar.y', '1 + 2', "3\n"],
            ['calc-pull-locations-int/grammar.y', '1 + 2', "3\n"],
            ['calc-pull-several/grammar.y', '1 + 2', "3\n3\n3\n3\n3\n3\n3\n3\n3\n3\n"],
            ['calc-push/grammar.y', '1 + 2', "3\n"],
            ['calc-push-locations/grammar.y', '1 + 2', "3\n"],
            ['calc-push-locations-int/grammar.y', '1 + 2', "3\n"],
            ['calc-push-several/grammar.y', '1 + 2', "3\n3\n3\n3\n3\n3\n3\n3\n3\n3\n"],
        ];
    }

    /**
     * @dataProvider successfullyProvider
     */
    public function testSuccessfully(string $relativeGrammarPath, string $input, string $output): void
    {
        $parserPath = $this->generateParser($this->getFileContent($relativeGrammarPath));
        $process    = $this->runParser($parserPath, $input);
        $this->assertEquals($output, $process->getOutput());
    }

    public function errorSimpleProvider(): array
    {
        return [
            ['calc-both/grammar.y', '1 +', "syntax error\n"],
            ['calc-pull/grammar.y', '1 +', "syntax error\n"],
            ['calc-pull-lexer/grammar.y', '1 +', "syntax error\n"],
            ['calc-pull-locations/grammar.y', '1 +', "[1.1]-[1.2]: syntax error\n"],
            ['calc-pull-locations-int/grammar.y', '1 +', "1-2: syntax error\n"],
            ['calc-pull-several/grammar.y', '1 +', "syntax error\n"],
            ['calc-push/grammar.y', '1 +', "syntax error\n"],
            ['calc-push-locations/grammar.y', '1 +', "[1.1]-[1.2]: syntax error\n"],
            ['calc-push-locations-int/grammar.y', '1 +', "1-2: syntax error\n"],
            ['calc-push-several/grammar.y', '1 +', "syntax error\n"],
        ];
    }

    /**
     * @dataProvider errorSimpleProvider
     */
    public function testErrorSimple(string $relativeGrammarPath, string $input, string $output): void
    {
        $parserPath = $this->generateParser("%define parse.error simple\n" . $this->getFileContent($relativeGrammarPath));
        $process    = $this->runParser($parserPath, $input);
        $this->assertEquals($output, $process->getOutput());
    }

    public function errorDetailedProvider(): array
    {
        return [
            ['calc-both/grammar.y', '1 +', "syntax error, got end of file, but expecting T_NUMBER\n"],
            ['calc-pull/grammar.y', '1 +', "syntax error, got end of file, but expecting T_NUMBER\n"],
            ['calc-pull-lexer/grammar.y', '1 +', "syntax error, got end of file, but expecting T_NUMBER\n"],
            ['calc-pull-locations/grammar.y', '1 +', "[1.1]-[1.2]: syntax error, got end of file, but expecting T_NUMBER\n"],
            ['calc-pull-locations-int/grammar.y', '1 +', "1-2: syntax error, got end of file, but expecting T_NUMBER\n"],
            ['calc-pull-several/grammar.y', '1 +', "syntax error, got end of file, but expecting T_NUMBER\n"],
            ['calc-push/grammar.y', '1 +', "syntax error, got end of file, but expecting T_NUMBER\n"],
            ['calc-push-locations/grammar.y', '1 +', "[1.1]-[1.2]: syntax error, got end of file, but expecting T_NUMBER\n"],
            ['calc-push-locations-int/grammar.y', '1 +', "1-2: syntax error, got end of file, but expecting T_NUMBER\n"],
            ['calc-push-several/grammar.y', '1 +', "syntax error, got end of file, but expecting T_NUMBER\n"],
        ];
    }

    /**
     * @dataProvider errorDetailedProvider
     */
    public function testErrorDetailed(string $relativeGrammarPath, string $input, string $output): void
    {
        $parserPath = $this->generateParser("%define parse.error detailed\n" . $this->getFileContent($relativeGrammarPath));
        $process    = $this->runParser($parserPath, $input);
        $this->assertEquals($output, $process->getOutput());
    }

    /**
     * @dataProvider errorDetailedProvider
     */
    public function testErrorVerbose(string $relativeGrammarPath, string $input, string $output): void
    {
        $parserPath = $this->generateParser("%define parse.error verbose\n" . $this->getFileContent($relativeGrammarPath));
        $process    = $this->runParser($parserPath, $input);
        $this->assertEquals($output, $process->getOutput());
    }

    public function errorCustomProvider(): array
    {
        return [
            ['calc-pull/grammar.y', '1 +', "syntax error\n"],
            ['calc-push/grammar.y', '1 +', "syntax error\n"],
        ];
    }

    /**
     * @dataProvider errorCustomProvider
     */
    public function testErrorCustom(string $relativeGrammarPath, string $input, string $output): void
    {
        $parserPath = $this->generateParser("%define parse.error custom\n" . $this->getFileContent($relativeGrammarPath));
        $process    = $this->runParser($parserPath, $input);
        $this->assertEquals($output, $process->getOutput());
    }

    /**
     * @dataProvider successfullyProvider
     */
    public function testExtends(string $relativeGrammarPath, string $input, string $output): void
    {
        $header = '
            %define api.namespace {App\MyNamespace;}
            %define api.parser.final
            %define api.parser.extends {ParserExtends}
            %define api.parser.implements {ParserInterface}

            %code imports {
                use App\ImportClass;
            };
            
            %code top {
                class ParserExtends {};
                interface ParserInterface {};
            };
            
            %code init {
                /** init code */
            };
            
            %code epilogue {                
                /** epilogue code */
            };
        ';

        $parserPath = $this->generateParser($header . $this->getFileContent($relativeGrammarPath));
        $process    = $this->runParser($parserPath, $input);
        $this->assertSame($output, $process->getOutput());

        $parserContent = file_get_contents($parserPath);
        $this->assertStringContainsString('final class Parser extends ParserExtends implements ParserInterface', $parserContent);
        $this->assertStringContainsString('namespace App\MyNamespace;', $parserContent);
        $this->assertStringContainsString('use App\ImportClass;', $parserContent);
        $this->assertStringContainsString('class ParserExtends', $parserContent);
        $this->assertStringContainsString('interface ParserInterface {}', $parserContent);
        $this->assertStringContainsString('/** init code */', $parserContent);
        $this->assertStringContainsString('/** epilogue code */', $parserContent);
    }

    /**
     * @dataProvider successfullyProvider
     */
    public function testParseTrace(string $relativeGrammarPath, string $input, string $output): void
    {
        $header = '
            %define parse.trace
            %code init {
                $this->setDebugLevel(1);
            }
        ';

        $parserPath = $this->generateParser($header . $this->getFileContent($relativeGrammarPath));

        $process = $this->runParser($parserPath, $input);
        $this->assertSame($output, $process->getOutput());
        $errorOutput = $process->getErrorOutput();

        $this->assertStringContainsString('Starting parse', $errorOutput);
        $this->assertStringContainsString('Reading a token', $errorOutput);
        $this->assertStringContainsString('Entering state', $errorOutput);
        $this->assertStringContainsString('Next token is', $errorOutput);
        $this->assertStringContainsString('Shifting token', $errorOutput);
        $this->assertStringContainsString('Stack now', $errorOutput);
        $this->assertStringContainsString('Reducing stack by rule', $errorOutput);
    }

    /**
     * @dataProvider successfullyProvider
     */
    public function testParseLAC(string $relativeGrammarPath, string $input, string $output): void
    {
        $header = '
            %define parse.trace
            %define parse.lac full
            %code init {
                $this->setDebugLevel(1);
            }
        ';

        $parserPath = $this->generateParser($header . $this->getFileContent($relativeGrammarPath));
        $process    = $this->runParser($parserPath, $input);
        $this->assertEquals($output, $process->getOutput());

        $errorOutput = $process->getErrorOutput();

        $this->assertStringContainsString('Starting parse', $errorOutput);
        $this->assertStringContainsString('Reading a token', $errorOutput);
        $this->assertStringContainsString('Entering state', $errorOutput);
        $this->assertStringContainsString('Next token is', $errorOutput);
        $this->assertStringContainsString('Shifting token', $errorOutput);
        $this->assertStringContainsString('Stack now', $errorOutput);
        $this->assertStringContainsString('Reducing stack by rule', $errorOutput);

        $this->assertStringContainsString('LAC: initial context established for', $errorOutput);
        $this->assertStringContainsString('LAC: checking lookahead end of file', $errorOutput);
        $this->assertStringContainsString('LAC: initial context discarded due to shift', $errorOutput);
    }

    private function getFileContent(string $relativeFilePath): string
    {
        return file_get_contents($this->examplesDirectory . $relativeFilePath);
    }

    private function generateParser($grammarContent): string
    {
        $grammarPath = sys_get_temp_dir() . '/grammar.y';
        file_put_contents($grammarPath, $grammarContent);

        $parserPath = sys_get_temp_dir() . '/parser.php';

        $process = new Process(['bison', '-S', $this->skeletonPath, '-o', $parserPath, $grammarPath]);
        $process->run();

        $this->assertTrue($process->isSuccessful());

        return $parserPath;
    }

    private function runParser(string $parserPath, string $input): Process
    {
        $process = new Process(['php', $parserPath]);
        $process->setInput($input);
        $process->run();

        return $process;
    }
}
