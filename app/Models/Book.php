<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;



    public function averageRating(){
        return $this->reviews()->avg('rating');
    }

    public function user(){

        return $this->belongsTo("App\Models\User");

    }

    public function reviews(){
        return $this->hasMany('App\Models\Review');
    }
}
