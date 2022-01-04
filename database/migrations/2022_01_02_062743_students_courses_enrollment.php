<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class StudentsCoursesEnrollment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_courses_enrollment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('students_id');
            $table->unsignedBigInteger('courses_id');
            $table->unsignedBigInteger('enrolled_by_users_id');
            $table->timestamps();
            $table->foreign('students_id')->references('id')->on('students');
            $table->foreign('courses_id')->references('id')->on('courses');
            $table->foreign('enrolled_by_users_id')->references('id')->on('users');
        });


        // only use random numbers upto 5000 to assure multiple enrollments
        for ($i = 0; $i < 10000; $i++) {
            DB::table("students_courses_enrollment")->insert([
                "students_id" =>  rand(1, 5000),
                "courses_id" => rand(1, 5000),
                "enrolled_by_users_id" => 1,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}