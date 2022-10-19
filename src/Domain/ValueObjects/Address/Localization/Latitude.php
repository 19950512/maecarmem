<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects\Address\Localization;

final class Latitude
{
    public function __construct(
        private float $latitude
    )
    {

        if(!is_numeric($this->latitude)){
            throw new \InvalidArgumentException('Latitude is not valid');
        }

        if ($this->latitude < -90 || $this->latitude > 90) {
            throw new \InvalidArgumentException('Latitude is not valid');
        }
    }

    public function get(): float
    {
        return $this->latitude;
    }
}