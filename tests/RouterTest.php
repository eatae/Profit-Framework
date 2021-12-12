<?php

namespace tests;

use App\Controllers\Index;
use App\Router;
use PHPUnit\Framework\TestCase;


class RouterTest extends TestCase
{
    private Router $router;

    protected function setUp(): void
    {
        $this->router = new Router('/');
    }

    public function testCheckDir()
    {
        $rightDir = self::class;
        $wrongDir = 'Wrong';
        $this->assertTrue($this->router->checkDir($rightDir));
        $this->assertFalse($this->router->checkDir($wrongDir));
    }

    public function testConstruct()
    {
        $this->assertEquals('actionAction', $this->router->actionMethodName);
        $this->assertEquals(Index::class, $this->router->ctrlClass);
    }
}