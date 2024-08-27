<?php


// Required & Include

// require akan error apabila file tidak ada (menghentikan aplikasi)
// Error gagal mencari directory
// require "./Lib/MyFunction.php";

// Code ini tidak ada di jalankan jika menggunakan require, karrena error
// echo sayHello("Eko");

// Include tidak akan error apabila file tidak ada, hanya akan memberikan peringatan (tidak menghentikan aplikasi)
// Error gagal mencari code / function (undefined)
// include "./Lib/MysFunction.php";

// Code ini tetap akan di jalankan jika menggunakan include, tetapi hasilnya undefined
// echo sayHello("Eko");


// Required once & Include once
// Ini akan membuat code yang ada di dalam file yang di include hanya akan di include sekali saja, apabila terrdapat require atau include yang sama, maka akan di skip

// Jika tanpa _once maka akan error, karena kita mendeklarasikan nama function sebanyak fille yg dimport  

// include_once "./Lib/MyFunction.php";
// include_once "./Lib/MyFunction.php";

require_once "./Lib/MyFunction.php";
require_once "./Lib/MyFunction.php";

echo sayHello("Eko");
