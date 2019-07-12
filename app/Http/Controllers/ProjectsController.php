<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;

use App\Services\Twitter;

use Illuminate\Contracts\View\View;

use Illuminate\Filesystem\Filesystem;
use App\Mail\ProjectCreated;

class ProjectsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        /*----EAXMPLE HELPERS----
        auth()->id() //User id number

        auth()->user() //User name returned

        auth()->check() //Boolean----*/

        $projects = Project::where('owner_id', auth()->id())->get();

        //For telescope
        //dump($projects);

        //Cache function
        cache()->rememberForever('stats', function () {
            return ['lessons' => 1500, 'hours' => 20000];
        });

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

    //public function show(Project $project, Twitter $twitter)
    public function show(Project $project)
    {
        //$twitter = app('Twitter');

        //dd($twitter);

        //27-Authorisation essentials - replaced with policy class
        //if ($project->owner_id !== auth()->id()) {
        //  abort(403);
        //}

        /*---Helper function----*/
        //abort_if($project->owner_id !== auth()->id(), 403);

        //Use with owns class in user.php
        //abort_unless(auth()->user()->owns($project), 403);


        /*----Check for policy authroisation----*/
        $this->authorize('update', $project);

        /*---Gate facade---*/
        //if (\Gate::denies('update', $project)) {
        //  abort(403);
        //}

        //Option 4 abort_if(\Gate::denies('update', $project), 403);

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
        $attributes = request()->validate([
            'title' => [
                'required', 'min:5', 'max:255'
            ],
            'description' => [
                'required', 'min:5', 'max:255'
            ],
        ]);

        //Project::create($attributes);

        /*---------------USE INLINE PROJECT CREATE COMMAND--------*/
        //Project::create(request()->validate([
        //'title' => [
        //  'required', 'min:5', 'max:255'
        //],
        //'description' => [
        //    'required', 'min:5', 'max:255'
        //  ],
        //]));

        /*-----Lesson 24 authentication-----*/
        $attributes['owner_id'] = auth()->id();

        $project = Project::create($attributes);

        //Test of telescope using mail
        \Mail::to('example@gmail.com')->send(new ProjectCreated($project));


        //Project::create($attributes + ['owner_id' => auth()->id()]);

        return redirect('/projects');
    }
}
