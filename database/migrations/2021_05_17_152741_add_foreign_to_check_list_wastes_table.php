<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToCheckListWastesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('check_list_wastes', function (Blueprint $table) {
            $table
                ->foreign('hire_id')
                ->references('id')
                ->on('hires');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('check_list_wastes', function (Blueprint $table) {
            $table->dropForeign(['hire_id']);
        });
    }
}
