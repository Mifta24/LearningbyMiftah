<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseKeypoint extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'course_id',

    ];


    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
