<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'birthdate'];

    protected $casts = [
        'birthdate' => 'datetime: d/m/Y',
    ];

    public function books(){
        return $this->hasMany('App\Models\Book');
    }
}

