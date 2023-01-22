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
        Schema::table('blood_supply', function (Blueprint $table) {
            $table->foreignId('blood_type_id', 'fk_blood_supply_to_blood_type')->references('id')->on('blood_type')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blood_supply', function (Blueprint $table) {
            $table->dropForeign('fk_blood_supply_to_blood_type');
        });
    }
};
