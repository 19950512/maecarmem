<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects\Address\Localization;

use App\Domain\ValueObjects\Address\Localization\Latitude;
use App\Domain\ValueObjects\Address\Localization\Longitude;

final class Localization
{
    public function __construct(
        private Latitude $latitude,
        private Longitude $longitude
    )
    {
    }

    public function getLatitude(): Latitude
    {
        return $this->latitude;
    }

    public function getLongitude(): Longitude
    {
        return $this->longitude;
    }
}