<?php


namespace Data;

class Shape
{
    public function getCorner(): int
    {
        return 0;
    }
}

class Rectangle extends Shape
{
    public function getCorner(): int
    {
        return 4;
    }

    public function getParentCorner(): int
    {
        // Sebelum menggunakan parent keyword, tetapi ini sebenarnya adalah mengakses ke getCorner yg ada di class ini, bukan parentnya
        // return $this->getCorner()

        // kata kunci parent membuat turunan nya bisa mengakses parentnya
        return parent::getCorner();
    }
}
