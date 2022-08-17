<?php

namespace App\Repositories\API;

use App\Repositories\API\Contracts\BrasilAPIInterface;
use Illuminate\Support\Facades\Http;

class BrasilApi implements BrasilAPIInterface {

    static $url = 'https://brasilapi.com.br/api/cep/v2';

    /**
     * Return address using the zip code provided.
     *
     * @param  string  $zipCode
     * @return \Illuminate\Http\Response
     */
    public static function getAddressByZipCode(string $zipCode) {
        return Http::get(self::$url.'/'.$zipCode);
    }
}
