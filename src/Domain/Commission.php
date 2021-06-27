<?php
declare(strict_types=1);

namespace Ferror\Domain;

/**
 * Commission fees are rounded up to currency's decimal places.
 * For example, 0.023 EUR should be rounded up to 0.03 EUR.
 */
final class Commission
{
//    private int $cents;
//
//    public static function fromString(string $price): self
//    {
//        $tmp = (float) $price;
//
//        $result = (int) \ceil($tmp * 100);
//
//        return new self($result);
//    }
//
//    public function __construct(int $cents)
//    {
//        $this->cents = $cents;
//    }
//
//    public function getCents(): int
//    {
//        return $this->cents;
//    }
    private Money $money;

    public function __construct(Money $money)
    {
        $this->money = $money;
    }
}
