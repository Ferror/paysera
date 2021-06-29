<?php
declare(strict_types=1);

namespace Ferror\Integration\Infrastructure\Exchangerates;

use Ferror\Domain\Currency;
use Ferror\Domain\Money;
use Ferror\Domain\Price;
use Ferror\Infrastructure\Exchangerates\CurrencyExchange;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

final class CurrencyExchangeTest extends KernelTestCase
{
    private CurrencyExchange $exchange;

    protected function setUp(): void
    {
        self::bootKernel();
        //@phpstan-ignore-next-line
        $this->exchange = static::getContainer()->get(CurrencyExchange::class);
    }

    public function testItGetsExchangeRate(): void
    {
        $rate = $this->exchange->getExchangeRate(
            new Currency('EUR'),
            new Currency('USD'),
            //@phpstan-ignore-next-line
            \DateTime::createFromFormat('Y-m-d', '2021-06-27')
        );

        self::assertEquals(1.194158, $rate);
    }

    public function testItExchanges(): void
    {
        $money = $this->exchange->exchange(
            new Money(new Price(100), new Currency('EUR')),
            new Currency('USD'),
            //@phpstan-ignore-next-line
            \DateTime::createFromFormat('Y-m-d', '2021-06-27')
        );

        self::assertTrue($money->getCurrency()->equals(new Currency('USD')));
        self::assertEquals(119, $money->getPrice()->getCents());
    }
}
