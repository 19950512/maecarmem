<?php

declare (strict_types = 1);

namespace App\Domain\Entities;

use App\Domain\ValueObjects\Birth;
use App\Domain\ValueObjects\FullName;
use App\Domain\ValueObjects\Membership;
use App\Domain\Entities\EventosEntity;

final class PessoaEntity
{
    public function __construct(
        readonly FullName $fullName,
        readonly Birth $birth,
        readonly Membership $membership,
        readonly EventosEntity $eventos,

    ){}
}