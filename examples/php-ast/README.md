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

#### PHP 8.2
```bash
php vendor/bin/phpbench run --report=my-report tests
PHPBench (1.2.10) running benchmarks... 
with configuration file: php-bison-skeleton/examples/php/phpbench.json
with PHP version 8.2.8, xdebug ❌, opcache ❌

\Tests\Bench

    benchBisonLittle........................R2 I9 - Mo587.426μs (±0.50%)
    benchKmYaccLittle.......................R1 I6 - Mo423.774μs (±0.51%)
    benchBisonMid...........................R1 I8 - Mo3.998ms (±0.39%)
    benchKmYaccMid..........................R3 I9 - Mo2.317ms (±0.46%)
    benchBisonBig...........................R3 I9 - Mo322.848ms (±0.65%)
    benchKmYaccBig..........................R2 I7 - Mo117.502ms (±0.79%)

Subjects: 6, Assertions: 0, Failures: 0, Errors: 0
+-------------------+-----------+-----------+--------+
| subject           | mem_peak  | mode      | rstdev |
+-------------------+-----------+-----------+--------+
| benchBisonLittle  | 4.421mb   | 587.426μs | ±0.50% |
| benchKmYaccLittle | 36.462mb  | 423.774μs | ±0.51% |
| benchBisonMid     | 4.421mb   | 3.998ms   | ±0.39% |
| benchKmYaccMid    | 62.236mb  | 2.317ms   | ±0.46% |
| benchBisonBig     | 36.336mb  | 322.848ms | ±0.65% |
| benchKmYaccBig    | 195.502mb | 117.502ms | ±0.79% |
+-------------------+-----------+-----------+--------+
```

#### PHP 8.1
```bash
with PHP version 8.1.21, xdebug ❌, opcache ❌

\Tests\Bench

    benchBisonLittle........................R3 I8 - Mo593.993μs (±0.55%)
    benchKmYaccLittle.......................R1 I7 - Mo428.443μs (±0.59%)
    benchBisonMid...........................R2 I5 - Mo4.074ms (±0.51%)
    benchKmYaccMid..........................R1 I0 - Mo2.422ms (±0.45%)
    benchBisonBig...........................R1 I9 - Mo351.040ms (±0.78%)
    benchKmYaccBig..........................R2 I6 - Mo124.781ms (±1.08%)

Subjects: 6, Assertions: 0, Failures: 0, Errors: 0
+-------------------+-----------+-----------+--------+
| subject           | mem_peak  | mode      | rstdev |
+-------------------+-----------+-----------+--------+
| benchBisonLittle  | 4.861mb   | 593.993μs | ±0.55% |
| benchKmYaccLittle | 41.628mb  | 428.443μs | ±0.59% |
| benchBisonMid     | 4.861mb   | 4.074ms   | ±0.51% |
| benchKmYaccMid    | 86.217mb  | 2.422ms   | ±0.45% |
| benchBisonBig     | 49.956mb  | 351.040ms | ±0.78% |
| benchKmYaccBig    | 319.161mb | 124.781ms | ±1.08% |
+-------------------+-----------+-----------+--------+

```

#### PHP 8.0
```bash
php vendor/bin/phpbench run --report=my-report tests
PHPBench (1.2.10) running benchmarks... 
with configuration file: php-bison-skeleton/examples/php/phpbench.json
with PHP version 8.0.29, xdebug ❌, opcache ❌

\Tests\Bench

    benchBisonLittle........................R1 I9 - Mo608.748μs (±0.48%)
    benchKmYaccLittle.......................R1 I5 - Mo440.669μs (±0.51%)
    benchBisonMid...........................R1 I1 - Mo4.272ms (±0.50%)
    benchKmYaccMid..........................R1 I9 - Mo2.561ms (±0.56%)
    benchBisonBig...........................R1 I9 - Mo357.727ms (±0.79%)
    benchKmYaccBig..........................R1 I9 - Mo133.328ms (±0.78%)

Subjects: 6, Assertions: 0, Failures: 0, Errors: 0
+-------------------+-----------+-----------+--------+
| subject           | mem_peak  | mode      | rstdev |
+-------------------+-----------+-----------+--------+
| benchBisonLittle  | 4.968mb   | 608.748μs | ±0.48% |
| benchKmYaccLittle | 38.075mb  | 440.669μs | ±0.51% |
| benchBisonMid     | 4.968mb   | 4.272ms   | ±0.50% |
| benchKmYaccMid    | 82.583mb  | 2.561ms   | ±0.56% |
| benchBisonBig     | 50.066mb  | 357.727ms | ±0.79% |
| benchKmYaccBig    | 319.042mb | 133.328ms | ±0.78% |
+-------------------+-----------+-----------+--------+
```

#### PHP 7.4
```bash
 php vendor/bin/phpbench run --report=my-report tests
PHPBench (1.2.10) running benchmarks... 
with configuration file: php-bison-skeleton/examples/php/phpbench.json
with PHP version 7.4.33, xdebug ❌, opcache ❌

\Tests\Bench

    benchBisonLittle........................R1 I4 - Mo620.894μs (±0.38%)
    benchKmYaccLittle.......................R5 I8 - Mo446.706μs (±0.47%)
    benchBisonMid...........................R1 I9 - Mo4.496ms (±0.55%)
    benchKmYaccMid..........................R1 I6 - Mo2.822ms (±0.59%)
    benchBisonBig...........................R1 I9 - Mo501.131ms (±0.66%)
    benchKmYaccBig..........................R1 I9 - Mo277.043ms (±0.55%)

Subjects: 6, Assertions: 0, Failures: 0, Errors: 0
+-------------------+-----------+-----------+--------+
| subject           | mem_peak  | mode      | rstdev |
+-------------------+-----------+-----------+--------+
| benchBisonLittle  | 4.854mb   | 620.894μs | ±0.38% |
| benchKmYaccLittle | 38.026mb  | 446.706μs | ±0.47% |
| benchBisonMid     | 4.854mb   | 4.496ms   | ±0.55% |
| benchKmYaccMid    | 84.507mb  | 2.822ms   | ±0.59% |
| benchBisonBig     | 51.479mb  | 501.131ms | ±0.66% |
| benchKmYaccBig    | 333.178mb | 277.043ms | ±0.55% |
+-------------------+-----------+-----------+--------+
```