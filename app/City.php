<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    public $table = "city";

    protected $fillable = [
        'country', 'region', 'city', 'latitude', 'longitude'
    ];
}
