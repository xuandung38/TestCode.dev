<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use wataridori\BiasRandom\BiasRandom;

class TestBiasRandom extends Controller
{
    public function testRandom() {
        $data = [
            'first' => 25,
            'second' => 2,
            'third' => 9,
            'forth' => 50,
        ];

        $biasRandom = new BiasRandom();
        $results = [];

        for ($i = 0; $i < 1000000; $i++) {
            $biasRandom->setData($data);
            $randomElements = $biasRandom->random();
            $randomElement = $randomElements[0];
            $results[$randomElement] = isset($results[$randomElement]) ? $results[$randomElement] + 1 : 1;
        }

        foreach ($results as $key => $value) {
           $resul = $key . ' :' . $value . ' times (' . $value / 1000000 * 100 . "%)\n";
           dump($resul);
        }

    }
}
