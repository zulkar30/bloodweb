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
        Schema::table('officer', function (Blueprint $table) {
            $table->foreignId('user_id', 'fk_officer_to_users')
            ->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreignId('position_id', 'fk_officer_to_position')
            ->references('id')->on('position')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreignId('blood_type_id', 'fk_officer_to_blood_type')
            ->references('id')->on('blood_type')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('officer', function (Blueprint $table) {
            $table->dropForeign('fk_officer_to_users');
            $table->dropForeign('fk_officer_to_position');
            $table->dropForeign('fk_officer_to_blood_type');
        });
    }
};
