<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->string('img')->nullable(false);
            $table->date('fecha_inicio')->nullable(false);
            $table->date('fecha_final')->nullable();
            $table->time('hora_inicio')->nullable(false);
            $table->time('hora_fin')->nullable();
            // $table->string('zona_name')->nullable(false);
            $table->text('description')->nullable(false);
            $table->float('price')->nullable(false);
            $table->integer('capacity')->nullable(false);
            // $table->foreignId('event_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('zone_id')->constrained();
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
        Schema::dropIfExists('events');
    }
}
