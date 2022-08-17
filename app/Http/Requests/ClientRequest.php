<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2|max:50',
            'email' => 'required|email:rfc,dns|unique:clients,email,',
            'phone_number' => 'nullable',
            'date_birth' => 'nullable|date',
            'cpf' => 'nullable|cpf',
            'cnpj' => 'nullable|cnpj',
        ];
    }
}
