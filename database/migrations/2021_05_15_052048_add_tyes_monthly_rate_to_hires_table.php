<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTyesMonthlyRateToHiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hires', function (Blueprint $table) {
            $table->string('monthly_rate')->after('hire_rate')->nullable(true);
            $table->enum('hire_type', [
                'Weekly',
                'Monthly',
                '3 Months +',
                '6 Months +',
                '12 Months +',
            ])->after('delivery_date');
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
            $table->dropColumn('monthly_rate');
            $table->dropColumn('hire_type');
        });
    }
}
