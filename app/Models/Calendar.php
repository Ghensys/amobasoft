<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;

    protected $table = 'calendar';

    public function disabledDays() {
        return $this->hasMany('App\Models\CalendarDisabledDays');
    }
}
