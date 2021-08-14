<?php

namespace Domain\Courses\Models;

use Domain\Assignments\Models\Assignment;
use Domain\Courses\Enums\CategoryEnum;
use Domain\Courses\Enums\DifficultyEnum;
use Domain\Courses\QueryBuilders\CourseQueryBuilder;
use Domain\Courses\States\CourseState;
use Domain\Mentors\Models\Mentor;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\ModelStates\HasStates;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Support\Trix\Traits\TrixRenderTrait;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;

class Course extends Model
{
    use HasStates, HasSlug, SoftDeletes, HasTrixRichText, TrixRenderTrait;
    use LogsActivity;

    protected $casts = [
        'state' => CourseState::class,
        'difficulty' => DifficultyEnum::class . ':nullable',
        'category' => CategoryEnum::class . ':nullable',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll();
    }

    public function newEloquentBuilder($query): CourseQueryBuilder
    {
        return new CourseQueryBuilder($query);
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class)->ordered();
    }

    public function mentors()
    {
        return $this
            ->belongsToMany(Mentor::class, 'teaches', 'course_id', 'mentor_id');
    }
}
