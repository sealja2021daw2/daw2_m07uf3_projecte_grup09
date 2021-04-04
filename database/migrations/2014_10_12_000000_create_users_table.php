<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('nomusuari',25);
            $table->boolean('esadmin')->required();
            $table->string('contrasena',200)->required();
            $table->string('nom',25)->required();
            $table->string('cognoms',50)->required();
            $table->string('email',100)->unique()->required();
            $table->integer('mobil')->required();
            $table->datetime('h_entrada')->nullable()->default(NULL);
            $table->datetime('h_sortida')->nullable()->default(NULL);
            $table->primary('nomusuari');
          
        });
        // Insert some stuff
        DB::table('users')->insert(
        array(
            'nomusuari' => 'sergio',
            'esadmin' => true,
            'contrasena' => Hash::make('sergio'),
            'nom' => 'sergio',
            'cognoms' => 'aliaga jabalera',
            'email' => 'sergioaliaga@gmail.com',
            'mobil' => 64563044,
        )
    );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
