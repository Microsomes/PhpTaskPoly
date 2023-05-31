<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function associate(Request $request, User $user){


        $validData = $request->validate([
            'park_id' => 'required|exists:parks,id',
            'park_type' => 'required|string'
        ]);

        
        $parkId = $validData['park_id'];
        $parkType = $validData['park_type'];

        $park = $parkType::find($parkId);

        $user->park()->attach($park);

    }
}
