<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //protected $fillable = ['title', 'description'];

    protected $guarded = [];

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
}
