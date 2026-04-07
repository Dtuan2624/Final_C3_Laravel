<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'slug', 'price', 'description', 'status' , 'image'
    ];

    public function lessons() {
        return $this->hasMany(Lesson::class);
    }

    public function enrollments() {
        return $this->hasMany(Enrollment::class);
    }
}
