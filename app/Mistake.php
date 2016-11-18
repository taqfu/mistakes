<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mistake extends Model
{
    public function incidents (){
        return $this->hasMany('App\Incident' );
    }
    public static function total_due(){
        $total = 0;
        $last_sunday = date("Y-m-d H:i:s", strtotime('last Sunday'));
        $mistakes = Mistake::where('updated_at', '>', $last_sunday)->get();
        foreach($mistakes as $mistake){
            $num_of_all_incidents = count(Incident::where('mistake_id', $mistake->id)->get());
            foreach(Incident::where('mistake_id', $mistake->id)
              ->where('created_at', '>', $last_sunday)->get() as $incident){
                $total += $incident->iteration;
            }
        }
        return $total;
    }
    public static function total_due_for_mistake($mistake_id){
        //Need to replace this with local db field
        $total = 0;
        $last_sunday = date("Y-m-d H:i:s", strtotime('last Sunday'));
            $num_of_all_incidents = count(Incident::where('mistake_id', $mistake_id)->get());
            $num_of_current_incidents = count(Incident::where('mistake_id', $mistake_id)
              ->where('created_at', '>', $last_sunday)->get());
            if ($num_of_all_incidents>1){
                $total += $num_of_current_incidents;
            }
        return $total;

    }
}
