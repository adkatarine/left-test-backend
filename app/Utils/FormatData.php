<?php

namespace App\Utils;

class FormatData {

    /**
     * Recebe um response e retorna ela decodificada.
     *
     * @param  $object
     * @return array
     */
    public static function jsonDecodeResponse($object) {
        $response = (string)$object->getBody();
        return json_decode($response, true);
    }
}
