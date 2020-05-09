<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class Vendor extends Model
{
    protected $guarded = [];

    public function products()
    {
        return $this->hasMany('App\Product');
    }

}
