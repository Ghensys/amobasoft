<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarDisabledDays extends Model
{
    use HasFactory;

    protected $table = 'disabled_days';

    public function calendar() {
        return $this->belongsTo('App\Models\Calendar');
    }
}
