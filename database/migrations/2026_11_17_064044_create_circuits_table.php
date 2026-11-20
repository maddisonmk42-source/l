<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('circuits', function (Blueprint $table) {
            $table->id();
            $table->string('circuit_name');
            $table->string('country');
            $table->decimal('circuit_length', 6, 2);
            $table->integer('number_of_turns');
            $table->string('lap_record')->nullable();
            $table->string('circuit_image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('circuits');
    }
};