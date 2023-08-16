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
            $table->unsignedBigInteger('personnel_form_id');
            $table->string('reason_for_upgrade');
            $table->date('effective_date');
            $table->decimal('basic_salary_from', 10, 2);
            $table->decimal('basic_salary_to', 10, 2);
            // Add other columns as needed
            $table->timestamps();

            $table->foreign('personnel_form_id')->references('id')->on('personnel_forms')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('salary_adjustments');
    }
}