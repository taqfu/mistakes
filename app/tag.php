<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    public function type (){
        return $this->belongsTo('App\TagType', "tag_type_id");
    }
}
