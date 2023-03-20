<?php

namespace App;

use Doctrine\Common\Lexer\AbstractLexer;

class Lexer extends AbstractLexer implements LexerInterface
{
    private int $context = 0;

    public function __construct($resource)
    {
        $this->setInput(stream_get_contents($resource));
        $this->moveNext();
    }

    protected function getCatchablePatterns(): array
    {
        return [
            ';'
        ];
    }

    protected function getNonCatchablePatterns(): array
    {
        return [
            ' ',
            '[\n]+',
            '#[^\n]+'
        ];
    }

    protected function getType(&$value): int
    {
        switch ($value) {
            case 'server':
                $this->context = LexerInterface::T_SERVER;

                return LexerInterface::T_SERVER;
            case 'server_name':
                $this->context = LexerInterface::T_SERVER_NAME;

                return LexerInterface::T_SERVER_NAME;
            case 'root':
                $this->context = LexerInterface::T_SERVER_ROOT;

                return LexerInterface::T_SERVER_ROOT;
            case 'location':
                $this->context = LexerInterface::T_LOCATION;

                return LexerInterface::T_LOCATION;
            case 'return':
                $this->context = LexerInterface::T_RETURN;

                return LexerInterface::T_RETURN;
            case 'error_log':
                $this->context = LexerInterface::T_ERROR_LOG;

                return LexerInterface::T_ERROR_LOG;
            case 'access_log':
                $this->context = LexerInterface::T_ACCESS_LOG;

                return LexerInterface::T_ACCESS_LOG;
            case 'fastcgi_pass':
                $this->context = LexerInterface::T_FAST_CGI_PATH;

                return LexerInterface::T_FAST_CGI_PATH;
            case 'fastcgi_split_path_info':
                $this->context = LexerInterface::T_FAST_CGI_SPLIT_PATH_INFO;

                return LexerInterface::T_FAST_CGI_SPLIT_PATH_INFO;
            case 'fastcgi_param':
                $this->context = LexerInterface::T_FAST_CGI_PARAM;

                return LexerInterface::T_FAST_CGI_PARAM;
            case 'include':
                $this->context = LexerInterface::T_INCLUDE;

                return LexerInterface::T_INCLUDE;
            case 'internal':
                $this->context = LexerInterface::T_INTERNAL;

                return LexerInterface::T_INTERNAL;
            case 'try_files':
                $this->context = LexerInterface::T_TRY_FILES;

                return LexerInterface::T_TRY_FILES;
            default:

                if (in_array($value, [';', '{'], true)) {
                    $this->context = 0;

                    return ord($value);
                }

                switch ($this->context) {
                    case LexerInterface::T_LOCATION:
                        if (strpos($value, '~') === 0) {
                            $this->context = LexerInterface::T_LOCATION_PATH_REGEXP;

                            return LexerInterface::T_LOCATION_PATH_REGEXP;
                        }

                        return LexerInterface::T_LOCATION_PATH;
                    case LexerInterface::T_LOCATION_PATH_REGEXP:
                        return LexerInterface::T_LOCATION_PATH;
                    case LexerInterface::T_RETURN:
                        $this->context = LexerInterface::T_RETURN_CODE;

                        return LexerInterface::T_RETURN_CODE;
                    case LexerInterface::T_RETURN_CODE:
                        return LexerInterface::T_RETURN_BODY;
                    case LexerInterface::T_SERVER_ROOT:
                        return LexerInterface::T_SERVER_ROOT_PATH;
                    case LexerInterface::T_SERVER_NAME:
                        return LexerInterface::T_SERVER_NAME_VALUE;
                    case LexerInterface::T_ERROR_LOG:
                        return LexerInterface::T_ERROR_LOG_PATH;
                    case LexerInterface::T_ACCESS_LOG:
                        return LexerInterface::T_ACCESS_LOG_PATH;
                    case LexerInterface::T_FAST_CGI_PATH:
                        return LexerInterface::T_FAST_CGI_PATH_PATH;
                    case LexerInterface::T_FAST_CGI_SPLIT_PATH_INFO:
                        return LexerInterface::T_FAST_CGI_SPLIT_PATH_INFO_PATH;
                    case LexerInterface::T_FAST_CGI_PARAM:
                        $this->context = LexerInterface::T_FAST_CGI_PARAM_KEY;

                        return LexerInterface::T_FAST_CGI_PARAM_KEY;
                    case LexerInterface::T_FAST_CGI_PARAM_KEY:
                        return LexerInterface::T_FAST_CGI_PARAM_VALUE;
                    case LexerInterface::T_INCLUDE:
                        return LexerInterface::T_INCLUDE_PATH;
                    case LexerInterface::T_TRY_FILES:
                        return LexerInterface::T_TRY_FILES_PATH;
                    case LexerInterface::T_TRY_FILES_PATH:
                        return LexerInterface::T_TRY_FILES_PATH;
                }
        }

        return ord($value);
    }

    public function yyerror(string $message): void
    {
        printf("%s\n", $message);
    }

    public function getLVal()
    {
        return $this->token->value;
    }

    public function yylex(): int
    {
        if (!$this->lookahead) {
            return LexerInterface::YYEOF;
        }

        $this->moveNext();

        return $this->token->type;
    }
}
