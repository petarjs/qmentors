<?php

namespace App\Mentors\ViewModels;

use App\Mentors\Queries\MentorIndexQuery;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\ViewModels\ViewModel;

class MentorIndexViewModel extends ViewModel
{
    public LengthAwarePaginator $mentors;

    public function __construct(MentorIndexQuery $query)
    {
        $this->mentors = $query->paginate();
    }
}
