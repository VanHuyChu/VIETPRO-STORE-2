<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attributes extends Model
{
    protected $table = 'attributes';
    public $timestamps = false;
    public function values()
    {
        return $this->hasMany(Values::class, 'attr_id', 'id');
    }
}
