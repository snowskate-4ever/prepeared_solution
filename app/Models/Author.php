<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'id',
        'name'
    ];
    public function book() {
        return $this->belongsTo(Book::class);
    }
}
