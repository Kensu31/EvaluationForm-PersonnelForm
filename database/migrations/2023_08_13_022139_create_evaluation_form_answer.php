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
        Schema::create('evaluation_form_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('evaluation_form_id');
            $table->integer('Quality_Work');
            $table->integer('Attendance_Punctuality');
            $table->integer('Reliability');
            $table->integer('Communication');
            $table->integer('Judgment');
            $table->integer('Initiative');
            $table->integer('Knowledge');
            $table->integer('Training');
            $table->text('Performance');
            $table->text('Comments')->nullable();
            $table->timestamps();

            $table->foreign('evaluation_form_id')->references('id')->on('evaluation_forms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluation_form_answer');
    }
};
