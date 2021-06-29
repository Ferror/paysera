<?php
declare(strict_types=1);

namespace Ferror\Domain\Currency;

use Ferror\Domain\Currency;
use Ferror\Domain\Money;

interface CurrencyExchange
{
    public function exchange(Money $money, Currency $to, \DateTime $date): Money;
    public function getExchangeRate(Currency $from, Currency $to, \DateTime $date): float;
}
