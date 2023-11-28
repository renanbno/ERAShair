<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ServicoFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [

        ];
    }

    public function failedValidation (Validator $validator){
        throw new HttpResponseException(response()->json([
            'sucess' => false,
            'error' => $validator->errors()
        ]));
    }

    public Function messages(){
        return [
            'nome.required'=> 'O campo nome é obrigatorio',
            'nome.max' => 'o campo nome deve conter no maximo 80 caracteres',
            'nome.min' => 'o campo nome dever conter no minimo 5 caracteres',
            'nome.unique'=> 'nome ja cadastrado no sistema',
            'descricao.required' =>'Descrição obrigatoria',
            'descricao.max' => 'Descrição deve conter no maximo 200 caracteres',
            'descricao.min' => 'Descrição deve conter no minimo 10 caracteres',
            'duracao.required' => 'Duração obrigatoria',
            'duracao.numeric' => 'Formato invalido, aceita somente numeros',
            'preco.decimal' => 'formato invalido',
            'preco.required' => 'Preço obrigatorio',
    
        ];
    }
}
