<?php

namespace Domain\Courses\States;

use Spatie\ModelStates\State;
use Spatie\ModelStates\StateConfig;

abstract class CourseState extends State
{
    public static function config(): StateConfig
    {
        return parent::config()
            ->default(Draft::class)
            ->allowTransition(Draft::class, Published::class)
            ->allowTransition(Published::class, Draft::class)
            ->allowTransition(Draft::class, Archived::class)
            ->allowTransition(Published::class, Archived::class);
    }

    abstract public function active(): bool;

    abstract public function color(): string;
}
