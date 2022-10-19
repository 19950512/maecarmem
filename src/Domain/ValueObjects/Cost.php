<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

use App\Domain\Errors\ValueObjects\InvalidCost;

final class Cost {

    public function __construct(
        private float $cost
    ){

        if(!self::validation($this->cost)){
            throw new InvalidCost('Cost Invalid.');
        }
    }

    static function validation(float $cost): bool {
        return is_numeric($cost) && $cost >= 0;
    }

    function get(): float{
        return $this->cost;
    }

    public function __toString(): string
    {
        return  "Cost: {$this->cost}";
    }
}