<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWritersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('writers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 50);
            $table->string('genero', 1);
            $table->integer('edad');
            $table->string('email', 50);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('writers');
    }
}
