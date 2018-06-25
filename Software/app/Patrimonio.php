<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patrimonio extends Model
{
    protected $fillable = [
    	'nomePatrimonio',
    	'valorPatrimonio',
    	'dataPatrimonio',
    	'descricaoPatrimonio',
    ];
}
