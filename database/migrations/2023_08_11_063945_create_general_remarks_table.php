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
            $table->unsignedBigInteger('personnel_form_id');
            $table->foreign('personnel_form_id')->references('id')->on('personnel_forms')->onDelete('cascade');
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