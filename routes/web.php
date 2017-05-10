<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

$this->group(['middleware'=>'auth'],function(){
  //Gestão de disciplinas
  $this->get('minhas-disciplinas','DisciplinaController@disciplinas')->name('professor.disciplinas');
  $this->any('meus-cursos-search','DisciplinaController@disciplinasSearch')->name('professor.disciplinas.search');

  //Gestão de acadêmicos
  $this->get('disciplina/{id}/alunos', 'AlunoController@byDisciplinaId')->name('professor.disciplina.alunos'); //rota especifica pra modulo

  $this->any('alunos-search','AlunoController@alunosSearch')->name('professor.disciplinas.alunos.search');

  $this->resource('alunos','AlunoController', ['except'=>'index']);

  //Gestão de notas
  $this->get('aluno/{id}/notas', 'NotaController@byAlunoId')->name('professor.disciplina.alunos.notas');

  $this->get('aluno/{id}/lancanotas', 'NotaController@byLancaNotas')->name('professor.disciplina.alunos.lancanotas');

  $this->get('aluno/{id}/editanotas', 'NotaController@byEditaNotas')->name('professor.disciplina.alunos.editanotas');
  // $this->resource('aluno/{id}/notas', 'NotaController');
  $this->resource('notas','NotaController', ['except'=>'index','create','edit']);
});
