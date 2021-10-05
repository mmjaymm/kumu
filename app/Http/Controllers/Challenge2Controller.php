<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Challenge2Controller extends Controller
{
    public function index()
    {
        $ham_dist = 0;
        $x = 1; 
        $y = 4;

        $a = $x ^ $y;

        while ($a > 0)
        {
            $ham_dist += $a & 1;
            // return  $a & 1;
            $a >>= 1;
            // return  $a;
        }
    
        return $ham_dist;
    }
}
