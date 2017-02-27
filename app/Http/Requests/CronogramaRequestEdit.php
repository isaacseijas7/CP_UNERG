<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CronogramaRequestEdit extends Request
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
            'primera_charla' => 'required',
            'segunda_charla' => 'required',
            'ini_pasantias' => 'required',
            'entrega_req_inic' => 'required',
            'primera_visita' => 'required',
            'reasignacion' => 'required',
            'culminacion_pasantias' => 'required',
            'segunda_visita' => 'required',
            'desde_entrega_req_fina' => 'required',
            'hasta_entrega_req_fina' => 'required',
            'desde_presentacion_oral' => 'required',
            'hasta_presentacion_oral' => 'required',
            'carga_notas' => 'required'
        ];
    }
}
