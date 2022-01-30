<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Route;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $id
     * @return \Illuminate\Http\Response
     */
    public function checkCapacityById($id) {

        $route = Route::find($id);
        $data['id'] = $route->id;
        $data['invitation_code'] = $route->invitation_code;
        $data['title'] = $route->title;
        $data['start_timestamp'] = $route->start_timestamp;
        $data['end_timestamp'] = $route->end_timestamp;
        $data['route_data'] = $route->routeData;

        return $route;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function testArray() {

        $array = serialize([0 => 2, 1 => 3]);
        $url = "http://127.0.0.1:8000/api/passarray/".$array;


        return $url;
    }

    /**
     * Recibiendo arreglo con serialize
     *
     * @param  \Illuminate\Http\Request  $array
     * @return \Illuminate\Http\Response
     */
    public function prueba($array) {


        var_dump(unserialize($array));die;
        return $array;
    }
}
