<?php

use Illuminate\Database\Seeder;
use App\Disciplina;

class DisciplinasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Disciplina::create([
       'nome' => 'Introdução a Computação ',
       'descricao'=>'Disciplina 1° Período.',
       'imagem'=>'ic.jpg'
      ]);
    }
}
