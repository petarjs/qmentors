<?php

namespace App\Mentors\Controllers;

use App\Mentors\Queries\MentorIndexQuery;
use App\Mentors\ViewModels\MentorIndexViewModel;
use Illuminate\Http\Request;

class MentorController
{
    public function index(Request $request, MentorIndexQuery $query)
    {
        return (new MentorIndexViewModel($query))->view('mentors.index');
    }
}
