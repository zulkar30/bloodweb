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
        Schema::table('patient', function (Blueprint $table) {
            $table->foreignId('blood_type_id', 'fk_donor_to_blood_type')->references('id')->on('blood_type')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreignId('room_id', 'fk_donor_to_room')->references('id')->on('room')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreignId('maintenance_section_id', 'fk_donor_to_maintenance_section')->references('id')->on('maintenance_section')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patient', function (Blueprint $table) {
            $table->dropForeign('fk_donor_to_blood_type');
            $table->dropForeign('fk_donor_to_room');
            $table->dropForeign('fk_donor_to_maintenance_section');
        });
    }
};
