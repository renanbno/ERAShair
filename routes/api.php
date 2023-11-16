<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProfissionalController;
use App\Http\Controllers\ServicoController;
use App\Models\servico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//servico
Route::post('servico/store',[ServicoController::class,'store']);
Route::get('servico/retornarTodos',[ServicoController::class,'retornarTodos']);
Route::post('nome',[ServicoController::class, 'pesquisarPorNome']);
Route::post('descricao',[ServicoController::class, 'pesquisarPorDescricao']);
Route::delete('delete/{id}',[ServicoController::class, 'excluir']);
Route::put('update', [ServicoController::class, 'update']);

//cliente
Route::post('cadastro',[ClienteController::class,'store']);
Route::get('find/{id}',[ClienteController::class,'pesquisarPorId']);
Route::get('cliente/retornarTodos',[ClienteController::class,'retornarTodos']);
Route::post('procurarN',[ClienteController::class, 'pesquisarPorNome']);
Route::post('procurarC',[ClienteController::class, 'pesquisarPorCpf']);
Route::post('procurarCE',[ClienteController::class, 'pesquisarPorCelular']);
Route::post('procurarE',[ClienteController::class, 'pesquisarPorEmail']);
Route::delete('excluir/{id}',[ClienteController::class, 'excluir']);
Route::put('atualizar', [ClienteController::class, 'update']);
Route::post('esqueciSenha',[ClienteController::class, 'esqueciSenha']);

//profissional
Route::post('cadastroProfissional',[ProfissionalController::class,'store']);
Route::get('profissional/retornarTodos',[ProfissionalController::class,'retornarTodos']);
Route::post('procurarProfissional',[ProfissionalController::class, 'pesquisarPorNome']);
Route::post('procurarProfissional',[ProfissionalController::class, 'pesquisarPorCpf']);
Route::post('procurarProfissional',[ProfissionalController::class, 'pesquisarPorCelular']);
Route::post('procurarProfissional',[ProfissionalController::class, 'pesquisarPorEmail']);
Route::delete('excluir/{id}Profissional',[ProfissionalController::class, 'excluir']);
Route::put('atualizarProfissional', [ProfissionalController::class, 'update']);
