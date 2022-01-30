<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Http\Controllers\UserController;

class ReservationController extends Controller
{

    public function __construct() {
        $user = new UserController();
        $this->user = $user;
    }

    /**
     * Buscar reservaciones de un usuario por el Id del usuario
     * 
     * @param  \Illuminate\Http\Request  $id
     * @return \Illuminate\Http\Response
     */
    public function checkReservationsByUser($id) {
        // Busqueda del usuario
        $user = $this->user->show($id);

        // Validacion de existencia de usuario
        if (!$user) {
            $data['message'] = 'User not found.';
        }
        else {
            // Inicio de arreglo de datos para la respuesta del servicio
            // Información del usuario
            $data['user'] = $user->id;
            $data['first_name'] = $user->first_name;
            $data['last_name'] = $user->last_name;
            $data['phone_number'] = $user->phone_number;

            //Planes de usuario asociados al usuario
            foreach ($user->userPlans as $key_user_plan => $value_user_plan) {
                $data['user_plan'][$key_user_plan] = [
                    'id' => $value_user_plan->id,
                    'user_id' => $value_user_plan->user_id,
                    'status' => $value_user_plan->status,
                    'language' => $value_user_plan->language,
                    'created' => $value_user_plan->created,
                    'modified' => $value_user_plan->modified
                ];

                if (!isset($value_user_plan->reservations)) {
                    $data['user_plan'][$key_user_plan]['reservations']['message'] = 'Reservations not found.';
                }
                else {
                    //Reservaciones por cada plan de usuario
                    foreach ($value_user_plan->reservations as $key_reservation => $value_reservation) {
                        $data['user_plan'][$key_user_plan]['reservations'][$key_reservation] = [
                            'id' => $value_reservation->id,
                            'reservation_start' => $value_reservation->reservation_start,
                            'reservation_end' => $value_reservation->reservation_end,
                            'route_info' => $value_reservation->route,
                            'route_stop_origin_id' => $value_reservation->route_stop_origin_id,
                            'route_stop_destination_id' => $value_reservation->route_stop_destination_id,
                            'created_at' => $value_reservation->created_at,
                            'updated_at' => $value_reservation->updated_at,
                            'deleted_at' => $value_reservation->deleted_at
                        ];
                    }
                }
                
            }
        }

        return $data;
    }
}
