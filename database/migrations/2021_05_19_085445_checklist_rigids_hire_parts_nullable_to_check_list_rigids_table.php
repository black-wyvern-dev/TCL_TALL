<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChecklistRigidsHirePartsNullableToCheckListRigidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('check_list_rigids', function (Blueprint $table) {
            $table->string('hirer_name')->nullable()->change();
            $table->string('hirer_position')->nullable()->change();
            $table->string('hirer_signature')->nullable()->change();
            $table->string('hirer_sign_date')->nullable()->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('check_list_rigids', function (Blueprint $table) {
            $table->string('hirer_name')->nullable()->change();
            $table->string('hirer_position')->nullable()->change();
            $table->string('hirer_signature')->nullable()->change();
            $table->string('hirer_sign_date')->nullable()->change();
        });
    }
}
