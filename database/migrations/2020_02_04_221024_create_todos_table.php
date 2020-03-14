<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('content');
            $table->string('location');
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->boolean('completed');
            $table->unsignedBigInteger('list_id');
            $table->foreign('list_id')
            ->on('todolists')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('todos');
    }
}
