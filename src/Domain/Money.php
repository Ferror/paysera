<?php
declare(strict_types=1);

namespace Ferror\Domain;

final class Money
{
    private Price $price;
    private Currency $currency;

    public function __construct(Price $price, Currency $currency)
    {
        $this->price = $price;
        $this->currency = $currency;
    }
}
