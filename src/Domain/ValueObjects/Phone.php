<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

use App\Application\Utils\Utils;

final class Phone
{
    function __construct(
        private string $number
    ){
        if(!$this->_validation($this->number)){
            throw new \DomainException('Phone is not valid');
        }

        $this->number = Utils::mask($this->number, '(##) #####-####');
    }

    private function _validation(string $number): bool {
        return !!preg_match("/^\((\d{2})?\)?|(\d{2})? ?9\d{4}-?\d{4}$/i", $number);
    }

    public function __toString(): string
    {
        return $this->number;
    }
}