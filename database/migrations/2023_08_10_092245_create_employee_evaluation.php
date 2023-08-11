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
        Schema::create('employee_evaluations', function (Blueprint $table) {
            $table->id();
            $table->string('employee_name');
            $table->string('reviewer');
            $table->string('job_title');
            $table->date('review_period');
            $table->integer('ratingQuality');
            $table->integer('ratingAttendance');
            $table->integer('ratingReliability');
            $table->integer('ratingCommunication');
            $table->integer('ratingJudgment');
            $table->integer('ratingInitiative');
            $table->integer('ratingKnowledge');
            $table->integer('ratingTraining');
            $table->text('goals');
            $table->double('ratingScore');
            $table->text('comments')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_evaluations');
    }
};