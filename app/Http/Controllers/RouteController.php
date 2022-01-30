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
    public function checkCapacityById($id)
    {
        $route = Route::find($id);

        $data['id'] = $route->id;
        $data['invitation_code'] = $route->invitation_code;
        $data['title'] = $route->title;
        $data['start_timestamp'] = $route->start_timestamp;
        $data['end_timestamp'] = $route->end_timestamp;

        $data['route_data'] = $route->routeData;
        
        // //Planes de usuario asociados al usuario
        // foreach ($route->routeData as $key_userkey_route_data_plan => $value_route_data) {
        //     $data['user_plan'][$key_route_data] = [
        //         '' => $value_route_data->,
        //         '' => $value_route_data->,
        //         '' => $value_route_data->,
        //         '' => $value_route_data->,
        //         '' => $value_route_data->,
        //         '' => $value_route_data->
        //     ];


        return $route;
    }
}
