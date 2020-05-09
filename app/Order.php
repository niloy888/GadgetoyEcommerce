<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function payment()
    {
        return $this->hasOne('App\Payment');
    }
}
