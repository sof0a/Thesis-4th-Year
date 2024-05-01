<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function store(Request $request)
    {
        // Validate input data
        $validateData = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:users,email|max:255',
            'password' => 'required|string|min:8',
        ]);

        $post = new User();
        $post->name = $request->name;
        $post->email = $request->email;
        $post->password = Hash::make($request->password);
        $post->save();
        // variable_name->table_name = $request->name_input;


        // Hash the password before storing it in the database
        // $validatedData['password'] = Hash::make($request->password);

        // Create new user record
        // User::create($validatedData);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function update(Request $request, User $user)
    {
        // Vlaidate input data
        $validateData = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);

        // Update the user record
        $user->update($validateData);

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        // Delete user record
        $user->delete();

        return redirect()->route('users.index')->with('success','User deleted successfully');
    }


    public function create()
    {
        return view('users.create');
    }
    
    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }


    
}
