<?php

namespace App\Exceptions;

use Illuminate\Http\JsonResponse;
use Exception;

class InvalidZipCodeException extends Exception
{
    public function render($request) {
        return new JsonResponse([
            'errors' => [
                'message' => 'O CEP informado pode ser inválido. Tente novamente!',
            ]
        ], 404);
    }
}
