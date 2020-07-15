<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function store()
    {

        Project::create($this->validateRequest());
    }


    public function update(Project $project)
    {
       $project->update($this->validateRequest());
    }

    protected function validateRequest()
    {
       return request()->validate([
           'title' => 'required',
           'desc' => 'required'
       ]);
    }

}
