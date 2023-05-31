<?php

namespace App\Http\Controllers;

use App\Models\Park;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function associate(Request $request, User $user){


        $validData = $request->validate([
            'model_id' => 'required|exists:parks,id',
            'model_type' => 'required|string'
        ]);

        
        $modelId = $validData['model_id'];
        $parkType = $validData['model_type'];

        $model = $parkType::find($modelId);

       
       //check if model is a park
        if($model instanceof Park){
            $user->park()->attach($model);
        }

        


    }
}
