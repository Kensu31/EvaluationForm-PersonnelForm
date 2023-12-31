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
            $table->unsignedBigInteger('personnel_form_id');
            $table->foreign('personnel_form_id')->references('id')->on('personnel_forms')->onDelete('cascade');
            $table->string('reason_for_upgrade');
            $table->date('effective_date');
            $table->decimal('food_allowance_from', 10, 2)->nullable();
            $table->decimal('food_allowance_to', 10, 2)->nullable();
            $table->decimal('vacation_leave_from', 10, 2)->nullable();
            $table->decimal('vacation_leave_to', 10, 2)->nullable();
            $table->decimal('sick_leave_from', 10, 2)->nullable();
            $table->decimal('sick_leave_to', 10, 2)->nullable();
            $table->decimal('birthday_leave_from', 10, 2)->nullable();
            $table->decimal('birthday_leave_to', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('benefit_adjustments');
    }
}