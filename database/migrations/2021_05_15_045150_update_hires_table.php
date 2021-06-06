<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateHiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hires', function (Blueprint $table) { 
            $table->dropColumn('hire_type');                       
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
            $table->enum('hire_type', [
                'Daily',
                'Weekly',
                'Monthly',
                '3 Months +',
                '6 Months +',
                '12 Months +',
            ]);                       
        });
    }
}
