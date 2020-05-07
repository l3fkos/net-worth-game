<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Celebrity;

class CelebritiesController extends Controller
{
    public function index(){
        $celebs = Celebrity::all();
        $rand1 = rand(0, 204);
        $rand2 = rand(0, 204);
        $celeb1 = $celebs[$rand1];
        $celeb2 = $celebs[$rand2];
        if($rand1 == $rand2){
            $rand2 = $rand1 + 1;
        }
        return view('index', [
            'celeb1' => $celeb1,
            'celeb2' => $celeb2,
        ]);
    }
}
