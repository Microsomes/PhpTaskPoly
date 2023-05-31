<?php

namespace Tests\Feature;

use App\Models\Breed;
use App\Models\Park;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ParkControllerTest extends TestCase
{

    use RefreshDatabase;
    
    /** @test */
    public function it_can_associate_park_with_breed(){

        $park = Park::factory()->create();
        $breed = Breed::factory()->create();

        $resp = $this->post("/api/park/{$park->id}/breed", [
            'breed_id' => $breed->id,
            'breed_type' =>  Breed::class
        ])
        ->assertStatus(200);


    }
}
