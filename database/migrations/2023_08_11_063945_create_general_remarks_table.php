<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralRemarksTable extends Migration
{
    public function up()
    {
        Schema::create('general_remarks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->text('remarkable_performance');
            $table->text('rooms_for_improvements');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('general_remarks');
    }
}