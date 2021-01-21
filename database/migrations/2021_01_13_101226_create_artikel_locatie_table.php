<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtikelLocatieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artikel_locatie', function (Blueprint $table) {
            $table->foreignId('product_id')->references('id')->on('artikelen')->onDelete('cascade')->contrained();
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
        Schema::dropIfExists('artikel_locatie');
    }
}
