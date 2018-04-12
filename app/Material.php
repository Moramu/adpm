<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = ['name','price','rtl_price','whl_price'];
}
