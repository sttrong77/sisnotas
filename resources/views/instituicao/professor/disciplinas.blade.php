@extends('layouts.app')

@section('content')

  <div class="container">
      <p><p>
      @include('instituicao.professor._caminho')

      <p><p>

  <div class="input-field">
    {!! Form::open(['route'=>'professor.disciplinas.search', 'class'=>'form form-inline']) !!}
      {!! Form::text('key-search', null, ['placeholder'=>'Digite um nome para pesquisar','class'=>'form-control']) !!}
     <input type="submit" value="Pesquisar" class="btn btn-search">
    {!! Form::close() !!}
    @if(isset($dataForm['key-search']))
     <p><b>Resultados para: </b>{{$dataForm['key-search']}}</p>
   @endif
  </div>


  <h3> {{$title or 'Professor : Minhas Disciplinas'}} </h3>
  <div class="row">
    @foreach($disciplinas as $disciplina)
    <div class="col s12 m4">
      <div class="card">
        <div class="card-image">
          <img src="{{url("imgs/$disciplina->imagem")}}">
        </div>
        <div class="card-stacked">
          <div class="card-content">
            <h5 class="header">{{$disciplina->nome}}</h5>
            <p>{{$disciplina->descricao}}</p>
          </div>
          <div class="card-action">
            <a href="{{route('professor.disciplina.alunos',$disciplina->id)}}">
               <i class="material-icons">supervisor_account</i>
            </a>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
    @if(isset($dataForm))
      {!! $disciplinas->appends($dataForm)->links() !!}
    @else
      {!! $disciplinas->links() !!}
    @endif
</div>
@endsection
