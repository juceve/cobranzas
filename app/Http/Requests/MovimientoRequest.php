<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovimientoRequest extends FormRequest
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
			'fecha' => 'required',
			'saldoanterior' => 'required',
			'saldonuevo' => 'required',
			'fecultpagoanterior' => 'required',
			'fecultpagonuevo' => 'required',
			'rangoanterior' => 'required|string',
			'rangonuevo' => 'required|string',
			'status' => 'required',
        ];
    }
}
