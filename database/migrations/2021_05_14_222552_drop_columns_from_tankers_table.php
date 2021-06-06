<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnsFromTankersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tankers', function (Blueprint $table) {
            $table->dropColumn('mot_expiry');
            $table->dropColumn('adr_expiry');
            $table->dropColumn('service_interval');
            $table->dropColumn('discharge_pump');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tankers', function (Blueprint $table) {
            $table->date('mot_expiry');
            $table->date('adr_expiry');
            $table->boolean('discharge_pump')->default(0);
            $table->string('service_interval');
        });
    }
}
