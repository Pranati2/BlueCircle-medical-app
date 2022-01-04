<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "created_at",
        "updated_at",
    ];
    protected $hidden = ['pivot'];

    public function students()
    {
        return $this->belongsToMany(Students::class, Enrollment::class);
    }
}