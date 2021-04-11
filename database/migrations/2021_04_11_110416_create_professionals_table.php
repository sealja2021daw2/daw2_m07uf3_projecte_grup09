<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professionals', function (Blueprint $table) {
            $table->string('nif',9);
            $table->string('carrec',25)->required();
            $table->decimal('q_paga_SSocial',9, 2)->required();
            $table->decimal('irpf_descomp',9, 2)->required();
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
        Schema::dropIfExists('professionals');
    }
}
