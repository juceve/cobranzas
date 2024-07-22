<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeudoreRequest extends FormRequest
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
			'codigocliente' => 'required',
			'cliente' => 'required|string',
			'docid' => 'string',
			'fechanacimiento' => 'string',
			'telffijo' => 'string',
			'telfcelular' => 'required|string',
			'telfref1' => 'string',
			'telfref2' => 'string',
			'telfref3' => 'string',
			'nacionalidad' => 'string',
			'pais' => 'string',
			'ciudad' => 'required|string',
			'domcoorx' => 'string',
			'domcoory' => 'string',
			'domdireccion' => 'string',
			'trabcoorx' => 'string',
			'trabcoory' => 'string',
			'trabdireccion' => 'string',
        ];
    }
}
