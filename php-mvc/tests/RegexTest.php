<?php

namespace Arya\Mvc;

use PHPUnit\Framework\TestCase;

class RegexTest extends TestCase {
   public function testRegex() {
       
      $pattern = "#^/product/([0-9a-zA-Z]*)/categories/([0-9a-zA-Z]*)$#";
       
      $path = "/product/1235/categories/456";
      
      $result = preg_match($pattern, $path, $matches);
      
      self::assertEquals(1, $result);
      
      var_dump($matches);
      
   }
}
