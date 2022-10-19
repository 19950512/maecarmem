<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

use App\Domain\Errors\ValueObjects\InvalidValue;

final class Value {

    public function __construct(
        private readonly float $value
    ){

        if(!self::validation($this->value)){
            throw new InvalidValue('Value Invalid.');
        }
    }

    static function validation(float $value): bool {
        return is_numeric($value) && $value >= 0;
    }

    function get(): float{
        return $this->value;
    }

    public function __toString(): string
    {
        return  "Value: {$this->value}";
    }
}