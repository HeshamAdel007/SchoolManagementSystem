<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->date('attendence_date');
            $table->boolean('attendence_status');
            $table->timestamps();
            $table->foreignId('student_id')->references('id')
                  ->on('students')->onDelete('cascade');

            $table->foreignId('grade_id')->references('id')
                  ->on('Grades')->onDelete('cascade');

            $table->foreignId('classroom_id')->references('id')
                  ->on('Classrooms')->onDelete('cascade');
            $table->foreignId('section_id')->references('id')
                  ->on('sections')->onDelete('cascade');

            $table->foreignId('teacher_id')->references('id')
                  ->on('teachers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}
