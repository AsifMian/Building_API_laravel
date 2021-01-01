<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    protected $fillable = ['title'];

    // A poll can have many questions 1:M relationship
    public function questions(){
        return $this->hasMany('\App\Question');
    }
}
