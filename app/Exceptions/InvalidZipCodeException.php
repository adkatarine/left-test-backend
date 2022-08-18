<?php

namespace App\Exceptions;

use Illuminate\Http\JsonResponse;
use Exception;

class InvalidZipCodeException extends Exception
{
    /**
     * Render the exception as an HTTP response.
     *
     * @param \Illuminate\Http\Response $response
     * @return \Illuminate\Http\JsonResponse $jsonResponse
     */
    public function render($request) {
        return new JsonResponse([
            'errors' => [
                'message' => 'O CEP informado pode ser inválido. Tente novamente!',
            ]
        ], 404);
    }
}
