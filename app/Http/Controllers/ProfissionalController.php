<?php

namespace App\Http\Controllers;


use App\Http\Requests\ProfissionalFormRequest;
use App\Models\profissional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfissionalController extends Controller
{
    public function store(ProfissionalFormRequest $request){
        $profissionals = profissional::create([
            'nome' => $request->nome,
            'celular' => $request->celular,
            'email'=>$request->email,
            'cpf'=>$request->cpf,
            'dataNascimento'=>$request->dataNascimento,
            'cidade'=>$request->cidade,
            'estado'=>$request->estado,
            'pais'=>$request->pais,
            'rua'=>$request->rua,
            'numero'=>$request->numero,
            'bairro'=>$request->bairro,
            'cep'=>$request->cep,
            'complemento'=>$request->complemento,
            'senha'=>Hash::make($request->senha),
            'salario'=>$request->salario,
            
        ]);
       
        return response()->json([
            "succes" => true,
            "message" =>"profissional Cadastrado com sucesso",
            "data" => $profissionals
        ],200);
    }
    public function retornarTodos()
    {
        $profissionals = profissional:: all();

        return response()->json([
            'status'=>true,
            'data'=>$profissionals
        ]);
    }

    public function pesquisarPorNome(Request $request){
        $profissionals = profissional::where('nome', 'like', '%'. $request->nome . '%')->get();
    
        if(count($profissionals)>0){
            return response()->json([
                'status'=>true,
                'data'=> $profissionals
            ]);
        }
        
        return response()->json([
            'status'=>false,
             'data'=> 'Não há resultados para a pesquisa.'
            ]);
    
    }


    public function pesquisarPorCpf(Request $request){
        $profissionals = profissional::where('cpf', 'like', '%'. $request->cpf . '%')->get();
    
        if(count($profissionals)>0){
            return response()->json([
                'status'=>true,
                'data'=> $profissionals
            ]);
        }
        
        return response()->json([
            'status'=>false,
             'data'=> 'Não há resultados para a pesquisa.'
            ]);
    
    }

    public function pesquisarPorCelular(Request $request){
        $profissionals = profissional::where('celular', 'like', '%'. $request->celular . '%')->get();
    
        if(count($profissionals)>0){
            return response()->json([
                'status'=>true,
                'data'=> $profissionals
            ]);
        }
        
        return response()->json([
            'status'=>false,
             'data'=> 'Não há resultados para a pesquisa.'
            ]);
    
    }


    public function pesquisarPorEmail(Request $request){
        $profissionals = profissional::where('email', 'like', '%'. $request->email . '%')->get();
    
        if(count($profissionals)>0){
            return response()->json([
                'status'=>true,
                'data'=> $profissionals
            ]);
        }
        
        return response()->json([
            'status'=>false,
             'data'=> 'Não há resultados para a pesquisa.'
            ]);
    
    }


    public function update(Request $request){
        $profissionals = profissional::find($request->id);
    
        if(!isset($profissionals)){
            return response()->json([
                'status' => false,
                'message' => "Cadastro não encontrado"
            ]);
        }
    
        if(isset($request->nome)){
            $profissionals->nome = $request->nome;
        }
        if(isset($request->celular)){
            $profissionals->celular= $request->celular;
        }
        if(isset($request->email)){
            $profissionals->email = $request->email;
        }
        if(isset($request->cpf)){
            $profissionals->cpf = $request->cpf;
        }
        if(isset($request->dataNascimento)){
            $profissionals->dataNascimento = $request->dataNascimento;
        }
        if(isset($request->cidade)){
            $profissionals->cidade = $request->cidade;
        }
        if(isset($request->estado)){
            $profissionals->estado = $request->estado;
        }
        if(isset($request->pais)){
            $profissionals->pais = $request->pais;
        }
        if(isset($request->rua)){
            $profissionals->rua = $request->rua;
        }
        if(isset($request->numero)){
            $profissionals->numero = $request->numero;
        }
        if(isset($request->bairro)){
            $profissionals->bairro = $request->bairro;
        }
        if(isset($request->cep)){
            $profissionals->cep = $request->cep;
        }
        if(isset($request->complemento)){
            $profissionals->complemento = $request->complemento;
        }
        if(isset($request->senha)){
            $profissionals->cpf = $request->senha;
        }
        
        $profissionals-> update();
    
        return response()->json([
            'status' => true,
            'message' => "Cadastro atualizado"
        ]);
    
    }


    public function excluir($id){
        $profissionals = profissional::find($id);
    
        if(!isset($profissionals)){
            return response()->json([
                'status' => false,
                'message' => "Cadastro não encotrado"
            ]);
        }
    
        $profissionals->delete();
    
        return response()->json([
            'status' => true,
            'message' => "Cadastro excluido com sucesso"
        ]);
    }

    public function esqueciSenha(Request $request){
        $profissionals = profissional::where('cpf', '=', $request->cpf)->first();
        

        if(!isset($profissionals)){
            return response()->json([
                'status' => false,
                'message' => "Cadastro não encontrado"
            ]);
        }
    
       $profissionals->senha=Hash::make($profissionals->cpf);

        $profissionals->update();
    
        return response()->json([
            'status' => true,
            'message' => "Cadastro atualizado"
        ]);
    
        
    }

}
