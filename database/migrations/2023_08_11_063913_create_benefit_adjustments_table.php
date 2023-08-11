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
            $table->string('effective_date');
            $table->decimal('food_allowance_from', 10, 2);
            $table->decimal('food_allowance_to', 10, 2);
            $table->decimal('vacation_leave_from', 10, 2);
            $table->decimal('vacation_leave_to', 10, 2);
            $table->decimal('sick_leave_from', 10, 2);
            $table->decimal('sick_leave_to', 10, 2);
            $table->decimal('birthday_leave_from', 10, 2);
            $table->decimal('birthday_leave_to', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('benefit_adjustments');
    }
}