<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApprovalsTable extends Migration
{
    public function up()
    {
        Schema::create('approvals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personnel_form_id');
            $table->foreign('personnel_form_id')->references('id')->on('personnel_forms')->onDelete('cascade');
            $table->string('manager_name');
            $table->string('received');
            $table->date('approval_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('approvals');
    }
}