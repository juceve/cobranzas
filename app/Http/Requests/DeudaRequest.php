<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeudaRequest extends FormRequest
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
			'fecha' => 'string',
			'numdoc' => 'required',
			'vence' => 'string',
			'antiguedad' => 'string',
			'anticuacion' => 'string',
			'rango' => 'string',
			'cliente' => 'string',
			'clilugar' => 'string',
			'entnombrejefevendedor' => 'string',
			'entnombresupervisor' => 'string',
			'entnombrevendedor' => 'string',
			'plazo' => 'string',
			'fechaultimopago' => 'string',
			'ciunombre' => 'string',
			'limitecredito' => 'string',
			'rutid' => 'string',
			'coordenadax' => 'string',
			'coordenaday' => 'string',
			'telefono' => 'string',
			'estado' => 'string',
			'direccion' => 'string',
			'ctrlupdate' => 'required',
        ];
    }
}
