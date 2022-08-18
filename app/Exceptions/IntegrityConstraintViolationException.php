<?php

namespace App\Exceptions;

use Illuminate\Http\JsonResponse;
use Exception;

class IntegrityConstraintViolationException extends Exception
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
                'message' => 'Você não pode apagar este(a) '.$this->getMessage().' porque ele(a) tem ligação com outros dados do Banco de dados!',
            ]
        ], 404);
    }
}
