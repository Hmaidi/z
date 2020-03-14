<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Country extends Controller
{
    protected $guarded = [];
    public $timestamps = false;

    public function country(){
        return $this->belongsTo(Country::class);
    }
}
