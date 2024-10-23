<?php

namespace Programmerzamannow\BelajarPhpUnitTest;

interface ProductRepository
{
    function save(Product $product): Product;
    function delete(string $id): void;
    function findById(string $id): ?Product;
    function findAll(): array;
}
