<?php
declare(strict_types=1);

namespace Ferror\Domain\Currency;

use Ferror\Domain\Currency;
use Ferror\Domain\Money;

interface CurrencyExchange
{
    public function exchange(Money $money, Currency $to): Money;
}
