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
            $table->foreignId('employee_id')->references('id')->on('medewerker')->onDelete('cascade')->contrained();
            $table->foreignId('locatie_id')->references('id')->on('locatie')->onDelete('cascade')->contrained();
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
