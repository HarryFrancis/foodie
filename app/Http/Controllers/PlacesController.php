<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Place;
use App\Http\Requests\PlacesAddRequest;
use App\Http\Requests\FilterFormRequest;

use DB;

class PlacesController extends Controller
{
    public function index()
    {        
        $places = Place::all();

        return view("index", [
            "places" => $places,
            "distance" => "",
        ]);
    }

    public function indexPost(FilterFormRequest $request)
    {
        $maximumDistance = $request->get('distance');
        
        $places = Place::getWithDistance(-2.6026440, 51.4547620)->having("distance", "<", $maximumDistance);

        return view("index", [
            "places" => $places->get(),
            "distance" => $maximumDistance,
        ]);
    }

    public function show($slug)
    {
        $place = Place::where('slug', '=', $slug)->first();

        if (!$place) {
            abort(404);
        }

        return view("place", [
            "place" => $place,
        ]);
    }

    public function health($value)
    {
        $places = Place::where("health", ">=", $value)->orderBy("health", "desc")->get();

        return view("health", ["places" => $places]);
    }

    public function add()
    {
        return view("form");
    }

    public function addPost(PlacesAddRequest $request)
    {
        $place = new Place($request->only("name", "health", "lat", "lng"));
        $place->save();

        return redirect("/places");
    }
}
