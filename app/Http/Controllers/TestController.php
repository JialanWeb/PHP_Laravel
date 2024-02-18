<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index() {
        $users = [
            [
                'name' => 'Mustermann',
                'vorname' => 'Tom',
                'ort' => 'Paris',
            ],
            [
                'name' => 'Musterfrau',
                'vorname' => 'Anna',
                'ort' => 'Sylt',
            ],
            [
                'name' => 'Boss',
                'vorname' => 'Hugo',
                'ort' => 'Bangkok',
            ]
        ];

        #echo 'ich bin index';
        return view('user')->with('daten', $users);


    }#ende index
}
