<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crud extends Model
{
    public $timestamps = true;
    const CREATED_AT = 'creation_date';
    protected $table = 'crud';
}
