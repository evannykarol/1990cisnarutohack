<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalogs extends Model
{
    protected $table = 'catalogs';
    public $timestamps = false;
    public $primaryKey = 'id';
}
