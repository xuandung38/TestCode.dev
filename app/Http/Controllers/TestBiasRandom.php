<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use wataridori\BiasRandom\BiasRandom;

class TestBiasRandom extends Controller
{
    public function testRandom() {
        // $data = [
        //     '40 RP' => 20,
        //     '100 RP' => 2,
        //     '200 RP' => 1,
        //     'TRANG PHỤC NGẪU NHIÊN ' => 1,
        //     'CARD GARENA' => 25,
        //     'NICK RANDOM ' => 40,
        //     'BIỂU TƯỢNG NGẪU NHIÊN' => 10,
        //     'TƯỚNG NGẪU NHIÊN' => 1,
        // ];
        $data = [
            '1' => 20,
            '2' => 2,
            '3' => 1,
            '4 ' => 1,
            '5' => 25,
            '6' => 40,
            '7' => 10,
            '8' => 1,
        ];

        $biasRandom = new BiasRandom();
        $results = [];

        // for ($i = 0; $i < 100; $i++) {
            $biasRandom->setData($data);
            $randomElements = $biasRandom->random(8);
            $randomElement = $randomElements[0];
        //     $results[$randomElement] = isset($results[$randomElement]) ? $results[$randomElement] + 1 : 1;
        // }
        return $randomElement;

        // foreach ($results as $key => $value) {
        //    $resul = $key . ' :' . $value . ' lần (' . $value  . "%) \r \n";
        //     dump($resul);
        // }

    }
}
