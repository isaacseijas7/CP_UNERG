<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AsignacionRequest extends Request
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
     * @return array
     */
    public function rules()
    {
        return [
            'pasante_id' => 'required|unique:asignaciones',
            'tutores_e_id' => 'required',
            'tutores_a_id' => 'required'
        ];
    }
}
