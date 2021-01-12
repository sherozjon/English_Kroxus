<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dictonary extends Model
{
    protected $fillable=["user_id", "unit_id", "language1", "language2"];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function units(){
        return $this->belongsTo(Unit::class);
    }
}
