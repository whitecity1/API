<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->string('servicio', 50);
            $table->string('telefono', 50);
            $table->string('correoelec', 50);
            $table->string('mun_ubicado', 50);
            $table->string('direccion', 50);
            $table->time('apertura');
            $table->time('cierre');
            $table->string('imagen')->nullable();

            $table->unsignedBigInteger('categorizacion_id');

                  $table->foreign('categorizacion_id')
                        ->references('id')->on('categorizacions')
                        ->onDelete('cascade');
     

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
        Schema::dropIfExists('servicios');
    }
};
