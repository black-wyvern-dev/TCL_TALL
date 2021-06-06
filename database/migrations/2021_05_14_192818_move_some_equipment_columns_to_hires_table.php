<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MoveSomeEquipmentColumnsToHiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hires', function (Blueprint $table) {
            $table->date('mot_expiry')->after('tanker_id')->nullable(true);
            $table->date('adr_expiry')->after('mot_expiry')->nullable(true);
            $table->string('service_interval')->after('adr_expiry')->nullable(true);
            $table->boolean('discharge_pump')->default(0)->after('service_interval')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hires', function (Blueprint $table) {
            $table->dropColumn('mot_expiry');
            $table->dropColumn('adr_expiry');
            $table->dropColumn('service_interval');
            $table->dropColumn('discharge_pump');
        });
    }
}
