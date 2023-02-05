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
        Schema::create('blood_request', function (Blueprint $table) {
            $table->id();
            $table->string('wb')->nullable();
            $table->string('we')->nullable();
            $table->string('prc')->nullable();
            $table->string('tc')->nullable();
            $table->string('ffp')->nullable();
            $table->string('cry')->nullable();
            $table->string('plasma')->nullable();
            $table->string('prp')->nullable();
            $table->string('total')->nullable();
            $table->string('fulfilled')->nullable();
            $table->enum('status', [1,2,3])->nullable();
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
        Schema::dropIfExists('blood_request');
    }
};
