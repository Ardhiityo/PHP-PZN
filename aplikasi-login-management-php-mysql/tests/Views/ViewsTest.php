<?php

namespace Arya\Mvc\Views;

use Arya\Mvc\App\View;
use PHPUnit\Framework\TestCase;

class ViewsTest extends TestCase
{
    public function testRender()
    {

        View::render("login");

        self::expectOutputRegex("[Login]");
    }
}
