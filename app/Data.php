<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    //
    public $table = "data";

    protected $fillable = [
        'name', 'formatted_address', 'lat', 'lng', 'icon', 'google_id',  'place_id', 'rating', 'reference', 'pagetoken'
    ];
}
