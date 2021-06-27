<?php
declare(strict_types=1);

namespace Ferror\Unit\Domain;

use Ferror\Domain\Price;
use PHPUnit\Framework\TestCase;

final class PriceTest extends TestCase
{
    public function testFromString(): void
    {
        self::assertEquals(100, (new Price(100))->getCents());
        self::assertEquals(10, (new Price(10))->getCents());

//        self::assertEquals(100, Price::fromString('1.00')->getCents());
//        self::assertEquals(100, Price::fromString('1.0')->getCents());
//        self::assertEquals(100, Price::fromString('1')->getCents());
//        self::assertEquals(100, Price::fromString('1.000')->getCents());
//
//        self::assertEquals(120, Price::fromString('1.2')->getCents());
//        self::assertEquals(122, Price::fromString('1.22')->getCents());
//        self::assertEquals(123, Price::fromString('1.222')->getCents());
    }
}
