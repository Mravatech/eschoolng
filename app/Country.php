<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    public $table = "CountryCity";

    protected $fillable = [
        'country', 'region', 'city'
    ];
}
