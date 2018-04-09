<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fishSize extends Model
{
    protected $fillable = ['size'];


    public function fishPrice () {
	return $this->belongsTo('App\fishPrice','fish_size_id');
    }

}
