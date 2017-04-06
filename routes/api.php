<?php

use Illuminate\Http\Request;
use App\Task;
use App\User;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*Users*/
Route::get('users', function(){
    return User::all();
});

Route::post('users', function(Request $request){
  if($request->has('name') && $request->has('email') && $request->has('password')){
    $name = $request->get('name');
    $email = $request->get('email');
    $password = $request->get('password');

    $user = new User;
    $user->name = $name;
    $user->email = $email;
    $user->password = $password;
    $user->save();
    return response($user->id, 201);
  }
  return response('User must have a name/email/password.', 400);
});

Route::delete('users/{user}', function(User $user){
    if($user->delete())
      return response('', 200);
    return response('', 400);
});

Route::put('users/{user}', function(Request $request, User $user){
    if($request->has('name') && $request->has('email') && $request->has('password')){
      $user->name = $request->get('name');
      $user->email = $request->get('email');
      $user->password = $request->get('password');
      $user->save();
      return response('', 200);
    }
    return response('Some fields are missing.', 400);
});


/*Tasks*/
Route::get('tasks', function(){
    return Task::all();
});

Route::post('tasks', function(Request $request){
  if($request->has('name')){
    $name = $request->get('name');
    $task = new Task;
    $task->name = $name;
    $task->save();
    return response($task->id, 201);
  }
  return response('Task must have a name.', 400);
});

Route::delete('tasks/{task}', function(Task $task){
    if($task->delete())
      return response('', 200);
    return response('', 400);
});

Route::put('tasks/{task}', function(Request $request, Task $task){
    if($request->has('name')){
      $task->name = $request->get('name');
      $task->save();
      return response('', 200);
    }
    return response('Name field is missing.', 400);
});
