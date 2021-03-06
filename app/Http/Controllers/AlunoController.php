<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Disciplina;
use App\Aluno;
use App\Nota;

class AlunoController extends Controller
{

    private $totalPage = 15;
    private $aluno;

    public function __construct(Aluno $aluno){
     $this->aluno = $aluno;
    }

    public function byDisciplinaId(Request $request, $id)
    {
      $caminhos = [
              ['url'=>'/home','titulo'=>'Home'],
              ['url'=>'/minhas-disciplinas','titulo'=>'Disciplinas'],
              ['url'=>'','titulo'=>'Alunos'],
      ];
      $disciplina = Disciplina::find($id);
      $alunos = $disciplina->alunos()->paginate($this->totalPage);

      $title = "Alunos da Disciplina {$disciplina->nome}";
      //
      // $alunos = Aluno::where('id',$request->segment(2))
      //     ->pluck('nome', 'id');

	    $disciplinas = Disciplina::where('id', $request->segment(2))
                ->pluck('nome','id');

      return view('instituicao.professor.alunos.alunos',compact('disciplina','alunos','title','caminhos','disciplinas'));
    }


    public function create()
    {
      $title = "Cadastrando Aluno";

      // $aluno = $this->aluno->find($id);

      $caminhos = [
              ['url'=>'/home','titulo'=>'Home'],
              ['url'=>'/minhas-disciplinas','titulo'=>'Disciplinas'],
              ['url'=>'','titulo'=>'Alunos'],
              ['url'=>'','titulo'=>'Cadastro de Alunos'],
      ];

      $disciplinas = Disciplina::pluck('nome','id');

      return view('instituicao.professor.alunos.aluno-create',compact('title','disciplinas','caminhos'));
    }


    public function store(Request $request)
    {
      $dataForm = $request->all();

      $insert = $this->aluno->create($dataForm);

      if($insert)
        return redirect()->route('professor.disciplina.alunos',$insert->disciplina_id);
      else
        return redirect()->back()->with('error','Falha ao cadastrar');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $aluno = $this->aluno->find($id);

      $title = "Editar Aluno {$aluno->nome}";

      $disciplinas = Disciplina::pluck('nome','id');

      $caminhos = [
              ['url'=>'/home','titulo'=>'Home'],
              ['url'=>'/minhas-disciplinas','titulo'=>'Disciplinas'],
              ['url'=>route('professor.disciplina.alunos',$aluno->disciplina_id),'titulo'=>'Alunos'],
              ['url'=>'','titulo'=>'Edição de Alunos'],
      ];

      return view('instituicao.professor.alunos.aluno-edit',compact('aluno','title','disciplinas','caminhos'));
    }


    public function update(Request $request, $id)
    {
      $dataForm = $request->all();
      $aluno = $this->aluno->find($id);

      $update = $aluno->update($dataForm);

      if($update)
        return redirect()->route('professor.disciplina.alunos',$dataForm['disciplina_id']);
      else
        return redirect()->back()->with(['errors'=>'Falha ao atualizar']);
    }


    public function destroy($id)
    {
        //
    }

    public function alunosSearch(Request $request, Aluno $aluno){
      $dataForm = $request->except(['_token']);
      $keySearch = $dataForm['key-search'];
      $title = "Alunos desta disciplina - Resultados para {$keySearch}";

      $caminhos = [
              ['url'=>'/home','titulo'=>'Home'],
              ['url'=>'/minhas-disciplinas','titulo'=>'Disciplinas'],
              ['url'=>'','titulo'=>'Pesquisa Alunos'],
      ];

      // $nota = Nota::join('alunos','alunos.id','=','notas.aluno_id')
      //             ->where('alunos.id',$request->segment(2))
      //             ->select('notas.id',
      //                      'notas.aluno_id',
      //                      'notas.av3_1',
      //                      'notas.av3_2',
      //                      'notas.obs_av3_1',
      //                      'notas.obs_av3_2',
      //                      'notas.avi',
      //                      'notas.av5'
      //              )->get()->first();

      $disciplinas = Disciplina::join('alunos','alunos.disciplina_id','=','disciplinas.id')
                ->where('disciplina_id',$dataForm['disciplina'])
                ->pluck('disciplinas.nome', 'disciplinas.id');

      $alunos = $aluno->where('disciplina_id',$dataForm['disciplina'])
              ->where('nome','LIKE',"%{$keySearch}%")
              ->paginate($this->totalPage);




      return view('instituicao.professor.alunos.alunos',compact('alunos','title','disciplinas', 'dataForm','caminhos'));
    }
}
