<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

final class Availability {

    public function __construct(
        private readonly bool $availability
    ){}

    function get(): bool {
        return $this->availability;
    }

    public function __toString(): string
    {
        $availability = $this->availability ? 'available' : 'unavailable';
        return  "Availability: $availability";
    }
}