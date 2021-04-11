<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socis', function (Blueprint $table) {
            $table->string('nif',9);
            $table->string('nom',25)->required();
            $table->string('cognoms',50)->required();
            $table->string('adreca',50)->required();
            $table->string('poblacio',25)->required();
            $table->string('comarca',25)->required();
            $table->integer('telefon')->required();
            $table->integer('mobil')->required();
            $table->string('email',100)->unique()->required();
            $table->date('d_alta')->required();
            $table->decimal('q_mensual',9, 2)->required();
            $table->decimal('donacio',9, 2)->nullable()->default(NULL)->default(0);
            $table->decimal('aport_anual',9, 2)->nullable()->default(NULL);
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
        Schema::dropIfExists('socis');
    }
}
