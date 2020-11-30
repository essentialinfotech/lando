<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SecondWork extends Model
{
	use SoftDeletes;
    protected $guarded = [];
    public function get_sec_multiple_photo(){
      return $this->hasMany('App\SecondWorkDetails','sec_work_id');
    }
}
