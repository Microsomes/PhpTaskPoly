<?php

namespace App\Http\Controllers;

use App\Models\Breed;
use App\Models\Park;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function associate(Request $request, User $user){


        $validData = $request->validate([
            'model_id' => 'required|integer',
            'model_type' => 'required|string'
        ]);

        
        $modelId = $validData['model_id'];
        $parkType = $validData['model_type'];

        $model = $parkType::findOrFail($modelId);

        $success = false;

       
       //check if model is a park
        if($model instanceof Park){
            $user->park()->attach($model);
            $success = true;
        }else if($model instanceof Breed){
            $user->breed()->attach($model);

            $success = true;
        }



        if($success){
            return response()->json([
                'message' => 'Model associated with user'
            ], 201);
        }else{
            return response()->json([
                'message' => 'Model not associated with user'
            ], 400);
        }
        
        


    }
}
