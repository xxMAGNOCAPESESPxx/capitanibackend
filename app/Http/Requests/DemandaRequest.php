<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DemandaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'descricao' => 'required|string',
            'descriweb' => 'required|string',
            'tipo' => 'required|string',
            'grupo' => 'required|string',
            'area' => 'required|string',
            'ativo' => 'required|string',
            'atendimento' => 'required|string',
            'prazo' => 'required|integer',
        ];
    }
}
