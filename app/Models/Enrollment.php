<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $table = "students_courses_enrollment";
    protected $fillable = [
        "students_id",
        "courses_id",
        "enrolled_by_users_id",
        "created_at",
        "updated_at",
    ];
    protected $hidden = ['pivot'];

    public function enrolledBy()
    {
        return $this->hasOne(Users::class, "id", "enrolled_by_users_id");
    }
    public function students()
    {
        return $this->hasOne(Students::class, "id", "students_id");
    }
    public function course()
    {
        return $this->hasOne(Courses::class, "id", "courses_id");
    }
}