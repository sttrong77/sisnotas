<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Disciplina;

class DisciplinaController extends Controller
{

  private $disciplina;
  private $totalPage = 3;

  public function __construct(Disciplina $disciplina){
    $this->disciplina = $disciplina;
  }


  public function disciplinas(){
    $caminhos = [
            ['url'=>'/home','titulo'=>'Home'],
            ['url'=>'/minhas-disciplinas','titulo'=>'Disciplinas'],
    ];
    $title = 'Disciplinas - Professor '.auth()->user()->name;
    $disciplinas = $this->disciplina->paginate($this->totalPage);//pega cursos do professor logado
    // $disciplinas = $this->disciplina->get();//pega cursos do professor logado
    return view('instituicao.professor.disciplinas',compact('disciplinas','title','caminhos'));
  }

  public function disciplinasSearch(Request $request){
    $dataForm = $request->except(['_token']);
    $keySearch = $dataForm['key-search'];
    $title = "Disciplinas do Professor - Resultados para {$keySearch}";

    $disciplinas = $this->disciplina
            ->where('nome','LIKE',"%{$keySearch}%")
            ->orWhere('descricao','LIKE',"%{$keySearch}%")
            ->paginate($this->totalPage);

    return view('instituicao.professor.disciplinas',compact('disciplinas','title', 'dataForm'));
  }

}
