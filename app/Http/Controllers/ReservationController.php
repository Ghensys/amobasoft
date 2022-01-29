<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Http\Controllers\UserController;

class ReservationController extends Controller
{

    public function __construct()
    {
        $user = new UserController();
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::all();


        $data = $this->user->index();

       //s var_dump($data);die;


        return $data;

        //test
        foreach (Reservation::all() as $reservations) {
            print_r(json_encode($reservations->route));
        }
    }

    /**
     * Find reservations by user
     * 
     * @param  \Illuminate\Http\Request  $id
     * @return \Illuminate\Http\Response
     */
    public function checkReservationsByUser($id)
    {
        $user = $this->user->show($id);

        $data['user_id'] = $user->id;
        $data['first_name'] = $user->first_name;
        $data['last_name'] = $user->last_name;
        $data['phone_number'] = $user->phone_number;

        foreach ($user->userPlans as $key_user_plan => $value_user_plan) {
            $data['user_plan'][$key_user_plan] = [
                'id' => $value_user_plan->id,
                'user_id' => $value_user_plan->user_id,
                'status' => $value_user_plan->status,
                'language' => $value_user_plan->language,
                'created' => $value_user_plan->created,
                'modified' => $value_user_plan->modified
            ];

            foreach ($value_user_plan->reservations as $key_reservation => $value_reservation) {
                $data['user_plan'][$key_user_plan]['reservations'][$key_reservation] = [
                    'id' => $value_reservation->id,
                    'route_id' => $value_reservation->route_id,
                    'route_title' => $value_reservation->route->title,
                    'reservation_start' => $value_reservation->reservation_start,
                    'reservation_end' => $value_reservation->reservation_end,
                    'route_stop_origin_id' => $value_reservation->route_stop_origin_id,
                    'route_stop_destination_id' => $value_reservation->route_stop_destination_id,
                    'created_at' => $value_reservation->created_at,
                    'updated_at' => $value_reservation->updated_at,
                    'deleted_at' => $value_reservation->deleted_at
                ];
            }
        }

        return $data;

        return $user->userPlans;
    }
}
