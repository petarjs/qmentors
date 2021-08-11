<?php

namespace Domain\Assignments\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\ModelStates\HasStates;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Support\Trix\Traits\TrixRenderTrait;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;

class Assignment extends Model
{
    use HasStates, HasSlug, SoftDeletes, HasTrixRichText, TrixRenderTrait;

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

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}