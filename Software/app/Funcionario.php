<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Projects;

class Funcionario extends Model
{
    protected $fillable = [
    	'nomeFuncionario'
    ];

    public function cliente(){
    	return $this->hasMany(Projects::class);
    }
}
