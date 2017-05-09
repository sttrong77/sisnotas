@extends('layouts.app')

@section('content')

<div class="container">
  <h3>Editar Nota</h3>
  <p><p>
  @if( session('error') )
   <div class="alert alert-warning">
       {{session('error')}}
   </div>
   @endif

   @if( isset($errors) && count($errors) > 0 )
   <div class="alert alert-danger">
       @foreach( $errors->all() as $error )
       <p>{{$error}}</p>
       @endforeach
   </div>
   @endif

   {!! Form::model($nota, ['route' => ['notas.update', $nota->id], 'class' => 'form form-school', 'method' => 'PUT']) !!}

    @include('instituicao.professor.alunos.notas._form')

   {{Form::close()}}
</div>

@endsection
