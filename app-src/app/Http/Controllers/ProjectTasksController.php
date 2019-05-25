<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request,
    App\Task, App\Project;

class ProjectTasksController extends Controller
{
    public function store(Project $project)
    {
        $project->addTask(
            request()->validate(['description' => 'required|min:3']) // ['description']
        );

        return back();
    }

    public function update(Task $task)
    {
        // dd() is a good debug function.

        // $task->complete(request()->has('completed'));

        // $task->update([
        //     'completed' => request()->has('completed')
        // ]);

        // if(request()->has('completed')) {
        //     $task->complete();
        // } else {
        //     $task->incomplete();
        // }

        $method = request()->has('completed') ? 'complete' : 'incomplete';

        $task->$method();

        return back();
    }
}
