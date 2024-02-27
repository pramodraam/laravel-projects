<?php

use \App\Models\Task;
use \App\Http\Requests\TaskRequest;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
  return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index', [
      'tasks' => Task::latest()->paginate()
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')
  ->name('task.create');

Route::get('/tasks/{task}/edit', function (Task $task) {
  return view('edit', [
    'task' => $task
  ]);
})->name('task.edit');
  
Route::get('/tasks/{task}', function (Task $task) {
  return view('show', [
    'task' => $task
  ]);
})->name('task.show');

Route::post('/tasks', function (TaskRequest $request) {
 $task = Task::create($request->validated());

  return redirect()->route('task.show', ['task'=> $task->id])
    ->with('success','Task Saved Successfully');
})->name('tasks.store');

Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {
  $task->update($request->validated());

  return redirect()->route('task.show', ['task'=> $task])
    ->with('success','Task Updated Successfully');
})->name('tasks.update');

Route::delete('/tasks/{task}', function (Task $task) {
  $task->delete();
  
  return redirect()->route('tasks.index')
    ->with('success','Task Deleted Successfully');
})->name('tasks.destroy');

// Route::get('/xxx', function () { 
//     return 'Hello';
// })->name('hello');

// Route::get('/hallo', function () {
//     return redirect()->route('hello');
// });

// Route::get('/greet/{name}', function ($name) {
//     return 'Hello ' . $name . '!';
//  });

 Route::fallback(function () {
    return "Still got somewhere!";
 });