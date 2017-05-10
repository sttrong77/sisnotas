@extends('layouts.app')

@section('content')

<div class="container">
  <p><p>
    @include('instituicao.professor._caminho')
  <h3>Cadastrando Aluno</h3>

  {!! Form::open(['route' => 'alunos.store', 'class' => 'form form-school']) !!}

  @include('instituicao.professor.alunos._form')

  {{Form::close()}}
</div>
@endsection
