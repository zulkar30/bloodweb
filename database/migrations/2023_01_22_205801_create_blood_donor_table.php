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
        Schema::create('blood_donor', function (Blueprint $table) {
            $table->id();
            $table->string('no_bd')->nullable();
            $table->string('name');
            $table->string('hb');
            $table->string('t_meter');
            $table->string('bb');
            $table->enum('result', ['cocok', 'tidak-cocok'])->nullable();
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
        Schema::dropIfExists('blood_donor');
    }
};
