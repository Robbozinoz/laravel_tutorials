<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

use App\Project;

class ProjectTasksController extends Controller
{

    public function store(Project $project)
    {
        $attributes = request()->validate(['description' => 'required|min:5']);

        $project->addTask($attributes);

        //Replaced by instance above because of route/model binding
        //Task::create([

        //  'project_id' => $project->id,

        //'description' => request('description')

        //]);

        return back();
    }


    public function update(Task $task)
    {
        /*-----REMOVED SECTION TO USE RESTFUL COMPLETED TASK CONTROLLER AND ROUTE----*/
        /*ORIGINAL Replace with ANY ONE OF 3 OPTIONS below to simplify complete and incomplete method calls*/
        //$task->complete(request()->has('completed'));

        /*1st---Straight forward ifelse statement*/
        //if (request()->has('completed')) {
        //  $task->complete();
        //} else {
        //  $task->incomplete();
        //}

        /*2nd---Ternary approach to the above ifelse*/
        //request()->has('completed') ? $task->complete() : $task->incomplete();

        /*3rd---Call a method dynamically through $method*/
        //$method = request()->has('completed') ? 'complete' : 'incomplete';

        //$task->$method();
        /*----END OF SECTION-----*/

        /*---REPLACE BY ENCAPSULATION IN TASK MODEL---*/
        // $task->update([
        //   'completed' => request()->has('completed')
        //]);

        return back();
    }
}
