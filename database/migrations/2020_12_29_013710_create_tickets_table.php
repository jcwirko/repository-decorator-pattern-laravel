<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    public function up()
    {
        Schema::create('tickets', function(Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->float('amount');

            $table->unsignedInteger('car_id');

            $table->foreign('car_id')
                ->references('id')
                ->on('cars')
                ->onDelete('cascade');;

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
