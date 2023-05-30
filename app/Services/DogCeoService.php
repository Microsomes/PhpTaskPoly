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
    
}
