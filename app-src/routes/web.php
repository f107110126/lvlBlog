<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $tasks = [
        'go to the store',
        'go to the market',
        'go to work',
        'go to concert'
    ];

    /* return method two */
    /* in this version it will be wrong */
    /*
    return view('welcome')
        ->withTask($tasks)
        ->withFoo('foobar')
        ->with(['bar'=>request('title'),'script' => '<script>alert(\'method 2\');</script>']);
    */

    /* return method tree */
    return view('welcome')
        ->with([
            'tasks' => $tasks,
            'foo' => 'foobar',
            'bar' => request('title'),
            'script' => '<script>alert(\'this is a script\');</script>'
        ]);

    /* return method one */
    /*
    return view('welcome',[
        'tasks' => $tasks,
        'foo' => 'foobar',
        'bar' => request('title'),
        'script' => '<script>alert(\'this is a script\');</script>'
    ]);
    */
});

Route::get('/example/controller', 'PageController@home');

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('info', function () {
    return view('info');
});

/*
 * For manage a Projects table, We can have 7 behavior:
 * 1. index - show all project title
 * 2. create - show a form to create a new project
 * 3. store - create a new project by the data send by create form
 * 4. detail - show detail for single project
 * 5. patch - update the specific project by the data send by edit form
 * 6. delete - destroy the specific project by id or something else
 * 7. edit - show a form to edit a specific project
 * So, according above, we should have 7 different route action for those option.
 */

Route::resource('projects', 'ProjectsController');

Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');
Route::patch('/tasks/{task}', 'ProjectTasksController@update');
Route::get('/upload', 'UploadController@index');
Route::post('/upload', 'UploadController@posted');
/*
 *  GET|HEAD  | projects                | projects.index   | App\Http\Controllers\ProjectController@index   | web    |
 *  POST      | projects                | projects.store   | App\Http\Controllers\ProjectController@store   | web    |
 *  GET|HEAD  | projects/create         | projects.create  | App\Http\Controllers\ProjectController@create  | web    |
 *  GET|HEAD  | projects/{project}      | projects.show    | App\Http\Controllers\ProjectController@show    | web    |
 *  PUT|PATCH | projects/{project}      | projects.update  | App\Http\Controllers\ProjectController@update  | web    |
 *  DELETE    | projects/{project}      | projects.destroy | App\Http\Controllers\ProjectController@destroy | web    |
 *  GET|HEAD  | projects/{project}/edit | projects.edit    | App\Http\Controllers\ProjectController@edit    | web    |
 *
 */

/*
 * Route::resource('projects', 'ProjectController');
 * above line can identically to following 7 lines.
 * Route::   get(               '/projects',   'ProjectController@index');
 * Route::  post(               '/projects',   'ProjectController@store');
 * Route::   get(        '/projects/create',  'ProjectController@create');
 * Route::   get(     '/projects/{project}',    'ProjectController@show');
 * Route:: patch(     '/projects/{project}', 'ProjectController@supdate');
 * Route::delete(     '/projects/{project}', 'ProjectController@destroy');
 * Route::   get('/projects/{project}/edit',    'ProjectController@edit');
 */

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
