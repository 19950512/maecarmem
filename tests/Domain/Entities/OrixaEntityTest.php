<?php

use App\Domain\Enums\Orixa;
use App\Domain\Entities\OrixaEntity;

test('Should be a instance of OrixaEntity', function () {

    $orixa = new OrixaEntity(Orixa::EXU);

    expect($orixa)->toBeInstanceOf(OrixaEntity::class);
});