# Example

### Installation
```bash
composer install
```

### Regenerate `parser.php` from `grammar.y`
```bash
bison -S ../../src/php-skel.m4 -o lib/parser.php grammar.y
```

### Usage
```bash
php bin/parse.php <<< "1 + 2 - 3"
.
├── OPERATION_MINUS
    ├── OPERATION_PLUS
    │   ├── NUMBER '1'
    │   └── NUMBER '2'
    └── NUMBER '3'
```
