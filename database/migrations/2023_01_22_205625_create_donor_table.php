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
        Schema::create('donor', function (Blueprint $table) {
            $table->id();
            $table->string('no_reg')->nullable();
            $table->string('name');
            $table->enum('gender', ['laki-laki', 'perempuan'])->nullable();
            $table->string('birth_place')->nullable();
            $table->date('birth_date')->nullable();
            $table->bigInteger('nik')->nullable();
            $table->longText('address')->nullable();
            $table->string('contact')->nullable();
            $table->integer('age')->nullable();
            $table->longText('photo')->nullable();
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
        Schema::dropIfExists('donor');
    }
};
