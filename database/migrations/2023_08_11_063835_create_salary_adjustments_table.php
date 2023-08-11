<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalaryAdjustmentsTable extends Migration
{
    public function up()
    {
        Schema::create('salary_adjustments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->string('reason_for_upgrade');
            $table->date('effective_date');
            $table->string('basic_salary_from');
            $table->string('basic_salary_to');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('salary_adjustments');
    }
}