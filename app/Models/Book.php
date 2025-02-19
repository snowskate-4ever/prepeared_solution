<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $fillable = [
        'id',
        'author_id',
        'publisher_id',
        'name'
    ];
}
