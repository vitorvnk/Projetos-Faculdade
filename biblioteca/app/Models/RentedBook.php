<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RentedBook extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['return_date', 'reader_id', 'book_id', 'user_id'];

    protected $casts = [
        'return_date' => 'datetime: d/m/Y',
    ];

    public function reader(){
        return $this->belongsTo('App\Models\Reader');
    }
    public function book(){
        return $this->belongsTo('App\Models\Book');
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function returned(){
        return $this->hasMany('App\Models\Returned');
    }


}
