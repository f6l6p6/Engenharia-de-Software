<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Fornecedor;

class Produto extends Model
{
    protected $fillable = [
    	'nomeProduto',
    	'precoProduto',
    	'marcaProduto',
    	'validadeProduto',
    	'obsProduto'
    ];

    protected $dates = ['validadeProduto'];

    public function fornecedores(){
    	return $this->belongsToMany(Fornecedor::class, 'produto_fornecedor', 'produto_id', 'fornecedor_id');
    }
}
