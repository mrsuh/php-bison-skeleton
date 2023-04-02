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
php bin/parse.php test.json 
.
├── T_OBJECT
    ├── T_STRING: 'fieldString'
    │   └── T_STRING: 'string'
    ├── T_STRING: 'fieldNumber'
    │   └── T_NUMBER: '99'
    ├── T_STRING: 'fieldBoolTrue'
    │   └── T_BOOL: 'true'
    ├── T_STRING: 'fieldBoolFalse'
    │   └── T_BOOL: 'false'
    ├── T_STRING: 'fieldNull'
    │   └── T_NULL: 'null'
    ├── T_STRING: 'fieldEmptyArray'
    │   └── T_ARRAY
    ├── T_STRING: 'fieldEmptyObject'
    │   └── T_OBJECT
    └── T_STRING: 'fieldArray'
        └── T_ARRAY
            ├── T_STRING: 'string'
            ├── T_NUMBER: '99'
            ├── T_BOOL: 'true'
            ├── T_BOOL: 'false'
            ├── T_NULL: 'null'
            ├── T_OBJECT
            └── T_ARRAY
```
