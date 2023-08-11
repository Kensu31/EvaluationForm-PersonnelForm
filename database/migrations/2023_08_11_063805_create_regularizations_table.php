<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegularizationsTable extends Migration
{
    public function up()
    {
        Schema::create('regularizations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->string('job_title_from');
            $table->string('job_title_to');
            $table->string('job_level_from');
            $table->string('job_level_to');
            $table->string('department_from');
            $table->string('department_to');
            $table->string('supervisor_from');
            $table->string('supervisor_to');
            $table->string('employment_status_from');
            $table->string('employment_status_to');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('regularizations');
    }
}
;