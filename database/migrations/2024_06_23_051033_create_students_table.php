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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_id')->nullable();
            $table->string('approve_no')->nullable();
            $table->string('arwatha_no')->nullable();
            $table->string('university_type')->nullable();
            $table->string('name');
            $table->string('nrc_code1')->nullable();
            $table->string('nrc_no1')->nullable();
            $table->string('date_of_birt')->nullable();
            $table->string('grade10_desk_id')->nullable();
            $table->string('grade10_total_mark')->nullable();
            $table->string('academic_year')->nullable();
            $table->string('recent_year_desk_id')->nullable();
            $table->string('this_year')->nullable();
            $table->string('grade_10_year_check')->nullable();
            $table->string('major');
            $table->string('attendance_year');
            $table->string('this_year_desk_id');
            $table->integer('this_year_desk_no')->nullable();
            $table->string('father_name')->nullable();
            $table->string('nrc_code2')->nullable();
            $table->string('nrc_no2')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('nrc_code3')->nullable();
            $table->string('nrc_no3')->nullable();
            $table->string('recent_desk_id_and_year_1')->nullable();
            $table->string('recent_desk_id_and_year_2')->nullable();
            $table->string('recent_desk_id_and_year_3')->nullable();
            $table->string('recent_desk_id_and_year_4')->nullable();
            $table->string('recent_desk_id_and_year_5')->nullable();
            $table->string('phone_1')->nullable();
            $table->string('phone_2')->nullable();
            $table->text('address')->nullable();
            $table->string('assignment_a')->nullable();
            $table->string('assignment_b')->nullable();
            $table->text('remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
