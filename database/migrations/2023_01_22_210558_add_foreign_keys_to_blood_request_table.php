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
        Schema::table('blood_request', function (Blueprint $table) {
            $table->unsignedBigInteger('doctor_id')->nullable();
            $table->foreign('doctor_id', 'fk_blood_request_to_doctor')
            ->references('id')->on('doctor')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->unsignedBigInteger('officer_id')->nullable();
            $table->foreign('officer_id', 'fk_blood_request_to_officer')
            ->references('id')->on('officer')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->unsignedBigInteger('patient_id')->nullable();
            $table->foreign('patient_id', 'fk_blood_request_to_patient')
            ->references('id')->on('patient')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->unsignedBigInteger('blood_type_id')->nullable();
            $table->foreign('blood_type_id', 'fk_blood_request_to_blood_type')
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
        Schema::table('blood_request', function (Blueprint $table) {
            $table->dropForeign('fk_blood_request_to_doctor');
            $table->dropForeign('fk_blood_request_to_officer');
            $table->dropForeign('fk_blood_request_to_patient');
            $table->dropForeign('fk_blood_request_to_blood_type');
        });
    }
};
