<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Place;

class PlacesController extends Controller
{
    public function index()
    {
        return $this->showPlaces("index", Place::orderBy("health", "desc")->paginate(10));
    }

    public function show($id)
    {
        $place = Place::find($id);

        if (!$place) {
            abort(404);
        }

        return view("place", [
            "place" => $place,
        ]);
    }

    private function showPlaces($template, $places)
    {
        return count($places) ? view($template, [
            "places" => $places,
        ]) : view("not-found");
    }
}
