<?php

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

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

// التعديل الأساسي هنا: جلب المهام وتمريرها للملف
Route::get('tasks', function () {
    $tasks = DB::table('tasks')->get();
    return view('tasks', compact('tasks'));
});

// التعديل الثاني: التوجيه الصريح لصفحة الـ tasks بعد الإضافة
Route::post('create', function () {
    $taskName = $_POST['name'];
    DB::table('tasks')->insert(['name' => $taskName]);
    return redirect('tasks');
});
Route::post('delete/{id}', function($id){
   DB::table('tasks')->where('id', '=', $id)->delete();
   return redirect()->back();
});

Route::post('edit/{id}', function($id){
    $task = DB::table('tasks')->where('id', $id)->first();
    $tasks = DB::table('tasks')->get();
    return view('tasks', compact('task', 'tasks'));
});

Route::post('update', function() {
    $id = $_POST['id'];
    DB::table('tasks')->where('id', '=', $id)->update(['name' => $_POST['name']]);
    return redirect('tasks');
});
