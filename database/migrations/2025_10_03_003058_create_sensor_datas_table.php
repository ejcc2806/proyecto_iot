<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sensor_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_sensor')->constrained('sensors')->onDelete('cascade');
            $table->foreignId('id_station')->constrained('stations')->onDelete('cascade');
            $table->float('temp_value');
            $table->float('humidity');
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sensor_data');
    }
};
