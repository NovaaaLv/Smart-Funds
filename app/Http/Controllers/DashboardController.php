<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{

    public function dashboardView()
    {
        return Inertia::render('Dashboard');
    }
}
