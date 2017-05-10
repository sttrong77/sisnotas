@extends('layouts.app')

@section('content')
  <div class="container">
    <p><p>
    @include('instituicao.professor._caminho')

    <p><p>

    <div class="input-field">
      {!! Form::open(['route'=>'professor.disciplinas.alunos.search', 'class'=>'form form-inline']) !!}
        {!! Form::select('disciplina',$disciplinas, null) !!}
        {!! Form::text('key-search', null, ['placeholder'=>'Digite algo para pesquisar','class'=>'form-control']) !!}
       <input type="submit" value="Pesquisar" class="btn btn-search">
      {!! Form::close() !!}
      @if(isset($dataForm['key-search']))
       <p><b>Resultados para: </b>{{$dataForm['key-search']}}</p>
     @endif
    </div>


    <h3>Alunos</h3>

    <a class="waves-effect waves-light btn" href="{{route('alunos.create')}}">
      <i class="material-icons left">person_pin</i>
      Cadastrar
    </a>
    <p>
    <table class="striped bordered centered">
       <thead>
         <tr>
           <th>Matrícula</th>
           <th>Nome do Aluno</th>
           <th width="100px">Ação</th>
         </tr>
       </thead>
       @foreach($alunos as $aluno)
       <tbody>
         <tr>
           <td>{{$aluno->num_matricula}}</td>
           <td>{{$aluno->nome}}</td>
           <td>
             <a href="{{route('alunos.edit', $aluno->id)}}">
              <i class="material-icons left">mode_edit</i>
            </a>
              <a href="{{route('professor.disciplina.alunos.notas',$aluno->id)}}">
               <i class="material-icons left">view_list</i>
             </a>
           </td>
         </tr>
        @endforeach
       </tbody>
     </table>

     <ul class="pagination">
       @if(isset($dataForm))
        <li class="waves-effect">{!! $alunos->appends($dataForm)->links() !!}</li>
       @else
         {!! $alunos->links() !!}
       @endif
      </ul>



  </div>
@endsection
