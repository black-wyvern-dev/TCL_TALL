<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypesAgainToTankersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tankers', function (Blueprint $table) {
            $table->enum('type', ['Rigid', 'Non-Rigid','Milk', 'Food', 'Vacuum', 'Petrol', 'Waste'])->default('Non-Rigid')->after('sector');            
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
            $table->dropColumn('type');
        });
    }
}
