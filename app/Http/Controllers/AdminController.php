<?php

namespace App\Http\Controllers;

use App\Models\InstructorRequest;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\InstructorApprovalMail;

class AdminController extends Controller
{
    // Handle instructor request approval or denial
    public function handleInstructorRequest($id, $action)
    {
        // Find the instructor request by its ID
        $request = InstructorRequest::findOrFail($id);

        if ($action === 'approve') {
            // Create instructor account with the 'Instructor' role
            $instructorRole = Role::where('name', 'Instructor')->first();
            
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make('temporarypassword'), // Temporary password placeholder
                'role_id' => $instructorRole->id,
            ]);

            // Update request status to approved
            $request->update(['status' => 'approved']);

            // Send approval email with password setup link
            Mail::to($request->email)->send(new InstructorApprovalMail($user));
        } elseif ($action === 'deny') {
            // If the action is 'deny', update the request status to denied
            $request->update(['status' => 'denied']);
        }

        // Redirect back with success message
        return redirect()->back()->with('success', "Instructor request $action successfully!");
    }
}
