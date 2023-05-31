<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('breedable', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('breed_id');
            $table->unsignedInteger('breedable_id');
            $table->string('breedable_type');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('breedable');
    }
};
