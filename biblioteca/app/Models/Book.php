<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title', 'img', 'description' ,'date', 'author_id', 'categorie_id'];

    public function categorie(){
        return $this->belongsTo('App\Models\Categorie');
    }
    public function author(){
        return $this->belongsTo('App\Models\Author');
    }
    public function rentedbook(){
        return $this->hasMany('App\Models\RentedBook');
    }
}
