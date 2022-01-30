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

        if (!$calendar) {
            $data['calendar'] = 'Calendar not found.';
        }
        else {
            $data['calendar'] = $calendar;
            if (!isset($calendar->disabledDays)) {
                $data['calendar']['disabled_days'] = 'Disabled days not found.';
            }
            else {
                $data['calendar']['disabled_days'] = $calendar->disabledDays;
            }
        }

        return $data;
    }

    /**
     * Días del calendario no disponible por id del calendario
     * 
     * @param  \Illuminate\Http\Request  $array
     * @return \Illuminate\Http\Response
     */
    public function showCalendarDisabledDaysByManyCalendarIds($array) {

        $calendars_id = unserialize($array);

        foreach ($calendars_id as $key => $value) {
            $calendar = Calendar::find($value);

            if (!$calendar) {
                $data['calendar'][$key] = 'Calendar not found.';
            }
            else {
                $data['calendar'][$key] = $calendar;
                if (!isset($calendar->disabledDays)) {
                    $data['calendar'][$key]['disabled_days'] = 'Disabled days not found.';
                }
                else {
                    $data['calendar'][$key]['disabled_days'] = $calendar->disabledDays;
                }
            }
        }

        return $data;
    }
}
