<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;


class ProjectsCreated
{
    use Dispatchable, SerializesModels;

    /*---Addition of project variable---*/
    public $project;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($project)
    {
        //Pass the project
        $this->project = $project;
    }
}
