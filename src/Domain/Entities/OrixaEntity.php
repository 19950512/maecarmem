<?php

declare(strict_types=1);

namespace App\Domain\Entities;

use App\Domain\Enums\Orixa;

final class OrixaEntity
{

    public function __construct(
        readonly Orixa $orixa,
    ){}
}