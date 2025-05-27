<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    function homepage() {
        return view('homepage');
    }


    function kontakt (Request $request) {
        return view('kontakt');
    }


    function saberi  ($x,$y) {
        $z = $x + $y;
        return view('zbir',[
            'zbir' => $z,
            'x' => $x,
            'y' => $y
        ]);

    }

}
