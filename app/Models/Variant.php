<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    protected $table='variants';
    public $timestamps=false;
    public function values()
    {
        return $this->belongsToMany(Values::class, 'variant_values', 'variant_id', 'values_id');
    }
}
