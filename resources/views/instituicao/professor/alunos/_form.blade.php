<div class="input-field col s12">
    {!! Form::select('disciplina_id',$disciplinas, null) !!}
    {!! Form::label('disciplina_id', 'Disciplinas') !!}
</div>

<div class="input-field col s12">
  {!! Form::label('num_matricula', 'Número Matrícula') !!}
  {!! Form::text('num_matricula',null,['class'=>'validate']) !!}
</div>

<div class="input-field col s12">
  {!! Form::label('nome', 'Nome Aluno') !!}
  {!! Form::text('nome',null,['class'=>'validate']) !!}
</div>

<div class="form-group">
  {!! Form::submit('Enviar',['class'=>'btn btn-form']) !!}
</div>
