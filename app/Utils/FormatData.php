<?php

namespace App\Utils;

class FormatData {

    /**
     * Receive a response and return it decoded.
     *
     * @param  $object
     * @return array
     */
    public static function jsonDecodeResponse($object) {
        $response = (string)$object->getBody();
        return json_decode($response, true);
    }
}
