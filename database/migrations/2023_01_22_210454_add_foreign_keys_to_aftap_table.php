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
        Schema::table('aftap', function (Blueprint $table) {
            $table->foreignId('officer_id', 'fk_aftap_to_officer')
                ->references('id')->on('officer')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreignId('donor_id', 'fk_aftap_to_donor')
                ->references('id')->on('donor')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreignId('pouch_type_id', 'fk_aftap_to_pouch_type')->references('id')->on('pouch_type')->onUpdate('CASCADE')->onDelete('CASCADE');    
            $table->foreignId('blood_type_id', 'fk_aftap_to_blood_type')->references('id')->on('blood_type')->onUpdate('CASCADE')->onDelete('CASCADE');    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aftap', function (Blueprint $table) {
            $table->dropForeign('fk_aftap_to_officer');
            $table->dropForeign('fk_aftap_to_donor');
            $table->dropForeign('fk_aftap_to_pouch_type');
            $table->dropForeign('fk_aftap_to_blood_type');
        });
    }
};
