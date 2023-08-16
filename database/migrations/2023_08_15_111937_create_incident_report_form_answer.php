<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('incident_report_form_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('incident_report_form_id');
            $table->string('location');
            $table->date('incident_date');
            $table->string('incident_time');
            $table->text('incident_details');
            $table->text('cause');
            $table->text('recommendation');
            $table->string('reportedby');
            $table->string('position');
            $table->string('department');
            $table->string('supervisor');
            $table->timestamps();
            $table->foreign('incident_report_form_id')->references('id')->on('incident_report_forms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incident_report_form_answers');
    }
};
