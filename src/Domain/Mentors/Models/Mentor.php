<?php

namespace Domain\Mentors\Models;

use Domain\Courses\Models\Course;
use Domain\Users\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mentor extends User
{
    use  SoftDeletes;

    protected $table = 'users';

    public function courses()
    {
        return $this
            ->belongsToMany(Course::class, 'teaches', 'mentor_id', 'course_id');
    }
}
