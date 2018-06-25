<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Produto;

class Fornecedor extends Model
{
    protected $fillable = [
    	'nomeFornecedor',
    	'cnpj',
    	'tel',
    	'email',
    	'status_fornecedor'
    ];

    public function type($type = null){
    	$types = [
    		'A' => 'Ativo',
    		'I' => 'Inativo',
    	];

    	if(!$type)
    		return $types;

    	return $types[$type];
    }

    public function produtos(){
    	return $this->belongsToMany(Produto::class, 'produto_fornecedor', 'fornecedor_id', 'produto_id');
    }
}
