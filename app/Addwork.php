<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Addwork extends Model
{
   use SoftDeletes;
   protected $guarded = [];
   public function get_multiple_photo(){
      return $this->hasMany('App\WorkDetails','work_id');
    }
}
