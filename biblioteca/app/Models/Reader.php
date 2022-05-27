<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reader extends Model
{
    use HasFactory;
    protected $fillable = ['cpf', 'name', 'rg', 'birthdate', 'address', 'email'];

    protected $casts = [
        'birthdate' => 'datetime: d/m/Y',
    ];

    public function rentedbook(){
        return $this->hasMany('App\Models\RentedBook');
    }
}
