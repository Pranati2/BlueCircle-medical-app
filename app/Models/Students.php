<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    protected $appends = [
        "courses"
    ];

    protected $with = [
        "courses"
    ];

    protected $fillable = [
        "name",
        "created_at",
        "updated_at",
    ];
    protected $hidden = ['pivot'];

    public function courses()
    {
        return $this->belongsToMany(Courses::class, "students_courses_enrollment");
    }

    public function getCoursesAttribute()
    {
        $this->courses = $this->courses()->get();
    }
}