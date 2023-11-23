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
Route::post('servicoCadastrar',[ServicoController::class,'store']);
Route::get('ServicoProcurar/{id}',[ServicoController::class,'pesquisarPorId']);
Route::get('servico/retornarTodos',[ServicoController::class,'retornarTodos']);
Route::post('nome',[ServicoController::class, 'pesquisarPorNome']);
Route::post('descricao',[ServicoController::class, 'pesquisarPorDescricao']);
Route::delete('delete/{id}',[ServicoController::class, 'excluir']);
Route::put('update', [ServicoController::class, 'update']);

//cliente
Route::post('cadastro',[ClienteController::class,'store']);
Route::get('ClienteProcurar/{id}',[ClienteController::class,'pesquisarPorId']);
Route::get('cliente/retornarTodos',[ClienteController::class,'retornarTodos']);
Route::post('procurarN',[ClienteController::class, 'pesquisarPorNome']);
Route::post('procurarC',[ClienteController::class, 'pesquisarPorCpf']);
Route::post('procurarCE',[ClienteController::class, 'pesquisarPorCelular']);
Route::post('procurarE',[ClienteController::class, 'pesquisarPorEmail']);
Route::delete('excluir/{id}',[ClienteController::class, 'excluir']);
Route::put('atualizar', [ClienteController::class, 'update']);
Route::post('esqueciSenha',[ClienteController::class, 'esqueciSenha']);
Route::post('esqueciSenhaCliente', [ClienteController::class, 'esqueciSenhaCliente']);


//profissional
Route::post('cadastroProfissional',[ProfissionalController::class,'store']);
Route::get('profissionalPesquisarPor/{id}',[ProfissionalController::class,'pesquisarPorId']);
Route::get('profissional/retornarTodos',[ProfissionalController::class,'retornarTodos']);
Route::post('Profissional/nome',[ProfissionalController::class, 'pesquisarPorNome']);
Route::post('Profissional/cpf',[ProfissionalController::class, 'pesquisarPorCpf']);
Route::post('Profissional/celular',[ProfissionalController::class, 'pesquisarPorCelular']);
Route::post('Profissional/email',[ProfissionalController::class, 'pesquisarPorEmail']);
Route::delete('excluirProfissional/{id}',[ProfissionalController::class, 'excluir']);
Route::put('atualizarProfissional', [ProfissionalController::class, 'update']);
Route::post('esqueciSenhaProfissional', [ProfissionalController::class, 'esqueciSenha']);


//agenda
Route::post('cadastroAgenda', [agendaController::class, 'store']);
Route::post('procurarAgenda',[agendaController::class, 'pesquisarPorAgenda']);
Route::delete('excluirAgenda/{id}',[agendaController::class, 'excluir']);
Route::put('atualizarAgenda', [agendaController::class, 'update']);
Route::get('retornarTodosAgenda',[agendaController::class, 'retornarTodos']);
