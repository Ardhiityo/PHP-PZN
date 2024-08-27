<?php

$date = new DateTime();
$date->setDate(2020, 10, 10);

// Nambah 1 tahun
$date->add(new DateInterval("P1Y"));
var_dump($date);

// Nambah 1 bulan
$date->add(new DateInterval("P1M"));
var_dump($date);


// Mengurangi 1 bulan
$date2 = new DateTime();
$minusOneMonth = new DateInterval("P1M");

// Value 1 / true
$minusOneMonth->invert = 1;
$date2->add($minusOneMonth);

var_dump($date2);
