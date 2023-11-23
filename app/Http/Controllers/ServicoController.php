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
            'duracao'=>$request->duracao,
            'preco'=>$request->preco,
        ]);

        return response()->json([
            "succes" => true,
            "message" =>"Serviço Cadastrado com sucesso",
            "data" => $servico
        ],200);
    }

    public function retornarTodos()
    {
        $servico = servico:: all();

        return response()->json([
            'status'=>true,
            'data'=>$servico
        ]);
    }

    public function pesquisarPorId($id){
        $servico = servico::find($id);
        
        if($servico == null){
           return response()->json([
               'status'=>false,
               'message'=> "Serviço não encontrado"
          ]);
       }

          return response()->json([
           'status'=>true,
           'data'=> $servico
       ]);
   }


    public function pesquisarPorNome(Request $request){
        $servicos = Servico::where('nome', 'like', '%'. $request->nome . '%')->get();
    
        if(count($servicos)>0){
            return response()->json([
                'status'=>true,
                'data'=> $servicos
            ]);
        }
        
        return response()->json([
            'status'=>false,
             'data'=> 'Não há resultados para a pesquisa.'
            ]);
    
    }


    public function pesquisarPorDescricao(Request $request){
        $servicos = servico::where('descricao', 'like', '%'. $request->descricao . '%')->get();
    
        if(count($servicos)>0){
            return response()->json([
                'status'=>true,
                'data'=> $servicos
            ]);
        }
        
        return response()->json([
            'status'=>false,
             'data'=> 'Não há resultados para a pesquisa.'
            ]);
    
    }

    public function update(Request $request){
        $servico = servico::find($request->id);
    
        if(!isset($servico)){
            return response()->json([
                'status' => false,
                'message' => "Cadastro não encontrado"
            ]);
        }
    
        if(isset($request->nome)){
            $servico->nome = $request->nome;
        }
        if(isset($request->descricao)){
            $servico->descricao= $request->descricao;
        }
        if(isset($request->duracao)){
            $servico->duracao = $request->duracao;
        }
        if(isset($request->preco)){
            $servico->preco = $request->preco;
        }
    
        $servico-> update();
    
        return response()->json([
            'status' => true,
            'message' => "Cadastro atualizado"
        ]);
    
    }

    public function excluir($id){
        $servico = servico::find($id);
    
        if(!isset($servico)){
            return response()->json([
                'status' => false,
                'message' => "Cadastro não encotrado"
            ]);
        }
    
        $servico->delete();
    
        return response()->json([
            'status' => true,
            'message' => "Cadastro excluido com sucesso"
        ]);
    }

  
}
    