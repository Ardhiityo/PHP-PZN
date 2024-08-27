<?php

// Cara 1
for ($i = 0; $i < 10; $i++) {
    echo "Hai, ini aku index ke - $i" . PHP_EOL;
}

// Cara 2
for ($i = 0; $i < 10; $i++) :
    echo "Hai, ini aku index ke - $i" . PHP_EOL;
endfor;
