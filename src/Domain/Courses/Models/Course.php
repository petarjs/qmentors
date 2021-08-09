<?php

namespace Domain\Courses\Models;

use Domain\Courses\Enums\CategoryEnum;
use Domain\Courses\Enums\DifficultyEnum;
use Domain\Courses\States\CourseState;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\ModelStates\HasStates;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Course extends Model
{
    use HasStates, HasSlug, SoftDeletes;

    protected $casts = [
        'state' => CourseState::class,
        'difficulty' => DifficultyEnum::class,
        'category' => CategoryEnum::class,
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
}
