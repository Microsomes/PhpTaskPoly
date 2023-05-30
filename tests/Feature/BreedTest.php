<?php

namespace Tests\Feature;

use App\Models\Breed;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BreedTest extends TestCase
{
    

    /** @test */
    public function generate(){
        $one = Breed::factory()->make();

        $this->assertNotEmpty($one->name);
    }

}
