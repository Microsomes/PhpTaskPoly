<?php

namespace Tests\Feature;

use App\Models\Breed;
use App\Models\Park;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{

    use RefreshDatabase;
   
     /** @test */
     public function it_has_route_to_associate_park_with_user(){
        
        $user = User::factory()->create();
        $park = Park::factory()->create();
        
        $this->post("/api/{$user->id}/associate",[
            'model_id' => $park->id,
            'model_type' => Park::class
        ])
        ->assertStatus(200);

        $this->assertEquals(1, $user->park()->count());

    }

    /** @test */
    public function it_can_associate_breed_with_user(){

        $user = User::factory()->create();
        $breed = Breed::factory()->create();

        $this->post("/api/{$user->id}/associate",[
            'model_id' => $breed->id,
            'model_type' => Breed::class
        ])
        ->assertStatus(200);

        $this->assertEquals(1, $user->breed()->count());
        
    }
   

}
