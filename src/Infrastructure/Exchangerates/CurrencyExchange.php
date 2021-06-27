<?php
declare(strict_types=1);

namespace Ferror\Infrastructure\Exchangerates;

use Ferror\Domain\Currency;
use Ferror\Domain\CurrencyExchange as CurrencyExchangeInterface;
use Ferror\Domain\Money;
use Ferror\Domain\Price;

final class CurrencyExchange implements CurrencyExchangeInterface
{
    public function exchange(Money $money, Currency $to): Money
    {
        return new Money(new Price(1), new Currency('USD'));
    }
}
