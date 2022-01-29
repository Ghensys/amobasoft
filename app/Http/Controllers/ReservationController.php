<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::all();

        return Response($reservations);

        //test
        foreach (Reservation::all() as $reservations) {
            print_r(json_encode($reservations->route));
        }
    }
}
