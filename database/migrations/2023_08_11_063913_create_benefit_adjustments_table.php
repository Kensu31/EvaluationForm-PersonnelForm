<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBenefitAdjustmentsTable extends Migration
{
    public function up()
    {
        Schema::create('benefit_adjustments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->string('reason_for_upgrade');
            $table->date('effective_date');
            $table->string('food_allowance_from');
            $table->string('food_allowance_to');
            $table->string('vacation_leave_from');
            $table->string('vacation_leave_to');
            $table->string('sick_leave_from');
            $table->string('sick_leave_to');
            $table->string('birthday_leave_from');
            $table->string('birthday_leave_to');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('benefit_adjustments');
    }
}