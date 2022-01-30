<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calendar;

class CalendarController extends Controller
{
    /**
     * Días del calendario no disponible
     * 
     * @param  \Illuminate\Http\Request  $calendar_id
     * @return \Illuminate\Http\Response
     */
    public function showCalendarDisabledDays($calendar_id) {

        $calendar = Calendar::find($calendar_id);

        $data['calendar'] = $calendar;
        $data['disabled_days'] = $calendar->disabledDays;

        return $data;
    }

    /**
     * 
     * @param  \Illuminate\Http\Request  $calendar_id
     * @return \Illuminate\Http\Response
     */
    public function show($calendar_id) {
        return $calendar_id;

        var_dump($calendar_id);die;

        $array = serialize([0 => 1, 1 => 2]);
        $url = "http://127.0.0.1:8000/api/calendardisableddays/".$array;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $data = curl_exec($ch);
        curl_close($ch);
        
        var_dump(serialize([0 => 1, 1 => 2]));die;

        $calendar = Calendar::find($calendar_id);

        $data['calendar'] = $calendar;
        $data['disabled_days'] = $calendar->disabledDays;

        return $data;

        $array = serialize([0 => 1, 1 => 2]);
        $url = "http://127.0.0.1:8000/api/calendardisableddays/".$array;

        return $url;

        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_HEADER, 0);
        // $data = curl_exec($ch);
        // curl_close($ch);

        // var_dump($data);die;

        // var_dump(serialize([0 => 1, 1 => 2]));die;
    }
}
