<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Producto.
 *
 * @author  Evanny karol Hernandez Garcia created at 2016-11-15 06:19:06pm
 * 
 */
class Producto extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'productos';

	
}
