<?php

namespace App\Listeners;

use App\Events\ProjectsCreated;
use App\Mail\ProjectCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendProjectsCreatedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProjectsCreated  $event
     * @return void
     */
    public function handle(ProjectsCreated $event)
    {
        //Moved from project.php lesson 32
        \Mail::to($event->project->owner->email)->send(
            new ProjectCreated($event->project)
        );
    }
}
