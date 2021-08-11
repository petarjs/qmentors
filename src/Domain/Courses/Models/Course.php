<?php

namespace Domain\Courses\Models;

use Domain\Assignments\Models\Assignment;
use Domain\Courses\Enums\CategoryEnum;
use Domain\Courses\Enums\DifficultyEnum;
use Domain\Courses\States\CourseState;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\ModelStates\HasStates;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Support\Trix\Traits\TrixRenderTrait;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;

class Course extends Model
{
    use HasStates, HasSlug, SoftDeletes, HasTrixRichText, TrixRenderTrait;

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

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }
}
