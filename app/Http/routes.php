<?php

$router->group([
    "prefix" => "places"
], function ($router) {
    $router->get("/", "PlacesController@index");
    $router->get("add", "PlacesController@add");
    $router->post("add", "PlacesController@addPost");
    $router->get("health/{value}", "PlacesController@health");
    $router->get("{id}", "PlacesController@show");
});
