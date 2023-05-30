<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BreedControllerTest extends TestCase
{
    
    /** @test  */
    public function it_has_breeds_route(){
        $this->get('/api/breed')->assertStatus(200);
    }

    /** @test */
    public function it_returns_all_breeds(){
        $resp = $this->get('/api/breed')->json();

        $this->assertIsArray($resp);
    }

    
     /** @test */
     public function it_can_get_random_breed() {
        $resp = $this->get('/api/breed/random')->content();
        $this->assertIsString($resp);
     }

     /** @test */
    public function it_gets_random_image_by_breed_id(){
        $breed = "affenpinscher";
        $resp = $this->get("/api/breed/$breed/image")
            ->assertStatus(200);

        $this->assertIsString($resp->content());
     }

     /** @test */
     public function it_gets_breed_from_breed_id(){
        $resp = $this->get('/api/breed/affenpinscher')
            ->assertStatus(200);
     }

     
    


}
