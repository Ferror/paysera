<?php
declare(strict_types=1);

namespace Ferror\Domain;

final class Price
{
    private int $cents;

    public static function fromString(string $price): self
    {
        $tmp = (float) $price;

        return new self((int) $tmp * 100);
    }

    public function __construct(int $cents)
    {
        $this->cents = $cents;
    }

    public function getCents(): int
    {
        return $this->cents;
    }
}
