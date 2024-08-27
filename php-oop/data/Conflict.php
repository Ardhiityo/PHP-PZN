<?php

// PHP memiliki fitur namespace, dimana kita bisa menyimpan class-class kita di dalam namespace
// Namespace bisa nested, dan jika kita ingin mengakses class yang terdapat di namespace, kita perlu menyebutkan nama namespace nya
// Namespace bagus ketika kita punya beberapa class yang sama, dengan menggunakan namespace nama class sama tidak akan menjadikan error di PHP

namespace Data\One {
    class Conflict {};
    class Sample {};
    class Dummy {};
}

namespace Data\Two {
    class Conflict {}
}
