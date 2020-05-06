<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Celebrity;

class CelebritiesController extends Controller
{
    public function index(){
        $celeb = Celebrity::all();
        $rand1 = rand(0, 259);
        $rand2 = rand(0, 259);
        if($rand1 == $rand2){
            $rand2 = rand(0, 259);
        }
        return view('index', [
            'celeb' => $celeb,
            'rand1' => $rand1,
            'rand2' => $rand2,
        ]);
    }
}
