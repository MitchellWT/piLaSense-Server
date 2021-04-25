<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSensorDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensor_datas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sensor_system_id')
                ->constrained('sensor_systems')
                ->onDelete('cascade');
            $table->float('dht22_temperature', 8, 2);
            $table->float('dht22_humidity', 8, 2);
            $table->float('bmp388_temperature', 8, 2);
            $table->float('bmp388_pressure', 8, 2);
            $table->float('bmp388_altitude', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sensor_datas');
    }
}
