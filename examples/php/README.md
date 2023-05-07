# Example

### Installation
```bash
composer install
```

### Regenerate `parser.php` from `grammar.y`
```bash
bison -S ../../src/php-skel.m4 -o lib/parser-tmp.php grammar.y
php bin/replace-dollar-sign.php out lib/parser-tmp.php lib/parser.php
rm lib/parser-tmp.php
```

### Usage
```bash
php bin/parse-bison.php test.php
array(
    0: Stmt_Function(
        attrGroups: array(
        )
        byRef: false
        name: Identifier(
            name: test
        )
        params: array(
            0: Param(
                attrGroups: array(
                )
                flags: 0
                type: null
                byRef: false
                variadic: false
                var: Expr_Variable(
                    name: foo
                )
                default: null
            )
        )
        returnType: null
        stmts: array(
            0: Stmt_Expression(
                expr: Expr_FuncCall(
                    name: Name(
                        parts: array(
                            0: var_dump
                        )
                    )
                    args: array(
                        0: Arg(
                            name: null
                            value: Expr_Variable(
                                name: foo
                            )
                            byRef: false
                            unpack: false
                        )
                    )
                )
            )
        )
    )
)
```

### Benchmarks
```bash
php vendor/bin/phpbench run --report=my-report tests
```
