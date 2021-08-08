<?php

namespace Domain\Courses\Models;

use CourseState;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Spatie\ModelStates\HasStates;

class Course extends Model
{
    use HasStates;

    protected $casts = [
        'state' => CourseState::class,
    ];
}
