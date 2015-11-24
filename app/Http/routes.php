<?php

$router->group([
    "prefix" => "places"
], function ($router) {
    $router->get("/", "PlacesController@index");
    $router->get("{id}", "PlacesController@show");
});
