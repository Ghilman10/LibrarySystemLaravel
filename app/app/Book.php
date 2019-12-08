<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public $table = 'books';
    protected $fillable = ['title','author','year','rack_id'];
}
