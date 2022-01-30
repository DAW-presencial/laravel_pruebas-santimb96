<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuperheroeRequest extends FormRequest
{
    protected $redirectRoute = 'home.create';
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
            'fecha_nacimiento'=>'required',
            'poderes'=>'required',
            'genero'=>'required',
            'descripcion'=>'required|min:20',
        ];
    }
    public function messages()
    {
        return [
            'nombre.required'=>'Se requiere un nombre',
            'edad.required'=>'Se requiere una edad',
            'fecha_nacimiento.required'=>'Se requiere fecha de nacimiento',
            'poderes.required'=>'Se requiere un poder',
            'genero.required'=>'Hay que definir un género',
            'descripcion.required'=>'Una mínima descripción',
        ];
    }
}
