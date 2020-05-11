<?php

namespace App\Http\Controllers;

use App\Lab;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index()
    {
        $labs = Lab::all();
        $markers = [];
        foreach ($labs as $lab) {
            $markers[] = $lab->location;
        }
        return view('map.index', ['markers' => $markers]);
    }
}
