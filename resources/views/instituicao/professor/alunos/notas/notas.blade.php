@extends('layouts.app')

@section('content')

<div class="container">

    <p><p>
    @include('instituicao.professor._caminho')

    <p><p>
    <h3> {{$title or 'Notas do Aluno'}} </h3>


    <a class="waves-effect waves-light btn" href="{{route('professor.disciplina.alunos.lancanotas',Request::segment(2))}}">
      <i class="material-icons left">person_pin</i>
      Cadastrar
    </a>


    <div class="row">
      @foreach($notas as $nota)
      <div class="col s12 m8">
       <h4 class="header">Notas 2° Bimestre</h4>
       <div class="card horizontal">
         <div class="card-image">
          <img src="{{url("imgs/notas.jpg")}}">
         </div>
         <div class="card-stacked">
           <div class="card-content">
             <p>Primeira AV3 - {{$nota->av3_1}} ({{$nota->obs_av3_1}})</p>
             <p>Segunda AV3 - {{$nota->av3_2}} ({{$nota->obs_av3_2}})</p>
             <p>Nota AVI - {{$nota->avi}}</p>
             <p>Nota AV5 - {{$nota->av5}}</p>
             <p>________________________________________________________</p>
             <p>Total -> {{$nota->av3_1 + $nota->av3_2 + $nota->avi + $nota->av5}}</p>
           </div>
           <div class="card-action">
             <a href="{{route('professor.disciplina.alunos.editanotas', Request::segment(2))}}">
               <i class="material-icons left">mode_edit</i>
             </a>
           </div>
         </div>
       </div>
     </div>
     @endforeach
    </div>


</div>
@endsection
