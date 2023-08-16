<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('position_movements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personnel_form_id');
            $table->foreign('personnel_form_id')->references('id')->on('personnel_forms')->onDelete('cascade');
            $table->string('reason_for_upgrade');
            $table->date('effective_date');
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

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('position_movements');
    }
};