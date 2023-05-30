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
        
        $resp = $this->get('/api/breed/random')->json();

        $this->assertIsString($resp);
        
     }

    


}
