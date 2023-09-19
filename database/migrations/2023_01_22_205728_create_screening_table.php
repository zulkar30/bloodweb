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
        Schema::create('screening', function (Blueprint $table) {
            $table->id();
            $table->string('no_sc')->nullable();
            $table->enum('hiv', ['positif', 'negatif'])->nullable();
            $table->enum('hcv', ['positif', 'negatif'])->nullable();
            $table->enum('hbsag', ['positif', 'negatif'])->nullable();
            $table->enum('vdrl', ['positif', 'negatif'])->nullable();
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
        Schema::dropIfExists('screening');
    }
};
