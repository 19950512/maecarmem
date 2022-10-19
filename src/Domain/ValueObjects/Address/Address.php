<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects\Address;

use App\Domain\ValueObjects\OwnName;
use App\Domain\ValueObjects\Stringui;
use App\Domain\ValueObjects\Address\CEP;
use App\Domain\ValueObjects\Address\State;
use App\Domain\ValueObjects\Address\Country;
use App\Domain\ValueObjects\Address\Localization\Latitude;
use App\Domain\ValueObjects\Address\Localization\Longitude;
use App\Domain\ValueObjects\Address\Localization\Localization;

final class Address
{
    public function __construct(
        private ?Stringui $street = null,
        private ?Stringui $number = null,
        private ?Stringui $neighborhood = null,
        private ?Stringui $city = null,
        private ?State $state = null,
        private Country $country = new Country('Brazil'),
        private ?CEP $cep = null,
        private ?Stringui $complement = null,
        private ?Stringui $reference = null,
        private ?Localization $localization = null,
    )
    {
    }

    public function setParams(array $params): void
    {

        $number = null;
        $street = null;
        $cep = null;
        $complement = null;
        $neighborhood = null;
        $city = null;
        $state = null;
        $country = new Country('Brazil');
        $reference = null;
        $localization = null;

        if(isset($params['number']) and !empty($params['number'])){
            $number = new Stringui($params['number']);
        }
        if(isset($params['street']) and !empty($params['street'])){
            $street = new Stringui($params['street']);
        }
        if(isset($params['cep']) and !empty($params['cep'])){
            $cep = new CEP($params['cep']);
        }
        if(isset($params['complement']) and !empty($params['complement'])){
            $complement = new Stringui($params['complement']);
        }
        if(isset($params['neighborhood']) and !empty($params['neighborhood'])){
            $neighborhood = new Stringui($params['neighborhood']);
        }
        if(isset($params['city']) and !empty($params['city'])){
            $city = new Stringui($params['city']);
        }
        if(isset($params['state']) and !empty($params['state'])){
            $state = new State($params['state']);
        }
        if(isset($params['country']) and !empty($params['country'])){
            $country = new Country($params['country']);
        }
        if(isset($params['reference']) and !empty($params['reference'])){
            $reference = new Stringui($params['reference']);
        }
        if(isset($params['latitude'], $params['longitude']) and !empty($params['latitude']) and !empty($params['longitude'])){
            $localization = new Localization(
                latitude: new Latitude((float) $params['latitude']),
                longitude: new Longitude((float) $params['longitude'])
            );
        }

        $this->number = $number;
        $this->street = $street;
        $this->cep = $cep;
        $this->complement = $complement;
        $this->neighborhood = $neighborhood;
        $this->city = $city;
        $this->state = $state;
        $this->country = $country;
        $this->reference = $reference;
        $this->localization = $localization;
    }
}