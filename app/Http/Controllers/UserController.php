<?php

// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Show the authenticated user's profile
    public function show()
    {
        $user = Auth::user(); // Get current user
        return view('user.profile', compact('user')); // Load profile view
    }

    // Show the form to edit the authenticated user's profile
    public function edit()
    {
        $user = Auth::user();
        return view('user.profile.edit', compact('user')); // Load edit form
    }

    // Update the authenticated user's profile
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
        ]);

        $user = Auth::user();
        $user->update($validated);

        return redirect()->route('user.profile')->with('success', 'Profile updated successfully.');
    }

    // Delete the authenticated user's profile
    public function destroy()
    {
        $user = Auth::user();
        Auth::logout(); // Log out before deleting

        $user->delete();

        return redirect()->route('login')->with('success', 'Account deleted successfully.');
    }
}
