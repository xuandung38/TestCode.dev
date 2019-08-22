<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use wataridori\BiasRandom\BiasRandom;

class TestBiasRandom extends Controller
{
    public function testRandom() {
        $data = [
            '1' => 25,
            '2' => 1,
            '3' => 9,
            '4' => 25,
            '5' => 20,
            '6' => 15,
            '7' => 10,
            '8' => 30,
        ];

        $biasRandom = new BiasRandom();  
        $biasRandom->setData($data);
        $randomElements = $biasRandom->random();
        return $randomElements[0];
      
    }
}
