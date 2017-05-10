<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nota;
use App\Aluno;


class NotaController extends Controller
{

    private $nota;

    public function __construct(Nota $nota){
     $this->nota = $nota;
    }

    public function byAlunoId(Request $request, $id)
    {

      $aluno = Aluno::find($id);

      $notas = $aluno->notas()->get();

      $caminhos = [
              ['url'=>'/home','titulo'=>'Home'],
              ['url'=>'/minhas-disciplinas','titulo'=>'Disciplinas'],
              ['url'=>route('professor.disciplina.alunos',$aluno->disciplina_id),'titulo'=>'Alunos'],
              ['url'=>'','titulo'=>'Notas'],
      ];

      $title = "NOTAS - {$aluno->nome}";

      // dd($request->segment(2));

      return view('instituicao.professor.alunos.notas.notas',compact('aluno','notas','title','caminhos'));
    }

    public function byLancaNotas(Request $request, $id)
    {

      $aluno = Aluno::find($id);

      $alunos = Aluno::where('id',$request->segment(2))
          ->pluck('nome', 'id');


      $notas = $aluno->notas()->get();

      $caminhos = [
              ['url'=>'/home','titulo'=>'Home'],
              ['url'=>'/minhas-disciplinas','titulo'=>'Disciplinas'],
              ['url'=>route('professor.disciplina.alunos',$aluno->disciplina_id),'titulo'=>'Alunos'],
              ['url'=>route('professor.disciplina.alunos.notas',$aluno->id),'titulo'=>'Notas'],
              ['url'=>'','titulo'=>'Cadastrando Notas'],
      ];

      $title = "NOTAS - {$aluno->nome}";

      //  dd($request->segment(2));

      return view('instituicao.professor.alunos.notas.nota-create',compact('alunos','notas','title','caminhos'));
    }

    public function byEditaNotas(Request $request, $id)
    {

      $aluno = Aluno::find($id);

      $alunos = Aluno::where('id',$request->segment(2))
          ->pluck('nome', 'id');


      //  dd($alunos['nome']);

      $nota = Nota::join('alunos','alunos.id','=','notas.aluno_id')
                  ->where('alunos.id',$request->segment(2))
                  ->select('notas.id',
                           'notas.aluno_id',
                           'notas.av3_1',
                           'notas.av3_2',
                           'notas.obs_av3_1',
                           'notas.obs_av3_2',
                           'notas.avi',
                           'notas.av5'
                   )->get()->first();

      $caminhos = [
              ['url'=>'/home','titulo'=>'Home'],
              ['url'=>'/minhas-disciplinas','titulo'=>'Disciplinas'],
              ['url'=>route('professor.disciplina.alunos',$aluno->disciplina_id),'titulo'=>'Alunos'],
              ['url'=>route('professor.disciplina.alunos.notas',$aluno->id),'titulo'=>'Notas'],
              ['url'=>'','titulo'=>'Editando Notas'],
      ];

      $title = "NOTAS - {$aluno->nome}";

      //  dd($request->segment(2));

      return view('instituicao.professor.alunos.notas.nota-edit',compact('alunos','nota','title','caminhos'));
    }

    public function store(Request $request)
    {
      $dataForm = $request->all();

      $insert = $this->nota->create($dataForm);

      if($insert)
        return redirect()->route('professor.disciplina.alunos.notas',$insert->aluno_id);
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
      $nota = $this->nota->find($id);

      $title = "Editar Nota";

      $alunos = Aluno::pluck('nome','id');

      return view('instituicao.professor.alunos.notas.nota-edit',compact('nota','title','alunos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $dataForm = $request->all();
      $nota = $this->nota->find($id);

      $update = $nota->update($dataForm);

      if($update)
        return redirect()->route('professor.disciplina.alunos.notas',$dataForm['aluno_id']);
      else
        return redirect()->back()->with(['errors'=>'Falha ao atualizar']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
