<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table='orders';
    public $timestamps=false;
    public function attr()
    {
        return $this->hasMany(attr::class,'order_id','id');
    }
}
