<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReporteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reporte', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('tipo_incidente');
            $table->dateTime('date_time');
            $table->longText('descricao') ->nullable();
            $table->string('prioridade');
            $table->string('latitude');
            $table->string('longitude');
            
            $table->integer('user_id')->unsigned();

            $table->timestamps();
        });

        Schema::table('reporte', function($table){
            $table->foreign('user_id')->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reporte');
    }
}
