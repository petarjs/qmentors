<?php

namespace Domain\Mentors\Models;

use Domain\Courses\Models\Course;
use Domain\Mentees\Models\Mentee;
use Domain\Users\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Support\Traits\HasParentModel;

class Mentor extends User
{
    use SoftDeletes, HasParentModel;

    protected $guard_name = 'web';

    protected $table = 'users';

    public function newQuery($excludeDeleted = true)
    {
        return parent::newQuery($excludeDeleted)
            ->role('mentor');
    }

    public function courses()
    {
        return $this
            ->belongsToMany(Course::class, 'teaches', 'mentor_id', 'course_id');
    }

    public function mentees()
    {
        return $this->hasMany(Mentee::class, 'mentor_id');
    }
}
