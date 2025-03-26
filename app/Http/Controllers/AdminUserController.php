<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    // List all users
    public function index()
    {
        $users = User::all();  // Fetch all users
        return view('admin.users.index', compact('users'));  // Pass users to the view
    }

    // Show the form to create a new user
    public function create()
    {
        return view('admin.users.create');  // Return create user view
    }

    // Store a newly created user in the database
    public function store(Request $request)
    {
        // Validate input data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        // Create new user and store it in the database
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),  // Hash the password
            'approved' => false,  // User is not approved initially
        ]);

        // Redirect back with success message
        return redirect()->route('admin.users')->with('success', 'User created successfully.');
    }

    // Show the form to edit an existing user
    public function edit($id)
    {
        $user = User::findOrFail($id);  // Find user by ID
        return view('admin.users.edit', compact('user'));  // Return edit view with user data
    }

    // Update an existing user's information
    public function update(Request $request, $id)
    {
        // Validate input data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,  // Exclude current user's email from uniqueness check
        ]);

        $user = User::findOrFail($id);  // Find user by ID
        $user->update($validated);  // Update user data

        // Redirect back with success message
        return redirect()->route('admin.users')->with('success', 'User updated successfully.');
    }

    // Delete a user
    public function destroy($id)
    {
        $user = User::findOrFail($id);  // Find user by ID
        $user->delete();  // Delete user

        // Redirect back with success message
        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }

    // Approve a user
    public function approveUser($id)
    {
        $user = User::findOrFail($id);  // Find user by ID
        $user->approved = true;  // Set user as approved
        $user->save();  // Save changes

        // Redirect back with success message
        return redirect()->route('admin.users')->with('success', 'User approved successfully.');
    }
}
