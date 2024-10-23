<?php

namespace Programmerzamannow\BelajarPhpUnitTest;

use Exception;
use PHPUnit\Framework\TestCase;
use Programmerzamannow\BelajarPhpUnitTest\Product;
use Programmerzamannow\BelajarPhpUnitTest\ProductService;

class ProductServiceTest extends TestCase
{
    private ProductRepository $productRepository;
    private ProductService $productService;

    public function setUp(): void
    {
        $repository = self::createStub(ProductRepository::class);
        $this->productRepository = $repository;

        $this->productService = new ProductService($this->productRepository);
    }

    public function testStub()
    {
        $product = new Product();
        $product->setId("1");
        $this->productRepository->method("findById")
            ->willReturn($product);

        $result = $this->productRepository->findById("1");

        self::assertSame(expected: $product, actual: $result);
        
        self::expectException(Exception::class);
        $this->productService->register($product);
    }
    
    public function testStubMap () {
        $product1 = new Product();
        $product1->setId("1");
        
        $product2 = new Product();
        $product2->setId("2");
        
        $map = [
            ["1" , $product1],
            ["2", $product2]
        ];
        
        $this->productRepository->method("findById")->willReturnMap($map);
        
        self::assertSame(expected: $product1, actual: $this->productRepository->findById("1"));
        
        self::assertSame(expected: $product2, actual: $this->productRepository->findById("2"));
    }

    public function testStubCallBack(): void
    {
        $product = new Product();
        $product->setId("1");
        
        $this->productRepository->method("findById")
        ->willReturnCallback(function ($id): Product {
            $product = new Product();
            $product->setId($id);
            return $product;
        });
        
        self::assertSame(expected: $product->getId(), actual: $this->productRepository->findById("1")->getId());
    }
    
    public function testRegisterSuccess() {
        
        $product = new Product();
        $product->setId("1");
        
        $this->productRepository->method("findById")->willReturn(null);
        $this->productRepository->method("save")->willReturnArgument(0);
        
        $this->productService->register($product);
        
        self::assertSame($product->getId(), $this->productService->register($product)->getId() );
        
    }
    
    public function testRegisterFailed() {
        
        $product = new Product();
        $product->setId("1");
        
        $this->productRepository->method("findById")->willReturn($product);
        
        self::expectException(Exception::class);
        $this->productService->register($product);     
    }

    public function testDeleteSuccess()
    {
        $product = new Product();
        $product->setId("1");
        
        $this->productRepository->method("findById")->willReturn($product);
        
        $this->productService->delete($product->getId());
        
        self::assertTrue(true, "Success delete product");
    }

    public function testDeleteFailed(): void  
    {
        $product = new Product();
        $product->setId("1");
        
        $this->productRepository->method("findById")->willReturn(null);
        
        self::expectException(Exception::class);
        
        $this->productService->delete( $product->getId());
    }
}
