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

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {

        $project->update(request(['title', 'description']));

        /*Updated with code line above in shortened array*/
        //$project->title = request('title');

        //$project->description = request('description');

        //$project->save();

        return redirect('/projects');
    }

    public function destroy(Project $project)
    {

        $project->delete();

        //dd('delete ' . $id);

        //$project = Project::find($id);

        //$project->delete();

        //$project->save();

        return redirect('/projects');
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }


    public function store()
    {
        /*Replaced by create method below*/
        //$project = new Project();

        //$project->title = request('title');
        //$project->description = request('description');

        //$project->save();

        Project::create(request(['title', 'description']));

        //    'title' => request('title'),

        //    'description' => request('description')

        //]);

        return redirect('/projects');
    }
}
