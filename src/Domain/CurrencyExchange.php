<?php
declare(strict_types=1);

namespace Ferror\Domain;

interface CurrencyExchange
{
    public function exchange(Money $money, Currency $to): Money;
}
