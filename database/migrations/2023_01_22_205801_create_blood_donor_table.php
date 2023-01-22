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
            $table->string('name')->nullable();
            $table->enum('gender', [1,2])->nullable();
            $table->string('hb')->nullable();
            $table->string('tm')->nullable();
            $table->string('bb')->nullable();
            $table->enum('status', [1,2])->nullable();
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
