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
php bin/parse.php nginx.conf
.
├── T_SERVER
    ├── T_SERVER_NAME { names: 'domain.tld, www.domain.tld' }
    ├── T_SERVER_ROOT { path: '/var/www/project/public' }
    ├── T_LOCATION { regexp: '' path: '/' }
    │   └── T_TRY_FILES { paths: '$uri, /index.php$is_args$args' }
    ├── T_LOCATION { regexp: '' path: '/bundles' }
    │   └── T_TRY_FILES { paths: '$uri, =404' }
    ├── T_LOCATION { regexp: '~' path: '^/index\.php(/|$)' }
    │   ├── T_FAST_CGI_PATH { path: 'unix:/var/run/php/php-fpm.sock' }
    │   ├── T_FAST_CGI_SPLIT_PATH_INFO { path: '^(.+\.php)(/.*)$' }
    │   ├── T_INCLUDE { path: 'fastcgi_params' }
    │   ├── T_FAST_CGI_PARAM { APP_ENV: 'prod' }
    │   ├── T_FAST_CGI_PARAM { APP_SECRET: '<app-secret-id>' }
    │   ├── T_FAST_CGI_PARAM { DATABASE_URL: '"mysql://db_user:db_pass@host:3306/db_name"' }
    │   ├── T_FAST_CGI_PARAM { SCRIPT_FILENAME: '$realpath_root$fastcgi_script_name' }
    │   ├── T_FAST_CGI_PARAM { DOCUMENT_ROOT: '$realpath_root' }
    │   └── T_INTERNAL
    ├── T_LOCATION { regexp: '~' path: '\.php$' }
    │   └── T_RETURN { code: '404' body: '' }
    ├── T_ERROR_LOG { path: '/var/log/nginx/project_error.log' }
    └── T_ACCESS_LOG { path: '/var/log/nginx/project_access.log' }
```
