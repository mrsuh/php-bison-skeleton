# PHP skeleton for Bison

![](https://github.com/mrsuh/php-bison-skeleton/actions/workflows/tests.yml/badge.svg)
![](https://img.shields.io/github/license/mrsuh/php-bison-skeleton.svg)
![](https://img.shields.io/github/v/release/mrsuh/php-bison-skeleton)

A set of Bison skeleton files that can be used to generate a Bison parser written in PHP.

### Requirements:
* PHP >= 7.4
* Bison >= 3.8

### Installation
```bash
composer require --dev mrsuh/php-bison-skeleton
```

### Usage
```bash
bison -S vendor/mrsuh/php-bison-skeleton/src/php-skel.m4 -o parser.php grammar.y
```

### Example
You can find examples in the [examples directory](./examples)
