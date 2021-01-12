<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable=["user_id", "unit", "language1", "language2"];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
