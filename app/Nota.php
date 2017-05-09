<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
  protected $fillable = ['aluno_id','av3_1','av3_2','obs_av3_1','obs_av3_2','avi','av5'];
}
