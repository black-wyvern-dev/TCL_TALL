<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckListMilksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_list_milks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid');
            $table->enum('checklist_type', ['On', 'Off'])->default('On');
            $table->string('status')->nullable();
            
            $table->boolean('cladding_panels')->default(0);
            $table->boolean('ladder')->default(0);
            $table->boolean('side_guards')->default(0);
            $table->boolean('rear_bumper')->default(0);
            $table->boolean('wings_stays')->default(0);
            $table->boolean('lights')->default(0);
            $table->boolean('chassis')->default(0);
            $table->boolean('valve_operation')->default(0);
            $table->boolean('compartment_internal')->default(0);
            $table->boolean('landingLegs_operation')->default(0); 
            
            $table->string('vehicle_check_note')->nullable(true);

            $table->string('note_1')->nullable();
            $table->smallInteger('ns_1')->nullable();
            $table->smallInteger('os_1')->nullable();
            $table->string('note_2')->nullable();
            $table->smallInteger('ns_2')->nullable();
            $table->smallInteger('os_2')->nullable();
            $table->string('note_3')->nullable();
            $table->smallInteger('ns_3')->nullable();
            $table->smallInteger('os_3')->nullable();

            $table->string('ext_splat_right')->nullable();
            $table->string('ext_splat_left')->nullable();
            $table->string('ext_splat_rear')->nullable();
            $table->string('ext_splat_front')->nullable();
            $table->string('int_splat')->nullable();

            $table->string('int_video')->nullable();
            $table->string('ext_video')->nullable();

            $table->string('cleaning_status')->nullable();
            $table->boolean('cleaning_check')->default(0);

            $table->string('hirer_name')->nullable();
            $table->string('hirer_position')->nullable();
            $table->string('hirer_behalf')->nullable();
            $table->string('hirer_signature')->nullable();
            $table->dateTime('hirer_sign_date')->nullable();

            $table->string('tcl_name')->nullable();
            $table->string('tcl_position')->nullable();
            $table->string('tcl_behalf')->nullable();
            $table->string('tcl_signature')->nullable();
            $table->dateTime('tcl_sign_date')->nullable();
            
            $table->unsignedBigInteger('hire_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('check_list_milks');
    }
}
