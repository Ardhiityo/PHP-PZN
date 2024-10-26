<?php

namespace Arya\Mvc\Controller;

class ProductController
{
    public function categories(string $id, string $category)
    {
        echo "Id : $id, Category : $category" . PHP_EOL;
    }
}