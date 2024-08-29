<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CiteinformeRequest extends FormRequest
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
			'cite' => 'string',
			'fecha' => 'required',
			'receptor' => 'required|string',
			'cargoreceptor' => 'required|string',
			'referencia' => 'required|string',
			'fechainicial' => 'required|string',
			'fechafinal' => 'required|string',
			'status' => 'required',
        ];
    }
}
