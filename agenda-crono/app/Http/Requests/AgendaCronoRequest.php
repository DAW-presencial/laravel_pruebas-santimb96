<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgendaCronoRequest extends FormRequest
{
    //protected $redirectRoute = 'agenda.create';
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
            'nombre'=>'required|min:3',
            'edad'=>'required',
            'genero'=>'required',
            'fdn'=>'required'
        ];
    }
}
