<?php

namespace Domain\Assignments\Models;

use Domain\Assignments\QueryBuilders\AssignmentQueryBuilder;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\ModelStates\HasStates;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Support\Trix\Traits\TrixRenderTrait;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;

class Assignment extends Model
{
    use HasStates, HasSlug, SoftDeletes, HasTrixRichText, TrixRenderTrait;
    use LogsActivity;

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

    public function newEloquentBuilder($query): AssignmentQueryBuilder
    {
        return new AssignmentQueryBuilder($query);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
