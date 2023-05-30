<?php

namespace App\Http\Controllers;

use App\Services\DogCeoService;
use Illuminate\Http\Request;

class BreedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, DogCeoService $dogCeoService)
    {
        return $dogCeoService->getAllBreeds();    
    }

    public function randomBreed(Request $request, DogCeoService $dogCeoService){
        return $dogCeoService->getRandomBreed();
    }

}
