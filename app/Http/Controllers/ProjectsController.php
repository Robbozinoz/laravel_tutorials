<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;

use App\Services\Twitter;

use Illuminate\Contracts\View\View;

use Illuminate\Filesystem\Filesystem;

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

        $project->update(request()->validate([
            'title' => [
                'required', 'min:5', 'max:255'
            ],
            'description' => [
                'required', 'min:5', 'max:255'
            ],
        ]));

        //USE ---$project->update(request(['title', 'description']));

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

    public function show(Project $project, Twitter $twitter)
    {
        //$twitter = app('twitter');

        dd($twitter);

        return view('projects.show', compact('project'));
    }


    public function store()
    {
        /*Replaced by create method below*/
        //$project = new Project();

        //$project->title = request('title');
        //$project->description = request('description');

        //$project->save();

        /*---------USING $ATTRIBUTES TO VALIDATE FORM-------*/
        //$attributes = request()->validate([
        //  'title' => [
        //    'required', 'min:5', 'max:255'
        //],
        //'description' => [
        //  'required', 'min:5', 'max:255'
        //],
        //]);

        //Project::create($attributes);

        /*---------------USE INLINE PROJECT CREATE COMMAND--------*/
        Project::create(request()->validate([
            'title' => [
                'required', 'min:5', 'max:255'
            ],
            'description' => [
                'required', 'min:5', 'max:255'
            ],
        ]));

        //    'title' => request('title'),

        //    'description' => request('description')

        //]);

        return redirect('/projects');
    }
}
