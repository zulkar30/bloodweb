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
        Schema::create('crossmatch', function (Blueprint $table) {
            $table->id();
            $table->string('no_cm')->nullable();
            $table->enum('fase1', ['positif', 'negatif'])->nullable();
            $table->enum('fase2', ['positif', 'negatif'])->nullable();
            $table->enum('fase3', ['positif', 'negatif'])->nullable();
            $table->enum('result', ['reaktif', 'non-reaktif'])->nullable();
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
        Schema::dropIfExists('crossmatch');
    }
};
