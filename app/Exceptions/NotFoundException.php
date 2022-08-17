<?php

namespace App\Exceptions;

use Illuminate\Http\JsonResponse;
use Exception;

class NotFoundException extends Exception
{

    public function render($request) {
        return new JsonResponse([
            'errors' => [
                'message' => $this->getMessage().' não encontrado(s) no Banco de Dados!',
            ]
        ], 404);
    }
}
