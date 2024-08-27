<?php

goto a;
echo 'Ini akan terskip';

a:
echo 'Justru ini yg akan dijalankan';

$counter = 1;
while (true) {
    echo "Counter: $counter" . PHP_EOL;
    $counter++;
    if ($counter > 10) {
        goto end;
    }
}

end:
echo 'End Loop';
