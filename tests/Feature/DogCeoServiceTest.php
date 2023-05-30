<?php

namespace Tests\Feature;

use App\Services\DogCeoService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DogCeoServiceTest extends TestCase
{

    public DogCeoService $dogCeoService;

    public function setUp(): void
    {
        parent::setUp();
        $this->dogCeoService = new DogCeoService();
    }

   
    /** @test */
    public function it_returns_an_array(){
        $this->assertIsArray($this->dogCeoService->getAllBreeds());
    }

    /** @test */
    public function it_returns_all_breeds_as_array(){
        $this->assertContains('affenpinscher', $this->dogCeoService->getAllBreeds());
    }

}
