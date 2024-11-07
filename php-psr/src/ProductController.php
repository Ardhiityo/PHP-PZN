<?php

namespace BelajarPhpPsr\Arya;

class ProductController
{
    public function __construct(public ProductService $service) {}
}
