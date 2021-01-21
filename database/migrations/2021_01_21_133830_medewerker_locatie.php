<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MedewerkerLocatie extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medewerker_locatie', function (Blueprint $table) {
            $table->foreignId('medewerker_id')->references('id')->on('medewerker')->contrained();
            $table->foreignId('locatie_id')->references('id')->on('locatie')->contrained();
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
        Schema::dropIfExists('medewerker_locatie');
    }
}
