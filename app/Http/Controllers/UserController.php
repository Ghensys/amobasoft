<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id) {
        $user = User::find($id);

        return $user;
    }
}
