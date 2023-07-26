<?php

switch ($argv[1]) {
    case 'in':
        file_put_contents($argv[3],
            preg_replace(
                ['/\$this\-\>semStack\[([^\]]+)\]/', '/([^\$\'])(\$)([^\d\$])/'],
                ['$1', '$1__DOLLAR__$3'],
                file_get_contents($argv[2])
            )
        );
        break;
    case 'out':
        file_put_contents($argv[3],
            str_replace(
                '__DOLLAR__',
                '$',
                file_get_contents($argv[2])
            )
        );
        break;
}
