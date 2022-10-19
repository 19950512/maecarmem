<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

final class Stringui
{
    public function __construct(
        private string $string
    ){
        if(!self::validation($this->string)){
            throw new InvalidString('String Invalid.');
        }

        $this->string = trim($this->string);
        $this->string = strip_tags($this->string);
        $this->string = htmlspecialchars($this->string);
        $this->string = filter_var($this->string, FILTER_SANITIZE_STRING);
    }

    function get(): string{
        return $this->string;
    }

    public function __toString(): string
    {
        return  "String: {$this->string}";
    }

    static function validation(string $string): bool {
        return is_string($string) && !empty($string);
    }
}