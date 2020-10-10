<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivroRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required|string',
            'paginas' => 'required|integer',
            'capa' => 'required|image',
            'valor' => 'required|decimal'
        ];
    }
}
