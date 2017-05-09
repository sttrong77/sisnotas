<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
  protected $fillable = ['nome','descricao','imagem'];

  public function alunos(){
    return $this->hasMany(Aluno::class);
  }

}
