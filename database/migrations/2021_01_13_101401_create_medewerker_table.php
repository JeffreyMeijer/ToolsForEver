<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedewerkerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medewerker', function (Blueprint $table) {
            $table->id();
            $table->string("naam", 40);
            $table->string("positie", 120);
            $table->string("beschrijving", 120);
            $table->string('afbeelding')->default('default.jpg');
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
        Schema::dropIfExists('medewerker');
    }
}
