<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aluno;
use App\Nota;

class ApiController extends Controller
{

  public function buscaNotas($num_matricula){

    // $aluno = Aluno::where('num_matricula',$num_matricula)->get()->first();
    $notas = Nota::join('alunos','alunos.id','=','notas.aluno_id')
                ->where('alunos.num_matricula',$num_matricula)
                ->select('alunos.id as cod_aluno',
                         'alunos.nome as nome_aluno',
                         'notas.av3_1',
                         'notas.av3_2',
                         'notas.obs_av3_1',
                         'notas.obs_av3_2',
                         'notas.avi',
                         'notas.av5'
                 )->get()->first();
    return $notas;
  }
}
