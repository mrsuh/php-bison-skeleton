# Example

### Regenerate `parser.php` from `grammar.y`
```bash
bison -S ../../src/php-skel.m4 -o parser.php grammar.y
```

### Usage
```bash
php parser.php <<< "1 + 2"
```
