<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mistake extends Model
{
    public static function fetch_all_mistakes_this_week(){
        $mistake_id_arr=[];
        $last_sunday = date("Y-m-d H:i:s", strtotime('last Sunday'));
        $mistakes = Mistake::where('updated_at', '>', $last_sunday)->get();
        foreach($mistakes as $mistake){
            $mistake_id_arr[] = $mistake->id;
        }
        return $mistake_id_arr;
    }

    public function incidents (){
        return $this->hasMany('App\Incident' );
    }

    public function tags (){
        return $this->hasMany('App\tag', 'mistake' );
    }
    public static function fetch_total_due_for_week($week, $year){
        $week_start = date('Y-m-d', strtotime($year . 'W' . sprintf('%02d', $week-1) . 7));
        $week_end = date('Y-m-d', strtotime($year . 'W' . sprintf('%02d', $week) . 6));
        $total = 0;
        $mistakes = Mistake::where('updated_at', '>=', $week_start)
          ->where('updated_at', '<=', $week_end)->get();
        foreach($mistakes as $mistake){
            $num_of_all_incidents = count(Incident::where('mistake_id', $mistake->id)->get());
            foreach(Incident::where('mistake_id', $mistake->id)
              ->where('updated_at', '>=', $week_start)
              ->where('updated_at', '<=', $week_end)->get() as $incident){
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
            $incidents = Incident::where('mistake_id', $mistake_id)
              ->where('created_at', '>', $last_sunday)->get();
            foreach ($incidents as $incident) {
                    
                if ($num_of_all_incidents>1){
                    $total += $incident->iteration;
                }
            }
        return $total;

    }
}
