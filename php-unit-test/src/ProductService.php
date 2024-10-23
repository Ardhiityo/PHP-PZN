<?php

namespace Programmerzamannow\BelajarPhpUnitTest;

use Exception;

class ProductService
{
    public function __construct(private ProductRepository $productRepository) {}

    public function register(Product $product): Product
    {
        if ($this->productRepository->findById($product->getId()) != null) {
            throw new Exception("Product is already exists");
        }

        return $this->productRepository->save($product);
    }
    
    public function delete(string $id): void   {
        $product = $this->productRepository->findById($id);
        if ($product == null)  {
            throw new Exception("Product is not found");
        }
        
     $this->productRepository->delete($id);
    }
}
