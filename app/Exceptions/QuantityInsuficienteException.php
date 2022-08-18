<?php

namespace App\Exceptions;

use Illuminate\Http\JsonResponse;
use Exception;

class QuantityInsuficienteException extends Exception
{

    /**
     * Render the exception as an HTTP response.
     *
     * @param \Illuminate\Http\Response $response
     * @return \Illuminate\Http\JsonResponse $jsonResponse
     */
    public function render() {
        return new JsonResponse([
            'errors' => [
                'message' => 'A quantidade do produto no estoque é menor do que a quantidade desejada!',
            ]
        ], 403);
    }
}
