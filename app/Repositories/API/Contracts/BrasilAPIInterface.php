<?php

namespace App\Repositories\API\Contracts;

interface BrasilAPIInterface {

    public static function getAddressByZipCode(string $zipCode);
}
