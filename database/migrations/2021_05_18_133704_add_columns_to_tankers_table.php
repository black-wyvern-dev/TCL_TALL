<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToTankersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tankers', function (Blueprint $table) {
            //
            $table->string('ext_splat_right')->nullable(true);
            $table->string('ext_splat_left')->nullable(true);
            $table->string('ext_splat_rear')->nullable(true);
            $table->string('ext_splat_front')->nullable(true);
            $table->string('int_splat')->nullable(true);
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
            //
            
        });
    }
}
