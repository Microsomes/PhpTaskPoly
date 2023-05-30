<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class DogCeoService
{
    public function getAllBreeds(): array
    {

        $resp = Http::get('https://dog.ceo/api/breeds/list/all');

        $breeds = collect($resp->json()['message'])
            ->map(function (array $vals, string $key){
                return $key;
            });

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
