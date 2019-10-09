<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsLetter extends Model
{
    protected $table = 'newsletter';
    protected $fillable = ['email','status'];
}
