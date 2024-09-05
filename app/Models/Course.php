<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'path_trailer',
        'about',
        'thumbnail',
        'teacher_id',
        'category_id'
    ];


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }


    // karne many to many butuh table pivot
    // maka di relasikan ke table course student untuk mengambil data students
    public function students(): BelongsToMany
    {
        // model yang ingin di relasikan, pivot table, foreign key pivot table kepada model ini, foreign key pivot table kepada model yang ingin di relasikan, parent key
        return $this->belongsToMany(User::class, 'course_students', 'course_id', 'user_id', 'id');
    }


    public function course_videos(): HasMany
    {
        return $this->hasMany(CourseVideo::class);
    }

    public function course_keypoints(): HasMany
    {
        return $this->hasMany(CourseKeypoint::class);
    }
}
