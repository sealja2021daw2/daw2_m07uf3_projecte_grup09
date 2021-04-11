<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreballadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treballadors', function (Blueprint $table) {
            $table->string('nif',9);
            $table->string('nom',25)->required();
            $table->string('cognoms',50)->required();
            $table->string('adreca',50)->required();
            $table->string('poblacio',25)->required();
            $table->string('comarca',25)->required();
            $table->integer('telefon')->required();
            $table->integer('mobil')->required();
            $table->string('email',100)->unique()->required();
            $table->date('d_ingres')->required();
            $table->string('cif_ong',9);
            $table->foreign('cif_ong')->references('cif')->on('ongs')->onUpdate('cascade');
            $table->primary('nif');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('treballadors');
    }
}
