<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rack extends Model
{
    public $table = 'racks';
    protected $fillable = ['name'];
}
