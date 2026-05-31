<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use PHPUnit\Framework\Constraint\Operator;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    $firstName = 'Numan';
    $lastName = 'Al Qrinawi';
    $departments = [
        '1' => 'Technical ',
        '2' => 'php',
        '3' => 'html'
    ];
    return view('about')->with('firstName', $firstName)
        ->with('lastName', $lastName)->with('departments', $departments);
});

Route::post('/about', function () {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $departments = [
        '1' => 'Technical ',
        '2' => 'php',
        '3' => 'html'
    ];
    return view('about', compact('firstName', 'lastName', 'departments'));
});

Route::get('/tasks', action: [TaskController::class, 'index']);
Route::post('/create', action: [TaskController::class, 'create']);
Route::post('delete/{id}', action: [TaskController::class, 'destroy']);
Route::post('edit/{id}', action: [TaskController::class, 'edit']);
Route::post('update', action: [TaskController::class, 'update']);
Route::get('app', action: function (): View {
    return view(view:'layouts.app');
});
Route::get('/users', [UserController::class, 'index']);
Route::post('/createUser', [UserController::class, 'create']);
Route::post('/deleteUser/{id}', [UserController::class, 'destroy']);
Route::post('/editUser/{id}', [UserController::class, 'edit']);
Route::post('/updateUser', [UserController::class, 'update']);
