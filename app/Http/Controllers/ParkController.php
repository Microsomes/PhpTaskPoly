<?php

namespace App\Http\Controllers;

use App\Models\Park;
use Illuminate\Http\Request;

class ParkController extends Controller
{
    
    public function associate(Request $request, Park $park){


        $validData = $request->validate([
            'breed_id' => 'required|integer',
            'breed_type' => 'required|string'
        ]);

        
        $breedId = $validData['breed_id'];
        $breedType = $validData['breed_type'];

        $breed = $breedType::findOrFail($breedId);

        $park->breed()->attach($breed);

        return response()->json([
            'message' => 'Breed associated with park'
        ], 201);

    }

}
