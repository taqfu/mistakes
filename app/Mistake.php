<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mistake extends Model
{
    public function incidents (){
        return $this->hasMany('App\Incident' );
    }
    public static function total_due(){        
        var_dump("m/d/y g:i", strtotime('last Sunday'));
        //$mistakes = Mistake::where('updated_at')
    }
}
