<?php

namespace BelajarPhpPsr\Arya;

use PHPUnit\Framework\TestCase;
use DI\Container;

use function PHPUnit\Framework\assertInstanceOf;

class ProductTest extends TestCase
{

    public function testManual()
    {
        $repository = new ProductRepository();
        $service = new ProductService($repository);
        $controller = new ProductController($service);

        self::assertInstanceOf(ProductRepository::class, $service->repository);

        self::assertInstanceOf(ProductService::class, $controller->service);
    }

    public function testDependencyInjection()
    {
        $container = new Container();
        $controller = $container->get(ProductController::class);

        self:
        assertInstanceOf(ProductService::class, $controller->service);

        assertInstanceOf(ProductRepository::class, $controller->service->repository);
    }
}
