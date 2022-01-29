<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    public function route() {
        return $this->belongsTo('App\Models\Route');
    }

    public function userPlan() {
        return $this->belongsTo('App\Models\UserPlan');
    }
}
