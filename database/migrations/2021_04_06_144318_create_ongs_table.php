<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOngsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ongs', function (Blueprint $table) {
            $table->string('cif',9);
            $table->string('nom',25)->required();
            $table->string('adreca',50)->required();
            $table->string('poblacio',25)->required();
            $table->string('comarca',25)->required();
            $table->string('tipus_ong',25)->required();
            $table->boolean('utilpublicgencat')->required();
            $table->primary('cif');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ongs');
    }
}
