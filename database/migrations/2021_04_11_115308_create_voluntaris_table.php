<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoluntarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voluntaris', function (Blueprint $table) {
            $table->string('nif',9);
            $table->integer('edat')->required();
            $table->string('professio',25)->required();
            $table->integer('h_dedicades')->required();
            $table->primary('nif');
            $table->foreign('nif')->references('nif')->on('treballadors')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voluntaris');
    }
}
