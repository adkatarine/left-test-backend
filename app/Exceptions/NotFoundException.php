<?php

namespace App\Exceptions;

use Illuminate\Http\JsonResponse;
use Exception;

class NotFoundException extends Exception
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
                'message' => $this->getMessage().' não encontrado(s) no Banco de Dados!',
            ]
        ], 404);
    }
}
