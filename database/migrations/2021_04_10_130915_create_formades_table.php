<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formades', function (Blueprint $table) {
            $table->string('cif_ong',9);
            $table->string('nif_soci',9);
            $table->primary(['cif_ong','nif_soci']);
            $table->foreign('cif_ong')->references('cif')->on('ongs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('nif_soci')->references('nif')->on('socis')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formades');
    }
}
