<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employeer extends Model
{
    use HasFactory;
    
    protected $fillable=['cpf', 'name', 'rg', 'birthdate', 'address', 'salary', 'departament_id'];

}
