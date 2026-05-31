<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->get();

        return view('users', compact('users'));
    }

    public function create(Request $request)
    {
        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->name . '@test.com',
            'password' => bcrypt('12345678'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/users');
    }

    public function edit($id)
    {
        $user = DB::table('users')
            ->where('id', $id)
            ->first();

        $users = DB::table('users')->get();

        return view('users', compact('users', 'user'));
    }

    public function update(Request $request)
    {
        DB::table('users')
            ->where('id', $request->id)
            ->update([
                'name' => $request->name,
                'updated_at' => now()
            ]);

        return redirect('/users');
    }

    public function destroy($id)
    {
        DB::table('users')
            ->where('id', $id)
            ->delete();

        return redirect('/users');
    }
}
