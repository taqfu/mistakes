<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mistake extends Model
{
    public function incidents (){
        return $this->hasMany('App\Incident' );
    }
}
