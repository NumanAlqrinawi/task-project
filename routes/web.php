<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    $firstName = 'Numan';
    $lastName = 'Al Qrinawi';
    $departments = [
        '1' => 'Technical ',
        '2' => 'php',
        '3' => 'html'];
    return view('about')-> with('firstName', $firstName,)
       ->with('lastName', $lastName)->with('departments',$departments) ;
        //return view('about', data:...['firstName' => $firstName, 'lastName' => $lastName]);
        //return view('about', data: compact('firstName', 'lastName'));
        //return view('about', ['firstName' => $firstName, 'lastName' => $lastName]);
});
Route::post('/about', function () {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $departments = [
        '1' => 'Technical ',
        '2' => 'php',
        '3' => 'html'];
    return view('about', compact('firstName', 'lastName', 'departments'));
});
Route::get('tasks', function () {
    return view('tasks');
});
Route::post('create', function () {
    $taskName = $_POST['name'];
    DB::table('tasks')->insert(['name' => $taskName ]);
    return view('tasks');
});
