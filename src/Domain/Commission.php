<?php
declare(strict_types=1);

namespace Ferror\Domain;

/**
 * Commission fees are rounded up to currency's decimal places.
 * For example, 0.023 EUR should be rounded up to 0.03 EUR.
 */
final class Commission
{
    private Money $money;

    public function __construct(Money $money)
    {
        $this->money = $money;
    }

    public function print(): string
    {
        return \sprintf('%s %s', (string) $this->money->getPrice()->getCents() / 100, $this->money->getCurrency()->toString());
    }
}
