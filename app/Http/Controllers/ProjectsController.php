<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;

use Illuminate\Contracts\View\View;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        //return $projects;

        //return view('projects.index', ['projects' => $projects]);
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function edit($id)
    {
        $project = Project::find($id);

        return view('projects.edit', compact('project'));
    }

    public function update($id)
    {
        $project = Project::find($id);

        $project->title = request('title');

        $project->description = request('description');

        $project->save();

        return redirect('/projects');
    }

    public function destroy($id)
    {
        $project = Project::find($id);

        //$project->id = "";

        //$project->title = "";

        //$project->description = "";
        $project->delete();

        $project->save();

        return redirect('/projects');
    }

    public function show()
    { }


    public function store()
    {

        $project = new Project();

        $project->title = request('title');
        $project->description = request('description');

        $project->save();

        return redirect('/projects');
    }
}
