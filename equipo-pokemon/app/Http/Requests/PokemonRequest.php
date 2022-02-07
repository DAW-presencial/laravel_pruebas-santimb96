<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PokemonRequest extends FormRequest
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
            'nombre'=>'required|min:2',
            'nivel'=>'required',
            'fecha_capturado'=>'required',
            'tipo'=>'required',
            'genero'=>'required',
            'descripcion'=>'required|min:10',
            'shiny'=>'required'
        ];
    }
}
