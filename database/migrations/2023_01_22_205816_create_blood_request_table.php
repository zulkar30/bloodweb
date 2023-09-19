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
            $table->string('no_br')->nullable();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('contact')->nullable();
            $table->enum('gender', ['laki-laki', 'perempuan'])->nullable();
            $table->integer('age')->nullable();
            $table->integer('wb')->nullable();
            $table->integer('we')->nullable();
            $table->integer('prc')->nullable();
            $table->integer('tc')->nullable();
            $table->integer('ffp')->nullable();
            $table->integer('cry')->nullable();
            $table->integer('plasma')->nullable();
            $table->integer('prp')->nullable();
            $table->integer('total')->nullable();
            $table->string('info')->nullable();
            $table->integer('fulfilled')->nullable();
            $table->enum('status', ['diterima', 'menunggu', 'ditolak'])->nullable();
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
