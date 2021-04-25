<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSensorSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensor_systems', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('ip_address');
            $table->string('status');
            $table->float('green_lower', 8, 2);
            $table->float('green_upper', 8, 2);
            $table->float('yellow_lower', 8, 2);
            $table->float('yellow_upper', 8, 2);
            $table->float('red_lower', 8, 2);
            $table->float('red_upper', 8, 2);
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
        Schema::dropIfExists('sensor_systems');
    }
}
