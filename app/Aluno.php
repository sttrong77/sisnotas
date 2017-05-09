<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
  protected $fillable = ['disciplina_id','num_matricula','nome'];

  public function notas(){
    return $this->hasMany(Nota::class);
  }
}
