<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $fillable = [
    	'nomeCliente', 
    	'nomeFuncionario', 
    	'descricao',
    	'task_date'
    ];

    protected $dates = ['task_date'];
}
