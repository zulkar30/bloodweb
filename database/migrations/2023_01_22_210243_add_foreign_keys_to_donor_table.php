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
        Schema::table('donor', function (Blueprint $table) {
            $table->foreignId('profession_id', 'fk_donor_to_profession')->references('id')->on('profession')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreignId('blood_type_id', 'fk_donor_to_blood_type')->references('id')->on('blood_type')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('donor', function (Blueprint $table) {
            $table->dropForeign('fk_donor_to_profession');
            $table->dropForeign('fk_donor_to_blood_type');
        });
    }
};
