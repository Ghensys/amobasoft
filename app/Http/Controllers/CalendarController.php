<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calendar;

class CalendarController extends Controller
{
    /**
     * Días del calendario no disponible por id del calendario
     * 
     * @param  \Illuminate\Http\Request  $calendar_id
     * @return \Illuminate\Http\Response
     */
    public function showCalendarDisabledDaysByCalendarId($calendar_id) {

        $calendar = Calendar::find($calendar_id);

        $data['calendar'] = $calendar;
        $data['disabled_days'] = $calendar->disabledDays;

        return $data;
    }

    /**
     * Días del calendario no disponible por id del calendario
     * 
     * @param  \Illuminate\Http\Request  $array
     * @return \Illuminate\Http\Response
     */
    public function showCalendarDisabledDaysByManyCalendarIds($array) {

        $calendar_ids = unserialize($array);

        foreach ($calendar_ids as $key => $value) {
            $calendar = Calendar::find($value);
            $data['calendar'][$key] = $calendar;
            $data['calendar'][$key]['disabled_days'] = $calendar->disabledDays;

        }

        return $data;
    }
}
