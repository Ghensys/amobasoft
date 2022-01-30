<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Route;

class RouteController extends Controller
{

    /**
     * Buscar capacidad de ruta por id de la ruta
     *
     * @param  \Illuminate\Http\Request  $id
     * @return \Illuminate\Http\Response
     */
    public function checkCapacityById($id) {

        $route = Route::find($id);

        if (!$route) {
            $data['message'] = 'Route not found';
        }
        else {
            $data['id'] = $route->id;
            $data['invitation_code'] = $route->invitation_code;
            $data['title'] = $route->title;
            $data['start_timestamp'] = $route->start_timestamp;
            $data['end_timestamp'] = $route->end_timestamp;

            if (!isset($route->routeData)) {
                $data['route_data'] = 'No route data found';
            }
            else {
                $data['route_data'] = $route->routeData;
            }
        }

        return $data;
    }

    /**
     * Buscar capacidad de una o mas rutas por el id
     *
     * @param  \Illuminate\Http\Request  $array
     * @return \Illuminate\Http\Response
     */
    public function checkCapacityManyByIds($array) {

        $routes_id = unserialize($array);

        foreach ($routes_id as $key => $value) {
            $route = Route::find($value);

            if (!$route) {
                $data['route'][$key] = [
                    'message' => "Route with id #".$value." wasn't found."
                ];
            }
            else {
                $data['route'][$key] = $route;

                if (!isset($route->routeData)) {
                    $data['route'][$key]['route_data'] = 'No route data found.';
                }
                else {
                    $data['route'][$key]['route_data'] = $route->routeData;
                }
            }
        }

        return $data;
    }

    /**
     * Metodo de prueba serializacion
     *
     * @return \Illuminate\Http\Response
     */
    public function testArray() {

        $array = serialize([1, 2]);
        //$array = serialize([0 => 2]);
        $url = "http://127.0.0.1:8000/api/arrayserealizado/".$array;

        return $url;
    }

    /**
     * Metodo de prueba receptor de serializacion
     *
     * @param  \Illuminate\Http\Request  $array
     * @return \Illuminate\Http\Response
     */
    public function prueba($array) {

        var_dump(unserialize($array));
        return $array;
    }
}
