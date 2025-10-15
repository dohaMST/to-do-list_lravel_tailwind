<?php

use App\Http\Requests\TaskRequest;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Models\Task;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function(){
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function ()  {
    // return view('welcome');
    return view("index",[
        // 'tasks' => \App\Models\Task::all()
        // 'tasks' => Task::latest()->get()
        'tasks' => Task::latest()->paginate(10)
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')->name('tasks.create');

// Route::get('/tasks/{id}/edit', function($id){
//     // $task =  Task::find($id);
//     $task = Task::findOrFail($id);
//     // if(!$task){
//     //     abort(Response::HTTP_NOT_FOUND);
//     // }
//     return view('edit',[
//         'task' => $task
//     ]);
// })->name('tasks.edit');
Route::get('/tasks/{task}/edit', function(Task $task){

    return view('edit',[
        'task' => $task
    ]);
})->name('tasks.edit');

// Route::get('/tasks/{id}', function($id){
//     // $task =  Task::find($id);
//     $task = Task::findOrFail($id);
//     // if(!$task){
//     //     abort(Response::HTTP_NOT_FOUND);
//     // }
//     return view('show',[
//         'task' => $task
//     ]);
// })->name('tasks.show');
Route::get('/tasks/{task}', function(Task $task){

    return view('show',[
        'task' => $task
    ]);
})->name('tasks.show');

Route::post('/tasks', function(TaskRequest $request){

    // $data = $request->validated();
    $task = Task::create($request->validated());

    return redirect()->route('tasks.show', ['task'=> $task])
                    ->with('success', 'Task created successfully');
})->name('tasks.post');



// Route::put('/tasks/{task}', function(Task $task, Request $request){
//     // dd($request->all( ));
//     $data = $request->validate([
//         'title' => 'required|max:255',
//         'description' => 'required',
//         'long_description' => 'required'
//     ]);
//     // dd($data);

//     $task = $task;
//     $task->title = $data['title'];
//     $task->description = $data['description'];
//     $task->long_description = $data['long_description'];
//     $task->save();

//     return redirect()->route('tasks.show', ['task'=> $task])
//                     ->with('success', 'Task updated successfully');
// })->name('tasks.update');
Route::put('/tasks/{task}', function(Task $task, TaskRequest $request){
    // $data = $request->validated();
    $task->update($request->validated());


    return redirect()->route('tasks.show', ['task'=> $task])
                    ->with('success', 'Task updated successfully');
})->name('tasks.update');

Route::delete("/tasks/{task}", function(Task $task){
    $task->delete();

    return redirect()->route('tasks.index')
                    ->with("success","task delted successfully");
})->name("tasks.destroy");

Route::put("/tasks/{task}", function(Task $task){
    $task->toggleComplete();
    return redirect()->back()->with("success","task updated successfully");
})->name('tasks.toggle');

//  Route::get('/greet/{name}', function($name){
//     return "hello " . $name . "!";
//  });

// Route::get('xxx',function(){
//     return "hello";
// })->name("hello");

// Route::get('hallo', function(){
//     return redirect()->route("hello");
// });
