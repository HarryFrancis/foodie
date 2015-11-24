<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Place;
use App\Http\Requests\PlacesAddRequest;

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

    public function health($value)
    {
        return $this->showPlaces("health", Place::where("health", ">=", $value)->orderBy("health", "desc")->get());
    }

    public function add()
    {
        return view("form");
    }

    public function addPost(PlacesAddRequest $request)
    {
        $place = new Place($request->only("name", "health"));
        $place->save();

        return redirect("/places");
    }

    private function showPlaces($template, $places)
    {
        return count($places) ? view($template, [
            "places" => $places,
        ]) : view("not-found");
    }
}
