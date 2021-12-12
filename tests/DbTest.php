<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use App\Db;


class DbTest extends TestCase
{
    private static Db $db;

    public static function setUpBeforeClass(): void
    {
        self::$db = new Db( getPdo() );
    }


}