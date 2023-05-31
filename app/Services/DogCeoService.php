<?php

namespace App\Services;

use App\Models\Breed;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Http;

class DogCeoService
{
    public function getAllBreeds()

    {

        if (cache()->has('breeds')) {
            return cache()->get('breeds');
        }


        $resp = Http::get('https://dog.ceo/api/breeds/list/all');

        $breeds = collect($resp->json()['message'])
            ->map(function (array $vals, string $key){
                return $key;
        });

        
        foreach($breeds as $breed){
           
             Breed::firstOrCreate([
                'name' => $breed
            ]);

        }
        
        cache()->set('breeds', $breeds, Carbon::now()->addMinutes(5));

        return $breeds->toArray();
    }

    public function getImageByBreedId(string $breedId):string {
        $resp = Http::get("https://dog.ceo/api/breed/{$breedId}/images/random");
        return $resp->json()['message'];
    } 
    
    public function getRandomBreed():string {
        $breeds = $this->getAllBreeds();

        $randomBreed = $breeds[array_rand($breeds)];

        return $randomBreed;
    }

    public function getBreedById(string $breedid){
        $allBreeds = $this->getAllBreeds();

        if(in_array($breedid, $allBreeds)){
            return $breedid;
        } else {
            return response()->json(['error' => 'Breed not found'], 404);
        }

    }
}
