<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Funcionario;

class Project extends Model
{
    protected $fillable = [
    	'name',
    	'tel',
    	'email',
    	'status_cliente',
    	'data_nasc',
    	'funcionario_id'
    ];

    protected $dates = ['data_nasc'];

    public function type($type = null){
    	$types = [
    		'A' => 'Ativo',
    		'I' => 'Inativo',
    	];

    	if(!$type)
    		return $types;

    	return $types[$type];
    }

    public function funcionario(){
    	return $this->belongsTo(Funcionario::class,'funcionario_id');
    }

}