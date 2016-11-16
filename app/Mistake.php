<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mistake extends Model
{
    public function incidents (){
        return $this->hasMany('App\Incident' );
    }
    public static function total_due(){        
        $last_sunday = date("Y-m-d H:i:s", strtotime('last Sunday'));
        $mistakes = Mistake::where('updated_at', '>', $last_sunday)->get();
        var_dump(count($mistakes));
        foreach($mistakes as $mistake){
            $incidents = Incident::where('mistake_id', $mistake->id)
              ->where('created_at', '>', $last_sunday)->get();
            foreach($incidents as $incident){
                
            }
        }
    }
}
