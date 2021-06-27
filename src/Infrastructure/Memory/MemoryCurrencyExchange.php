<?php
declare(strict_types=1);

namespace Ferror\Infrastructure\Memory;

use Ferror\Domain\Currency;
use Ferror\Domain\Currency\CurrencyExchange;
use Ferror\Domain\Money;
use Ferror\Domain\Price;

final class MemoryCurrencyExchange implements CurrencyExchange
{
    public function exchange(Money $money, Currency $to): Money
    {
        return new Money(new Price(1), $to);
    }
}
