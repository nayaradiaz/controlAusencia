<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Establecer la variable showUsers
        $showUsers = false;

        if ($request->has('showUsers') && auth()->user()->role === 'admin') {
            $showUsers = true;
        }
        return view('dashboard', compact('showUsers'));
    }
}
