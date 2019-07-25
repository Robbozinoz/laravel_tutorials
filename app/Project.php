<?php

namespace App;

use App\Mail\ProjectCreated;
use Illiminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
use App\Events\ProjectsCreated;

class Project extends Model
{
    //protected $fillable = ['title', 'description'];

    protected $guarded = [];

    /*---Lesson 32 - event handling for project creation---*/
    protected $dispatchesEvents = [
        'created' => ProjectsCreated::class
    ];

    /*--Taken out and placed in event listener---*/
    //protected static function boot()
    //{
    //  parent::boot();

    /*---Lesson 32 second optin fo rmailable usage---*/
    //static::created(function ($project) {
    //  \Mail::to($project->owner->email)->send(
    //    new ProjectCreated($project)
    // );
    //});
    //}

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function addtask($task)
    {

        $this->tasks()->create($task);

        //Replaced with eloquent instance usage
        //return Task::create([

        //  'project_id' => $this->id,

        //'description' => $description

        //]);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
