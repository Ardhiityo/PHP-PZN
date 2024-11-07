<?php

namespace BelajarPhpPsr\Arya;

class ProductService
{
    public function __construct(public ProductRepository $repository) {}
}
