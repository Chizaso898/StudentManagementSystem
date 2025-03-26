<?php

// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Show the dashboard
    public function index()
    {
        return view('dashboard.index'); // Load dashboard view
    }
}
