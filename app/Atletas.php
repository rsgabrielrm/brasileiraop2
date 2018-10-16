<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atletas extends Model
{
	public $timestamps = false;
	protected $fillable = array('nome', 'clube', 'idade', 'salario');
}
