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
        $celeb1 = $celeb[$rand1];
        $celeb2 = $celeb[$rand2];
        if($rand1 == $rand2){
            $rand2 = rand(0, 259);
        }
        return view('index', [
            'celeb1' => $celeb1,
            'celeb2' => $celeb2,
        ]);
    }
}
