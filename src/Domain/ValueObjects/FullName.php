<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

use App\Domain\Errors\ValueObjects\InvalidFullName;

final class FullName {

    function __construct(
        private string $name
    ){

        if(!self::validation($this->name)){
            throw new InvalidFullName('Full name is not valid');
        }

        $this->name = ucwords(mb_strtolower($this->name));

        $mustache = [
            ' Da' => ' da',
            ' De' => ' de',
            ' Di' => ' di',
            ' Do' => ' do',
            ' Du' => ' du',
        ];

        $this->name = str_replace(array_keys($mustache), array_values($mustache), $this->name);
    }

    static function validation(string $name): bool {
        $contain_words_only = preg_match("/^[A-ZÀ-Ÿ][A-zÀ-ÿ']+\s([A-zÀ-ÿ']\s?)*[A-ZÀ-Ÿ][A-zÀ-ÿ']+$/", trim($name));
        return !!$contain_words_only;
    }

    public function get(){
        return $this->name;
    }

    public function __toString(): string
    {
        return  $this->name;
    }
}