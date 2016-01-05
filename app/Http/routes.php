<?php

$router->group([
    "prefix" => "places"
], function ($router) {
    $router->get("/", "PlacesController@index");
    $router->post("/", "PlacesController@indexPost");
    $router->get("add", "PlacesController@add");
    $router->post("add", "PlacesController@addPost");
    $router->get("health/{value}", "PlacesController@health");
    $router->get("{slug}", "PlacesController@show");
});
