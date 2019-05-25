<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request,
    App\Project;

class ProjectsController extends Controller
{
    //
    public function index()
    {
        $projects = Project::all();

        // return view('Projects.index', ['projects' => $projects]);

        return view('Projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    /*
     *
     */

    /*
     * manual way
     *
     * public function store()
     * {
     *     $project = new Project();
     *
     *     $project->title = request('title');
     *     $project->description = request('description');
     *
     *     $project->save();
     *
     *     // for developer following command will show all request been received
     *     // request()->all();
     *
     *     return redirect('/projects');
     * }
     * public function show($id)
     * {
     *     $project = Project::findorFail($id);
     *
     *     return view('projects.show', compact('project'));
     * }
     *
     * public function update($id)
     * {
     *     $project = Project::findorFail($id);
     *
     *     $project->title = request('title');
     *     $project->description = request('description');
     *
     *     $project->save();
     *
     *     return redirect('/projects');
     * }
     *
     * public function destroy($id)
     * {
     *     Project::findorFail($id)->delete();
     *
     *     return redirect('/projects');
     * }
     *
     * public function edit($id)
     * {
     *     // $project = Project::find($id);  // this is not safe to find data from database
     *     $project = Project::findorFail($id); // this is more safe to find data from database
     *     return view('projects.edit', compact('project'));
     * }
     */

    /*
     * Google keyword: laravel route binding
     */

    /*
     * new way
     */
    public function store()
    {
        /*
         * following are new way to insert a data
         * but the column include the insert data with send by request
         * they must be add to [protected $fillable] property in App\ModelName
         * in the other way is add [protected $guarded] property in App\ModelName
         * if use $guarded variable, then column not include it all will be $fillable
         *
         * recommend way
         * Project::created([
         *     'title' => request('title'),
         *     'description' => request('description')
         * ]);
         *
         * not recommend way, but it work.
         * Project::created(request()->all());
         *
         * $project = new Project();
         *
         * $project->title = request('title');
         * $project->description = request('description');
         *
         * $project->save();
         */

        // validate data
        // Google validation rule
        Project::create(
            request()->validate([
                'title' => ['required', 'min: 3', 'max: 255'],
                'description' => 'required'
            ])
        );

        // Project::create(request(['title', 'description']));

        // for developer following command will show all request been received
        // request()->all();

        return redirect('/projects');
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function update(Project $project)
    {
        /*
         * recommend way
         * $project->update(request(['title', 'description']));
         */
        /*
         * manual way
         */
        $project->title = request('title');
        $project->description = request('description');

        $project->save();

        return redirect('/projects');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect('/project');
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }
}
