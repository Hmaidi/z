<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class State extends Controller
{
    public function states(){
        return $this->hasMany(State::class);
    }
}
