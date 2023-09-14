<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicoFormRequest;
use App\Models\servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    
    public function store(ServicoFormRequest $request){
        $servico = servico::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'duracao' => $request-> duracao,
            'preco' => $request-> preco,
        ]);
        return response ()->json ([
            "suceess" =>true,
            "message" =>"Usuario Cadastrado com sucesso",
            "data" => $servico
        ], 200);
    }
    public function pesquisarPorNome(Request $request){
        $servico = servico::where('nome', 'like', '%'. $request->nome . '%')->get();
    
        if(count($servico)>0){
            return response()->json([
                'status'=>true,
                'data'=> $servico
            ]);
        }
        
        return response()->json([
            'status'=>false,
             'data'=> 'Não há resultados para a pesquisa.'
        ]);

}

public function pesquisarPordescriao(Request $request){
    $servico = servico::where('descricao', 'like', '%'. $request->descricao. '%')->get();

    if(count($servico)>0){
        return response()->json([
            'status'=>true,
            'data'=> $servico
        ]);
    }
    
    return response()->json([
        'status'=>false,
         'data'=> 'Não há resultados para a pesquisa.'
    ]);

}

public function update(Request $request){
    $usuario = servico::find($request->id);

    if(!isset($usuario)){
        return response()->json([
            'status' => false,
            'message'=> 'cadastro não encontrado'
        ]);
    }

    if(!isset($request->nome)){
        $usuario->nome = $request->nome;
    }
    if(!isset($request->descricao)){
        $usuario->descricao = $request->descricao;
    }
    if(!isset($request->duracao)){
        $usuario->duracao = $request->duracao;
    }
    if(!isset($request->preco)){
        $usuario->preco = $request->preco;
    }
$usuario->update();

return response()->json([
    'status' => true,
    'message'=> 'cadastro atualizado.'
]);
}

public function excluir($id){
    $servico= servico::find($id);

    if(!isset($servico)){
        return response()->json([
            'status' => false,
            'message' => "serviço não encotrado"
        ]);
    }

    $servico->delete();

    return response()->json([
        'status' => true,
        'message' => "usuario excluido com sucesso"
    ]);
    
}
}