<div class="input-field col s12">
    {!! Form::select('aluno_id',$alunos, null) !!}
    {!! Form::label('aluno_id', 'Alunos') !!}
</div>

<div class="input-field col s12">
  {!! Form::label('av3_1', 'Primeira AV3') !!}
  {!! Form::text('av3_1',null,['class'=>'validate']) !!}
</div>

<div class="input-field col s12">
  {!! Form::label('obs_av3_1', 'Descrição Primeira AV3') !!}
  {!! Form::text('obs_av3_1',null,['class'=>'validate']) !!}
</div>

<div class="input-field col s12">
  {!! Form::label('av3_2', 'Segunda AV3') !!}
  {!! Form::text('av3_2',null,['class'=>'validate']) !!}
</div>

<div class="input-field col s12">
  {!! Form::label('obs_av3_2', 'Descrição Segunda AV3') !!}
  {!! Form::text('obs_av3_2',null,['class'=>'validate']) !!}
</div>

<div class="input-field col s12">
  {!! Form::label('avi', 'Nota AVI') !!}
  {!! Form::text('avi',null,['class'=>'validate']) !!}
</div>

<div class="input-field col s12">
  {!! Form::label('av5', 'Nota AV5') !!}
  {!! Form::text('av5',null,['class'=>'validate']) !!}
</div>


<div class="form-group">
  {!! Form::submit('Enviar',['class'=>'btn btn-form']) !!}
</div>

<p><p>
