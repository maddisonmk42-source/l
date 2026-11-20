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
    Schema::create('drivers', function (Blueprint $table) {
        $table->id();
        $table->string('driver_name', 100);
        $table->string('racing_number', 20);
        $table->string('country', 100);
        $table->date('date_of_birth')->nullable();
        $table->string('team', 100)->nullable();
        $table->string('photo')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
