<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HolaMundo extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function __invoke(Request $request)
    {
        return "Hi!";
    }
}
