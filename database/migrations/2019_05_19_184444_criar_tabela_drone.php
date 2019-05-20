<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaDrone extends Migration
{
    /**
     * Exemplo:
     *
     * {
     *   "id": 1,
     *   "image": "https://robohash.org/verovoluptatequia.jpg",
     *   "name": "Suzann",
     *   "address": "955 Springview Junction",
     *   "battery": 90,
     *   "max_speed": 3.8,
     *   "average_speed": 11.6,
     *   "status": "failed",
     *   "fly": 94
     * }
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->string('name');
            $table->string('address');
            $table->integer('battery');
            $table->float('max_speed', 8, 2);
            $table->float('average_speed', 8, 2);
            $table->enum('status', ['success', 'delayed', 'flying', 'failed', 'offiline', 'charging']);
            $table->integer('fly');
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
        Schema::dropIfExists('drones');
    }
}
