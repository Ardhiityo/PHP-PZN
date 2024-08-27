<?php

class MyClass {}

$myClass = new MyClass();

// Cara lama mendapatkan class
var_dump(get_class($myClass));
var_dump(MyClass::class);

// Cara baru mendapatkan class
var_dump(myClass::class);
