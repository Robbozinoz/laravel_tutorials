<?php
//use Symfony\Component\Routing\Annotation\Route;

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

//Removed after testing----use Illuminate\Filesystem\Filesystem;


//app()->singleton('App\Example', function () {
// return new \App\Example;

//dd('called');
//});


app()->singleton('App\Services\Twitter', function () {

    return new  \App\Services\Twitter('kdlshglksuhgksd');
});

Route::get('/', function () {
    //
    dd(app('App\Example'));
    //dd('called');

    return view('welcome');
});

/*
GET /projects (index)
GET /projects/create (create)
GET /projects/1 (show)
POST /projects (store)
GET /projects/1/edit (edit)
PATCH /projects/1 (update)
DELETE /projects/1 (destroy)
*/

/*-------REMOVED TO BE REPLACED BY LINE 44--------*/
//Route::get('/projects', 'ProjectsController@index');

//Route::get('/projects/create', 'ProjectsController@create');

//Route::get('/projects/{project}', 'ProjectsController@show');

//Route::post('/projects', 'ProjectsController@store');

//Route::get('/projects/{project}/edit', 'ProjectsController@edit');

//Route::patch('/projects/{product}', 'ProjectsController@update');

//Route::delete('/projects/{project}', 'ProjectsController@destroy');

/*------REMOVED TO USE COMPLETED TASK CONTROLLER AND ROUTE---*/
//Route::patch('/tasks/{task}', 'ProjectTasksController@update');

Route::resource('projects', 'ProjectsController');

Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');

Route::post('/completed-tasks/{task}', 'CompletedTaskController@store');

Route::delete('/completed-tasks/{task}', 'CompletedTaskController@destroy');
