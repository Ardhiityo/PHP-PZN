<?php

$a = 1;
do {
    echo "$a" . PHP_EOL;
    $a++;

    if ($a > 10) {
        break;
    }
} while (true);

for ($i = 0; $i < 20; $i++) {
    if ($i % 2 == 0) {
        continue;
    }
    echo $i . PHP_EOL;
}
